<?php 
namespace App\Models;

use CodeIgniter\Model;

class AdminDashboardModel extends Model {

    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getPendingapplications(){
       $session = session();
       if($session->get('role') == 2){
           $CoordinatorId = trim($session->get('Kaadaisoft_userId'));
           // Case-insensitive and trimmed comparison
           $query = $this->db->query("SELECT * FROM kaadaimembers 
                                      WHERE (LOWER(TRIM(Coordinator_id)) = LOWER(" . $this->db->escape($CoordinatorId) . ") 
                                      OR LOWER(TRIM(Coordinator_Two_id)) = LOWER(" . $this->db->escape($CoordinatorId) . ") 
                                      OR LOWER(TRIM(Id_who_assign_coord)) = LOWER(" . $this->db->escape($CoordinatorId) . ")) 
                                      AND Approvedstatus = 'Pending'");    
          return $query->getResult();
       }
         $query = $this->db->query("SELECT * FROM kaadaimembers WHERE Approvedstatus = 'Pending'");    
         return $query->getResult();
    } 

   public function approveMember($applicationid, $userid, $username, $district, $taluk, $village)
 {
     // District code & state id
     $getdistrictcode = $this->db->query("
         SELECT DISTINCT(district_code) AS district_code, state_id 
         FROM panchayat_table 
         WHERE district_name = " . $this->db->escape($district)
     );
     $getcode      = $getdistrictcode->getRow();
     $districtcode = $getcode ? $getcode->district_code : '';
     $state_id     = $getcode ? $getcode->state_id : 0;
 
     // Coordinator IDs
    // Member data – to get Existfamilyid and Panchayat
    $memberdata_query = $this->db->query("
        SELECT Existfamilyid, Panchayat 
        FROM kaadaimembers 
        WHERE Id = " . (int)$applicationid
    );
    $memberdata    = $memberdata_query->getRow();
    $existfamilyid = $memberdata ? $memberdata->Existfamilyid : '';
    $panchayat     = $memberdata ? $memberdata->Panchayat : '';

    // Re-fetch more accurately using all location details
    $getCoordinatorid = $this->db->query("
        SELECT Coordinator_id, Coordinator_Two_id 
        FROM village_table 
        WHERE village_name = " . $this->db->escape($village) . " 
        AND panchayat_name = " . $this->db->escape($panchayat) . "
        AND taluk_name = " . $this->db->escape($taluk) . "
        AND district_name = " . $this->db->escape($district) . "
        LIMIT 1"
    );
    
    $coordinatorRow = $getCoordinatorid->getRow();
    $coordid        = $coordinatorRow ? $coordinatorRow->Coordinator_id : null;
    $coordid_two    = $coordinatorRow ? $coordinatorRow->Coordinator_Two_id : null;
        // ================== FAMILY ID LOGIC ==================
        $membershipid = '';
        
        if (!empty($existfamilyid)) {
            // Option A: Adding to an existing family
            // Use the prefix from existfamilyid (e.g. NMK from NMK00004)
            $prefix = substr(trim($existfamilyid), 0, 3); 
        } else {
            // Option B: New Head of Family
            // Use current district code
            $prefix = $districtcode;
        }

        // Get Max Numeric ID for THIS prefix (District-wise sequence)
        $max_query = $this->db->query("SELECT MAX(CAST(SUBSTRING(Familymembershipid, 4) AS UNSIGNED)) as max_num 
                                       FROM kaadaimembers 
                                       WHERE Familymembershipid LIKE '$prefix%'");
        $max_row = $max_query->getRow();
        $next_num = ($max_row && $max_row->max_num) ? ($max_row->max_num + 1) : 1;

        $membershipid = $prefix . sprintf('%05d', $next_num);
        // ================== FAMILY ID LOGIC END ====================

    // Update member
    $query = $this->db->query("
        UPDATE kaadaimembers 
        SET 
            Familymembershipid = " . $this->db->escape($membershipid) . ",
            Approvedstatus     = 'Verified',
            Coordinator_id     = " . $this->db->escape($coordid) . ",
            Coordinator_Two_id = " . $this->db->escape($coordid_two) . ",
            Approved_by        = " . $this->db->escape($username) . ",
            Id_forwhoapproved  = " . $this->db->escape($userid) . ",
            state_id           = " . (int)$state_id . "
        WHERE Id = " . (int)$applicationid
    );

    return $query ? $membershipid : false;
}

public function rejectMember($applicationid, $rejectreason){
    $query = $this->db->query("
        UPDATE kaadaimembers 
        SET 
            Approvedstatus = 'Reject',
            RejectReason   = " . $this->db->escape($rejectreason) . ",
            isShow         = 0
        WHERE Id = " . (int)$applicationid
    );

    return $query;
}



   public function getMembersSearchfields($searchfields){
      $query = $this->db->query("SELECT * FROM kaadaimembers WHERE (Name LIKE '%$searchfields%' OR Familymembershipid LIKE '%$searchfields%' OR Phonenumber LIKE '%$searchfields%' OR Aadharnumber = '$searchfields' OR District = '$searchfields') HAVING(isShow = 1 AND Role <> 1 AND Approvedstatus = 'Verified' AND MemberRole = 'Head')");
      return $query->getResult();
   }

   public function getCoordinatorsSearchfields($searchfields){
      $query = $this->db->query("SELECT * FROM kaadaimembers WHERE (Name LIKE '%$searchfields%' OR Familymembershipid LIKE '%$searchfields%' OR Phonenumber LIKE '%$searchfields%' OR Aadharnumber = '$searchfields' OR District = '$searchfields') HAVING(isShow = 1 AND Role = 2 AND Approvedstatus = 'Verified' AND MemberRole = 'Head')");
      return $query->getResult();
   }

   public function getStates(){
      $query = $this->db->query("SELECT * FROM states ORDER BY state_title ASC");
      return $query->getResult();
  }

  public function getDistricts($state_id){
   $query = $this->db->query("SELECT distinct(district_name) AS district_name FROM village_table WHERE State_id = $state_id ORDER BY district_name ASC");
   return $query->getResult();
  }

  public function getTaluks($district_name){
   $query = $this->db->query("SELECT DISTINCT(taluk_name) AS taluk_name FROM village_table WHERE district_name = '$district_name' ORDER BY taluk_name ASC");
   return $query->getResult();
  }

  public function getPanchayats($taluk_name){
   $query = $this->db->query("SELECT DISTINCT(panchayat_name) AS panchayat_name FROM village_table WHERE taluk_name = '$taluk_name' ORDER BY panchayat_name ASC");
   return $query->getResult();
  }

  public function getVillages($panchayat_name){
   $query = $this->db->query("SELECT village_name, isAssigned, taluk_name, district_name, panchayat_name, (CASE WHEN Coordinator_id IS NOT NULL AND Coordinator_id != '' THEN 1 ELSE 0 END + CASE WHEN Coordinator_Two_id IS NOT NULL AND Coordinator_Two_id != '' THEN 1 ELSE 0 END) as assigned_count FROM village_table WHERE panchayat_name = '$panchayat_name' AND TRIM(village_name) != '' ORDER BY village_name ASC");
   return $query->getResult();
  }

  public function assignCoordinator($villageslist,$memberid,$assignerid,$assignername) {
   $villagecount = count($villageslist);

   try{
      
     foreach($villageslist as $village_data) {
      $village_obj = is_string($village_data) ? json_decode($village_data, true) : $village_data;
      $v_name = $village_obj['village'];
      $p_name = $village_obj['panchayat'];
      $t_name = $village_obj['taluk'];
      $d_name = $village_obj['district'];

      $check_query = $this->db->query("SELECT Coordinator_id, Coordinator_Two_id FROM village_table 
                        WHERE village_name = " . $this->db->escape($v_name) . " 
                        AND panchayat_name = " . $this->db->escape($p_name) . " 
                        AND taluk_name = " . $this->db->escape($t_name) . " 
                        AND district_name = " . $this->db->escape($d_name));
      $row = $check_query->getRow();

      if (empty($row->Coordinator_id)) {
          $this->db->query("UPDATE village_table SET isAssigned = 1, Coordinator_id = '$memberid', Assigner_id = '$assignerid', Assigner_name = '$assignername' 
                            WHERE village_name = " . $this->db->escape($v_name) . " 
                            AND panchayat_name = " . $this->db->escape($p_name) . " 
                            AND taluk_name = " . $this->db->escape($t_name) . " 
                            AND district_name = " . $this->db->escape($d_name));

          $this->db->query("UPDATE kaadaimembers SET Coordinator_id = '$memberid', Id_who_assign_coord = '$assignerid' 
                            WHERE Village = " . $this->db->escape($v_name) . " 
                            AND District = " . $this->db->escape($d_name));
      } elseif (empty($row->Coordinator_Two_id) && $row->Coordinator_id != $memberid) {
          $this->db->query("UPDATE village_table SET isAssigned = 1, Coordinator_Two_id = '$memberid', Assigner_Two_id = '$assignerid', Assigner_Two_name = '$assignername' 
                            WHERE village_name = " . $this->db->escape($v_name) . " 
                            AND panchayat_name = " . $this->db->escape($p_name) . " 
                            AND taluk_name = " . $this->db->escape($t_name) . " 
                            AND district_name = " . $this->db->escape($d_name));

          $this->db->query("UPDATE kaadaimembers SET Coordinator_Two_id = '$memberid'
                            WHERE Village = " . $this->db->escape($v_name) . " 
                            AND District = " . $this->db->escape($d_name));
      }
     }

   $get_count = $this->db->query("SELECT Assigned_areas_count FROM kaadaimembers WHERE Familymembershipid = '$memberid'");
   $count = $get_count->getRow();
   $assigned_areas_count = $count->Assigned_areas_count;
   $current_count = $assigned_areas_count + $villagecount;
   $setrole = $this->db->query("UPDATE kaadaimembers SET Role = 2, Assigned_areas_count = $current_count WHERE Familymembershipid = '$memberid'");
   return true;
   }
   catch(\Exception $e){
      return false;
   }
   
  }
  
  public function get_user_by_id($id) {
   return $this->db->table('kaadaimembers')->where('Familymembershipid', $id)->get()->getRow();
  }

  function getExistvillage($v_name, $p_name, $t_name, $d_name) {
    $query = $this->db->query("SELECT * FROM village_table 
                               WHERE village_name = " . $this->db->escape($v_name) . " 
                               AND panchayat_name = " . $this->db->escape($p_name) . " 
                               AND taluk_name = " . $this->db->escape($t_name) . " 
                               AND district_name = " . $this->db->escape($d_name) . " 
                               AND (Coordinator_id IS NOT NULL AND Coordinator_id != '') 
                               AND (Coordinator_Two_id IS NOT NULL AND Coordinator_Two_id != '')");
    return $query->getResultArray();
  }

  function getOverallstatus($taluksarray) {
   $count = count($taluksarray);
   $coordinatordata = array();
   for($i = 0;$i < $count;$i++) {

   $village_data = is_string($taluksarray[$i]) ? json_decode($taluksarray[$i], true) : $taluksarray[$i];
   $v_name = $village_data['village'];
   $p_name = $village_data['panchayat'];
   $t_name = $village_data['taluk'];
   $d_name = $village_data['district'];

   $query = $this->db->query("SELECT Coordinator_id, Coordinator_Two_id FROM village_table 
                              WHERE village_name = " . $this->db->escape($v_name) . " 
                              AND panchayat_name = " . $this->db->escape($p_name) . "
                              AND taluk_name = " . $this->db->escape($t_name) . "
                              AND district_name = " . $this->db->escape($d_name));
   
   $getdata = $query->getRow();
   
   $found = false;
   if ($getdata) {
       if (!empty($getdata->Coordinator_id)) {
           $mem = $this->db->query("SELECT * FROM kaadaimembers WHERE Familymembershipid = '".$getdata->Coordinator_id."'")->getRowArray();
           if($mem) {
               $mem['village_name'] = $v_name;
               $mem['panchayat_name'] = $p_name;
               $mem['taluk_name'] = $t_name;
               $mem['district_name'] = $d_name;
               $coordinatordata[] = $mem;
               $found = true;
           }
       }
       if (!empty($getdata->Coordinator_Two_id)) {
           $mem = $this->db->query("SELECT * FROM kaadaimembers WHERE Familymembershipid = '".$getdata->Coordinator_Two_id."'")->getRowArray();
           if($mem) {
               $mem['village_name'] = $v_name;
               $mem['panchayat_name'] = $p_name;
               $mem['taluk_name'] = $t_name;
               $mem['district_name'] = $d_name;
               $coordinatordata[] = $mem;
               $found = true;
           }
       }
   }
   
   if (!$found) {
       $coordinatordata[] = null;
   }
   } 
   $overalldata = ["coordinatordata"=>$coordinatordata];
   return $overalldata;
  }

  public function reassignCoordinator($coordid, $v_name, $p_name, $t_name, $d_name) {
         try{
      $check = $this->db->query("SELECT Coordinator_id, Coordinator_Two_id FROM village_table 
                         WHERE village_name = " . $this->db->escape($v_name) . "
                         AND panchayat_name = " . $this->db->escape($p_name) . "
                         AND taluk_name = " . $this->db->escape($t_name) . "
                         AND district_name = " . $this->db->escape($d_name))->getRow();

      if ($check) {
          if ($check->Coordinator_id == $coordid) {
               $this->db->query("UPDATE village_table SET Coordinator_id = NULL, Assigner_id = NULL, Assigner_name = NULL 
                                 WHERE village_name = " . $this->db->escape($v_name) . " 
                                 AND panchayat_name = " . $this->db->escape($p_name) . " 
                                 AND taluk_name = " . $this->db->escape($t_name) . " 
                                 AND district_name = " . $this->db->escape($d_name));
               $this->db->query("UPDATE kaadaimembers SET Coordinator_id = NULL 
                                 WHERE Village = " . $this->db->escape($v_name) . " 
                                 AND Panchayat = " . $this->db->escape($p_name) . " 
                                 AND Taluk = " . $this->db->escape($t_name) . " 
                                 AND District = " . $this->db->escape($d_name));
          } elseif ($check->Coordinator_Two_id == $coordid) {
               $this->db->query("UPDATE village_table SET Coordinator_Two_id = NULL, Assigner_Two_id = NULL, Assigner_Two_name = NULL 
                                 WHERE village_name = " . $this->db->escape($v_name) . " 
                                 AND panchayat_name = " . $this->db->escape($p_name) . " 
                                 AND taluk_name = " . $this->db->escape($t_name) . " 
                                 AND district_name = " . $this->db->escape($d_name));
               $this->db->query("UPDATE kaadaimembers SET Coordinator_Two_id = NULL 
                                 WHERE Village = " . $this->db->escape($v_name) . " 
                                 AND Panchayat = " . $this->db->escape($p_name) . " 
                                 AND Taluk = " . $this->db->escape($t_name) . " 
                                 AND District = " . $this->db->escape($d_name));
          }
          
          $updated_check = $this->db->query("SELECT Coordinator_id, Coordinator_Two_id FROM village_table 
                         WHERE village_name = " . $this->db->escape($v_name) . "
                         AND panchayat_name = " . $this->db->escape($p_name) . "
                         AND taluk_name = " . $this->db->escape($t_name) . "
                         AND district_name = " . $this->db->escape($d_name))->getRow();
          
          if ($updated_check && empty($updated_check->Coordinator_id) && empty($updated_check->Coordinator_Two_id)) {
               $this->db->query("UPDATE village_table SET isAssigned = 0 
                                 WHERE village_name = " . $this->db->escape($v_name) . " 
                                 AND panchayat_name = " . $this->db->escape($p_name) . " 
                                 AND taluk_name = " . $this->db->escape($t_name) . " 
                                 AND district_name = " . $this->db->escape($d_name));
          }
      }

      $count_query = $this->db->query("SELECT COUNT(*) as count FROM village_table WHERE (Coordinator_id = '$coordid' OR Coordinator_Two_id = '$coordid') AND isAssigned = 1");
      $count_row = $count_query->getRow();
      $current_count = $count_row->count;

      $this->db->query("UPDATE kaadaimembers SET Assigned_areas_count = $current_count WHERE Familymembershipid = '$coordid'");
      if($current_count == 0) {
         $this->db->query("UPDATE kaadaimembers SET Role = 3 WHERE Familymembershipid = '$coordid'");
      }
         return true;
         }
         catch(\Exception $e) {
            return false;
         }
  }

   public function bulkReassignCoordinator($memberid, $villages, $assignerid, $assignername) {
       try {
           $this->db->transStart();

           // 1. Remove coordinator from ALL current assignments (Both slots)
           $this->db->query("UPDATE village_table SET Coordinator_id = NULL, Assigner_id = NULL, Assigner_name = NULL WHERE Coordinator_id = " . $this->db->escape($memberid));
           $this->db->query("UPDATE village_table SET Coordinator_Two_id = NULL, Assigner_Two_id = NULL, Assigner_Two_name = NULL WHERE Coordinator_Two_id = " . $this->db->escape($memberid));
           
           // 2. Clear coordinator reference for members previously under them
           $this->db->query("UPDATE kaadaimembers SET Coordinator_id = NULL WHERE Coordinator_id = " . $this->db->escape($memberid));
           $this->db->query("UPDATE kaadaimembers SET Coordinator_Two_id = NULL WHERE Coordinator_Two_id = " . $this->db->escape($memberid));

           // 3. Mark villages as unassigned if both slots are now empty
           $this->db->query("UPDATE village_table SET isAssigned = 0 WHERE Coordinator_id IS NULL AND Coordinator_Two_id IS NULL");

           // 4. Assign to NEW villages
           foreach($villages as $village_data) {
               $v_name = $village_data['village'];
               $p_name = $village_data['panchayat'];
               $t_name = $village_data['taluk'];
               $d_name = $village_data['district'];

               $check = $this->db->query("SELECT Coordinator_id, Coordinator_Two_id FROM village_table 
                                         WHERE village_name = " . $this->db->escape($v_name) . "
                                         AND panchayat_name = " . $this->db->escape($p_name) . "
                                         AND taluk_name = " . $this->db->escape($t_name) . "
                                         AND district_name = " . $this->db->escape($d_name))->getRow();
               
               if (!$check) continue;

               if (empty($check->Coordinator_id)) {
                   $this->db->query("UPDATE village_table SET isAssigned = 1, Coordinator_id = '$memberid', Assigner_id = '$assignerid', Assigner_name = '$assignername' WHERE village_name = " . $this->db->escape($v_name) . " AND panchayat_name = " . $this->db->escape($p_name) . " AND taluk_name = " . $this->db->escape($t_name) . " AND district_name = " . $this->db->escape($d_name));
                   $this->db->query("UPDATE kaadaimembers SET Coordinator_id = '$memberid' WHERE Village = " . $this->db->escape($v_name) . " AND District = " . $this->db->escape($d_name));
               } else if (empty($check->Coordinator_Two_id) && $check->Coordinator_id != $memberid) {
                   $this->db->query("UPDATE village_table SET isAssigned = 1, Coordinator_Two_id = '$memberid', Assigner_Two_id = '$assignerid', Assigner_Two_name = '$assignername' WHERE village_name = " . $this->db->escape($v_name) . " AND panchayat_name = " . $this->db->escape($p_name) . " AND taluk_name = " . $this->db->escape($t_name) . " AND district_name = " . $this->db->escape($d_name));
                   $this->db->query("UPDATE kaadaimembers SET Coordinator_Two_id = '$memberid' WHERE Village = " . $this->db->escape($v_name) . " AND District = " . $this->db->escape($d_name));
               }
           }

           // 5. Update the coordinator's area count and ensure role is set to 2 (Coordinator)
           $new_count = count($villages);
           $this->db->query("UPDATE kaadaimembers SET Role = 2, Assigned_areas_count = $new_count WHERE Familymembershipid = '$memberid'");

           $this->db->transComplete();
           return $this->db->transStatus();
       } catch (\Exception $e) {
           return false;
       }
   }

   public function getCoordinatorAssignments($memberid) {
       $query = $this->db->query("SELECT village_name, panchayat_name, taluk_name, district_name FROM village_table 
                                 WHERE Coordinator_id = '$memberid' OR Coordinator_Two_id = '$memberid'");
       return $query->getResultArray();
   }

  public function addVillageData($state_id, $district, $taluk, $panchayat, $village) {
      $query = $this->db->query("SELECT * FROM village_table WHERE village_name = " . $this->db->escape($village) . " 
                                 AND panchayat_name = " . $this->db->escape($panchayat) . "
                                 AND taluk_name = " . $this->db->escape($taluk) . "
                                 AND district_name = " . $this->db->escape($district));
      if($query->getNumRows() > 0) {
          return false;
      }

      $st_query = $this->db->query("SELECT state_title FROM states WHERE state_id = $state_id");
      $st_row = $st_query->getRow();
      $state_name = $st_row ? $st_row->state_title : '';

      $sql = "INSERT INTO village_table (district_name, taluk_name, panchayat_name, village_name, State_id, State_name, isAssigned) 
              VALUES (" . $this->db->escape($district) . ", " . $this->db->escape($taluk) . ", " . $this->db->escape($panchayat) . ", " . $this->db->escape($village) . ", $state_id, " . $this->db->escape($state_name) . ", 0)";
      
      return $this->db->query($sql);
  }

  public function removeVillageData($state_id, $district, $taluk, $panchayat, $village) {
      // Check if village exists and is assigned
      $query = $this->db->query("SELECT isAssigned, Coordinator_id, Coordinator_Two_id FROM village_table WHERE village_name = " . $this->db->escape($village) . " 
                                 AND panchayat_name = " . $this->db->escape($panchayat) . "
                                 AND taluk_name = " . $this->db->escape($taluk) . "
                                 AND district_name = " . $this->db->escape($district));
      
      if($query->getNumRows() == 0) {
          return false; // Not found
      }
      
      $row = $query->getRow();
      if($row->isAssigned == 1 || !empty($row->Coordinator_id) || !empty($row->Coordinator_Two_id)) {
          return "assigned";
      }

      $sql = "DELETE FROM village_table WHERE village_name = " . $this->db->escape($village) . " 
              AND panchayat_name = " . $this->db->escape($panchayat) . "
              AND taluk_name = " . $this->db->escape($taluk) . "
              AND district_name = " . $this->db->escape($district);
      
      return $this->db->query($sql);
  }

  public function processRegisteration($name,$state_id,$district,$taluk,$panchayat,$village,  $street,$doorno,$pincode,$existfamilyid,$phoneno,$aadharno,$hashed_password,$documents){

   $getdistrictcode = $this->db->query("SELECT DISTINCT(district_code) AS district_code FROM panchayat_table WHERE district_name = '$district'");
   $getcode = $getdistrictcode->getRow();
   $districtcode = $getcode->district_code;

   $checkexistphoneno = $this->db->query("SELECT * FROM kaadaimembers WHERE Phonenumber = $phoneno");
   $existphoneno = $checkexistphoneno->getNumRows();

   $checkexistaadharno = $this->db->query("SELECT * FROM kaadaimembers WHERE Aadharnumber = $aadharno");
   $existaadharno = $checkexistaadharno->getNumRows();
   if($existphoneno > 0 || $existaadharno > 0){
      $session = session();
      $session->set("membererrorstatus","Mobile or Aadharnumber already exit");
      return false; // Replaced redirect with return false
   }
    // Trim for safe lookup
    $village_trimmed = trim($village);
    $panchayat_trimmed = trim($panchayat);
    $taluk_trimmed = trim($taluk);
    $district_trimmed = trim($district);

    $coord_row = $this->db->query("SELECT Coordinator_id, Coordinator_Two_id FROM village_table 
                                     WHERE LOWER(TRIM(village_name)) = LOWER(TRIM(" . $this->db->escape($village_trimmed) . ")) 
                                     AND LOWER(TRIM(panchayat_name)) = LOWER(TRIM(" . $this->db->escape($panchayat_trimmed) . ")) 
                                     AND LOWER(TRIM(taluk_name)) = LOWER(TRIM(" . $this->db->escape($taluk_trimmed) . ")) 
                                     AND LOWER(TRIM(district_name)) = LOWER(TRIM(" . $this->db->escape($district_trimmed) . "))")->getRow();

    $coordid = $coord_row ? $coord_row->Coordinator_id : null;
    $coordid_two = $coord_row ? $coord_row->Coordinator_Two_id : null;

    // Fallback: If coordinator is adding a member and lookup fails, assign them
    $session = session();
    if (empty($coordid) && $session->get('role') == 2) {
        $coordid = trim($session->get('Kaadaisoft_userId'));
    }

    $getstatequery = $this->db->query("SELECT state_title FROM states WHERE state_id = $state_id");
    $getstate = $getstatequery->getRow();
    $state = $getstate ? $getstate->state_title : '';

   $approved_status = (session()->get('role') == 1) ? 'Verified' : 'Pending';
   $membershipid = NULL; // Use NULL for pending members

   if ($approved_status == 'Verified') {
       // Get Max Numeric ID for THIS prefix (District-wise sequence)
       $max_query = $this->db->query("SELECT MAX(CAST(SUBSTRING(Familymembershipid, 4) AS UNSIGNED)) as max_num 
                                      FROM kaadaimembers 
                                      WHERE Familymembershipid LIKE '$districtcode%'");
       $max_row = $max_query->getRow();
       $next_num = ($max_row && $max_row->max_num) ? ($max_row->max_num + 1) : 1;
       
       $membershipid = $districtcode . sprintf('%05d', $next_num);
   }
    $current_user_id = session()->get('Kaadaisoft_userId');

    $query = $this->db->query("INSERT INTO kaadaimembers (Familymembershipid, Name, State, District, Taluk, Panchayat, Village, Street, Doornumber, Pincode, Existfamilyid, Phonenumber, Aadharnumber, Password, Memberimage, Aadharfrontimage, Aadharbackimage, Communitycertificate, Approvedstatus, Coordinator_id, Coordinator_Two_id, state_id, Id_who_assign_coord) 
                                VALUES (" . $this->db->escape($membershipid) . ", " . $this->db->escape($name) . ", " . $this->db->escape($state) . ", " . $this->db->escape($district) . ", " . $this->db->escape($taluk) . ", " . $this->db->escape($panchayat) . ", " . $this->db->escape($village) . ", " . $this->db->escape($street) . ", " . $this->db->escape($doorno) . ", " . $this->db->escape($pincode) . ", " . $this->db->escape($existfamilyid) . ", " . $this->db->escape($phoneno) . ", " . $this->db->escape($aadharno) . ", " . $this->db->escape($hashed_password) . ", " . $this->db->escape($documents[0]) . ", " . $this->db->escape($documents[1]) . ", " . $this->db->escape($documents[2]) . ", " . $this->db->escape($documents[3]) . ", '$approved_status', " . $this->db->escape($coordid) . ", " . $this->db->escape($coordid_two) . ", $state_id, " . $this->db->escape($current_user_id) . ")");

   if($query){
       return true;
   }
   else{
       return false;
   }
}

public function getApplications($counts) {
   $query = $this->db->query("SELECT * FROM kaadaimembers WHERE Approvedstatus = 'Pending' LIMIT 10 OFFSET $counts");
   return $query->getResult();
}

public function displayApplications() {
   
}

public function update_password($id, $hashedPassword) {
   return $this->db->table('kaadaimembers')->where('FamilymembershipId', $id)
                   ->update(['Password' => $hashedPassword]);
}
    public function getMemberUpdateRequests()
    {
        $session = session();
        $role = $session->get('role');
        $userId = $session->get('Kaadaisoft_userId');

        // Select all fields from requests and all fields from members (aliased for comparison)
        $fields = $this->db->getFieldNames('kaadaimembers');
        $select_old = "";
        foreach ($fields as $field) {
            $select_old .= ", m.$field as old_$field";
        }

        if ($role == 2) {
            $query = $this->db->query("SELECT r.*, m.Name as MemberName $select_old FROM member_edit_requests r JOIN kaadaimembers m ON r.Familymembershipid = m.Familymembershipid WHERE (LOWER(TRIM(m.Coordinator_id)) = LOWER('$userId') OR LOWER(TRIM(m.Coordinator_Two_id)) = LOWER('$userId') OR LOWER(TRIM(m.Id_who_assign_coord)) = LOWER('$userId')) AND r.status = 'Pending'");
        } else {
            $query = $this->db->query("SELECT r.*, m.Name as MemberName $select_old FROM member_edit_requests r JOIN kaadaimembers m ON r.Familymembershipid = m.Familymembershipid WHERE r.status = 'Pending'");
        }
        return $query->getResult();
    }

    public function approveMemberUpdate($request_id)
    {
        $query = $this->db->query("SELECT * FROM member_edit_requests WHERE id = $request_id");
        $request = $query->getRow();

        if ($request) {
            $data = json_decode($request->updated_data, true);

            // Check for duplicate Phone (Allow same phone for same family)
            if (!empty($data['Phonenumber'])) {
                // Get current member's family ID to allow sharing within family
                $currentMember = $this->db->table('kaadaimembers')->select('Familymembershipid, Existfamilyid')->where('Familymembershipid', $request->Familymembershipid)->get()->getRow();
                $myFamilyId = $currentMember ? ($currentMember->Existfamilyid ?: $currentMember->Familymembershipid) : $request->Familymembershipid;

                $checkPhoneBuilder = $this->db->table('kaadaimembers')
                    ->where('Phonenumber', $data['Phonenumber'])
                    ->where('Familymembershipid !=', $request->Familymembershipid); // Don't match self

                // If we have a family ID, exclude members of the same family from the conflict check
                if (!empty($myFamilyId)) {
                    $checkPhoneBuilder->groupStart()
                        ->where('Existfamilyid !=', $myFamilyId)
                        ->where('Familymembershipid !=', $myFamilyId)
                        ->groupEnd();
                }
                
                $checkPhoneCount = $checkPhoneBuilder->countAllResults();

                if ($checkPhoneCount > 0) {
                    session()->setFlashdata('approvederror', "Cannot approve: Phone number already exists for another family.");
                    return false;
                }
            }

            // Check for duplicate Aadhaar
            if (!empty($data['Aadharnumber'])) {
                $checkAadhaar = $this->db->table('kaadaimembers')
                    ->where('Aadharnumber', $data['Aadharnumber'])
                    ->where('Familymembershipid !=', $request->Familymembershipid)
                    ->countAllResults();

                if ($checkAadhaar > 0) {
                    session()->setFlashdata('approvederror', "Cannot approve: Aadhaar number already exists for another member.");
                    return false;
                }
            }

            // Composite Check for Phone + Aadhaar to prevent DB crash
            $checkPhone = !empty($data['Phonenumber']) ? $data['Phonenumber'] : null;
            $checkAadhar = !empty($data['Aadharnumber']) ? $data['Aadharnumber'] : null;

            if ($checkPhone === null || $checkAadhar === null) {
                 $current = $this->db->table('kaadaimembers')->select('Phonenumber, Aadharnumber')->where('Familymembershipid', $request->Familymembershipid)->get()->getRow();
                 if ($current) {
                     if ($checkPhone === null) $checkPhone = $current->Phonenumber;
                     if ($checkAadhar === null) $checkAadhar = $current->Aadharnumber;
                 }
            }
            
            if ($checkPhone && $checkAadhar) {
                 $compositeCheck = $this->db->table('kaadaimembers')
                     ->where('Phonenumber', $checkPhone)
                     ->where('Aadharnumber', $checkAadhar)
                     ->where('Familymembershipid !=', $request->Familymembershipid)
                     ->countAllResults();
                     
                 if ($compositeCheck > 0) {
                     session()->setFlashdata('approvederror', "Cannot approve: This Phone Number and Aadhaar combination already exists (Duplicate Aadhaar likely).");
                     return false;
                 }
            }

            if (isset($data['MemberRole']) && $data['MemberRole'] === 'Head') {
                $membersModel = new \App\Models\MembersModel();
                $currentMember = $this->db->table('kaadaimembers')->select('Familymembershipid, Existfamilyid')->where('Familymembershipid', $request->Familymembershipid)->get()->getRow();
                $myFamilyId = $currentMember ? ($currentMember->Existfamilyid ?: $currentMember->Familymembershipid) : $request->Familymembershipid;
                
                // Track current head to demote
                $old_head_new_role = $membersModel->autoUpdateFamilyRoles($myFamilyId, $request->Familymembershipid);
                
                // Demote existing head (if any)
                $this->db->table('kaadaimembers')
                    ->groupStart()
                        ->where('Existfamilyid', $myFamilyId)
                        ->orWhere('Familymembershipid', $myFamilyId)
                    ->groupEnd()
                    ->where('MemberRole', 'Head')
                    ->where('Familymembershipid !=', $request->Familymembershipid)
                    ->update(['MemberRole' => $old_head_new_role]);
            }

            $this->db->table('kaadaimembers')->where('Familymembershipid', $request->Familymembershipid)
            ->update($data); // Note: update() returns bool

            // Check if update was successful (or at least ran without error)
            // Codeigniter's update() returns true on success.
            
            $this->db->table('member_edit_requests')->where('id', $request_id)
            ->update(['status' => 'Approved', 'updated_at' => date('Y-m-d H:i:s')]);
            
            return true;
        }
        return false;
    }

    public function rejectMemberUpdate($request_id)
    {
        return $this->db->table('member_edit_requests')->where('id', $request_id)
        ->update(['status' => 'Rejected', 'updated_at' => date('Y-m-d H:i:s')]);
    }

}
?>