<?php 
namespace App\Controllers;

use App\Models\ReportsModel;
use App\Models\AdminDashboardModel;
use App\Models\PaymentsModel;

class Reports extends BaseController{

    protected $reportsModel;
    protected $adminDashboardModel;
    protected $paymentsModel;
    protected $session;
    protected $db;

    public function __construct(){
        $this->reportsModel = new ReportsModel();
        $this->adminDashboardModel = new AdminDashboardModel();
        $this->paymentsModel = new PaymentsModel(); // Used in getAllevents
        $this->session = session();
        $this->db = \Config\Database::connect();
    } 

    public function index(){
       if(!$this->session->has('Kaadaisoft_userId')){
        return redirect()->to('/');
       } 
       if($this->session->get('role') != 1){
           return redirect()->to('admindashboard');
       }
       else{
         $counts = 0;
         $name = $this->session->get('name');
         $this->session->set('reportscounts',$counts);
         $totalReports = $this->reportsModel->getTotalreports();
         $this->session->set('newreportcounts',$totalReports);
         $pendingapplications = $this->adminDashboardModel->getPendingapplications();
         $pendingcounts = count($pendingapplications);
         $this->session->set("pendingcounts",$pendingcounts);
         $reports = $this->reportsModel->getreports();
         $eventyears = $this->reportsModel->getEventyears();
         return view('reports',array("name"=>$name,"reports"=>$reports,"counts"=>$totalReports,"sno"=>$counts, "eventyears"=>$eventyears, 'year' => '', 'eventname' => ''));
        }
    }

    public function displayReports(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        $counts = $this->request->getGet('count');
        $this->session->set('reportscounts',$counts);
        if($this->request->isAJAX()) {
            $reports = $this->reportsModel->getReportswithlimit($counts);
            $data = view('reportslist',array("reports"=>$reports,"sno"=>$counts));
            echo $data;
        }
    }

