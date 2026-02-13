<?php
namespace App\Controllers;

use App\Models\ExportModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PaidUnpaidController extends BaseController
{
    protected $exportModel;
    protected $session;
    protected $db;

    public function __construct()
    {
        $this->exportModel = new \App\Models\ExportModel();
        $this->session = session();
        $this->db = \Config\Database::connect();
    }

    public function excel()
    {
        // require_once FCPATH . 'vendor/autoload.php'; // CI4 uses Composer by default

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $spreadsheet->getProperties()->setCreator('Kaadaisoft')
                ->setTitle('Paid Unpaid Export');

        $counts = 0;
        $eventname = $this->request->getGet('eventname');
        $status = $this->request->getGet('status');
        
        $reports = $this->exportModel->get_Filterdata($eventname, $status);
        $totalReports = count($reports);
        $this->session->set("paidUnpaidreportscounts", $counts);
        
        // This line in original loaded a view but returned it as string? No, output to buffer then echo?
        // Original: $data = $this->load->view(..., true);
        // CI4: view(..., [], []) returns string.
        // But original code didn't use $data effectively except maybe for debugging?
        // It proceeded to create Excel. I will skip view rendering if it's just for excel.
        // The view 'reportFilterlist' was loaded but variable $data was unused except in commented echo.
        
        $sheet->setCellValue('A1', 'Familymembershipid');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'State');
        $sheet->setCellValue('D1', 'District');
        $sheet->setCellValue('E1', 'Taluk');
        $sheet->setCellValue('F1', 'Panchayat');
        $sheet->setCellValue('G1', 'Phonenumber');
        $sheet->setCellValue('H1', 'Event_amount');
        $sheet->setCellValue('I1', 'Paid_Amount');
        $sheet->setCellValue('J1', 'Pending_Amount');
        $sheet->setCellValue('K1', 'lastPaymentdate');

        $row = 2;
        foreach ($reports as $key => $item) {
                $sheet->setCellValue('A' . $row, $item['Familymembershipid']);
                $sheet->setCellValue('B' . $row, $item['Name']);
                $sheet->setCellValue('C' . $row, $item['State']);
                $sheet->setCellValue('D' . $row, $item['District']);
                $sheet->setCellValue('E' . $row, $item['Taluk']);
                $sheet->setCellValue('F' . $row, $item['Panchayat']);
                $sheet->setCellValue('G' . $row, $item['Phonenumber']);
                $sheet->setCellValue('H' . $row, $item['Event_amount']);
                $sheet->setCellValue('I' . $row, $item['Paid_Amount']);
                $sheet->setCellValue('J' . $row, $item['Pending_Amount']);
                $sheet->setCellValue('K' . $row, $item['lastPaymentdate']);
                $row++;
        }
        
        $filename = $eventname . "_" . $status;

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=$filename.xlsx");
        header('Cache-Control: max-age=0');

        ob_clean();
        flush();

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

}
?>
