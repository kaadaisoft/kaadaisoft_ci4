<?php
namespace App\Controllers;

use App\Models\Bulk_upload_model;
use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Exception;

// require FCPATH . 'vendor/autoload.php'; // Usually autoloaded by Composer via framework, but keeping if standalone composer

class Bulk_upload extends BaseController {

    protected $bulk_upload_model;
    protected $session;
    protected $db;

    public function __construct() {
        $this->bulk_upload_model = new Bulk_upload_model();
        $this->session = session();
        $this->db = \Config\Database::connect();
    }

    public function index() {
        if (!view_exists('bulk_upload_view')) {
            return redirect()->to('admindashboard');
        }
        return view('bulk_upload_view');
    }

    public function download_sample() {
        $filename = "sample_members_bulk_upload_format.xlsx";
        $headers = ['Name', 'Phonenumber', 'State', 'District', 'Taluk', 'Panchayat', 'Village', 'Street', 'Doornumber', 'Pincode', 'Aadharnumber', 'Approvedstatus'];
        
        $sample_data = [
            ['John Doe', '9876543210', 'Tamil Nadu', 'Erode', 'Erode', 'Panchayat Name', 'Village Name', 'Main Street', '123/A', '638001', '123456789012', 'Verified'],
            ['Jane Smith', '9123456789', 'Tamil Nadu', 'Coimbatore', 'Coimbatore North', 'Example Panchayat', 'Example Village', 'Second Street', '45', '641001', '987654321098', 'Pending']
        ];

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $column = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($column . '1', $header);
            $column++;
        }

        // Add sample data
        $row_index = 2;
        foreach ($sample_data as $data_row) {
            $column = 'A';
            foreach ($data_row as $cell_value) {
                $sheet->setCellValue($column . $row_index, $cell_value);
                $column++;
            }
            $row_index++;
        }

        // Auto-size columns
        foreach (range('A', $column) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit();
    }

    public function upload_file() {
        $file = $this->request->getFile('file');

        if (!$file->isValid()) {
             $error = $file->getErrorString();
             $this->session->setFlashdata('upload_error', $error);
             return redirect()->back();
        }

        $ext = $file->getExtension();
        if (!in_array($ext, ['xlsx', 'xls', 'csv'])) {
             $this->session->setFlashdata('upload_error', 'Invalid file type. Allowed: xlsx, xls, csv');
             return redirect()->back();
        }

        if (!$file->hasMoved()) {
            $newName = $file->getRandomName(); // Use random name for security
            try {
                $file->move('assets/bulk_uploads/', $newName);
            } catch (Exception $e) {
                $this->session->setFlashdata('upload_error', $e->getMessage());
                return redirect()->back();
            }

            $file_path = 'assets/bulk_uploads/' . $newName;

            // Process the uploaded Excel file using PhpSpreadsheet
            try {
                $result = $this->parse_excel($file_path);
            } catch (Exception $e) {
                $this->session->setFlashdata('upload_error', 'Error reading file: ' . $e->getMessage());
                return redirect()->back();
            }
            $data = $result['valid_data'];
            $errors = $result['errors'];

            $inserted_count = 0;
            $skipped_count = count($errors);

            // Call the model's bulk insert method if there is valid data
            if (!empty($data)) {
                try {
                    if ($this->bulk_upload_model->bulk_insert($data)) {
                        $inserted_count = count($data);
                    }
                } catch (Exception $e) {
                    $this->session->setFlashdata('upload_error', 'Something went wrong: ' . $e->getMessage());
                    return redirect()->back();
                }
            }

            // Prepare success message
            $message = "Upload Processed. Inserted: $inserted_count. Skipped: $skipped_count.";
            if ($skipped_count > 0) {
                $message .= " <br>Skipped details: <br>" . implode("<br>", array_slice($errors, 0, 5)); 
                if($skipped_count > 5) $message .= "<br>...and " . ($skipped_count - 5) . " more.";
            }

            if ($inserted_count > 0) {
                $this->session->setFlashdata('upload_success', $message);
            } else {
                $this->session->setFlashdata('upload_error', $message);
            }
            
            return redirect()->back();
        }
    }