    public function searchReports(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        } 
        $searchfields = $this->request->getGet('searchfields');
        if($this->request->isAJAX()){
            if ($searchfields == "") {
                $counts = $this->session->get('reportscounts');
                $reports = $this->reportsModel->getreports($counts);
                $data = view('reportslist',array("reports"=>$reports,"sno"=>$counts));
                echo $data;
            } 
            else{
            $reports = $this->reportsModel->getReportsSearchfields($searchfields);
            $counts = count($reports);
            if($counts == 0){
                $data = view('reportslist',array("reports"=>"No search results"));
                echo $data;
            }
            else{
            $data = view('reportslist',array("reports"=>$reports,"sno"=>0));
            echo $data;
            }
            }
        }
    }

    public function searchPaidandUnpaid(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        } 
    
        $searchfields = $this->request->getGet('searchfields');
        $eventname = $this->request->getGet('eventname');
        $status = $this->request->getGet('status');
        if($this->request->isAJAX()){
            if ($searchfields == "") {
                $counts = 0;
                $reports = $this->reportsModel->getFilFteredeventreports($eventname,$status,$counts); // Use the method name consistent with model
                $j = 1;
                foreach ($reports as $key => $value) {
                    $userid = $value['Userid'] ?? $value['Familymembershipid'];
                       echo "
                      <tr>
                           <td>$j</td>
                           <td class='fw-bold text-primary'>$userid</td>
                           <td>$value[Name]</td>
                           <td>$value[Role]</td>
                           <td>$value[Mobile]</td>
                           <td>".($value['Event_amount'] ?? $value['TaxAmount'] ?? '')."</td>
                           <td>$value[paidamount]</td>
                           <td>$value[balanceamount]</td>
                           <td>$value[paymentdate]</td>
                          
                       </tr>";
                       $j++;
                   } 
            } 
            else{
            $reports = $this->reportsModel->getFilteredReportsSearchfields($searchfields,$eventname,$status);
            $counts = count($reports);
              if($counts == 0){
                $data = view('reportAjaxlist',array("reports"=>"No search results"));
                echo $data;
              }
              else{
                $j = 1;
                foreach ($reports as $key => $value) {
                    $userid = $value['Userid'] ?? $value['Familymembershipid'];
                       echo "
                       <tr>
                           <td>$j</td>
                           <td class='fw-bold text-primary'>$userid</td>
                           <td>$value[Name]</td>
                           <td>$value[Role]</td>
                           <td>$value[Mobile]</td>
                           <td>".($value['Event_amount'] ?? $value['TaxAmount'] ?? '')."</td>
                           <td>$value[paidamount]</td>
                           <td>$value[balanceamount]</td>
                           <td>$value[paymentdate]</td>
                           
                       </tr>";
                       $j++;
                   } 
            }
            }
            
        }
       
    }

    public function changeReportspagesetup(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
        $initialindex = $this->request->getGet('initialindex');
        if($initialindex < 0){
           $initialindex = 0;
           echo "<script>
              window.alert('No pages are available to show.')
                </script>";
        } 
        $counts = $initialindex * 8;
        $this->session->set('reportscounts',$counts);
        $totalreports = $this->reportsModel->getTotalreports();
        $eventyears = $this->reportsModel->getEventyears();
        if($counts > $totalreports){
            echo "<script>
              window.alert('No pages are available to show.')
                 </script>";
            $counts = 0; 
        }                                                                                                                                                                                                                                                        
        $reports = $this->reportsModel->getreports($counts);
        $totalReportcounts = $this->session->get("newreportcounts") ?? '';
    
        return view('reports',array("reports"=>$reports,"newcounts"=>$totalreports,"initialindex"=>$initialindex,"sno"=>$counts, "newreportcounts"=>$totalReportcounts,"eventyears"=>$eventyears));
    }

    public function changeFilteredreportspagesetup(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
        $initialindex = $this->request->getGet('initialindex');
        if($initialindex < 0){
           $initialindex = 0;
           echo "<script>
              window.alert('No pages are available to show.')
                </script>";
        } 
        $counts = $initialindex * 8;
        $this->session->set('filterreportscounts',$counts);
        $eventname = $this->session->get("eventname");
        $status = $this->session->get("status");
        $totalreports = $this->reportsModel->getEventreportcount($eventname,$status);
        if($counts > $totalreports){
            echo "<script>
              window.alert('No pages are available to show.')
                 </script>";
            $counts = 0; 
        }                                                                                                                                                                                                                                                        
        // Call the typo-named function in model or fixed name
        $reports = $this->reportsModel->getFilFteredeventreports($eventname,$status,$counts);
        
        $eventname = $this->session->get("eventname");
        $status = $this->session->get("status");
        $year = $this->session->get("year");
        $events = $this->reportsModel->getEventslistbyYear($year);
        $eventyears = $this->reportsModel->getEventyears();
        $totalReportcounts = $this->session->get("filteredcounts") ?? '';

        return view('reportFilterlist',array("reports"=>$reports,"newcounts"=>$totalreports,"initialindex"=>$initialindex,"sno"=>$counts, "eventyears"=>$eventyears,"year"=>$year,"events"=>$events,"eventname"=>$eventname,"status"=>$status,"filteredcounts" => $totalReportcounts ));
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

    public function topsubmenu(){
        return view("topsubmenu");
    }

    public function logout(){
        $this->session->destroy();
        return redirect()->to('Loginpage');
    }

    public function getreports(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
    
        if($this->request->isAJAX()){
           $id = $this->request->getGet("id");
           $reports = $this->reportsModel->getReportdata($id);
           $updatereportspage = view("updatreports",array("reports"=>$reports));
           echo $updatereportspage;
        }
    }

    public function getAllevents(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
            $events = $this->paymentsModel->getEventslist(); // Using PaymentsModel here as per original
            echo "
            <label id='eventslist' class='form-label' for='eventid'><i class='fas fa-calendar-check me-2 text-warning'></i>Choose Events</label>
                      <select class='form-select' name='eventid' id='eventid' required>
                      <option value=''>Choose Events</option>";
                      
            foreach ($events as $key => $value) {
            echo "<option value='$value[SNo]'>$value[EventName] - $value[year]</option>";
            }                  
                        
            echo "</select>";
            
    }

    public function getEventsbyYear(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
    
        if($this->request->isAJAX()){
            $year =  $this->request->getGet('year');
            $data = $this->reportsModel->getEventslistbyYear($year);
            echo "<label id='eventnamelabel' class='form-label' for='eventname'><i class='fas fa-calendar-check me-2 text-warning'></i>Choose Events</label>
               <select onchange='' class='form-select' name='eventid' id='eventname'>
               <option value=''>Choose Event</option>";
               foreach ($data as $key => $value){
                 
                echo"<option value='$value[Id]'>$value[EventName]</option>";
               }
            echo "
               </select>";
    }
    }

    public function getSearchevents(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        $searchdata = $this->request->getGet("event");
        if($this->request->isAJAX()){
           $events = $this->reportsModel->getSearcheventslist($searchdata);
            echo "<ul class='list-unstyled m-0 p-0'>";       
           foreach ($events as $key => $value) {
             echo "<li><a class='dropdown-item cursor-pointer py-2' style='cursor: pointer;' onclick='setEventname(`".$value['Year']."`,`".$value['EventName']."`,`".($value['Id'] ?? $value['SNo'])."`)'>".$value['EventName']." <span class='text-muted small'>(".$value['Year'].")</span></a></li>";
           }
           echo "</ul>"; 
        }
    }

    public function getSearchFilterevents(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        $searchdata = $this->request->getGet("event");
        if($this->request->isAJAX()){
           $events = $this->reportsModel->getSearchFilteredeventslist($searchdata);
            echo "<ul class='list-unstyled m-0 p-0'>";       
           foreach ($events as $key => $value) {
             echo "<li><a class='dropdown-item cursor-pointer py-2' style='cursor: pointer;' onclick='setEventname(`".$value['year']."`,`".$value['EventName']."`,`".($value['Id'] ?? $value['SNo'])."`)'>".$value['EventName']." <span class='text-muted small'>(".$value['year'].")</span></a></li>";
           }
           echo "</ul>"; 
        }
    }

    public function getFilteredusers(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        $counts = 0;    
        $eventid = $this->request->getGet('eventid');
        $status = $this->request->getGet('status');
        $reports = $this->reportsModel->getMembersHistory($eventid,$status);
        $totalReports = count($reports); // This only counts page result (8)? No, getMembersHistory lines 146 returns limited result.
        // But original code called `count($reports)`. If reports is just one page, count is max 8.
        // So `totalReports` here is page size.
        // Session `filterreportscounts` set to 0.
        $this->session->set("filterreportscounts",$counts);
        $data = view('reportFilterlist',array("reports"=>$reports,"sno"=>$counts,"status"=>$status,"counts"=>$totalReports));
        echo $data;
    }

    public function reportFilterlist(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
        $year = $this->request->getGet('eventyear');    
        $eventid = $this->request->getGet('eventid');
        $status = $this->request->getGet('paymentstatus');
        if($year == "" || $eventid == "" || $status == ""){
            $this->session->set("validationmessage","All fields are required");
            return redirect()->to("reports");
        }
        $reports = $this->reportsModel->getMembersHistory($eventid,$status);
        $totalReports = $this->reportsModel->getTotalmembershistory($eventid,$status); // This returns array?
        // Model::getTotalmembershistory returns array (result_array).
        // Original line 333: $totalReports = ...
        // Line 337: $counts = count($reports). (Page size?)
        // Line 343 passes $counts to view as 'counts' and 'filteredcounts'.
        // Wait, $totalReports (line 333) var is unused?
        // Ah, `filteredcounts` session uses `$counts` (line 339).
        // But `$counts` is derived from `$reports` (current page).
        // This seems wrong in original code if it meant total DB count.
        // But I will follow original code logic as much as possible unless it's clearly a bug I can fix safely.
        // Actually, if `getMembersHistory` returns 8 items, `$counts` is 8.
        // The pagination usually needs Total items.
        // `totalReports` variable is assigned but unused in original block lines 333-342.
        // Wait, line 342: `filteredcounts => $counts`.
        // If I want to fix pagination, I should use `count($totalReports)` (if totalReports returns all rows).
        // My `getTotalmembershistory` returns array of all rows (no limit).
        // So `count($totalReports)` is the total count.
        // I will use that for `filteredcounts`.
        
        $totalRows = count($totalReports);
        
        $events = $this->reportsModel->getEventslistbyYear($year);
        $eventyears = $this->reportsModel->getEventyears();
        
        $counts = count($reports); // Items on current page (up to 8)
        
        $this->session->set("eventname",$eventid);
        $this->session->set("filteredcounts",$totalRows);
        $this->session->set("status",$status);
        $this->session->set("year",$year);
        return view('reportFilterlist',array("reports"=>$reports,"eventyears"=>$eventyears,"year"=>$year,"events"=>$events,"eventid"=>$eventid,"sno"=>0,"status"=>$status,"counts"=>$counts,"filteredcounts"=>$totalRows));
    }

    public function displayFilteredeventsreports(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        $counts = $this->request->getGet('count');
        $this->session->set('reportscounts',$counts);
        $eventname = $this->session->get("eventname");
        $status = $this->session->get("status");
        if($this->request->isAJAX()){
            $reports = $this->reportsModel->getFilFteredeventreports($eventname,$status,$counts);
            $data = view('reportAjaxlist',array("reports"=>$reports,"sno"=>$counts));
            echo $data;
        }
    }

    public function getMemberDetails($id) {
        $member = $this->reportsModel->getMemberById($id);
        echo json_encode($member); 
    }

    public function coordinators() {
        $data['members'] = $this->reportsModel->getAllMembers();
        return view('coordinators', $data);
    }
}
?>