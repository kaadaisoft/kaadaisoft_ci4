<?php 
namespace App\Controllers;

use App\Models\EventsModel;
use App\Models\AdminDashboardModel;
use CodeIgniter\Controller;

class Events extends BaseController {

    protected $eventsModel;
    protected $adminDashboardModel;
    protected $session;
    protected $db;

    public function __construct(){
        $this->eventsModel = new EventsModel();
        $this->adminDashboardModel = new AdminDashboardModel();
        $this->session = session();
        $this->db = \Config\Database::connect();
        
        // Helpers loaded in BaseController usually, but can load specific ones here
        helper(['url', 'form']);
    } 

    public function index(){
        if(!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }
        
        else{
            $counts = $this->session->get('altereventscounts') ?? 0;
            // $name = $this->session->get('name'); // Unused in view call? Original passed 'events' and 'counts' and 'sno'
            $this->session->set('eventscounts', $counts);
            
            $totalEvents = $this->eventsModel->getTotalevents();
            $events = $this->eventsModel->getEvents(); // Original called getEvents() (all). 
            // Wait, original line 24 called getEvents().
            // And passed to view.
            // But controller has pagination logic?
            // If I look at changeEventspagesetup, it uses getevents($counts).
            // Here in index, maybe it intends to show ALL initially or first page?
            // Original code: $events = $this->EventsModel->getEvents();
            // This returns ALL.
            // But view accepts $events.
            // If I change to getEvents($counts), it returns page.
            // Let's stick to original behavior: getEvents() (all) unless logic dictates otherwise.
            // Actually, if pagination is used, fetching ALL is inefficient but that was the code.
            // Wait, if view uses pagination, it needs paginated data.
            // If original called getEvents(), it got all.
            // Let's call getAllEvents() (or getEvents(null)) to obtain all, to match original line 24.
            
            $events = $this->eventsModel->getAllEvents();

            $pendingapplications = $this->adminDashboardModel->getPendingapplications();
            $pendingcounts = count($pendingapplications);
            $this->session->set("pendingcounts", $pendingcounts);
            
            $this->session->remove("altereventscounts");
            $this->session->remove("altereventsinitialindex");
            
            return view('events', ["events" => $events, "counts" => $totalEvents, "sno" => $counts]);
        }
    }

    public function displayEvents(){
        $counts = $this->request->getGet('count');
        $this->session->set('eventscounts', $counts);
        
        if($this->request->isAJAX()){
            $events = $this->eventsModel->getEvents($counts); // Paginated
            return view('eventslist', ["events" => $events, "sno" => $counts]);
        }
    }

    public function searchevents(){
        $searchfields = $this->request->getGet('searchfields');
        if ($searchfields == "") {
            $counts = $this->session->get('eventscounts') ?? 0;
            $events = $this->eventsModel->getEvents($counts);
            return view('eventslist', ["events" => $events, "sno" => $counts]);
        } 
        else {
            $events = $this->eventsModel->getEventsSearchfields($searchfields);
            if(count($events) == 0){
                return view('eventslist', ["events" => "No search results"]);
            }
            else{
                return view('eventslist', ["events" => $events, "sno" => 0]);
            }
        }
    }

