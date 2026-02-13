<?php
namespace App\Controllers;

use App\Models\ExportModel;
use App\Models\Bulk_upload_model;
use App\Models\PaymentsModel;
use App\Models\ReportsModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\Controller;

class ReportingController extends BaseController
{
    protected $exportModel;
    protected $bulkUploadModel;
    protected $paymentsModel;
    protected $reportsModel;
    protected $session;
    protected $db;

    public function __construct()
    {
        $this->exportModel = new ExportModel();
        $this->bulkUploadModel = new Bulk_upload_model();
        $this->paymentsModel = new PaymentsModel();
        $this->reportsModel = new ReportsModel();
        $this->session = session();
        $this->db = \Config\Database::connect();
    }

    public function excel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $spreadsheet->getProperties()->setCreator('Kaadaisoft')
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
            $sheet->setCellValueByColumnAndRow($colIndex, 1, ucfirst($column));
            $colIndex++;
        }

        $rowIndex = 2;
        foreach ($filteredusers as $value) {
            $colIndex = 1;
            foreach ($columns as $column) {
                $sheet->setCellValueByColumnAndRow($colIndex, $rowIndex, $value[$column]);
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

        // Get filter parameters from URL
        $year      = $this->request->getGet('year');
        $event     = $this->request->getGet('event');
        $status    = $this->request->getGet('status');
        $talukname = $this->request->getGet('talukname');
        $eventid   = $this->request->getGet('eventid');

        $status = ucfirst(strtolower($status));

        if (!empty($talukname) && !empty($eventid) && $status) {
            $filteredusers = $this->reportsModel->getMembersHistoryForDownload($eventid, $status, $talukname);
            $heading = ucfirst($talukname) . " - " . ucfirst($status);
            $safeTaluk = preg_replace('/[^A-Za-z0-9]/', '', $talukname);
            $safeStatus = preg_replace('/[^A-Za-z0-9]/', '', $status);
            $filename = "{$safeTaluk}-{$safeStatus}-user_report-" . date('Y-m-d') . ".xlsx";
        } else {
            $filteredusers = $this->reportsModel->getMembersHistoryForDownload($event, $status);
            $heading = "Year: " . ($year ?: 'All') . " - Event ID: " . ($event ?: 'All') . " - " . ucfirst($status);
            $safeYear = preg_replace('/[^A-Za-z0-9]/', '', $year ?: 'All');
            $safeEvent = preg_replace('/[^A-Za-z0-9]/', '', $event ?: 'All');
            $safeStatus = preg_replace('/[^A-Za-z0-9]/', '', $status);
            $filename = "Report-Year{$safeYear}-Event-{$safeEvent}-Status-{$safeStatus}-" . date('Y-m-d') . ".xlsx";
        }

        if (empty($filteredusers)) {
             echo "No data found for the selected filters.";
             return;
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', $heading);
        $columns = array_keys($filteredusers[0]);
        $lastCol = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(count($columns));
        $sheet->mergeCells("A1:{$lastCol}1");
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $colIndex = 1;
        foreach ($columns as $column) {
            $sheet->setCellValueByColumnAndRow($colIndex, 2, ucfirst($column));
            $colIndex++;
        }
        $sheet->getStyle("A2:{$lastCol}2")->getFont()->setBold(true);

        $rowIndex = 3;
        foreach ($filteredusers as $value) {
            $colIndex = 1;
            foreach ($columns as $column) {
                $sheet->setCellValueByColumnAndRow($colIndex, $rowIndex, $value[$column]);
                $colIndex++;
            }
            $rowIndex++;
        }

        foreach (range('A', $lastCol) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
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
}
?>