    private function parse_excel($file_path) {
        $data = [];
        $errors = [];
        $processed_mobiles = [];
        $totalmembersverified = 0;

        // Load the spreadsheet
        try {
            $spreadsheet = IOFactory::load($file_path);
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();
        } catch (Exception $e) {
            throw new Exception("Unable to load file: " . $e->getMessage());
        }

        if (empty($rows)) {
            throw new Exception("File is empty.");
        }

        // Read headers (first row)
        $headers = array_map('trim', $rows[0]);
        $headerIndex = array_flip($headers);

        // Required headers validation
        $required_headers = ['Name', 'Phonenumber', 'State', 'District', 'Taluk', 'Panchayat', 'Village', 'Street', 'Doornumber', 'Pincode', 'Aadharnumber', 'Approvedstatus'];
        foreach ($required_headers as $req) {
            if (!isset($headerIndex[$req])) {
                throw new Exception("Missing required header: $req");
            }
        }

        // --- PRE-SCAN FOR CONFLICTS START ---
        $mobile_names_map = [];
        $conflicting_mobiles = [];

        for ($i = 1; $i < count($rows); $i++) {
            $row = $rows[$i];
            if (empty(array_filter($row))) continue;

            $name = $row[$headerIndex['Name']] ?? '';
            $original_phone = $row[$headerIndex['Phonenumber']] ?? '';
            
            if (empty(trim($name)) || empty(trim($original_phone))) continue;

            $clean_phone = preg_replace('/[^0-9]/', '', $original_phone);
            if (preg_match('/^(91)?[6-9][0-9]{9}$/', $clean_phone)) {
                $processed_phone = substr($clean_phone, -10);
            } else {
                $processed_phone = $clean_phone; 
            }

            $mobile_names_map[$processed_phone][] = $name;
        }

        foreach ($mobile_names_map as $mobile => $names) {
            $unique_names = array_unique(array_map('strtolower', array_map('trim', $names)));
            if (count($unique_names) > 1) {
                $conflicting_mobiles[] = $mobile;
            }
        }
        // --- PRE-SCAN FOR CONFLICTS END ---


        // Loop through data rows
        for ($i = 1; $i < count($rows); $i++) {
            $row = $rows[$i];

            if (empty(array_filter($row))) {
                continue;
            }

            $name       = $row[$headerIndex['Name']] ?? '';
            $state      = $row[$headerIndex['State']] ?? '';
            $district   = $row[$headerIndex['District']] ?? '';
            $taluk      = $row[$headerIndex['Taluk']] ?? '';
            $panchayat  = $row[$headerIndex['Panchayat']] ?? '';
            $village    = $row[$headerIndex['Village']] ?? '';
            $street     = $row[$headerIndex['Street']] ?? '';
            $doornumber = $row[$headerIndex['Doornumber']] ?? '';
            $pincode    = $row[$headerIndex['Pincode']] ?? '';
            $original_phone = $row[$headerIndex['Phonenumber']] ?? '';
            $aadharnumber = $row[$headerIndex['Aadharnumber']] ?? '';
            $approvedstatus = $row[$headerIndex['Approvedstatus']] ?? '';


            if (empty(trim($name)) || empty(trim($original_phone)) || empty(trim($aadharnumber))) {
                $errors[] = "Row " . ($i + 1) . ": Missing Name, Phone, or Aadhar.";
                continue;
            }

            // Clean phone
            $clean_phone = preg_replace('/[^0-9]/', '', $original_phone);
            if (preg_match('/^(91)?[6-9][0-9]{9}$/', $clean_phone)) {
                $processed_phone = substr($clean_phone, -10);
            } else {
                $processed_phone = $clean_phone;
            }

            // --- VALIDATION START ---
            if (in_array($processed_phone, $conflicting_mobiles)) {
                $errors[] = "Row " . ($i + 1) . ": Mobile $processed_phone (Name: $name) skipped due to conflicting data.";
                continue;
            }

            if (in_array($processed_phone, $processed_mobiles)) {
                 $errors[] = "Row " . ($i + 1) . ": Mobile $processed_phone (Name: $name) is duplicated in file.";
                 continue;
            }
            $processed_mobiles[] = $processed_phone;

            $exists = $this->db->table('kaadaimembers')->where('Phonenumber', $processed_phone)->countAllResults();
            if ($exists > 0) {
                $errors[] = "Row " . ($i + 1) . ": Mobile $processed_phone (Name: $name) already exists in database.";
                continue; 
            }
            // --- VALIDATION END ---

            $hashed_password = password_hash($processed_phone, PASSWORD_BCRYPT);

            // Get district_code and state_id with parameter binding
            $getdistrictcode = $this->db->query("SELECT DISTINCT(district_code) AS district_code, state_id FROM panchayat_table WHERE district_name = ?", [$district]);
            $getcode = $getdistrictcode->getRow();

            $familyMembershipId = NULL;
            $state_id = NULL;
            $coordid = NULL;

            if ($getcode) {
                $districtcode = $getcode->district_code;
                $state_id = $getcode->state_id;

                // Coordinator assignment: Fetch from village_table which is the source of truth for assignments
                $getCoordinatorid = $this->db->query("SELECT Coordinator_id, Coordinator_Two_id FROM village_table WHERE village_name = ? AND panchayat_name = ? AND taluk_name = ? AND district_name = ?", [$village, $panchayat, $taluk, $district]);
                $coordinatorRow = $getCoordinatorid->getRow();
                $coordid = $coordinatorRow ? $coordinatorRow->Coordinator_id : null;
                $coordid_two = $coordinatorRow ? $coordinatorRow->Coordinator_Two_id : null;

                if($totalmembersverified < 1 && $approvedstatus == 'Verified'){
                    $getmembers = $this->db->query("SELECT * FROM kaadaimembers WHERE Approvedstatus = 'Verified'");
                    $totalmembersverified = count($getmembers->getResultArray()) + 1;  
                    }
                elseif($totalmembersverified >= 1 && $approvedstatus == 'Verified'){
                        ++$totalmembersverified;
                    }

                $newid = $approvedstatus == 'Verified' ? $districtcode . str_pad($totalmembersverified, 5, "0", STR_PAD_LEFT) : NULL;
                $familyMembershipId = $newid;
            } else {
                 // Fallback if district code not found (though headers checked, data integrity might be issue)
                 // Just continue, familyMembershipId null
                 $coordid = null;
                 $coordid_two = null; 
            }

            $data[] = array(
                'Familymembershipid' => $familyMembershipId,
                'MemberRole' => 'Head', 
                'Name' => $name,
                'State' => $state,
                'District' => $district,
                'Taluk' => $taluk,
                'Panchayat' => $panchayat,
                'Village' => $village,
                'Street' => $street,
                'Doornumber' => $doornumber,
                'Pincode' => $pincode,
                'Phonenumber' => $processed_phone,
                'Aadharnumber' => $aadharnumber,
                'Approvedstatus' => $approvedstatus,
                'state_id' => $state_id,
                'Coordinator_id' => $coordid,
                'Coordinator_Two_id' => $coordid_two,
                'Password' => $hashed_password
            );
        }

        return ['valid_data' => $data, 'errors' => $errors];
    }

}
?>
