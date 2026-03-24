<?php
namespace App\Controllers;

use App\Models\PaymentsModel;
use App\Models\AdminDashboardModel;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Exception;

class Payments extends BaseController {

    protected $paymentsModel;
    protected $adminDashboardModel;
    protected $session;
    protected $db;

    public function __construct() {
        $this->paymentsModel = new PaymentsModel();
        $this->adminDashboardModel = new AdminDashboardModel();
        $this->session = session();
        $this->db = \Config\Database::connect();
        helper(['url', 'form']);
    }

    public function index(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('payment-receipt-list');
        }
        $name = $this->session->get('name');
        $counts = 0;
        $this->session->set('paymentpagecounts', $counts);
        $memberslist = $this->paymentsModel->getMembersdetails($counts);
        $totalpayers = $this->paymentsModel->getTotalmembers();
        $eventyears = $this->paymentsModel->getEventsyear();
        $pendingapplications = $this->adminDashboardModel->getPendingapplications();
        $pendingcounts = count($pendingapplications);
        $updaterequestcounts = count($this->adminDashboardModel->getMemberUpdateRequests());
        $this->session->set("pendingcounts", $pendingcounts);
        $this->session->set("updaterequestcounts", $updaterequestcounts);
        $states = $this->paymentsModel->getStates();
        $member_id = $this->session->get('Kaadaisoft_userId');
        