    public function changeEventspagesetup(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('Kaadaisoft'); // Or '/'? Original said Kaadaisoft (which usually redirects to login)
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
        $initialindex = $this->request->getGet('initialindex');
        if($initialindex < 0){
           $initialindex = 0;
        } 
        $counts = $initialindex * 3;
        $this->session->set('eventscounts', $counts);
        $totalevents = $this->eventsModel->getTotalEvents();
        
        if($counts > $totalevents){
            $counts = 0; 
            $this->session->set('eventscounts', $counts);
        }
        
        $events = $this->eventsModel->getEvents($counts);
        return view('events', ["events" => $events, "newcounts" => $totalevents, "initialindex" => $initialindex, "sno" => $counts]);
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

    public function addevent(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
        
        $eventimage = $this->request->getFile('eventimage');
        
        if ($eventimage->isValid() && !$eventimage->hasMoved()) {
            $newName = $eventimage->getRandomName(); // Or use original logic: time().str_replace...
            // Original: $imagename = time()."".str_replace(' ','-',$eventimage['name']);
            $originalName = $eventimage->getName();
            $imagename = time() . "" . str_replace(' ', '-', $originalName);
            
            $validTypes = ['jpg', 'jpeg', 'png', 'gif'];
            $ext = $eventimage->getExtension();
            
            // CI4 validation is better done via $this->validate()
            // But implementing logic manually to match original structure
            
            if (in_array($ext, $validTypes)) {
               $eventimage->move('assets/kaadaieventuploads/', $imagename);
               
               $eventname = $this->request->getPost("eventname");
               $fromdate = $this->request->getPost("event_date_from");
               $todate = $this->request->getPost("event_date_to");
               $year = substr($todate, 0, 4);
               $taxamount = $this->request->getPost("eventtaxamount");
               $filename = "assets/kaadaieventuploads/" . $imagename;
               
               $addevent = $this->eventsModel->addEvent($eventname, $fromdate, $todate, $year, $taxamount, $filename);
               
               $totalEvents = $this->eventsModel->getTotalevents();
               $remainder = $totalEvents % 3;
               // ... logic for index calculation ...
               $index = ceil($totalEvents / 3) - 1;
               $getinitialindex = $index - 1;
               $initialindex = floor($getinitialindex / 5) * 5;
               
               $counts = ($remainder == 0) ? ($totalEvents - 3) : ($totalEvents - $remainder);
               
               $this->session->set("altereventscounts", $counts);
               $this->session->set("altereventsindex", $index);
               if($initialindex >= 5) $this->session->set("altereventsinitialindex", $initialindex);
               
               if($addevent) {
                   $this->session->set("eventsuccessstatus", "Event added successfully");
               } else {
                   $this->session->set("eventserrorstatus", "Something went wrong");
               }
               return redirect()->to("events");

            } else {
                 $this->session->set("eventerrorstatus", "Only gif | jpg | png image type is allowed.");
                 // return redirect()->to("events");
                 // Original echoed errors and redirect? 
                 // It set session and redirect
                 return redirect()->to("events");
            }
        } else {
             $error = $eventimage->getErrorString();
             $this->session->set("eventerrorstatus", $error);
             return redirect()->to("events");
        }
    }

    public function getevent(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }

        if($this->request->isAJAX()){
           $id = $this->request->getGet("id");
           $event = $this->eventsModel->getEventdata($id);
           echo view("updateevent", ["event" => $event]);
        }
    }

    public function updateevent(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
        
        if($this->request->getPost('eventupdatesubmit')){
            // test_input function? Just use trim etc inline or helper
            // function test_input($data) { ... } inside method is valid PHP but ugly.
            
            $eventid = $this->request->getPost("eventId");  
            $eventupdatename = trim(stripslashes(htmlspecialchars($this->request->getPost("eventupdatename"))));
            $fromdate = trim(stripslashes(htmlspecialchars($this->request->getPost("event_update_date_from"))));
            $todate = $this->request->getPost("event_update_date_to");
            $taxamount = $this->request->getPost("eventupdatetaxamount");
            $updated_at = date('Y-m-d H:i:s');
            
            $eventupdate = $this->eventsModel->updateEvent($eventid, $eventupdatename, $fromdate, $todate, $taxamount, $updated_at);
            
            if($eventupdate){
                $this->session->set("eventsuccessstatus", "Event updated successfully");
            } else {
                $this->session->set("eventserrorstatus", "Something went wrong");
            }
            return redirect()->to("events");
        }
    }

    public function showupdateeventbanner(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('Kaadaisoft');
        }  
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
        if($this->request->isAJAX()){
            $id = $this->request->getGet("id");
            $eventname = $this->request->getGet("eventname");
            echo view("updateevent", ["id" => $id, "eventname" => $eventname]);
        }
    }

    public function updateeventbanner(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('Kaadaisoft');
        }  
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
        if($this->request->getPost("eventupdatebannersubmit")){
            
            $eventimage = $this->request->getFile('eventupdatebanner');
            
            if ($eventimage->isValid() && !$eventimage->hasMoved()) {
                $originalName = $eventimage->getName();
                $imagename = time() . "" . str_replace(' ', '-', $originalName);
                
                $validTypes = ['jpg', 'jpeg', 'png', 'gif'];
                $ext = $eventimage->getExtension();
                
                 if (in_array($ext, $validTypes)) {
                    $eventimage->move('assets/kaadaieventuploads/', $imagename);
                    
                    $id = $this->request->getPost("id");
                    $filename = "assets/kaadaieventuploads/" . $imagename;
                    $updatebanner = $this->eventsModel->updateBanner($id, $filename);
                    
                    if($updatebanner){
                        $this->session->set("eventsuccessstatus", "Event banner updated successfully");
                    } else {
                        $this->session->set("eventserrorstatus", "Something went wrong");
                    }
                } else {
                    $this->session->set("eventerrorstatus", "Only gif | jpg | png image type is allowed.");
                }
            } else {
                $this->session->set("eventerrorstatus", $eventimage->getErrorString());
            }
            return redirect()->to("events");
        }
    }

    public function movetotrash($id = null){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }  
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
        if ($id === null) {
            // show_error('Invalid request: missing event ID', 400);
            return redirect()->to('events')->with('eventserrorstatus', 'Invalid request');
        }
        $this->eventsModel->eventmovetotrash($id);
        return redirect()->to('events');
    }
}
?>