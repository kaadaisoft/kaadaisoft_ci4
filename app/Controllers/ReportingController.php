<?php
namespace App\Controllers;

use App\Models\ExportModel;
use App\Models\Bulk_upload_model;
use App\Models\PaymentsModel;
use App\Models\ReportsModel;
use App\Models\EventsModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\Controller;

class ReportingController extends BaseController
{
    protected $exportModel;
    protected $bulkUploadModel;
    protected $paymentsModel;
    protected $reportsModel;
    protected $eventsModel;
    protected $session;
    protected $db;

    public function __construct()
    {
        $this->exportModel = new ExportModel();
        $this->bulkUploadModel = new Bulk_upload_model();
        $this->paymentsModel = new PaymentsModel();
        $this->reportsModel = new ReportsModel();
        $this->eventsModel = new EventsModel();
        $this->session = session();
        $this->db = \Config\Database::connect();
    }

    public function excel()
    {
        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('admindashboard');
        }
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $spreadsheet->getProperties()->setCreator('Poondurai Kaadai Kulam')
            ->setTitle('Total Report Export');

        $data = $this->exportModel->get_data();

        $sheet->setCellValue('A1', 'Familymembershipid');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'State');
        $sheet->setCellValue('D1', 'District');
        $sheet->setCellValue('E1', 'Taluk');
        $sheet->setCellValue('F1', 'Panchayat');
        $sheet->setCellValue('G1', 'Village');
        $sheet->setCellValue('H1', 'Street');
        $sheet->setCellValue('I1', 'Doornumber');
        $sheet->setCellValue('J1', 'Pincode');
        $sheet->setCellValue('K1', 'Phonenumber');
        $sheet->setCellValue('L1', 'Aadharnumber');

        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['Familymembershipid']);
            $sheet->setCellValue('B' . $row, $item['Name']);
            $sheet->setCellValue('C' . $row, $item['State']);
            $sheet->setCellValue('D' . $row, $item['District']);
            $sheet->setCellValue('E' . $row, $item['Taluk']);
            $sheet->setCellValue('F' . $row, $item['Panchayat']);
            $sheet->setCellValue('G' . $row, $item['Village']);
            $sheet->setCellValue('H' . $row, $item['Street']);
            $sheet->setCellValue('I' . $row, $item['Doornumber']);
            $sheet->setCellValue('J' . $row, $item['Pincode']);
            $sheet->setCellValue('K' . $row, $item['Phonenumber']);
            $sheet->setCellValue('L' . $row, $item['Aadharnumber']);
            $row++;
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Total_report.xlsx"');
        header('Cache-Control: max-age=0');

        ob_clean();
        flush();

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function download_members_data()
    {
        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
        $filteredusers = $this->bulkUploadModel->getMembersdetails();

        if (empty($filteredusers)) {
            // In CI4 show_error is mostly throwing exceptions or echoing views. 
            // Ideally avoid throwing exception if user can be redirected.
            // But let's stick to simple output for now or throw PageNotFoundException if appropriate, or just echo.
            // show_error('No data available to generate the report.');
            // CI4 helper 'url' is loaded in BaseController usually.
            // We can echo a message.
            echo "No data available to generate the report.";
            return;
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $columns = array_keys($filteredusers[0]);

        $colIndex = 1;
        foreach ($columns as $column) {
            $sheet->setCellValue([$colIndex, 1], ucfirst($column));
            $colIndex++;
        }

        $rowIndex = 2;
        foreach ($filteredusers as $value) {
            $colIndex = 1;
            foreach ($columns as $column) {
                $sheet->setCellValue([$colIndex, $rowIndex], $value[$column]);
                $colIndex++;
            }
            $rowIndex++;
        }

        $filename = "user_report_" . date('Y-m-d') . ".xlsx";
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        
        ob_clean();
        flush();
        
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function download_excel()
    {
        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }

        // Get filter parameters from URL
        $year          = $this->request->getGet('year');
        $event         = $this->request->getGet('event'); // legacy
        $status        = $this->request->getGet('status');
        $districtname  = $this->request->getGet('districtname');
        $talukname     = $this->request->getGet('talukname');
        $panchayatname = $this->request->getGet('panchayatname');
        $villagename   = $this->request->getGet('villagename');
        $eventid       = $this->request->getGet('eventid');

        $status = ucfirst(strtolower($status));
        $ev_id = $event ?: $eventid;
        $eventname = 'All';
        if ($ev_id && $ev_id != 'All') {
            $ev_data = $this->eventsModel->getEventdata($ev_id);
            if ($ev_data) $eventname = $ev_data->EventName;
        }

        if (!empty($talukname) && !empty($eventid) && $status) {
            $filteredusers = $this->reportsModel->getMembersHistoryForDownload($eventid, $status, $talukname, $panchayatname, $villagename, $districtname);
            $heading = ucfirst($talukname) . (!empty($panchayatname) ? ' - ' . ucfirst($panchayatname) : '') . (!empty($villagename) ? ' - ' . ucfirst($villagename) : '') . " - Event Name : " . $eventname . " - Status : " . ucfirst($status);
            $safeTaluk = preg_replace('/[^A-Za-z0-9]/', '', $talukname);
            $safeStatus = preg_replace('/[^A-Za-z0-9]/', '', $status);
            $filename = "{$safeTaluk}-{$safeStatus}-report-" . date('Y-m-d') . ".xlsx";
        } else {
            $filteredusers = $this->reportsModel->getMembersHistoryForDownload($event ?: $eventid, $status, null, null, null, $districtname);
            $locationLabel = !empty($districtname) ? ucfirst($districtname) . ' - ' : '';
            $heading = $locationLabel . "Year: " . ($year ?: 'All') . " - Event Name : " . $eventname . " - Status : " . ucfirst($status);
            $safeYear = preg_replace('/[^A-Za-z0-9]/', '', $year ?: 'All');
            $safeStatus = preg_replace('/[^A-Za-z0-9]/', '', $status);
            $filename = "Report-Year{$safeYear}-Status-{$safeStatus}-" . date('Y-m-d') . ".xlsx";
        }

        if (empty($filteredusers)) {
             session()->setFlashdata('validationmessage', 'No data found for the selected filters.');
             return redirect()->back();
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $spreadsheet->getProperties()->setCreator('Poondurai Kaadai Kulam')->setTitle('Event Report');

        // Row 1: Heading (merged)
        $sheet->setCellValue('A1', $heading);
        $sheet->mergeCells('A1:N1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setRGB('1E293B');
        $sheet->getStyle('A1')->getFont()->getColor()->setRGB('FFFFFF');

        // Row 2: Column headers
        $headers = [
            'A' => 'S.No',
            'B' => 'Family Membership ID',
            'C' => 'Name',
            'D' => 'Role',
            'E' => 'Mobile',
            'F' => 'District',
            'G' => 'Taluk',
            'H' => 'Panchayat',
            'I' => 'Village',
            'J' => 'Event Money (₹)',
            'K' => 'Paid Cash (₹)',
            'L' => 'Pending (₹)',
            'M' => 'Status',
            'N' => 'Last Paid Date',
        ];
        foreach ($headers as $col => $label) {
            $sheet->setCellValue($col . '2', $label);
        }
        $sheet->getStyle('A2:N2')->getFont()->setBold(true);
        $sheet->getStyle('A2:N2')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setRGB('0F172A');
        $sheet->getStyle('A2:N2')->getFont()->getColor()->setRGB('FFFFFF');
        $sheet->getStyle('A2:N2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Set text format for columns that may contain large numbers
        $textFormat = \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT;

        $rowIndex = 3;
        $sno = 1;
        foreach ($filteredusers as $value) {
            $tax     = floatval($value['EventMoney'] ?? $value['Taxamount'] ?? 0);
            $paid    = floatval($value['PaidCash']   ?? $value['paidamount'] ?? 0);
            $pending = floatval($value['Pending']    ?? $value['balancemount'] ?? $value['balanceamount'] ?? $tax);

            if ($tax > 0 && $pending == $tax) {
                $statusText = 'UN PAID';
            } elseif ($pending == 0 && $tax > 0) {
                $statusText = 'PAID';
            } elseif ($pending > 0 && $pending < $tax) {
                $statusText = 'PARTIALLY PAID';
            } else {
                $statusText = 'N/A';
            }

            // Row fill (alternating)
            $rowFill = ($rowIndex % 2 == 0) ? 'F8FAFC' : 'FFFFFF';

            $sheet->setCellValue('A' . $rowIndex, $sno);
            $sheet->setCellValue('B' . $rowIndex, $value['Familymembershipid'] ?? '');
            $sheet->setCellValue('C' . $rowIndex, $value['Name'] ?? '');
            $sheet->setCellValue('D' . $rowIndex, $value['Role'] ?? '');

            // Mobile as text to prevent truncation
            $sheet->getCell('E' . $rowIndex)->setValueExplicit(
                $value['Mobile'] ?? $value['Phonenumber'] ?? '',
                \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING
            );

            $sheet->setCellValue('F' . $rowIndex, $value['District'] ?? '');
            $sheet->setCellValue('G' . $rowIndex, $value['Taluk'] ?? '');
            $sheet->setCellValue('H' . $rowIndex, $value['Panchayat'] ?? '');
            $sheet->setCellValue('I' . $rowIndex, $value['Village'] ?? '');
            $sheet->setCellValue('J' . $rowIndex, $tax);
            $sheet->setCellValue('K' . $rowIndex, $paid);
            $sheet->setCellValue('L' . $rowIndex, $pending);
            $sheet->setCellValue('M' . $rowIndex, $statusText);
            $sheet->setCellValue('N' . $rowIndex, $value['LastPaidDate'] ?? $value['paymentdate'] ?? '-');

            // Style status cell color
            $statusColor = match($statusText) {
                'PAID'           => '16A34A',
                'UN PAID'        => 'DC2626',
                'PARTIALLY PAID' => '2563EB',
                default          => '64748B',
            };
            $sheet->getStyle('M' . $rowIndex)->getFont()->getColor()->setRGB($statusColor);
            $sheet->getStyle('M' . $rowIndex)->getFont()->setBold(true);

            // Alternating row background
            $sheet->getStyle("A{$rowIndex}:N{$rowIndex}")->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setRGB($rowFill);

            $rowIndex++;
            $sno++;
        }

        // Auto-size all columns
        foreach (range('A', 'N') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Add borders to the data area
        $lastRow = $rowIndex - 1;
        if ($lastRow >= 2) {
            $sheet->getStyle("A2:N{$lastRow}")->getBorders()->getAllBorders()
                ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        ob_clean();
        flush();

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function download_members_excel()
    {
        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }

        $search = $this->request->getGet('search');
        $state_id = $this->request->getGet('state_id');
        $district = $this->request->getGet('district');
        $taluk = $this->request->getGet('taluk');
        $panchayat = $this->request->getGet('panchayat');
        $bloodgroup = $this->request->getGet('bloodgroup');
        $gender = $this->request->getGet('gender');
        $occupation = $this->request->getGet('occupation');

        $searchfields = [
            'search' => $search,
            'state_id' => $state_id,
            'district' => $district,
            'taluk' => $taluk,
            'panchayat' => $panchayat,
            'bloodgroup' => $bloodgroup,
            'gender' => $gender,
            'occupation' => $occupation
        ];

        $members = $this->reportsModel->getFilteredMembersForDownload($searchfields);

        if (empty($members)) {
            echo "No data available for the selected filters.";
            return;
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $spreadsheet->getProperties()->setCreator('Poondurai Kaadai Kulam')
            ->setTitle('Filtered Members Export');

        $headers = [
            'A1' => 'User ID',
            'B1' => 'Name',
            'C1' => 'Mobile',
            'D1' => 'State',
            'E1' => 'District',
            'F1' => 'Taluk',
            'G1' => 'Panchayat',
            'H1' => 'Village',
            'I1' => 'Street',
            'J1' => 'Door No',
            'K1' => 'Pincode',
            'L1' => 'Aadhar No',
            'M1' => 'Blood Group',
            'N1' => 'Gender',
            'O1' => 'Occupation'
        ];

        foreach ($headers as $cell => $text) {
            $sheet->setCellValue($cell, $text);
        }
        $sheet->getStyle('A1:O1')->getFont()->setBold(true);

        $row = 2;
        foreach ($members as $member) {
            $sheet->setCellValue('A' . $row, $member['Familymembershipid']);
            $sheet->setCellValue('B' . $row, $member['Name']);
            $sheet->setCellValue('C' . $row, $member['Phonenumber']);
            $sheet->setCellValue('D' . $row, $member['State']);
            $sheet->setCellValue('E' . $row, $member['District']);
            $sheet->setCellValue('F' . $row, $member['Taluk']);
            $sheet->setCellValue('G' . $row, $member['Panchayat']);
            $sheet->setCellValue('H' . $row, $member['Village']);
            $sheet->setCellValue('I' . $row, $member['Street']);
            $sheet->setCellValue('J' . $row, $member['Doornumber']);
            $sheet->setCellValue('K' . $row, $member['Pincode']);
            $sheet->setCellValue('L' . $row, $member['Aadharnumber']);
            $sheet->setCellValue('M' . $row, $member['Bloodgroup']);
            $sheet->setCellValue('N' . $row, $member['Gender']);
            $sheet->setCellValue('O' . $row, $member['Profession']);
            $row++;
        }

        foreach (range('A', 'O') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $filename = "Members_Report_" . date('Y-m-d') . ".xlsx";
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        
        ob_clean();
        flush();

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
?>