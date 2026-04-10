<?php 
namespace App\Controllers;

use App\Models\AdminDashboardModel;
use App\Models\CoordinatorsModel;
use App\Models\MembersModel;
use App\Models\PaymentsModel;

class AdminDashboard extends BaseController {

    protected $adminDashboardModel;
    protected $coordinatorsModel;
    protected $membersModel; // Added for dropdowns
    protected $paymentsModel;
    protected $session;
    protected $db;

    public function __construct(){
        $this->adminDashboardModel = new AdminDashboardModel();
        $this->coordinatorsModel = new CoordinatorsModel();
        $this->membersModel = new MembersModel(); // Initialize
        $this->paymentsModel = new PaymentsModel();
        $this->session = session();
        $this->db = \Config\Database::connect();
    }
    
    public function index(){
        if($this->session->get("role") !== "1" && $this->session->get("role") !== 1 && !$this->session->get("Kaadaisoft_userId")){
               return redirect()->to("/");
        }
        $pendingapplications = $this->adminDashboardModel->getPendingapplications();
        $totalcoordinators = $this->coordinatorsModel->getTotalCoordinators();
        $totalmembers = $this->membersModel->getTotalMembers();
        $states = $this->adminDashboardModel->getStates();
        $pendingcounts = count($pendingapplications);
        $updaterequests = $this->adminDashboardModel->getMemberUpdateRequests();
        $updaterequestcounts = count($updaterequests);
        $this->session->set("pendingcounts", $pendingcounts);
        $this->session->set("updaterequestcounts", $updaterequestcounts);
        return view("admindashboard", array("applications" => $pendingapplications, "states" => $states, "pendingcounts" => $pendingcounts, "updaterequestcounts" => $updaterequestcounts, "memberscount" => $totalmembers, "coordscount" => $totalcoordinators));
    }

