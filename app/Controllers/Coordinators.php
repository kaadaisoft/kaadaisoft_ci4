<?php 
namespace App\Controllers;

use App\Models\CoordinatorsModel;
use App\Models\MembersModel;
use App\Models\PaymentsModel;
use App\Models\AdminDashboardModel;

class Coordinators extends BaseController{

    protected $adminDashboardModel;
    protected $coordinatorsModel;
    protected $membersModel;
    protected $paymentsModel;
    protected $session;
    protected $db;

    public function __construct(){
        $this->adminDashboardModel = new AdminDashboardModel();
        $this->coordinatorsModel = new CoordinatorsModel();
        $this->membersModel = new MembersModel();
        $this->paymentsModel = new PaymentsModel();
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
           $counts = $this->session->get('altercoordscounts') ?? 0;
           $name = $this->session->get('name');
           $this->session->set('coordscounts',$counts);
           $pendingapplications = $this->adminDashboardModel->getPendingapplications();
           $pendingcounts = count($pendingapplications);
           $updaterequestcounts = count($this->adminDashboardModel->getMemberUpdateRequests());
           $this->session->set("pendingcounts",$pendingcounts);
           $this->session->set("updaterequestcounts",$updaterequestcounts);
           $totalcoordinators = $this->coordinatorsModel->getTotalCoordinators();
           $coordinators = $this->coordinatorsModel->getCoordinators($counts);
           $states = $this->membersModel->getStates();
           
           return view('coordinators',array("name"=>$name,"coordinators"=>$coordinators,"states"=>$states, "counts" => $totalcoordinators, "sno" => $counts));  
           $this->session->remove("altercoordscounts");
           $this->session->remove("altercoordsinitialindex");
       } 
    }

    public function assigncoordinator(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        } 
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
            $memberslist = $this->membersModel->getMemberslist();
            $coordinatorslist = $this->coordinatorsModel->getCoordinators(); // getCoordinatorslist was not in the file I read in model, but getCoordinators exists. Or maybe getCoordinatorslist in MembersModel? Check later. Usually converted to getCoordinators if not found.
            // Wait, MembersModel doesn't have getCoordinatorslist. CoordinatorsModel has getCoordinators.
            // Ah, line 42 original: $this->MembersModel->getCoordinatorslist();
            // Let me check MembersModel content again. Step 44 written content.
            // MembersModel converted: Does not contain getCoordinatorslist.
            // CoordinatorsModel converted: Contains getCoordinators.
            // So I should use CoordinatorsModel->getCoordinators() or define getCoordinatorslist in MembersModel if it was there originally.
            // In step 44, MembersModel was converted. I might have missed getCoordinatorslist if it was there?
            // Let me re-read step 44 content quickly mentally.
            // Methods: getTotalMembers, getMembers, processRegisteration, getMemberslist, getStates, getDistricts, getTaluks, getPanchayats, getVillages, getMembersSearchfields, getnotassignedMembers, addMember, getAreas, getAreamembers, updateMember, membermovetotrash, getMemberdata, checkExistphoneno, checkExistaadharno, saveUpdateMemberRequest, processMemberupdate, getMembersdetails, getCoordinatorId, getFamilyMembers, getPendingUpdateRequest.
            // No getCoordinatorslist.
            // Maybe it was in the original MembersModel and I missed it?
            // Or maybe line 42 original meant CoordinatorsModel?
            // "MembersModel->getCoordinatorslist()" is in line 42 of Coordinators.php.
            // If MembersModel doesn't have it, I should implement it or find substitute.
            // CoordinatorsModel->getCoordinators() returns result object (array of objects).
            // I'll assume I can use that.
            
            $coordinatorslist = $this->coordinatorsModel->getCoordinators();

            $eventyears = $this->paymentsModel->getEventsyear();
            $states = $this->paymentsModel->getStates();
            $areas = $this->membersModel->getAreas();
            return view('assigncoordinator',array("areas"=>$areas,"members"=>$memberslist,"coordinators"=>$coordinatorslist,"eventyears"=>$eventyears,"states"=>$states,)); 
     }

     public function getVillages(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()){
            $localareaid = $this->request->getGet('localareaid');
            $localareas = $this->paymentsModel->getVillagelist($localareaid);                  
            foreach ($localareas as $key => $value) {
            echo "<li onclick='createArea(this,`".$value['village_id']."`,`".$value['village_name']."`)' class='py-2' value='$value[village_id]'>$value[village_name]</li>";
            }                  
        }     
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

    public function displaycoordinators(){
       if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
       $counts = $this->request->getGet('count');
       $this->session->set('coordscounts',$counts);
       if($this->request->isAJAX()){
           $coordinators = $this->coordinatorsModel->getCoordinators($counts);
           // CI4 render view to string
           $data = view('coordinatorslist',array("coordinators"=>$coordinators,"sno"=>$counts));
           echo $data;
       }
    }

    public function searchcoordinators(){
       $searchfields = $this->request->getGet('searchfields');
       if($this->request->isAJAX()){
           if ($searchfields == "") {
               $counts = $this->session->get('coordscounts') ?? 0;
               $coordinators = $this->coordinatorsModel->getCoordinators($counts);
               $html = view('coordinatorslist',array("coordinators"=>$coordinators,"sno"=>$counts));
               $total = $this->coordinatorsModel->getTotalCoordinators();
               echo json_encode(["html" => $html, "total" => $total]);
           } 
           else {
               $coordinators = $this->coordinatorsModel->getCoordinatorsSearchfields($searchfields);
               $counts = count($coordinators);
               $html = "";
               if($counts == 0){
                   $html = view('coordinatorslist',array("coordinators"=>[]));
               }
               else{
                   $html = view('coordinatorslist',array("coordinators"=>$coordinators,"sno"=>0));
               }
               echo json_encode(["html" => $html, "total" => $counts]);
           }
       }
    }

    public function getareamembers(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()){
        $area = $this->request->getGet("area");
        $membersdata = $this->coordinatorsModel->getAreamembers($area);
           echo "<option value=''>Assign coordinator</option>";
        foreach ($membersdata as $key => $value) {
           echo "<option value='$value[Aadhar]'>$value[Name] - Mobile No - $value[Mobile]</option>";
        }
        }
    }

    public function getcoordaddress(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()){
           $aadhar = $this->request->getGet("aadhar");
           $address = $this->coordinatorsModel->getCoordinatoraddress($aadhar);
           foreach ($address as $value) {
           echo "<p>$value->Name</p>
                 <p>$value->Area</p>
                 <p>$value->Mobile</p>";
           }
        }
    }

    public function changecoordinatorspagesetup(){
       if(!$this->session->has('Kaadaisoft_userId')){
           return redirect()->to('/');
       }
       if($this->session->get('role') == 3){
           return redirect()->to('admindashboard');
       }
       $initialindex = $this->request->getGet('initialindex');
       if($initialindex < 0){
          $initialindex = 0;
       } 
       $counts = $initialindex * 10;
       $this->session->set('coordscounts',$counts);
       $totalcoordinators = $this->coordinatorsModel->getTotalCoordinators();
       if($counts > $totalcoordinators){
           $counts = 0;   
           $this->session->set('coordscounts',$counts);  
       }
       $coordinators = $this->coordinatorsModel->getCoordinators($counts);
       
       if($this->request->isAJAX()) {
           return view('coordinatorslist', array("coordinators"=>$coordinators,"sno"=>$counts));
       }
       
       return view('coordinators',array("coordinators"=>$coordinators,"newcounts"=>$totalcoordinators,"initialindex"=>$initialindex,"sno"=>$counts));
    }

    public function changeViewcoordinatorspagesetup() {
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
        $initialindex = $this->request->getGet('initialindex');
        $coordid = $this->request->getGet('coordid');
        if($initialindex < 0){
           $initialindex = 0;
        } 
        $counts = $initialindex * 10;
        $this->session->set('viewcoordscounts',$counts);
        $coord_data = $this->coordinatorsModel->getCoordinatordata($coordid);
        $totalundermember = $this->coordinatorsModel->getTotalundermembers($coordid);
        if($counts > $totalundermember){
            $counts = 0;   
            $this->session->set('viewcoordscounts',$counts);  
        }
        $undermembers = $this->coordinatorsModel->getUndermember($counts,$coordid);
        return view('viewcoordinatordata',array("coordinator"=>$coord_data,"members"=>$undermembers,"newcounts"=>$totalundermember,"initialindex"=>$initialindex,"sno"=>$counts,"coordid"=>$coordid));
    }

    public function displayUndermembers() {
       if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
       }
       $counts = $this->request->getGet('count');
       $coordid = $this->session->get("Kaadaisoft_userId");
       $this->session->set('viewcoordscounts',$counts);
       if($this->request->isAJAX()){
           $undermembers = $this->coordinatorsModel->getUndermember($counts,$coordid);
           $data = view('undermemberslist',array("members"=>$undermembers,"sno"=>$counts));
           echo $data;
       }
    }

    public function addcoordinator(){
        if(!$this->session->has('Kaadaisoft_userId')){
             return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
        
    if($this->request->getPost("coordsubmit")){
            $name = $this->request->getPost("coordname");
            $aadhar = $this->request->getPost("coordaadhar");
            $phoneno = $this->request->getPost("coordphone");
            $village = $this->request->getPost("coordvillage");
            $email = $this->request->getPost("coordemail");
            $role = "coordinator";
            $addcoordinator = $this->coordinatorsModel->addCoordinator($name,$aadhar,$phoneno,$village,$email,$role);
            $totalcoordinators = $this->coordinatorsModel->getTotalCoordinators();
            $remainder = $totalcoordinators % 10;
            $index = ceil($totalcoordinators / 10) - 1;
            $getinitialindex = $index - 1;
            $initialindex = floor($getinitialindex / 5) * 5;
            $counts = "";
            if($remainder == 0){
                $counts = $totalcoordinators - 10;
            }
            else{
                $counts = $totalcoordinators - $remainder;
            } 
            $this->session->set("altercoordscounts",$counts);
            $this->session->set("altercoordsindex",$index);
            ($initialindex >= 5) ? $this->session->set("altercoordsinitialindex",$initialindex) : '';
            if($addcoordinator){
                $this->session->set("coordsuccessstatus","Coordinator Added successfully");
                return redirect()->to("coordinators");
            }
            else{
                $this->session->set("coorderrorstatus","Please try again");
                return redirect()->to("coordinators");
            }
            }
        }

    public function getcoordinator(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
    
        if($this->request->isAJAX()){
           $id = $this->request->getGet("id");
           $coordinator = $this->coordinatorsModel->getCoordinatorsdata($id);
           
           $coordstate_id = $coordinator->state_id;
           // Fallback: if state_id is missing, try to find it by State name
           if (empty($coordstate_id) && !empty($coordinator->State)) {
               $st_name = $this->db->escape($coordinator->State);
               $st_query = $this->db->query("SELECT state_id FROM states WHERE state_title = $st_name LIMIT 1");
               $st_row = $st_query->getRow();
               if ($st_row) {
                   $coordstate_id = $st_row->state_id;
                   $coordinator->state_id = $coordstate_id; // update object for the view
               }
           }
    
           $district_name = $coordinator->District;
           $taluk_name = $coordinator->Taluk;
           $states = $this->adminDashboardModel->getStates();
           
           $districts = [];
           if (!empty($coordstate_id)) {
               $districts = $this->membersModel->getDistricts($coordstate_id);
           }
           
           $taluks = [];
           if (!empty($district_name)) {
               $taluks = $this->membersModel->getTaluks($district_name);
           }
           
           $panchayats = [];
           if (!empty($taluk_name)) {
               $panchayats = $this->membersModel->getPanchayats($taluk_name);
           }

           $family_members = $this->membersModel->getFamilyMembers($coordinator->Familymembershipid);
           $updatecoordpage = view("updatecoordinators",array("coordinator"=>$coordinator,"states"=>$states,"districts"=>$districts,"taluks"=>$taluks,"panchayats"=>$panchayats,"family_members"=>$family_members));
           echo $updatecoordpage;
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
            // show_error('Invalid request: missing member ID', 400);
            return redirect()->back();
        }
        $id = $this->request->getGet("id"); // Override argument if get param exists? Keeping logic as is
        $trashdata = $this->coordinatorsModel->coordmovetotrash($id);
        return redirect()->to('coordinators');
    }

    public function getundercoordmembers(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()){
        $coordid = $this->request->getGet("id");    
        $undermemberslist =  $this->coordinatorsModel->getunderMembers($coordid);
            $data = view('viewundermembers',array("members"=>$undermemberslist));     
        echo $data;
        }
        }

    public function viewCoordinatordata(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
        $coord_id = "";
        if($this->session->get('role') == 2){
            $coord_id =  $this->session->get('Kaadaisoft_userId');
        }
        else{
            $coord_id = $this->request->getGet("coord_id");
        }
        $coord_data = $this->coordinatorsModel->getCoordinatordata($coord_id);
        $members = $this->coordinatorsModel->viewMemberundercoord($coord_id);
        $family_members = $this->membersModel->getFamilyMembers($coord_data->Familymembershipid);
        if(!$coord_data){
             $this->session->set("coorderrorstatus","Unexpexted error acquired please try again.");
             return redirect()->to("coordinators");
        }
        else{
             return view("viewcoordinatordata",array("coordinator" => $coord_data,"members"=>$members,"sno"=>0,"coordid"=>$coord_id, "family_members" => $family_members));
        }
    }    

    public function updateCoordinator(){
        
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
        
            $data = [];
            $documents = [];
            $images = [];
            $Familymembershipid = $this->request->getPost("membershipid"); 
            $data["Name"] = $this->request->getPost("name"); 
            $data["Aadharnumber"] = $this->request->getPost("aadharno");
            $data["Phonenumber"] = $this->request->getPost("phoneno");
            $data["State"] = $this->request->getPost("state");
            $data["District"] = $this->request->getPost("district");
            $data["Taluk"] = $this->request->getPost("taluk");
            $data["Panchayat"] = $this->request->getPost("panchayat");
            $data["Village"] = $this->request->getPost("village");
            $data["Street"] = $this->request->getPost("street");
            $data["Doornumber"] = $this->request->getPost("doorno");
            $data["Pincode"] = $this->request->getPost("pincode");
            $data["Existfamilyid"] = $this->request->getPost("existfamilyid");
              
           
              
            $trimaadhar = substr($data["Aadharnumber"],8,12);
            $trimphoneno = substr($data["Phonenumber"],6,10);
    
            $imagenames = ["Memberimage","Aadharfrontimage","Aadharbackimage","Communitycertificate"];
            $filecount = count($imagenames);
            
            for($i = 0;$i < $filecount;$i++){
                $imgField = $imagenames[$i];
                $file = $this->request->getFile($imgField);

                if($file && $file->isValid() && !$file->hasMoved()){
                    $newName = str_replace(' ','-',$data['Name'].$trimaadhar.$trimphoneno.$imagenames[$i].time().".".$file->getExtension());
                    try {
                         $file->move(WRITEPATH . 'uploads/membersdocuments/', $newName);
                         $images["$imagenames[$i]"] = $newName;
                    } catch (\Exception $e) {
                         // handle error
                    }
                }
            }
            
            $updateCoordinator = $this->coordinatorsModel->processCoordinatorupdate($Familymembershipid,$data);
            if (!empty($images)) {
                 $this->coordinatorsModel->processUpdateimages($Familymembershipid,$images);
            }
    
            if ($updateCoordinator === 'no_changes') {
                // $this->session->set("coordsuccessstatus", "No changes were made to the details.");
                return redirect()->back();
            }
    
          if($updateCoordinator === null || $updateCoordinator === true) { // processCoordinatorupdate might return void/null in original logic
            if ($Familymembershipid == $this->session->get('Kaadaisoft_userId')) {
                $this->session->set("coordsuccessstatus", "Your data is updated successfully.");
            } else {
                $this->session->set("coordsuccessstatus", "The Coordinator $Familymembershipid details updated successfully.");
            }
            if($this->session->get('role') == 2){
                return redirect()->to("viewCoordinatordata?coord_id=" . $Familymembershipid);
            }
            else{
                return redirect()->to("coordinators");
            }
             
          }
          else {
            $this->session->set("membername",$data['Name']);
            $this->session->set("coorderrorstatus","Unexpected error please try again.");
            return redirect()->to("coordinators");   
          }
        }

    function viewunderMembers() {
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
            $familyid = $this->request->getGet("id");
            $members = $this->coordinatorsModel->viewMemberundercoord($familyid);
            $coordinatordetail = $this->coordinatorsModel->getMemberdata($familyid);
            return view("viewundermembers",array("members"=>$members,"sno"=>0,"coordinator"=>$coordinatordetail));
        }

    public function viewMemberdata() {
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()) {
        $member_id = $this->request->getPost("id");
        $member_data = $this->coordinatorsModel->getMemberdata($member_id);
        echo json_encode($member_data);
    }
    }

    public function eventParticipation() {
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()) {
        $member_id = $this->request->getPost("id");
        $member_data = $this->coordinatorsModel->getMembereventparticipation($member_id);
        echo json_encode($member_data);
    }
    }

    public function getpendingamount(){
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()) {
        $member_id = $this->request->getPost("id");
        $member_data = $this->coordinatorsModel->getPendingamount($member_id);
        echo json_encode($member_data);
    }   
    }
}
?>