        if($this->session->get('role') == 2){
            $member_data = $this->paymentsModel->getCoordinatordata($member_id);
            $taluks =  $this->paymentsModel->getCoordinatorTaluks($member_id);
            return view('paymentpage', array("name"=>$name,"members"=>$memberslist,"counts"=>$totalpayers,"sno"=>$counts,"eventyears"=>$eventyears,"memberdata"=>$member_data, "taluks"=>$taluks));                                                
        }
        else{
            return view('paymentpage', array("name"=>$name,"members"=>$memberslist,"counts"=>$totalpayers,"sno"=>$counts,"eventyears"=>$eventyears,"states"=>$states));
        }
    }

    public function uploadBulkPayments()
    {
        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('payment-receipt-list');
        }

        $file = $this->request->getFile('csvfile');

        if (!$file->isValid()) {
            $this->session->setFlashdata('error', 'Please upload a valid file.');
            return redirect()->to('payments');
        }

        $ext = $file->getExtension();
        if (!in_array($ext, ['xlsx', 'xls', 'csv'])) {
             $this->session->setFlashdata('error', 'Invalid file type. Allowed: xlsx, xls, csv');
             return redirect()->to('payments');
        }

        if (!is_dir(FCPATH.'uploads/temp/')) {
            mkdir(FCPATH.'uploads/temp/', 0777, true);
        }

        $newName = $file->getRandomName();
        $file->move(FCPATH.'uploads/temp/', $newName);
        $filepath = FCPATH.'uploads/temp/' . $newName;

        // 1) Get event from modal (single event for all rows)
        $eventid = (int)$this->request->getPost('eventid');
        if (!$eventid) {
            $this->session->setFlashdata('error', 'Please select event.');
            @unlink($filepath);
            return redirect()->to('payments');
        }

        // 2) Load event details from eventlist
        $geteventdata = $this->paymentsModel->getEventdata($eventid);
        if (!$geteventdata) {
            $this->session->setFlashdata('error', 'Selected event not found.');
            @unlink($filepath);
            return redirect()->to('payments');
        }

        $eventname = $geteventdata->EventName;
        $taxamount = (int)$geteventdata->TaxAmount;
        $fromdate  = $geteventdata->From_date;
        $todate    = $geteventdata->To_date;
        $year      = $geteventdata->Year;

        $success = 0;
        $error   = 0;

        try {
            $spreadsheet = IOFactory::load($filepath);
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();
        } catch (Exception $e) {
            $this->session->setFlashdata('error', 'Error reading file: ' . $e->getMessage());
            @unlink($filepath);
            return redirect()->to('payments');
        }

        // Loop from index 1 (skip header at 0)
        for ($i = 1; $i < count($rows); $i++) {
            $data = $rows[$i];
            
            // Skip empty rows
            if (empty(array_filter($data))) continue;

            // Ensure we have enough columns (>= 5 based on original logic checking for amount which is at index 4)
             if (count($data) < 5) continue;

            $familymembershipid = trim($data[0] ?? '');
            $paymentdate        = trim($data[3] ?? date('Y-m-d'));
            $paidamount         = (int)($data[4] ?? 0);
            $membername         = trim($data[5] ?? '');
            $mobile             = trim($data[6] ?? '');
            $membertaluk        = trim($data[7] ?? '');
            $paymenttype        = trim($data[8] ?? 'cash');
            $transactionid      = trim($data[9] ?? '');
            $bankname           = trim($data[10] ?? '');

            if ($familymembershipid === '' || $paidamount <= 0) {
                $error++;
                continue;
            }

            // 4) Compute collected & balance based on eventlist.TaxAmount
            $already_collected = $this->paymentsModel->get_member_collected($eventid, $familymembershipid);
            $collectedamount   = $already_collected + $paidamount;
            $balanceamount     = max(0, $taxamount - $collectedamount);

            // 5) Save receipt
            $savereceipt = $this->paymentsModel->saveTaxreport(
                $eventid,
                $eventname,
                $fromdate,
                $todate,
                $taxamount,
                $year,
                $familymembershipid,
                $mobile,
                $membertaluk,
                $membername,
                $paymenttype,
                $paidamount,
                $bankname,
                $transactionid,
                '', '', '', '',          // banknameforcheckque, checkqueno, upi, cashtype
                $balanceamount,          // computed: TaxAmount - Collectedamount
                $paymentdate,
                'coordinator',
                'System/Bulk'
            );

            if ($savereceipt !== false) {
                $success++;
            } else {
                $error++;
            }
        }

        @unlink($filepath);

        $this->session->setFlashdata(
            'paymentsuccessstatus',
            "Bulk upload completed for {$eventname}. Success: {$success}, Errors: {$error}"
        );

        return redirect()->to('payments');
    }

    public function download_payment_sample() {
        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }
        
        $filename = "sample_bulk_payment_format.xlsx";
        $headers = ['Familymembershipid', 'EventName', 'EventId', 'paymentdate', 'paidamount', 'membername', 'mobile', 'membertaluk', 'paymenttype', 'transactionid', 'bankname'];
        
        $sample_data = [
            ['NMK00001', 'Sample Event 2025', '12', '2025-05-20', '500', 'John Doe', '9876543210', 'Erode', 'cash', '', ''],
            ['NMK00002', 'Sample Event 2025', '12', '2025-05-21', '1000', 'Jane Smith', '9123456789', 'Coimbatore', 'online', 'TXN123456', 'SBI']
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

    public function gopaymentpage(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        
        $memberid = $this->request->getGet('memberid');
        $eventid = $this->request->getGet('eventid');
        $memberdetails = $this->paymentsModel->getMemberforPayment($memberid);
        $eventyears = $this->paymentsModel->getEventsyear();

        $data = array("memberdetail"=>$memberdetails,"eventyears"=>$eventyears);
        
        if ($eventid) {
            $event_data = $this->paymentsModel->getEventdata($eventid);
            if ($event_data) {
                $data['preselected_eventid'] = $eventid;
                $data['preselected_year'] = $event_data->Year;
            }
        }

        if($memberdetails){
            return view("paymentform", $data);
        }
        else{
            return false;
        }
    }

    public function displayPayers(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('payment-receipt-list');
        }
        $counts = $this->request->getGet('count');
        $this->session->set('paymentpagecounts',$counts);
        if($this->request->isAJAX()){
            $memberslist = $this->paymentsModel->getMembersdetails($counts);
            $paymentpagelist = view('paymentpagelist',array("members"=>$memberslist,"sno"=>$counts));
            echo $paymentpagelist;
        }
    }

    public function changepaymentpagepagesetup(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('payment-receipt-list');
        }
        $initialindex = $this->request->getGet('initialindex');
        if($initialindex < 0){
           $initialindex = 0;
        } 
        $counts = $initialindex * 10;
        $this->session->set('paymentpagecounts',$counts);
        $totalpayers = $this->paymentsModel->getTotalmembers();
        if($counts > $totalpayers){
            $counts = 0;  
            $this->session->set('paymentpagecounts',$counts);   
        }
        $memberslist = $this->paymentsModel->getMembersdetails($counts);
        $eventyears = $this->paymentsModel->getEventsyear();
        $states = $this->paymentsModel->getStates();
        return view('paymentpage',array("members"=>$memberslist,"newcounts"=>$totalpayers,"initialindex"=>$initialindex,"eventyears"=>$eventyears,"states"=>$states,"sno"=>$counts));
    }

    public function sidemenu(){
        return view("sidemenu");
    }

    public function topmenu(){
        $pendingapplications = $this->adminDashboardModel->getPendingapplications();
        $pendingcounts = count($pendingapplications);
        $updaterequestcounts = count($this->adminDashboardModel->getMemberUpdateRequests());
        $this->session->set("pendingcounts", $pendingcounts);
        $this->session->set("updaterequestcounts", $updaterequestcounts);
        return view("topmenu");
    }

    public function pslogo(){
        return view("pslogo");
    }

    public function logout(){
        $this->session->destroy();
        return redirect()->to('Loginpage');
    }

    public function getDistricts(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()){
            $stateid = $this->request->getGet('stateid');
            $districts = $this->paymentsModel->getDistrictslist($stateid);
            echo json_encode($districts);
        }
    }

    public function getTaluks(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()){
            $districtname = $this->request->getGet('districtname');
            $taluks= $this->paymentsModel->getTaluklist($districtname);
            echo json_encode($taluks);
        }    
    }

    public function getPanchayats(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()){
            $talukname = $this->request->getGet('talukname');
            $panchayats = $this->paymentsModel->getPanchayatlist($talukname);
            echo json_encode($panchayats);
        }
    }

    public function getVillagesNew(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()){
            $panchayatname = $this->request->getGet('panchayatname');
            $villages = $this->paymentsModel->getVillagelistByNames($panchayatname);
            echo json_encode($villages);
        }
    }

    public function getVillages(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()){
            $localareaid = $this->request->getGet('localareaid');
            $localareas = $this->paymentsModel->getVillagelist($localareaid);
            echo "
            <label id='villages' class='container-fluid' for='district'>Choose Village: <br>
                    <select onchange='getEvents()' class='container-fluid border rounded' name='villageid' id='villageid' required>
                    <option value=''>Choose Village</option>";                     
            foreach ($localareas as $key => $value) {
            echo "<option value='$value[village_id]'>$value[village_name]</option>";
            }                  
                        
            echo "</select>
                  </label>";
            }   
    }

    public function getAllevents(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
            $year = $this->request->getGet("year");
            $events = $this->paymentsModel->getEventslist();
            echo "
            <label id='eventnamelabel' class='form-label'><i class='fas fa-calendar-check me-2 text-warning'></i>Event</label>
                      <select class='form-select' name='eventid' id='eventid' required>
                      <option value=''>Choose Event</option>";
            foreach ($events as $key => $value) {
            echo "<option value='$value[Id]'>$value[EventName] - $value[Year]</option>";
            }                                          
            echo "</select>";
    }

    public function getEventsbyyear(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
            $year = $this->request->getGet("year");
            $events = $this->paymentsModel->getEventswithyear($year);
            echo "
            <label id='eventnamelabel' class='form-label'><i class='fas fa-calendar-check me-2 text-warning'></i>Event</label>
                      <select class='form-select' name='eventid' id='eventid' required>
                      <option value=''>Choose Event</option>";
                      
            foreach ($events as $key => $value) {
            echo "<option value='$value[SNo]'>$value[EventName] - $value[year]</option>";
            }                                          
            echo "</select>";
    }

    public function getCities(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()){
            $districtid = $this->request->getGet('districtid');
            $cities = $this->paymentsModel->getCitieslist($districtid);
            echo "
            <label id='citieslist' class='form-label'><i class='fas fa-city me-2 text-primary'></i>Cities</label>
                      <select class='form-select' name='cities' id='cities' required>
                      <option value=''>Choose Cities</option>";
                      
            foreach ($cities as $key => $value) {
            echo "<option value='$value[id]'>$value[name]</option>";
            }                  
                        
            echo "</select>";
            }
    }

    public function getFilteredevents(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()){
            $year = $this->request->getGet('year');
            $eventsdetail = $this->paymentsModel->getEventsdetails($year);
            echo "
            <label id='eventnamelabel' class='form-label'><i class='fas fa-calendar-check me-2 text-warning'></i>Event</label>
            <select onchange='getTaxamount(this)' class='form-select' name='eventid' id='eventnames' required>
            <option value=''>Choose event</option>";
                      
            foreach ($eventsdetail as $key => $value) { 
            echo "<option value='$value[SNo]'>$value[EventName]</option>";
            }                  
                        
            echo "</select>";
        }
    }

    public function getEventslist(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()){
        $year = $this->request->getGet('year');
        $memberid = $this->request->getGet('memberid');
        $eventsdetail = $this->paymentsModel->getEventsdetails($year);
        $memberdetail = $this->paymentsModel->getMemberforPayment($memberid);
        echo "
         <label id='eventnamelabel' class='form-label fw-bold small text-muted w-100'>Event</label>
                       <select onchange='getTaxamount(this,`$memberdetail->Familymembershipid`)' class='form-select form-select-sm shadow-sm' name='eventid' id='eventid' required>
                       <option value=''>Choose event</option>";
                      
         foreach ($eventsdetail as $key => $value) {
            echo "<option value='$value[Id]'>$value[EventName]</option>";
         }                  
                        
        echo "</select>";
        }
    }

    public function searchMembers(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        } 
        $searchfields = $this->request->getGet('searchfields');
        if($this->request->isAJAX()){
            if($searchfields == ""){
                $counts = $this->session->get("paymentpagecounts");
                $members = $this->paymentsModel->getMembersdetails($counts);
                $data = view('searchforpayments',array("members"=>$members,"sno"=>1));
                echo $data;
            } 
            else{
            $members = $this->paymentsModel->getMembersSearchfields($searchfields);
            $counts = count($members);
            if($counts == 0){
                $data = view('searchforpayments',array("members"=>$members));
                echo $data;
            }
            else{
            $data = view('searchforpayments',array("members"=>$members,"sno"=>1));
            echo $data;
            }
            }
        }
    }

    public function getTaxamount(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        } 
        if($this->request->isAJAX()){
            $eventid = $this->request->getGet("eventid");
            $memberid = $this->request->getGet("memberid");
            $eventdata = $this->paymentsModel->getEventdata($eventid); // Returns Object
            $eventname = $eventdata->EventName;
            $taxamount = $eventdata->TaxAmount;
            $paydetails = $this->paymentsModel->getPaydetails($memberid,$eventid); // Returns Object or Array
            $paidamount = $paydetails->paidamount ?? 0;
            $balanceamount = $taxamount - $paidamount;

            if(!$paidamount){
                $paidamount = 0;
            }

            echo '<div class="card h-100 border-0 shadow-sm bg-light">
                      <div class="card-body">
                          <h5 class="card-title text-primary mb-3 border-bottom pb-2"><i class="fas fa-rupee-sign me-2"></i>Summary</h5>
                          
                          <div class="mb-3">
                              <label class="form-label fw-bold small text-muted">Total Amount</label>
                              <div class="input-group input-group-sm shadow-sm">
                                  <span class="input-group-text bg-white text-muted">₹</span>
                                  <input readonly value="'.$eventdata->TaxAmount.'" id="taxamount" name="eventamount" class="form-control bg-white">
                              </div>
                          </div>

                          <div class="mb-3">
                              <label class="form-label fw-bold small text-muted">Already Paid</label>
                              <div class="input-group input-group-sm shadow-sm">
                                  <span class="input-group-text bg-white text-success">₹</span>
                                  <input value="'.$paidamount.'" id="prevpaid" name="prevpaid" readonly class="form-control bg-white text-success fw-bold" type="text">
                              </div>
                          </div>
                          
                          <div class="mb-1">
                              <label class="form-label fw-bold small text-muted">Balance Amount</label>
                              <div class="input-group input-group-sm shadow-sm">
                                  <span class="input-group-text bg-white text-danger">₹</span>
                                  <input id="balance" value="'.$balanceamount.'" name="balanceamount" readonly class="form-control bg-white text-danger fw-bold" type="text">
                              </div>
                          </div>
                      </div>
                  </div>'; 

            
        }
    }

    public function saveTaxreceipt(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
          $path = $this->request->getPost("path");   
          $eventid = $this->request->getPost("eventid");   
          $memberid = $this->request->getPost("memberid");
          $membertaluk = $this->request->getPost("membertaluk");
          $membermobile = $this->request->getPost("membermobile"); 
          $name = $this->request->getPost("membername");
          $paidamount = $this->request->getPost("paidamount");
          $paymenttype = $this->request->getPost("paymenttype");
          $bankname = $this->request->getPost("bankname");
          $transactionid = $this->request->getPost("transactionid");
          $banknameforcheckque = $this->request->getPost("banknameforcheckque");
          $other_bank_name = $this->request->getPost("other_bank_name");
          $checkqueno = $this->request->getPost("checkqueno");
          $upitranscationid = $this->request->getPost("upitransactionid");
          $cashtype = $this->request->getPost("cashtype");
          $balanceamount = $this->request->getPost("balanceamount");
          $paymentdate = $this->request->getPost("paymentdate");
          $wheretopay = $this->request->getPost("where");
          $receivedby = $this->request->getPost("receivedby");

          // Check if already paid
          $paydetails = $this->paymentsModel->getPaydetails($memberid, $eventid);
          $current_paid = $paydetails->paidamount ?? 0;
          $eventdata = $this->paymentsModel->getEventdata($eventid);
          $tax_amount = $eventdata->TaxAmount;

          if (($tax_amount - $current_paid) <= 0) {
             $this->session->setFlashdata('error', 'You have already fully paid for this event.');
             return redirect()->back()->withInput();
          }

          if ($paidamount <= 0) {
             $this->session->setFlashdata('error', 'Paid amount must be greater than zero.');
             return redirect()->back()->withInput();
          }

          $geteventdata = $this->paymentsModel->getEventdata($eventid);
          $eventname = $geteventdata->EventName;
          $fromdate = $geteventdata->From_date;
          $todate = $geteventdata->To_date;
          $taxamount = $geteventdata->TaxAmount;
          $year = $geteventdata->Year;

          $savereceipt = $this->paymentsModel->saveTaxreport($eventid,$eventname,$fromdate,$todate,$taxamount,$year,$memberid,$membermobile,$membertaluk,$name,$paymenttype,$paidamount,$bankname,$transactionid,$banknameforcheckque,$checkqueno,$upitranscationid,$cashtype,$balanceamount,$paymentdate,$wheretopay,$receivedby, $other_bank_name);

          if($path == "paymentform"){
            $userdata = array("userreceiptid"=>$memberid,"userdue"=>$savereceipt,"usereventid"=>$eventid);
            $this->session->set("userreceiptid",$memberid);
            $this->session->set("userdue",$savereceipt);
            $this->session->set("usereventid",$eventid);
            $this->session->set("paymentsuccessstatus","Receipt added successfully");
            return redirect()->to("paymentreceiptpdf"); // Route? "Payments/paymentReceiptpdf"?
            // Original `redirect("paymentreceiptpdf")`.
            // Check Routes later. Assuming routed.
          }
          else{
            $this->session->set("paymentsuccessstatus","Receipt added successfully");
            $this->session->set("userreceiptid",$memberid);
            $this->session->set("userdue",$savereceipt);
            $this->session->set("usereventid",$eventid);
            return redirect()->to("filteredusers");
          }
    }          
    
   
    public function searchEvents(){  
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        } 
        if($this->request->isAJAX()){
            $event = $this->request->getGet("event");
            if($event == ""){
                echo "No Events available";
            }
            else{
            $eventresult = $this->paymentsModel->searchEventforpayment($event);
            if($eventresult){
                foreach ($eventresult as $key => $event) {
                    echo "
                     <span onclick='assignEvent(`".$event['Id']."`,`".$event['EventName']."`)' class='mt-1 searchevent'><img src='$event[Image]' style='width:30px;height:30px;' alt='$event[EventName]'> - $event[EventName] - $event[Year]</span>";
                 }
            }
            else{
                echo "<span>No Events Found</span>";
            }
        }
        }
    }    

    public function paymentReceiptpdf(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        } 
        $userid = $this->request->getGet("memberid") ?? $this->session->get("userreceiptid");
        $dues = $this->request->getGet("dues") ?? $this->session->get("userdue");
        $eventid = $this->request->getGet("eventid") ?? $this->session->get("usereventid");
        $receipt = $this->paymentsModel->getReceiptdetail($userid,$dues,$eventid);
        
        if ($this->request->getGet('ajax') == 1) {
            return view("receipt_fragment", array("receipt" => $receipt));
        }
        
        return view("paymentreceiptpdf", array("receipt" => $receipt));       
    }  

    public function paymentReceiptlist(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }

        $memberid = ""; 
        if($this->session->get('role') == 3){
            $memberid = $this->session->get('Kaadaisoft_userId');
        }
        else{
            $memberid = $this->request->getGet("memberid");
        } 
        $receipts = $this->paymentsModel->getReceiptlist($memberid);
        $member = $this->paymentsModel->getMember($memberid);
        return view("paymentreceiptlist",array("receipts"=>$receipts,"member"=>$member));
    }

    public function downloadPdf() {
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        } 
        $userid = $this->request->getGet("memberid");
        $dues = $this->request->getGet("dues");
        $eventid = $this->request->getGet("eventid");
        $receipt = $this->paymentsModel->getReceiptdetail($userid,$dues,$eventid);
        $html = view("downloadreceipt",array("receipt"=>$receipt));
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("receipt_" . ($receipt->id ?? 'data') . ".pdf", array("Attachment" => 1)); 
    }

}
?>