    public function viewManagerdata(){
        if(!$this->session->get('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('admindashboard');
        }
        $manager_id = $this->session->get('Kaadaisoft_userId');
        $manager_data = $this->membersModel->getMemberdata($manager_id);
        $family_members = $this->membersModel->getFamilyMembers($manager_id);
        
        if(!$manager_data){
             $this->session->set("managererrorstatus","Unexpected error acquired please try again.");
             return redirect()->to("admindashboard");
        }
        else{
             return view("viewmanagerdata", array("manager" => $manager_data, "family_members" => $family_members));
        }
    }

    public function viewReceivedapplications(){
        if(!$this->session->get("Kaadaisoft_userId")){
            return redirect()->to("/");
        }
        if($this->session->get("role") == 3){
            return redirect()->to("admindashboard");
        }
        $pendingapplications = $this->adminDashboardModel->getPendingapplications();
        $pendingcounts = count($pendingapplications);
        return view("viewreceivedapplications",array("applications" => $pendingapplications,"pendingcounts" => $pendingcounts, "sno" => 0));
    }

    public function approveMember(){
        if(!$this->session->get("Kaadaisoft_userId")){
            return redirect()->to("/");
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
        $applicationid = $this->request->getPost("applicationid");
        $userid = $this->request->getPost("userid");
        $username = $this->request->getPost("username");
        $district = $this->request->getPost("userdistrict");
        $taluk = $this->request->getPost("talukname");
        $village = $this->request->getPost("villagename");

        // Fetch member email & name before approval (they exist in the pending record)
        $pendingMember = $this->db->table('kaadaimembers')->where('Id', $applicationid)->get()->getRow();

        $member_id = $this->adminDashboardModel->approveMember($applicationid,$userid,$username,$district,$taluk,$village);
        if(!$member_id){
            $this->session->set("approvederror","Unexpected error acquired. Please try again");
            return redirect()->to("viewreceivedapplications");
        }
        else{
            // Send approval email to member if they have an email address
            if ($pendingMember && !empty($pendingMember->Email)) {
                $this->sendMemberApprovalEmail($pendingMember->Email, $pendingMember->Name, $member_id);
            }
            $this->session->set("approvedsuccess","Approved successfully. Family membership Id is $member_id");
            return redirect()->to("viewreceivedapplications");
        }
    }

    public function rejectMember(){
        if(!$this->session->get("Kaadaisoft_userId")){
            return redirect()->to("/");
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
        $applicationid = $this->request->getPost("applicationid");
        $rejectreason  = $this->request->getPost("rejectreason");

        // Fetch member email & name BEFORE rejecting (record will be hidden after)
        $pendingMember = $this->db->table('kaadaimembers')->where('Id', $applicationid)->get()->getRow();

        $result = $this->adminDashboardModel->rejectMember($applicationid, $rejectreason);
        if(!$result){
            $this->session->set("applicationerrorstatus","Failed to reject application. Please try again");
            return redirect()->back();
        }
        else{
            // Send rejection email to member if they have an email address
            if ($pendingMember && !empty($pendingMember->Email)) {
                $this->sendMemberRejectionEmail($pendingMember->Email, $pendingMember->Name, $rejectreason);
            }
            $this->session->set("rejectedsuccess","Rejected successfully.");
            return redirect()->back();
        }
    }

    public function getMembersforassign(){
        if(!$this->session->get('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()){
            $searchfields = $this->request->getGet("searchfields");
            $membersdata = $this->adminDashboardModel->getMembersSearchfields($searchfields);
            $count = count($membersdata);
            if($count == 0){
                echo "<li>No search results</li>";
            }
            else{
            foreach ($membersdata as $key => $value){
              $areas_label = ($value->Assigned_areas_count > 0) ? "<span class='badge ".($value->Assigned_areas_count < 4 ? 'bg-success' : 'bg-danger')." text-white' style='font-size: 0.70rem; white-space: nowrap;'>Assigned: $value->Assigned_areas_count</span>" : "";
              $json_val = htmlspecialchars(json_encode($value), ENT_QUOTES, 'UTF-8');
              echo "<li class='assignmember p-2 border-bottom' style='cursor:pointer;' onclick='assignForcoordinator({$json_val})'>
                      <div class='d-flex justify-content-between align-items-start mb-1'>
                          <span class='fw-bold text-dark text-wrap pe-2'>$value->Name</span>
                          $areas_label
                      </div>
                      <div class='text-muted small text-wrap' style='line-height: normal;'>
                          $value->Familymembershipid - $value->Phonenumber - $value->District
                      </div>
                    </li>";
            }
            }
        }
    }

    public function getCoordinatorsforassign(){
        if(!$this->session->get('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()){
            $searchfields = $this->request->getGet("searchfields");
            $membersdata = $this->adminDashboardModel->getCoordinatorsSearchfields($searchfields);
            $count = count($membersdata);
            if($count == 0){
                echo "<li>No search results</li>";
            }
            else{
            foreach ($membersdata as $key => $value){
              $areas_label = "<span class='badge ".($value->Assigned_areas_count < 4 ? 'bg-success' : 'bg-danger')." text-white' style='font-size: 0.70rem; white-space: nowrap;'>Assigned: $value->Assigned_areas_count</span>";
              $json_val = htmlspecialchars(json_encode($value), ENT_QUOTES, 'UTF-8');
              echo "<li class='assignmember p-2 border-bottom' style='cursor:pointer;' onclick='reassignForcoordinator({$json_val})'>
                      <div class='d-flex justify-content-between align-items-start mb-1'>
                          <span class='fw-bold text-dark text-wrap pe-2'>$value->Name</span>
                          $areas_label
                      </div>
                      <div class='text-muted small text-wrap' style='line-height: normal;'>
                          $value->Familymembershipid - $value->Phonenumber - $value->District
                      </div>
                    </li>";
            }
            }
        }
    }

    public function assignCoordinator(){
        if(!$this->session->get('Kaadaisoft_userId')){
            return redirect()->to('/');
        } 
        if($this->session->get('role') != 1){
            return redirect()->to('admindashboard');
        }
            $states = $this->adminDashboardModel->getStates();
            return view('assigncoordinator',array("states"=>$states)); 
     }

     public function getDistrictsfordropdown(){
        if($this->request->isAJAX()){
            $state_id = $this->request->getGet("state_id");
            $districts = $this->adminDashboardModel->getDistricts($state_id);
               echo "<option value=''>Choose District</option>";
            foreach ($districts as $key => $district) {
               echo "<option value='$district->district_name'>$district->district_name</option>";
            }
        }
    }

    public function getTaluksfordropdown(){
        if($this->request->isAJAX()){
            $district_name = $this->request->getPost("district_name");
            $taluks = $this->adminDashboardModel->getTaluks($district_name);
            echo json_encode($taluks);
        }
    }

    public function getPanchayatsfordropdown(){
        if($this->request->isAJAX()){
            $taluk_name = $this->request->getPost("taluk_name");
            $panchayats = $this->adminDashboardModel->getPanchayats($taluk_name);
            echo json_encode($panchayats);
        }
    }

    public function getVillagesfordropdown(){
        if($this->request->isAJAX()){
            $panchayat_name = $this->request->getPost("panchayat_name");
            $villages = $this->adminDashboardModel->getVillages($panchayat_name);
            echo json_encode($villages);
        }
    }

    public function assignCoordinatorsfortaluk(){
        if(!$this->session->get('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
        
        $villagesarray = $this->request->getPost("taluks"); // Keeping the name 'taluks' in POST for now to avoid breaking view too early, but it contains villages.
        $villageslist = json_decode($villagesarray,true);
        $memberid = $this->request->getPost("memberid");
        $assignerid = $this->request->getPost("assignerid");
        $assignername = $this->request->getPost("assignername");
        $get_count = $this->db->query("SELECT COUNT(*) as count FROM village_table WHERE (Coordinator_id = '$memberid' OR Coordinator_Two_id = '$memberid') AND isAssigned = 1");
        $count = $get_count->getRow();
        $assigned_areas_count = $count->count;
        $villagesLimit = count($villageslist) + $assigned_areas_count;

        if($villagesLimit > 4) {
            $this->session->set("assigncoorderrorstatus","Cannot assign more than 4 areas to a coordinator.");
            return redirect()->to("assigncoordinator");
        }
        
        $assigncoordinator = $this->adminDashboardModel->assignCoordinator($villageslist,$memberid,$assignerid,$assignername); 

        if(!$assigncoordinator){
            $this->session->set("assigncoorderrorstatus","Unexpected error acquired please try again.");
            return redirect()->to("assigncoordinator");
        }
        else{
            $this->session->set("assigncoordsuccessstatus","Coordinator assigned successfully");
            return redirect()->to("assigncoordinator");
        }
    }

    function checkExistvillage() {
        if(!$this->session->get('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()){
            $v_name = $this->request->getPost("village");
            $p_name = $this->request->getPost("panchayat");
            $t_name = $this->request->getPost("taluk");
            $d_name = $this->request->getPost("district");

            $existvillage = $this->adminDashboardModel->getExistvillage($v_name, $p_name, $t_name, $d_name);
            if(count($existvillage) > 0){
                echo "exist";
            }
            else{
                echo "notexist";
            }
        }
    }

    public function getOverallstatus(){
        if(!$this->session->get('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()) {
            $villagesforremove = $this->request->getPost("taluksforremove");
            $villagesarray = json_decode($villagesforremove,true);
            $data = $this->adminDashboardModel->getOverallstatus($villagesarray);
            echo json_encode($data);
        }    
    }

    public function changeapplicationspagesetup() {
        if(!$this->session->get('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        $initialindex = $this->request->getGet('initialindex');
        if($initialindex < 0){
           $initialindex = 0;
           echo "<script>
                 window.alert('No pages are available to show.')
                 </script>";
        } 
        $counts = $initialindex * 10;
        $this->session->set('applicationcounts',$counts);
        $getapplications = $this->adminDashboardModel->getPendingapplications();
        $totalapplications = count($getapplications);
        if($counts > $totalapplications){
            echo "<script>
                  window.alert('No pages are available to show.')
                  </script>";
            $counts = 0;   
            $this->session->set('applicationcounts',$counts);  
        }
        $applications = $this->adminDashboardModel->getApplications($counts);
        return view('viewreceivedapplications',array("applications"=>$applications,"newcounts"=>$totalapplications,"initialindex"=>$initialindex,"sno"=>$counts));
    }

    public function displayApplications() {
        if(!$this->session->get('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }
        $counts = $this->request->getGet('count');
        $this->session->set('applicationcounts',$counts);
        if($this->request->isAJAX()){
           $applications = $this->adminDashboardModel->getApplications($counts);
           $data = view('applicationlist',array("applications"=>$applications,"sno"=>$counts));
           echo $data;
        }
    }

    public function reassignCoordinator() {
        if(!$this->session->get('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()) {
            $coordid = $this->request->getPost("memberid");
            $village = $this->request->getPost("village");
            $panchayat = $this->request->getPost("panchayat");
            $taluk = $this->request->getPost("taluk");
            $district = $this->request->getPost("district");
            $data = $this->adminDashboardModel->reassignCoordinator($coordid,$village,$panchayat,$taluk,$district);
             if(!$data) {
                echo "error";
            }
            else{
                echo "success";
            } 
        } 
    }

    public function reassignCoordinatorProcess() {
        if(!$this->session->get('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()){
            $memberid = $this->request->getPost("memberid");
            $villages_json = $this->request->getPost("villages");
            $villages = json_decode($villages_json, true);
            $assignerid = $this->session->get("Kaadaisoft_userId");
            $assignername = $this->session->get("Kaadaisoft_userName");

            $result = $this->adminDashboardModel->bulkReassignCoordinator($memberid, $villages, $assignerid, $assignername);
            if($result) {
                echo "success";
            } else {
                echo "error";
            }
        }
    }

    public function getCoordinatorAssignments() {
        if(!$this->session->get('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->request->isAJAX()){
            $memberid = $this->request->getPost("memberid");
            $assignments = $this->adminDashboardModel->getCoordinatorAssignments($memberid);
            echo json_encode($assignments);
        }
    }

    public function addVillage() {
        if(!$this->session->get('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
        
        $state_id = $this->request->getPost("state");
        $district = $this->request->getPost("district");
        
        $taluk = $this->request->getPost("taluk_select");
        if ($taluk == 'add_new_taluk') {
            $taluk = $this->request->getPost("taluk_manual");
        }
        
        $panchayat = $this->request->getPost("panchayat_select");
         if ($panchayat == 'add_new_panchayat') {
            $panchayat = $this->request->getPost("panchayat_manual");
        }
        
        $village = $this->request->getPost("village");

        if(empty($state_id) || empty($district) || empty($taluk) || empty($panchayat) || empty($village)) {
            $this->session->set("assigncoorderrorstatus", "All fields are required.");
            return redirect()->to("assigncoordinator");
        }

        $result = $this->adminDashboardModel->addVillageData($state_id, $district, $taluk, $panchayat, $village);

        if($result) {
            $this->session->set("assigncoordsuccessstatus", "Village added successfully: $village");
        } else {
            $this->session->set("assigncoorderrorstatus", "Failed to add village. It assumes already exists.");
        }
        return redirect()->to("assigncoordinator");
    }

    public function removeVillage() {
        if(!$this->session->get('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->session->get('role') == 3){
            return redirect()->to('admindashboard');
        }
        
        $state_id = $this->request->getPost("state");
        $district = $this->request->getPost("district");
        $taluk = $this->request->getPost("taluk");
        $panchayat = $this->request->getPost("panchayat");
        $village = $this->request->getPost("village");

        if(empty($state_id) || empty($district) || empty($taluk) || empty($panchayat) || empty($village)) {
            $this->session->set("assigncoorderrorstatus", "All fields are required to remove a village.");
            return redirect()->to("assigncoordinator");
        }

        $result = $this->adminDashboardModel->removeVillageData($state_id, $district, $taluk, $panchayat, $village);

        if($result) {
             if($result === "assigned") {
                 $this->session->set("assigncoorderrorstatus", "Cannot remove assigned village. Please unassign coordinator first.");
             } else {
                 $this->session->set("assigncoordsuccessstatus", "Village removed successfully: $village");
             }
        } else {
            $this->session->set("assigncoorderrorstatus", "Failed to remove village. Village not found or error occurred.");
        }
        return redirect()->to("assigncoordinator");
    }

    public function registerMember(){

    $name = $this->request->getPost("name"); 
    $aadharno = $this->request->getPost("aadharno");
    $phoneno = $this->request->getPost("phoneno");
    $state_id = $this->request->getPost("state");
    $district = $this->request->getPost("district");
    $taluk = $this->request->getPost("taluk");
    $panchayat = $this->request->getPost("panchayat");
    $village = $this->request->getPost("village");
    if ($village === "Others") {
        $village = $this->request->getPost("village_others");
    }
    $street = $this->request->getPost("street");
    $doorno = $this->request->getPost("doorno");
    $pincode = $this->request->getPost("pincode");
    $existfamilyid = $this->request->getPost("existfamilyid");
    $selfimage = $this->request->getPost("selfimage");
    $aadharfrontimage = $this->request->getPost("aadharfrontimage");
    $aadharbackimage = $this->request->getPost("aadharbackimage");
    $communitycertificate = $this->request->getPost("communitycertificate");
    $hashed_password = password_hash($phoneno, PASSWORD_BCRYPT);   
    $trimaadhar = substr($aadharno,8,12);
    $trimphoneno = substr($phoneno,6,10);

    $clean_phone = preg_replace('/[^0-9]/', '', $phoneno);
    if (preg_match('/^(91)?[6-9][0-9]{9}$/', $clean_phone)) {
        $processed_phone = substr($clean_phone, -10);
    } else {
        $processed_phone = $clean_phone;
    }

    $imagenames = ["selfimage","aadharfrontimage","aadharbackimage","communitycertificate"];
    $documents = [];
    
    // File Upload Logic Conversion
    for ($i = 0; $i < count($imagenames); $i++) {
        $imgField = $imagenames[$i];
        $file = $this->request->getFile($imgField);
        
        if ($file && $file->isValid() && !$file->hasMoved()) {
            switch ($i) {
                case 0: $suffix = ''; break;
                case 1: $suffix = 'aadharfront'; break;
                case 2: $suffix = 'aadharback'; break;
                case 3: $suffix = 'comunitycertificate'; break;
            }
            $file_ext = $file->getExtension();
            $file_name = str_replace(' ','-',$name.$trimaadhar.$trimphoneno.($suffix ? $suffix : '').'.'.$file_ext);
            
            // Check file type/size if strictly needed, but getFile() check checks upload validity
            // Code below assumes 10MB max roughly, CI4 default is similar or in php.ini
            
            try {
                $file->move(WRITEPATH . 'uploads/membersdocuments/', $file_name);
                $documents[$i] = $file_name;
            } catch (\Exception $e) {
                 $this->session->setFlashdata("registerprocessfailure", $e->getMessage());
                 return redirect()->to("registrationform");
            }

        } else {
            // If upload failed or not present
            if($file && !$file->isValid() && $file->getError() != UPLOAD_ERR_NO_FILE){
                 // Real error
                 $error = $file->getErrorString();
                 $this->session->setFlashdata("registerprocessfailure", $error);
                 return redirect()->to("registrationform");
            }
            $documents[$i] = '';
        }
    }

    $insertMember = $this->adminDashboardModel->processRegisteration(
        $name,$state_id,$district,$taluk,$panchayat,$village,
        $street,$doorno,$pincode,$existfamilyid,$processed_phone,
        $aadharno,$hashed_password,$documents
    );

    if($insertMember){
        $this->session->set("membername",$name);
        $this->session->set("membersuccessstatus","Member Added successfully.");
        return redirect()->to("members"); 
    } else {
        // If processRegistration returns false, it might have set a flash message.
        // We preserve it if set, else generic.
        if(!$this->session->getFlashdata('membererrorstatus')){
             $this->session->set("membererrorstatus","Unexpected error please try again.");
        }
        $this->session->set("membername",$name);
        return redirect()->to("members");   
    }
}


public function sidemenu(){
    return view("sidemenu");
}

public function topmenu(){
    return view("topmenu");
}
    
public function register_manager() {
    $name = $this->request->getGet('name'); // Assuming GET as per original code
    $phonenumber = $this->request->getGet('phonenumber');
    $password = $this->request->getGet('password');
    $district = $this->request->getGet('district');
    $state = $this->request->getGet('state');
    $stateId = $this->request->getGet('stateId');
    $role = 1; // hard code the role.

    // Check if the username already exists (single DB hit)
    $query = $this->db->table('kaadaimembers')->where('Role', $role)->get();

    if ($query->getNumRows() > 0) {
        // Username already exists. Show error message.
        $this->session->setFlashdata('error', 'Username already exists.');
        return redirect()->to('/'); // Redirect back to the registration form
    }

    // Username is unique, proceed with registration
    $getdistrictcode = $this->db->query("SELECT DISTINCT(district_code) AS district_code FROM panchayat_table WHERE district_name = '$district'");
    $getcode = $getdistrictcode->getRow();
    $districtcode = $getcode->district_code;

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $getmembers = $this->db->query("SELECT * FROM kaadaimembers WHERE Approvedstatus = 'Verified'");
    $totalmembersverified = count($getmembers->getResultArray()) + 1;
    $newid = str_pad($totalmembersverified,5,"0",STR_PAD_LEFT);
    $membershipid = $districtcode.$newid;

    $data = array(
        'FamilymembershipId' => $membershipid,
        'Name' => $name,
        'Phonenumber' => $phonenumber,
        'Password' => $hashed_password,
        'Role' => $role,
        'District' => $district,
        'State' => $state,
        'state_id' => $stateId,
        'Approvedstatus'=> 'Verified'
    );

    $this->db->table('kaadaimembers')->insert($data);

    // ... redirect or show success message ...
    $this->session->setFlashdata('success', 'Manager registered successfully.');
    return redirect()->to('/');
}

public function change_password() {

    $familyId = $this->session->get('Kaadaisoft_userId');
    $currentPassword = $this->request->getPost('current_password');
    $newPassword = $this->request->getPost('new_password');
    $confirmPassword = $this->request->getPost('confirm_password');

    if ($newPassword !== $confirmPassword) {
        $this->session->setFlashdata('password_error', 'New passwords do not match.');
        return redirect()->to('admindashboard');
    }

    $user = $this->adminDashboardModel->get_user_by_id($familyId);
    
    if ($user && password_verify($currentPassword, $user->Password)) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $this->adminDashboardModel->update_password($familyId, $hashedPassword);
        $this->session->setFlashdata('password_success', 'Password updated successfully.');
    } else {
        $this->session->setFlashdata('password_error', 'Current password is incorrect.');
    }

    return redirect()->to('admindashboard');
}


    public function viewMemberUpdateRequests() {
        if($this->session->get("role") != 1 && $this->session->get("role") != 2){
            return redirect()->to("/");
        }
        $requests = $this->adminDashboardModel->getMemberUpdateRequests();
        $updaterequestcounts = count($requests);
        $this->session->set("updaterequestcounts", $updaterequestcounts);
        return view("viewmemberupdaterequests", array("requests" => $requests, "updaterequestcounts" => $updaterequestcounts));
    }

    public function approveMemberUpdate() {
        if($this->session->get("role") != 1 && $this->session->get("role") != 2){
           return redirect()->to("/");
        }
        $request_id = $this->request->getPost("request_id");
        $result = $this->adminDashboardModel->approveMemberUpdate($request_id);
        if($result) {
            $this->session->set("approvedsuccess", "Member update approved successfully.");
        } else {
            if (!$this->session->getFlashdata("approvederror")) {
                $this->session->set("approvederror", "Failed to approve member update.");
            }
        }
        return redirect()->to("view-member-update-requests");
    }

    public function rejectMemberUpdate() {
        if($this->session->get("role") != 1 && $this->session->get("role") != 2){
            return redirect()->to("/");
        }
        $request_id = $this->request->getPost("request_id");
        $result = $this->adminDashboardModel->rejectMemberUpdate($request_id);
        if($result) {
            $this->session->set("rejectedsuccess", "Member update rejected.");
        } else {
            $this->session->set("rejectederror", "Failed to reject member update.");
        }
        return redirect()->to("view-member-update-requests");
    }

    public function getmanager() {
        if(!$this->session->has('Kaadaisoft_userId')){
            return redirect()->to('/');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('admindashboard');
        }
        $id = $this->request->getGet('id');
        // Fetch user data using model 
        // Assuming get_user_by_id works or we query directly.
        // For consistency, let's use a new method or existing logic.
        // Since AdminDashboardModel has get_user_by_id, let's use it.
        $manager = $this->adminDashboardModel->get_user_by_id($id);
        
        $states = $this->adminDashboardModel->getStates();
        $districts = [];
        $taluks = [];
        $panchayats = [];
        $villages = [];

        if($manager) {
            // Fallback for state_id if missing but State name exists
            if (empty($manager->state_id) && !empty($manager->State)) {
                foreach ($states as $st) {
                    if (strtolower(str_replace(' ', '', $st->state_title)) == strtolower(str_replace(' ', '', $manager->State))) {
                        $manager->state_id = $st->state_id;
                        break;
                    }
                }
            }
            // If still empty, default to Tamil Nadu (id 35 typically)
            if (empty($manager->state_id)) {
                $manager->state_id = 35; 
            }

            if(!empty($manager->state_id)) {
                $districts = $this->adminDashboardModel->getDistricts($manager->state_id); 
            }
            if(!empty($manager->District)) {
                 $taluks = $this->adminDashboardModel->getTaluks($manager->District);
            }
            if(!empty($manager->Taluk)) {
                $panchayats = $this->adminDashboardModel->getPanchayats($manager->Taluk);
            }
             if(!empty($manager->Panchayat)) {
                $villages = $this->adminDashboardModel->getVillages($manager->Panchayat);
            }
        } else {
             return "Manager not found."; 
        }
        
        $family_members = $this->membersModel->getFamilyMembers($id);
        
        return view("updatemanager", [
            "manager" => $manager,
            "states" => $states,
            "districts" => $districts,
            "taluks" => $taluks,
            "panchayats" => $panchayats,
            "villages" => $villages,
            "family_members" => $family_members
        ]);
    }

    public function updateManager() {
        if(!$this->session->has('Kaadaisoft_userId')){
             return redirect()->to('/');
        }
        if($this->session->get('role') != 1){
             return redirect()->to('admindashboard');
        }
        
        date_default_timezone_set('Asia/Kolkata');
        $id = $this->request->getPost('membershipid-update') ?: $this->request->getPost('membershipid');
        $data = [];
        $path = $this->request->getPost("path") ?? "manager";
        $reason = $this->request->getPost("reason") ?? "updatemanager";
        
        // Basic Profile Info
        $data["Name"] = $this->request->getPost("name-update") ?: $this->request->getPost("name");
        $data["Aadharnumber"] = $this->request->getPost("aadharno-update") ?: $this->request->getPost("aadharno");
        $data["Phonenumber"] = $this->request->getPost("phoneno-update") ?: $this->request->getPost("phoneno");
        $data["Email"] = $this->request->getPost("email-update") ?: $this->request->getPost("email");
        $data["Whatsappnumber"] = $this->request->getPost("whatsappno-update") ?: $this->request->getPost("whatsappno");
        $data["Dob"] = $this->request->getPost("dob-update") ?: $this->request->getPost("dob");
        $data["Gender"] = $this->request->getPost("gender-update") ?: $this->request->getPost("gender");
        $data["Bloodgroup"] = $this->request->getPost("bloodgroup-update") ?: $this->request->getPost("bloodgroup");
        $data["Married"] = $this->request->getPost("married-update") ?: $this->request->getPost("married");
        
        // Native Address & Geography
        $state_id = $this->request->getPost("state-update") ?: $this->request->getPost("state");
        $data["state_id"] = $state_id;
        if($state_id) {
             $st = $this->db->query("SELECT state_title FROM states WHERE state_id = ?", [$state_id])->getRow();
             $data["State"] = $st ? $st->state_title : "";
        }
        
        $data["District"] = $this->request->getPost("district-update") ?: $this->request->getPost("district");
        $data["Taluk"] = $this->request->getPost("taluk-update") ?: $this->request->getPost("taluk");
        $data["Panchayat"] = $this->request->getPost("panchayat-update") ?: $this->request->getPost("panchayat");
        $data["Village"] = $this->request->getPost("village-update") ?: $this->request->getPost("village");
        $data["Street"] = $this->request->getPost("street-update") ?: $this->request->getPost("street");
        $data["Doornumber"] = $this->request->getPost("doorno-update") ?: $this->request->getPost("doorno");
        $data["Pincode"] = $this->request->getPost("pincode-update") ?: $this->request->getPost("pincode");
        $data["Existfamilyid"] = $this->request->getPost("existfamilyid-update") ?: $this->request->getPost("existfamilyid");

        $coord_row = $this->membersModel->getCoordinatorByLocation(
            $data["Village"],
            $data["Panchayat"],
            $data["Taluk"],
            $data["District"]
        );

        if ($coord_row) {
            $data["Coordinator_id"] = $coord_row->Coordinator_id;
            $data["Coordinator_Two_id"] = $coord_row->Coordinator_Two_id;
        } else {
            $data["Coordinator_id"] = null;
            $data["Coordinator_Two_id"] = null;
        }

        // Additional Profile Details
        $data["Valuvu"] = $this->request->getPost("valuvu-update") ?: $this->request->getPost("valuvu");
        $data["Thottam"] = $this->request->getPost("thottam-update") ?: $this->request->getPost("thottam");
        $data["Kulam"] = $this->request->getPost("kulam-update") ?: $this->request->getPost("kulam");
        $data["Profession"] = $this->request->getPost("profession-update") ?: $this->request->getPost("profession");
        $data["Business"] = $this->request->getPost("business-update") ?: $this->request->getPost("business");
        $data["BusinessWebsite"] = $this->request->getPost("business_website-update") ?: $this->request->getPost("business_website");
        
        $education = $this->request->getPost("education-update") ?: $this->request->getPost("education");
        $data["Education"] = is_array($education) ? implode(', ', $education) : $education;
        $data["is_dead"] = $this->request->getPost("is_dead-update") ?: $this->request->getPost("is_dead");

        // Current Address
        $data["Curaddresstype"] = $this->request->getPost("cur_address_type-update") ?: $this->request->getPost("cur_address_type");
        $data["Curstate"] = $this->request->getPost("cur_state-update") ?: $this->request->getPost("cur_state");
        $data["Curdistrict"] = $this->request->getPost("cur_district-update") ?: $this->request->getPost("cur_district");
        $data["Curtaluk"] = $this->request->getPost("cur_taluk-update") ?: $this->request->getPost("cur_taluk");
        $data["Curpanchayat"] = $this->request->getPost("cur_panchayat-update") ?: $this->request->getPost("cur_panchayat");
        $data["Curvillage"] = $this->request->getPost("cur_village-update") ?: $this->request->getPost("cur_village");
        $data["Curstreet"] = $this->request->getPost("cur_street-update") ?: $this->request->getPost("cur_street");
        $data["Curdoorno"] = $this->request->getPost("cur_doorno-update") ?: $this->request->getPost("cur_doorno");
        $data["Curpincode"] = $this->request->getPost("cur_pincode-update") ?: $this->request->getPost("cur_pincode");

        // NRI Fields
        $data["Curnricountry"] = $this->request->getPost("cur_nri_country-update") ?: $this->request->getPost("cur_nri_country");
        $data["Curnristate"] = $this->request->getPost("cur_nri_state-update") ?: $this->request->getPost("cur_nri_state");
        $data["Curnricity"] = $this->request->getPost("cur_nri_city-update") ?: $this->request->getPost("cur_nri_city");
        $data["Curnrizip"] = $this->request->getPost("cur_nri_zip-update") ?: $this->request->getPost("cur_nri_zip");
        $data["Curnrifulladdress"] = $this->request->getPost("cur_nri_fulladdress-update") ?: $this->request->getPost("cur_nri_fulladdress");

        // Role & Transfer Logic
        $relationship = $this->request->getPost('relationship-update') ?: $this->request->getPost('relationship');
        $custom_rel = $this->request->getPost('custom_relationship-update') ?: $this->request->getPost('custom_relationship');
        $data["MemberRole"] = ($relationship === "Other") ? $custom_rel : $relationship;

        $upcoming_head_id = $this->request->getPost("upcoming_head-update") ?: $this->request->getPost("upcoming_head");
        if (!empty($upcoming_head_id)) {
            // Trigger automatic relationship mapping for other members
            $old_head_new_role = $this->membersModel->autoUpdateFamilyRoles($id, $upcoming_head_id);
            
            $data['MemberRole'] = $old_head_new_role; 
            $this->db->table('kaadaimembers')->where('Familymembershipid', $upcoming_head_id)->update(['MemberRole' => 'Head']);
        }

        $data['updated_at'] = date('Y-m-d H:i:s');

        // Handle File Uploads
        $trimaadhar = substr($data["Aadharnumber"] ?? '', 8, 4); 
        $trimphoneno = substr($data["Phonenumber"] ?? '', 6, 4);
        $imagenames = ["Memberimage", "Aadharfrontimage", "Aadharbackimage", "Communitycertificate"];
        
        foreach ($imagenames as $imgField) {
            $file = $this->request->getFile($imgField);
            if($file && $file->isValid() && !$file->hasMoved()){
                 $newName = str_replace(' ', '-', ($data['Name'] ?? 'manager') . $trimaadhar . $trimphoneno . $imgField . time() . "." . $file->getExtension());
                 try {
                     $file->move(WRITEPATH . 'uploads/membersdocuments/', $newName);
                     $data[$imgField] = $newName;
                 } catch (\Exception $e) {
                     // Log or ignore
                 }
            }
        }

        // Perform Update
        $updated = $this->membersModel->processMemberupdate($id, $data, $path, $reason);
        
        if ($updated === 'no_changes') {
            // $this->session->set('managersuccessstatus', "No changes were made to the details.");
            return redirect()->back();
        }

        if($updated) {
             $this->session->set('managersuccessstatus', "Your data is updated successfully.");
        } else {
             if(!$this->session->getFlashdata('managererrorstatus')){
                 $this->session->set('managererrorstatus', "Failed to update manager $id.");
             }
        }
        
        return redirect()->back();
    }


    public function logout(){
        $this->session->destroy();
        return redirect()->to('/');
    }

    private function sendMemberApprovalEmail($email_address, $name, $membership_id)
    {
        if (empty($email_address)) {
            return false;
        }

        $email = \Config\Services::email();
        $email->setTo($email_address);
        $email->setSubject('🎉 Membership Approved - Poondurai Kaadai Kulam');
        $email->setMailType('html');

        // Attach logo inline
        $imagePath = FCPATH . 'assets/logo_small.png';
        if (file_exists($imagePath)) {
            $email->attach($imagePath, 'inline');
            $cid = $email->setAttachmentCID($imagePath);
            $logoUrl = 'cid:' . $cid;
        } else {
            $logoUrl = base_url('assets/poondurai kaadaikulam image.png');
        }

        $emailData = [
            'title' => 'Membership Approved!',
            'subtitle' => 'Congratulations',
            'logo_url' => $logoUrl,
            'name' => $name,
            'message' => 'We are delighted to inform you that your membership with <strong>Poondurai Kaadai Kulam</strong> has been officially approved!',
            'highlight_box' => $membership_id,
            'highlight_label' => 'Membership ID',
            'highlight_subtext' => 'Keep this for your records.',
            'button_url' => base_url('/'),
            'button_text' => 'Login to My Account',
            'primary_color' => '#16a34a'
        ];

        $messageHtml = view('emails/common_email', $emailData);

        $email->setMessage($messageHtml);
        return $email->send();
    }

    private function sendMemberRejectionEmail($email_address, $name, $reason = '')
    {
        if (empty($email_address)) {
            return false;
        }

        $email = \Config\Services::email();
        $email->setTo($email_address);
        $email->setSubject('Application Status Update - Poondurai Kaadai Kulam');
        $email->setMailType('html');

        // Attach logo inline
        $imagePath = FCPATH . 'assets/logo_small.png';
        if (file_exists($imagePath)) {
            $email->attach($imagePath, 'inline');
            $cid = $email->setAttachmentCID($imagePath);
            $logoUrl = 'cid:' . $cid;
        } else {
            $logoUrl = base_url('assets/poondurai kaadaikulam image.png');
        }

        $emailData = [
            'title' => 'Application Status Update',
            'subtitle' => 'Poondurai Kaadai Kulam',
            'logo_url' => $logoUrl,
            'name' => $name,
            'message' => 'Thank you for your interest in joining <strong>Poondurai Kaadai Kulam</strong>. After reviewing your application, we regret to inform you that we are unable to approve your membership at this time.',
            'extra_info' => !empty($reason) ? '<strong>Reason for Rejection:</strong><br>' . $reason : null,
            'primary_color' => '#dc2626'
        ];

        $messageHtml = view('emails/common_email', $emailData);

        $email->setMessage($messageHtml);
        return $email->send();
    }
}
?>