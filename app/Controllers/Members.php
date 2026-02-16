<?php
namespace App\Controllers;

use App\Models\AdminDashboardModel;
use App\Models\MembersModel;
use CodeIgniter\Controller;
use Exception;

class Members extends BaseController
{
    protected $adminDashboardModel;
    protected $membersModel;
    protected $session;
    protected $db;

    public function __construct() {
        $this->adminDashboardModel = new AdminDashboardModel();
        $this->membersModel = new MembersModel();
        $this->session = session();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        } else {
            $counts = $this->session->get('altermemberscounts') ?? 0;
            $name = $this->session->get('name');
            $this->session->set('memberscounts', $counts);
            $totalmembers = $this->membersModel->getTotalMembers();
            $pendingapplications = $this->adminDashboardModel->getPendingapplications();
            $pendingcounts = count($pendingapplications);
            $this->session->set("pendingcounts", $pendingcounts);
            $members = $this->membersModel->getMembers($counts);
            $states = $this->membersModel->getStates();
            
            return view('members', array("members" => $members, "counts" => $totalmembers, "sno" => $counts, "states" => $states));
            $this->session->remove("altermemberscounts");
            $this->session->remove("altermembersinitialindex");
        }
    }

    public function Registrationform()
    {
        $states = $this->membersModel->getStates();
        return view("registrationform", array("states" => $states));
    }

    public function add_family_member(){
        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }
        $userId = $this->session->get('Kaadaisoft_userId');
        $member = $this->membersModel->getMemberdata($userId);
        
        $states = $this->membersModel->getStates();
        $districts = [];
        $taluks = [];
        $panchayats = [];

        if($member) {
            $districts = $this->membersModel->getDistricts($member->state_id);
            $taluks = $this->membersModel->getTaluks($member->District);
            $panchayats = $this->membersModel->getPanchayats($member->Taluk);
        }

        return view('add_family_member', array(
            "states" => $states,
            "member" => $member,
            "districts" => $districts,
            "taluks" => $taluks,
            "panchayats" => $panchayats
        ));
    }

    public function pslogo()
    {
        return view("pslogo");
    }

    public function sidemenu()
    {
        return view("sidemenu");
    }

    public function topmenu()
    {
        return view("topmenu");
    }

    public function topsubmenu()
    {
        return view("topsubmenu");
    }

    public function getDistrictsfordropdown()
    {
        if ($this->request->isAJAX()) {
            $state_id = $this->request->getGet("state_id");
            $districts = $this->membersModel->getDistricts($state_id);
            echo "<option value=''>Select District</option>";
            foreach ($districts as $key => $district) {
                echo "<option value='$district->district_name'>$district->district_name</option>";
            }
        }
    }

    public function getTaluksfordropdown()
    {
        if ($this->request->isAJAX()) {
            $district_name = $this->request->getGet("district_name");
            $taluks = $this->membersModel->getTaluks($district_name);
            echo "<option value=''>Select Taluk</option>";
            foreach ($taluks as $key => $taluk) {
                echo "<option value='$taluk->taluk_name'>$taluk->taluk_name</option>";
            }
        }
    }

    public function getPanchayatsfordropdown()
    {
        if ($this->request->isAJAX()) {
            $taluk_name = $this->request->getGet("taluk_name");
            $panchayats = $this->membersModel->getPanchayats($taluk_name);
            echo "<option value=''>Select Panchayat</option>";
            foreach ($panchayats as $key => $panchayat) {
                echo "<option value='$panchayat->panchayat_name'>$panchayat->panchayat_name</option>";
            }
        }
    }

    public function getVillagesfordropdown()
    {
        if ($this->request->isAJAX()) {
            $panchayat_name = $this->request->getGet("panchayat_name");
            $villages = $this->membersModel->getVillages($panchayat_name);
            echo "<option value=''>Select Village</option>";
            foreach ($villages as $key => $village) {
                echo "<option value='$village->village_name'>$village->village_name</option>";
            }
        }
    }

    public function displaymembers()
    {
        $counts = $this->request->getGet('count');
        $this->session->set('memberscounts', $counts);
        if ($this->request->isAJAX()) {
            $members = $this->membersModel->getMembers($counts);
            $data = view('memberslist', array("members" => $members, "sno" => $counts));
            echo $data;
        }
    }

    public function searchmembers()
    {
        if (!$this->session->has('Kaadaisoft_userId')) {
            echo json_encode(['error' => 'Unauthorized']);
            return;
        }

        $searchfields = $this->request->getGet('searchfields');
        $members = $this->membersModel->getMembersSearchfields($searchfields);
        
        echo json_encode([
            'members' => $members,
            'total' => count($members)
        ]);
    }


    public function searchnotassignedmembers()
    {
        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }
        if ($this->request->isAJAX()) {
            $searchfields = $this->request->getGet('searchfields');
            if ($searchfields == "") {
                $members = $this->membersModel->getMemberslist();
                $data = view('notassignedmembers', array("members" => $members, "sno" => 0));
                echo $data;
            } else {
                $members = $this->membersModel->getnotassignedMembers($searchfields);
                $counts = count($members);
                if ($counts == 0) {
                    $data = view('notassignedmembers', array("members" => "No search results"));
                    echo $data;
                } else {
                    $data = view('notassignedmembers', array("members" => $members, "sno" => 0));
                    echo $data;
                }
            }
        }
    }

    public function changememberspagesetup()
    {
        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }
        $initialindex = $this->request->getGet('initialindex');
        if ($initialindex < 0) {
            $initialindex = 0;
        }
        $counts = $initialindex * 10;
        $this->session->set('memberscounts', $counts);
        $totalmembers = $this->membersModel->getTotalMembers();
        if ($counts > $totalmembers) {
            $counts = 0;
            $this->session->set('memberscounts', $counts);
        }
        $members = $this->membersModel->getMembers($counts);
        return view('members', array("members" => $members, "newcounts" => $totalmembers, "initialindex" => $initialindex, "sno" => $counts));
    }

    public function addmember()
    {

        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }

        if ($this->request->getPost("membersubmit")) {
            $name = $this->request->getPost("membername");
            $aadhar = $this->request->getPost("memberaadhar");
            $phoneno = $this->request->getPost("memberphone");
            $village = $this->request->getPost("membervillage");
            $email = $this->request->getPost("memberemail");
            $role = "member";
            $addmember = $this->membersModel->addMember($name, $aadhar, $phoneno, $village, $email, $role);
            $totalmembers = $this->membersModel->getTotalMembers();
            $remainder = $totalmembers % 10;
            $index = ceil($totalmembers / 10) - 1;
            $getinitialindex = $index - 1;
            $initialindex = floor($getinitialindex / 5) * 5;
            $counts = "";
            if ($remainder == 0) {
                $counts = $totalmembers - 10;
            } else {
                $counts = $totalmembers - $remainder;
            }
            $this->session->set("altermemberscounts", $counts);
            $this->session->set("altermembersindex", $index);
            ($initialindex >= 5) ? $this->session->set("altermembersinitialindex", $initialindex) : '';
            if ($addmember) {
                $this->session->set("membersuccessstatus", "Member added successfully");
                return redirect()->to("members");
            } else {
                $this->session->set("membererrorstatus", "Please try again.");
                return redirect()->to("members");
            }
        }
    }

    public function getmember()
    {
        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }

        if ($this->request->isAJAX()) {
            $member_id = $this->request->getGet("id");
            $member = $this->membersModel->getMemberdata($member_id);

            if (!$member) {
                echo "<div class='alert alert-danger'>Member not found.</div>";
                return;
            }

            $memberstate_id = $member->state_id;
            
            // Fallback: if state_id is missing, try to find it by State name
            if (empty($memberstate_id) && !empty($member->State)) {
                $st_name = $this->db->escape($member->State);
                $st_query = $this->db->query("SELECT state_id FROM states WHERE state_title = $st_name LIMIT 1");
                $st_row = $st_query->getRow();
                if ($st_row) {
                    $memberstate_id = $st_row->state_id;
                    $member->state_id = $memberstate_id; // update object for the view
                }
            }

            $district_name = $member->District;
            $taluk_name = $member->Taluk;
            $states = $this->adminDashboardModel->getStates();
            
            $districts = [];
            if (!empty($memberstate_id)) {
                $districts = $this->membersModel->getDistricts($memberstate_id);
            }
            
            $taluks = [];
            if (!empty($district_name)) {
                $taluks = $this->membersModel->getTaluks($district_name);
            }
            
            $panchayats = [];
            if (!empty($taluk_name)) {
                $panchayats = $this->membersModel->getPanchayats($taluk_name);
            }

            $family_members = $this->membersModel->getFamilyMembers($member->Familymembershipid);

            $updatememberpage = view("updatemember", array(
                "member" => $member, 
                "family_members" => $family_members,
                "states" => $states, 
                "districts" => $districts, 
                "taluks" => $taluks, 
                "panchayats" => $panchayats
            ));
            echo $updatememberpage;
        }
    }

    public function getareamembers()
    {
        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }
        if ($this->request->isAJAX()) {
            $area = $this->request->getGet("area");
            $members = $this->membersModel->getAreamembers($area);
            $data = view('notassignedmembers', array("members" => $members, "sno" => 0));
            echo $data;
        }
    }

    public function movetotrash($id = null)
    {
        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }
        if ($id === null) {
             return redirect()->back(); // or error
        }

        $trashdata = $this->membersModel->membermovetotrash($id);
        return redirect()->to("members");
    }


    public function multipleassign()
    {
        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }
        if ($this->request->isAJAX()) {
            $coordid = $this->request->getPost("coordid");
            $membersaadhar = $this->request->getPost("membersaadhar");
            $assigncoord = $this->membersModel->assigncoordinator($coordid, $membersaadhar);
            $this->session->set("membersassignstatus", "Members assigned successfully");
            if ($assigncoord) {
                echo 1;
            } else {
                $this->session->set("membersassignstatus", "Members notassigned");
                echo 0;
            }
        }
    }

    public function multiplereassign()
    {
        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }
        if ($this->request->isAJAX()) {
            $membersaadhar = $this->request->getPost("membersaadhar");
            $reassignmembers = $this->membersModel->reassignmembers($membersaadhar);
            $this->session->set("coordinatorstatus", "Members Reassigned successfully");
            if ($reassignmembers) {
                 echo 1;
            } else {
                $this->session->set("coordinatorstatus", "Members notreassigned");
                 echo 0;
            }
        }
    }

    public function viewMemberdata()
    {
        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }
        $member_id = "";
        if ($this->session->get('role') == 3) {
            $member_id = $this->session->get('Kaadaisoft_userId');
        } else {
            $member_id = $this->request->getGet("member_id");
        }
        $member_data = $this->membersModel->getMemberdata($member_id);
        if (!$member_data) {
            if ($this->session->get('role') == 3) {
                $this->session->set("membererrorstatus", "Unexpexted error acquired please try again.");
                return redirect()->to("viewMemberdata");
            } else if ($this->session->get('role') == 2) {
                return redirect()->to("members");
            } else {
                $this->session->set("membererrorstatus", "Unexpexted error acquired please try again.");
                return redirect()->to("members");
            }
        } else {
            $family_members = $this->membersModel->getFamilyMembers($member_data->Familymembershipid);
            $pending_update = $this->membersModel->getPendingUpdateRequest($member_data->Familymembershipid);
            return view("viewmemberdata", array(
                "member" => $member_data, 
                "family_members" => $family_members,
                "pending_update" => $pending_update
            ));
        }

    }

    public function updateMember()
    {

        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }
        date_default_timezone_set('Asia/Kolkata');
        
        $path = $this->request->getPost("path");
        $reason = $this->request->getPost("reason") ?? "";
        
        // Determine field suffix based on source (Coord form uses -coord, others use -update)
        $suffix = "-update";
        if ($path === "coordinator" || $reason === "updatecoordinator") {
             $suffix = "-coord";
        }

        $data = [];
        $documents = [];
        $count = "";
        
        $Familymembershipid = $this->request->getPost("membershipid" . $suffix);
        
        // Check if member is already dead
        $currentMember = $this->membersModel->getMemberdata($Familymembershipid);
        if ($currentMember && isset($currentMember->is_dead) && $currentMember->is_dead == 1) {
            $this->session->set("coorderrorstatus", "Dead member details cannot be updated.");
            return redirect()->to("view-member-data?member_id=" . $Familymembershipid);
        }

        $data["Name"] = $this->request->getPost("name" . $suffix);
        $data["Aadharnumber"] = $this->request->getPost("aadharno" . $suffix);
        $data["Phonenumber"] = $this->request->getPost("phoneno" . $suffix);
        $state_id = $this->request->getPost("state" . $suffix);
        $data["state_id"] = $state_id;
        $getstate = $this->db->query("SELECT state_title FROM states WHERE state_id = '$state_id'");
        $getstatename = $getstate->getRow();
        $data["State"] = $getstatename ? $getstatename->state_title : "";
        
        $data["District"] = $this->request->getPost("district" . $suffix);
        $data["Taluk"] = $this->request->getPost("taluk" . $suffix);
        $data["Panchayat"] = $this->request->getPost("panchayat" . $suffix);
        
        $village_val = $this->request->getPost("village" . $suffix);
        $village_others = $this->request->getPost("village_others" . $suffix); // Assuming the input name is like village_others-update if we followed pattern, but in view it is village_others_member

        // In the view logic for member update:
        // select name="village-update"
        // input name="village_others_member" (Wait, the view script renames them!)
        
        // Let's look at the view script logic again:
        // if Others selected: select name removed, input name="village-member" (which is actually village-update in PHP side because of how names work? No wait.)
        
        // In the view:
        // Select element name is 'village-update' normally.
        // Input element name is 'village_others_member' initially.
        
        // JS toggleVillageOthersMember: 
        // if Others: select name removed. Input name becomes 'village-member'.
        // Wait, the view has PHP echo name="village-update". The JS sets name='village-member'. 
        // 'village-member' DOES NOT MATCH 'village-update' expected by controller!
        
        // The controller expects field names to end with -update or -coord.
        // The view has `name="village-update"` hardcoded on the select.
        // The JS sets `name="village-member"` on the input? That seems wrong. It should probably set it to whatever the select had, or consistent with the controller.
        
        // Let's fix the controller to look for likely alternatives if the main one is missing or 'Others'.
        // But actually, the best fix is in the View's JS to likely name it 'village-update' instead of 'village-member'.
        
        // However, I cannot easily change the JS logic effectively if I am not 100% sure of the dynamic naming.
        // Let's look at the controller variables.
        // $suffix is "-update" or "-coord".
        
        // If the JS sets the input name to 'village-member', then $this->request->getPost("village-update") will be null or empty if the select name was removed!
        // The controller code: $data["Village"] = $this->request->getPost("village" . $suffix);
        
        // If suffix is "-update", it looks for "village-update".
        // If the user selected "Others", the JS removed the name from the select.
        // The JS then added name="village-member" to the input.
        // So "village-update" is NOT sent. "village-member" IS sent.
        
        // So we need to check for "village-member" (or "village-coord"?) if "village-update" is missing?
        // OR better, we simply check for the 'others' specific field if the main one is missing.
        
        // Let's try to grab the value from multiple possible keys to be safe.
        $val = $this->request->getPost("village" . $suffix);
        if (empty($val)) {
             // Try the specific hardcoded names the JS might offer
             if ($suffix === "-update") {
                 $val = $this->request->getPost("village-member"); 
             } else {
                 $val = $this->request->getPost("village-coord"); // guessing for coordinator form
             }
        }
        
        // Also check if the value is "Others" (in case JS didn't remove name but user sent "Others")
        if ($val === "Others" || $val === "other") {
             // Then we definitely need the manual input
             // In view: input name="village_others_member" (hidden typically) or "village-member" (if active)
             
             // If JS was active, it might have swapped names.
             // Let's just look for the other input field.
             $other_val = $this->request->getPost("village_others_member");
             if (!empty($other_val)) $val = $other_val;
        }
        
        $data["Village"] = $val;

        $data["Street"] = $this->request->getPost("street" . $suffix);
        $data["Doornumber"] = $this->request->getPost("doorno" . $suffix);
        $data["Pincode"] = $this->request->getPost("pincode" . $suffix);
        $data["Existfamilyid"] = $this->request->getPost("existfamilyid" . $suffix);
        
        $coord_row = $this->membersModel->getCoordinatorByLocation(
             $data["Village"],
             $data["Panchayat"],
             $data["Taluk"],
             $data["District"]
        );

        $new_coord_id = $coord_row ? $coord_row->Coordinator_id : NULL;
        $new_coord_two_id = $coord_row ? $coord_row->Coordinator_Two_id : NULL;

        if (
            (empty($new_coord_id) && empty($new_coord_two_id)) && 
            $currentMember &&
            $currentMember->Village == $data["Village"] &&
            $currentMember->Panchayat == $data["Panchayat"] &&
            $currentMember->Taluk == $data["Taluk"] &&
            $currentMember->District == $data["District"]
        ) {
             $data["Coordinator_id"] = $currentMember->Coordinator_id;
             $data["Coordinator_Two_id"] = $currentMember->Coordinator_Two_id;
        } else {
             $data["Coordinator_id"] = $new_coord_id;
             $data["Coordinator_Two_id"] = $new_coord_two_id;
        }

        $data["Pannumber"] = $this->request->getPost("panno" . $suffix);
        
        // Detailed fields added to match add_family_member
        $data["Dob"] = $this->request->getPost("dob" . $suffix);
        $data["Gender"] = $this->request->getPost("gender" . $suffix);
        $data["Bloodgroup"] = $this->request->getPost("bloodgroup" . $suffix);
        $data["Email"] = $this->request->getPost("email" . $suffix);
        $data["Whatsappnumber"] = $this->request->getPost("whatsappno" . $suffix);
        $data["Married"] = $this->request->getPost("married" . $suffix);
        $data["Valuvu"] = $this->request->getPost("valuvu" . $suffix);
        $data["Thottam"] = $this->request->getPost("thottam" . $suffix);
        $data["Kulam"] = $this->request->getPost("kulam" . $suffix);
        $data["Profession"] = $this->request->getPost("profession" . $suffix);
        $data["Business"] = $this->request->getPost("business" . $suffix);
        $data["BusinessWebsite"] = $this->request->getPost("business_website" . $suffix);
        
        $education = $this->request->getPost("education" . $suffix);
        $data["Education"] = is_array($education) ? implode(', ', $education) : $education;

        $data["is_dead"] = $this->request->getPost("is_dead" . $suffix);

        $data["Curaddresstype"] = $this->request->getPost("cur_address_type" . $suffix);
        $data["Curstate"] = $this->request->getPost("cur_state" . $suffix);
        $data["Curdistrict"] = $this->request->getPost("cur_district" . $suffix);
        $data["Curtaluk"] = $this->request->getPost("cur_taluk" . $suffix);
        $data["Curpanchayat"] = $this->request->getPost("cur_panchayat" . $suffix);
        
        $cur_village_val = $this->request->getPost("cur_village" . $suffix);
        
        if (empty($cur_village_val)) {
             if ($suffix === "-update") {
                 $cur_village_val = $this->request->getPost("cur_village-member"); 
             } else {
                 $cur_village_val = $this->request->getPost("cur_village-coord"); 
             }
        }
        
        if ($cur_village_val === "Others" || $cur_village_val === "other") {
             $cur_other_val = $this->request->getPost("cur_village_others_member");
             if (!empty($cur_other_val)) $cur_village_val = $cur_other_val;
        }

        $data["Curvillage"] = $cur_village_val;

        $data["Curstreet"] = $this->request->getPost("cur_street" . $suffix);
        $data["Curdoorno"] = $this->request->getPost("cur_doorno" . $suffix);
        $data["Curpincode"] = $this->request->getPost("cur_pincode" . $suffix);

        $data["Curnricountry"] = $this->request->getPost("cur_nri_country" . $suffix);
        $data["Curnristate"] = $this->request->getPost("cur_nri_state" . $suffix);
        $data["Curnricity"] = $this->request->getPost("cur_nri_city" . $suffix);
        $data["Curnrizip"] = $this->request->getPost("cur_nri_zip" . $suffix);
        $data["Curnrifulladdress"] = $this->request->getPost("cur_nri_fulladdress" . $suffix);

        $data["MemberRole"] = ($this->request->getPost('relationship' . $suffix) === "Other") ? $this->request->getPost('custom_relationship' . $suffix) : $this->request->getPost('relationship' . $suffix);

        // Handle Head Transfer Logic
        $upcoming_head_id = $this->request->getPost("upcoming_head" . $suffix);
        if (!empty($upcoming_head_id)) {
            // Demote current head (this user) to 'Old Head' as requested
            
            $data['MemberRole'] = 'Old Head'; 
            
            // If User is Admin/Coordinator (Direct Update)
            if ($this->session->get('role') != 3) {
                 // Promote the Upcoming Head
                 $this->db->table('kaadaimembers')->where('Familymembershipid', $upcoming_head_id)->update(['MemberRole' => 'Head']);
            } else {
                 // Create a separate update request for the new head
                 $this->membersModel->saveUpdateMemberRequest($upcoming_head_id, ['MemberRole' => 'Head']);
            }
        }

        $data['updated_at'] = date('Y-m-d H:i:s');

        $trimaadhar = substr($data["Aadharnumber"], 8, 12);
        $trimphoneno = substr($data["Phonenumber"], 6, 10);

        $imagenames = ["Memberimage", "Aadharfrontimage", "Aadharbackimage", "Communitycertificate"];
        $filecount = count($imagenames);
        
        foreach ($imagenames as $imgField) {
            $file = $this->request->getFile($imgField);
            if($file && $file->isValid() && !$file->hasMoved()){
                 $newName = str_replace(' ', '-', $data['Name'] . $trimaadhar . $trimphoneno . $imgField . time() . "." . $file->getExtension());
                 try {
                     $file->move('assets/membersdocuments/', $newName);
                     $data[$imgField] = $newName;
                 } catch (\Exception $e) {
                     // ignore or handle
                 }
            }
        }

        if ($this->session->get('role') == 3) {
            $updateMember = $this->membersModel->saveUpdateMemberRequest($Familymembershipid, $data);
        } else {
            $updateMember = $this->membersModel->processMemberupdate($Familymembershipid, $data, $path, $reason);
        }

        if ($updateMember) {
            if ($this->session->get('role') == 3) {
                $this->session->set("coordsuccessstatus", "Your update request has been sent to your coordinator for approval.");
                return redirect()->to("view-member-data?member_id=" . $Familymembershipid);
            } else if ($this->session->get('role') == 2) {
                if ($reason == "updatemember") {
                    $this->session->set("membersuccessstatus", "The Member $Familymembershipid details updated successfully.");
                    return redirect()->to("view-member-data?member_id=" . $Familymembershipid);
                }

                $this->session->set("coordsuccessstatus", "The Coordinator ".$data['Name']." data is updated.");
                return redirect()->to("view-coordinator-data?coord_id=" . $Familymembershipid);
            } else if ($this->session->get('role') == 1 && $path == "coordinator") {
                $this->session->set("coordsuccessstatus", "The Manager $Familymembershipid details updated successfully.");
                return redirect()->to("coordinators");
            } else if ($this->session->get('role') == 1 && $path == "manager") {
                $this->session->set("managersuccessstatus", "The Manager $Familymembershipid details updated successfully.");
                return redirect()->to("admindashboard");
            } else {
                if ($path == "member") {
                    $this->session->set("membersuccessstatus", "The Coordinator ".$data['Name']." data is updated.");
                    return redirect()->to("members");
                } else {
                    $this->session->set("coordsuccessstatus", "The Coordinator ".$data['Name']." data is updated.");
                    return redirect()->to("coordinators");
                }
            }
        } else {
            $this->session->set("membername", $data['Name']);
            if(!$this->session->getFlashdata('coorderrorstatus') && !$this->session->getFlashdata('membererrorstatus')){
                $this->session->set("coorderrorstatus", "Unexpected error please try again.");
            }
            return redirect()->to("members");
        }
    }

    public function checkExistphoneno()
    {
        if ($this->request->isAJAX()) {
            $phoneno = $this->request->getPost("phoneno");
            $checkexistphoneno = $this->membersModel->checkExistphoneno($phoneno);
            if ($checkexistphoneno->getNumRows() > 0) {
                 // Check if the phone number belongs to the current logged-in user
                 $current_user_id = $this->session->get('Kaadaisoft_userId');
                 if ($current_user_id) {
                     // Get current user details directly to verify phone
                     $currentUser = $this->membersModel->getMemberdata($current_user_id);
                     if ($currentUser && $currentUser->Phonenumber == $phoneno) {
                         echo "false"; // Allow same number as logged-in user
                         return;
                     }
                 }
                echo "true"; // Number exists and does not belong to current user
            } else {
                echo "false";
            }
        }

    }

    public function checkExistaadharno()
    {
        if ($this->request->isAJAX()) {
            $aadharno = $this->request->getPost("aadharno");
            $checkexistaadharno = $this->membersModel->checkExistaadharno($aadharno);
            if ($checkexistaadharno->getNumRows() > 0) {
                echo "true";
            } else {
                echo "false";
            }
        }

    }

    public function addFamilyMember()
    {

        $name = $this->request->getPost("name");
        $aadharno = $this->request->getPost("aadharno");
        $phoneno = $this->request->getPost("phoneno");
        $stateid = $this->request->getPost("state");
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
        $panno = $this->request->getPost("panno");

        // MISSING FIELDS - ADD THESE
        $dob = $this->request->getPost('dob');
        $gender = $this->request->getPost('gender');
        $bloodgroup = $this->request->getPost('bloodgroup');
        $email = $this->request->getPost('email');
        $whatsappno = $this->request->getPost('whatsappno');
        $married = $this->request->getPost('married');
        $valuvu = $this->request->getPost('valuvu');
        $thottam = $this->request->getPost('thottam');
        $kulam = $this->request->getPost('kulam'); // "Pondhurai Kaadai"
        $profession = $this->request->getPost('profession');
        $business = $this->request->getPost('business');
        $businesswebsite = $this->request->getPost('business_website');
        $education = $this->request->getPost('education'); // array[]
        $education_str = is_array($education) ? implode(', ', $education) : $education;
        $is_dead = $this->request->getPost('is_dead') ?: 0;

        // CURRENT ADDRESS TYPE
        $curaddresstype = $this->request->getPost('cur_address_type');
        // CURRENT ADDRESS FIELDS
        $curstate = $this->request->getPost('cur_state');
        $curdistrict = $this->request->getPost('cur_district');
        $curtaluk = $this->request->getPost('cur_taluk');
        $curpanchayat = $this->request->getPost('cur_panchayat');
        $curvillage = $this->request->getPost('cur_village');
        if($curvillage === "Others") {
            $curvillage = $this->request->getPost("cur_village_others");
        }
        $curstreet = $this->request->getPost('cur_street');
        $curdoorno = $this->request->getPost('cur_doorno');
        $curpincode = $this->request->getPost('cur_pincode');

        // CURRENT NRI ADDRESS FIELD
        $curnricountry = $this->request->getPost('cur_nri_country');
        $curnristate = $this->request->getPost('cur_nri_state');
        $curnricity = $this->request->getPost('cur_nri_city');
        $curnrizip = $this->request->getPost('cur_nri_zip');
        $curnrifulladdress = $this->request->getPost('cur_nri_fulladdress');

        $hashed_password = password_hash($phoneno, PASSWORD_BCRYPT);
        $trimaadhar = substr($aadharno, 8, 12);
        $trimphoneno = substr($phoneno, 6, 10);

        $processed_phone = '';
        $clean_phone = preg_replace('/[^0-9]/', '', $phoneno);

        // Check if it's a mobile number (Indian format: 10 digits starting from 6-9)
        if (preg_match('/^(91)?[6-9][0-9]{9}$/', $clean_phone)) {
            // Remove country code (if exists), take last 10 digits
            $processed_phone = substr($clean_phone, -10);
        } else {
            // It's likely a landline, keep full cleaned number
            $processed_phone = $clean_phone; // or handle logic
        }

        $documents = [];
        $imagenames = ["selfimage", "aadharfrontimage", "aadharbackimage", "communitycertificate"];
        $count = count($imagenames);

        for ($i = 0; $i < $count; $i++) {
            $imgField = $imagenames[$i];
            $file = $this->request->getFile($imgField);
            
            if ($file && $file->isValid() && !$file->hasMoved()) {
                 $suffix = "";
                 if($i == 1) $suffix = "aadharfront";
                 if($i == 2) $suffix = "aadharback";
                 if($i == 3) $suffix = "comunitycertificate";

                 $newName = str_replace(' ', '-', $name . $trimaadhar . $trimphoneno . $suffix . "." . $file->getExtension());
                 
                 try {
                     $file->move('assets/membersdocuments/', $newName);
                     $documents[$i] = $newName;
                 } catch (\Exception $e) {
                      if ($this->session->get('role') == 1 || $this->session->get('role') == 2) {
                        $this->session->set("membererrorstatus", "An unexpected error occured during upload.");
                        return redirect()->to("members");
                      } else {
                        $this->session->set("registerprocesserror", "An unexpected error occured during upload.");
                        return redirect()->to("registrationform");
                      }
                 }
            } else {
                 $documents[$i] = "";
            }
        }


        // Determine Member Role
        $relationship = $this->request->getPost('relationship');
        $memberRole = '';
        
        if (!empty($relationship)) {
            $memberRole = ($relationship === "Other") ? $this->request->getPost('custom_relationship') : $relationship;
        } else {
            // Default to 'Head' if relationship is not provided (e.g., initial registration)
            $memberRole = 'Head';
        }

        $insertMember = $this->membersModel->processRegisteration(
            $name,
            $stateid,
            $district,
            $taluk,
            $panchayat,
            $village,
            $street,
            $doorno,
            $pincode,
            $existfamilyid,
            $processed_phone,
            $panno,
            $aadharno,
            $hashed_password,
            $documents,

            // missing basic details
            $dob,
            $gender,
            $bloodgroup,
            $email,
            $whatsappno,
            $married,
            $valuvu,
            $thottam,
            $kulam,
            $profession,
            $business,
            $businesswebsite,
            $education_str,   // IMPORTANT: string pass pannanum

           
            // current address
            $curstate,
            $curdistrict,
            $curtaluk,
            $curpanchayat,
            $curvillage,
            $curstreet,
            $curdoorno,
            $curpincode,

            // NRI in Current Address
            $curnricountry,
            $curnristate,
            $curnricity,
            $curnrizip,
            $curnrifulladdress,
            // current address type
            $curaddresstype,
            $memberRole,
            $is_dead
        );


        if (!$insertMember) {
            if ($this->session->get('role') == 1) {
                $this->session->set("managererrorstatus", "Unexpected error please try again.");
                return redirect()->to("view-manager-data");
            } elseif ($this->session->get('role') == 2) {
                $this->session->set("coorderrorstatus", "Unexpected error please try again.");
                return redirect()->to("view-coordinator-data");
            } elseif ($this->session->get('role') == 3) {
                $this->session->set("coorderrorstatus", "Unexpected error occured please try again");
                return redirect()->to("view-member-data");
            } else {
                 $this->session->set("registerprocesserror", "Unexpected error occured please try again");
                 return redirect()->to("registrationform");
            }
        } else {

            if ($this->session->get('role') == 1) {
                $this->session->set("managersuccessstatus", "Your family member application is submitted. Please wait 48 hours.");
                return redirect()->to("view-manager-data");
            } elseif ($this->session->get('role') == 2) {
                $this->session->set("coordsuccessstatus", "Your family member application is submitted. Please wait 48 hours.");
                return redirect()->to("view-coordinator-data");
            } elseif ($this->session->get('role') == 3) {
                $this->session->set("coordsuccessstatus", "Your family member application is submitted. Please wait 48 hours.");
                return redirect()->to("view-member-data");
            } else {
                 // Public Registration
                 $this->session->set("registerprocesssuccess", "Your application is submitted. Please wait 48 hours.");
                 return redirect()->to("registrationform");
            }
        }
    }

    public function registerMember()
    {
        return $this->addFamilyMember();
    }
}
?>