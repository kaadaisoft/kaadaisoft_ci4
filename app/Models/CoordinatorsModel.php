<?php
namespace App\Models;

use CodeIgniter\Model;

class CoordinatorsModel extends Model
{
    protected $db;

    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getTotalCoordinators()
    {
        $query = $this->db->query("SELECT * FROM kaadaimembers WHERE Role = 2 AND isShow = 1");
        return count($query->getResultArray());
    }

    public function getTotalundermembers($coordid)
    {
        $query = $this->db->query("SELECT * FROM kaadaimembers WHERE (Coordinator_id = '$coordid' OR Coordinator_Two_id = '$coordid') AND isShow = 1");
        return count($query->getResultArray());
    }

    public function getCoordinators($counts = null)
    {
        $sql = "SELECT km.*, GROUP_CONCAT(vt.village_name) AS VillageNames
        FROM kaadaimembers AS km LEFT JOIN village_table AS vt ON (km.Familymembershipid = vt.Coordinator_id OR km.Familymembershipid = vt.Coordinator_Two_id) WHERE km.Role = 2 AND km.isShow = 1 GROUP BY km.Familymembershipid ORDER BY km.updated_at DESC";
        
        if ($counts !== null) {
            $sql .= " LIMIT 10 OFFSET $counts";
        }
        
        $query = $this->db->query($sql);
        return $query->getResult();
    }

    public function getUndermember($counts, $coordid)
    {
        $query = $this->db->query("SELECT * FROM kaadaimembers WHERE (Coordinator_id = '$coordid' OR Coordinator_Two_id = '$coordid') AND isShow = 1 LIMIT 10 OFFSET $counts");
        return $query->getResult();
    }

    public function getVillages()
    {
        $query = $this->db->query("SELECT * FROM villages ORDER BY village_name ASC");
        return $query->getResultArray();
    }

    public function getAreas()
    {
        $query = $this->db->query("SELECT * FROM areas ");
        return $query->getResultArray();
    }

    public function getAreamembers($area)
    {
        $query = $this->db->query("SELECT * FROM kaadaimembers WHERE Area = '$area' AND Role = 3");
        return $query->getResultArray();
    }

    public function getCoordinatoraddress($aadhar)
    {
        $query = $this->db->query("SELECT * FROM kaadaimembers WHERE Aadharnumber = '$aadhar' AND Role = 2");
        return $query->getResult();
    }

    public function getCoordinatorsSearchfields($searchfields)
    {
        $query = $this->db->query("SELECT km.*, 
       GROUP_CONCAT(vt.village_name) AS VillageNames FROM kaadaimembers AS km
       LEFT JOIN village_table AS vt ON (km.Familymembershipid = vt.Coordinator_id OR km.Familymembershipid = vt.Coordinator_Two_id) WHERE (km.Name LIKE '%$searchfields%' OR km.Familymembershipid LIKE '%$searchfields%' OR km.Phonenumber LIKE '%$searchfields%' OR km.Aadharnumber LIKE '%$searchfields%' OR km.State LIKE '%$searchfields%'  OR km.District LIKE '%$searchfields%' OR km.Taluk LIKE '%$searchfields%' OR km.Panchayat LIKE '%$searchfields%') AND km.Role = 2 AND km.isShow = 1 GROUP BY km.Familymembershipid;");

        return $query->getResult();
    }

    public function addCoordinator($name, $aadhar, $phoneno, $village, $email, $role)
    {
        $lastid = $this->db->query("SELECT COUNT(id) AS lastid  FROM koorai WHERE Role = 2");
        $getnewid = $lastid->getRow();
        $fetchnewid = $getnewid->lastid;
        $newid = $fetchnewid + 1;
        $newcoordid = str_pad($newid, 4, "0", STR_PAD_LEFT);
        $userid = "PONKOORAICOR" . $newcoordid;
        $addcoordinator = $this->db->query("INSERT INTO koorai(Name,Userid,Aadhar,Mobile,Villageid,Email,Role,password) VALUES('$name','$userid','$aadhar','$phoneno',$village,'$email','$role',123456)");
        $geteventname = $this->db->query("SELECT EventName FROM eventtaxes WHERE SNo = (SELECT MAX(SNo) FROM eventtaxes);");
        $lasteventname = $geteventname->getRow();
        $eventname = $lasteventname->EventName;
        $addcoordtoevent = $this->db->query("INSERT INTO $eventname(Name,Mobile,Aadhar,Role,Userid,Villageid,isShow) VALUES('$name','$phoneno','$aadhar','$role','$userid',$village,1)");
        if ($addcoordinator) {
            return true;
        } else {
            return false;
        }
    }

    public function getCoordinatorsdata($id)
    {
        $getCoordinator = $this->db->query("SELECT * FROM kaadaimembers WHERE Familymembershipid = '$id'");
        return $getCoordinator->getRow();
    }

    public function assignCoordinator($aadhar)
    {
        $assigndata = $this->db->query("UPDATE koorai SET Role = 2 WHERE Aadhar = $aadhar");
        if ($assigndata) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCoordinator($id, $name, $aadhar, $phoneno, $area, $role)
    {
        $addcoordinator = $this->db->query("UPDATE koorai SET Name = '$name',Aadhar = '$aadhar',Mobile = '$phoneno',Assigned_area = '$area' WHERE id = $id AND Role = 2");
        if ($addcoordinator) {
            return true;
        } else {
            return false;
        }
    }

    public function coordmovetotrash($id)
    {
        $movetotrashaction = $this->db->query("UPDATE kaadaimembers SET isShow = 0 WHERE Familymembershipid = '$id'");
        if (!$movetotrashaction) {
            return false;
        } else {
            return true;
        }
    }

    public function getunderMembers($coordid)
    {
        $memberslist = $this->db->query("SELECT * FROM kaadaimembers WHERE Role = 3 AND (Coordinator_id = '$coordid' OR Coordinator_Two_id = '$coordid')");
        return $memberslist->getResultArray();
    }

    public function getCoordinatordata($coord_id)
    {
        $coord_data = $this->db->query("SELECT km.*, GROUP_CONCAT(vt.village_name) AS VillageNames
        FROM kaadaimembers AS km LEFT JOIN village_table AS vt ON (km.Familymembershipid = vt.Coordinator_id OR km.Familymembershipid = vt.Coordinator_Two_id) WHERE km.Familymembershipid = '$coord_id' AND km.isShow = 1 GROUP BY km.Familymembershipid;");
        return $coord_data->getRow();
    }

    public function processCoordinatorupdate($Familymembershipid, $data)
    {
        $session = session();
        $Familymembershipid = trim($Familymembershipid);
        
        // Check uniqueness for Phone (Allow same phone for same family)
        if (!empty($data['Phonenumber'])) {
            // Get current member's family ID to allow sharing within family
            $currentMember = $this->db->table('kaadaimembers')->select('Familymembershipid, Existfamilyid')->where('Familymembershipid', $Familymembershipid)->get()->getRow();
            $myFamilyId = $currentMember ? ($currentMember->Existfamilyid ?: $currentMember->Familymembershipid) : $Familymembershipid;

            $checkPhoneBuilder = $this->db->table('kaadaimembers')
                ->where('Phonenumber', $data['Phonenumber'])
                ->where('Familymembershipid !=', $Familymembershipid); // Don't match self

            // If we have a family ID, exclude members of the same family from the conflict check
            if (!empty($myFamilyId)) {
                $checkPhoneBuilder->groupStart()
                    ->where('Existfamilyid !=', $myFamilyId)
                    ->where('Familymembershipid !=', $myFamilyId)
                    ->groupEnd();
            }

            $checkPhoneCount = $checkPhoneBuilder->countAllResults();

            if ($checkPhoneCount > 0) {
                 // Set error message in session for controller to pick up
                 $session->setFlashdata("coorderrorstatus", "Phone number already exists for another family.");
                 return false;
            }
        }
        
        // Aadhaar uniqueness check
        if (!empty($data['Aadharnumber'])) {
            $checkAadhar = $this->db->table('kaadaimembers')
                ->where('Aadharnumber', $data['Aadharnumber'])
                ->where('Familymembershipid !=', $Familymembershipid)
                ->countAllResults();
            if ($checkAadhar > 0) {
                 $session->setFlashdata("coorderrorstatus", "Aadhar number already exists.");
                 return false;
            }
        }

        // Check if anything actually changed (ignoring updated_at)
        $currentRecord = $this->db->table('kaadaimembers')->where('Familymembershipid', $Familymembershipid)->get()->getRowArray();
        if ($currentRecord) {
            $changed = false;
            foreach ($data as $key => $value) {
                if ($key === 'updated_at' || !array_key_exists($key, $currentRecord)) continue;
                $dbVal = $currentRecord[$key];
                $newVal = $value;
                if (trim((string)$dbVal) !== trim((string)$newVal)) {
                    $changed = true;
                    break;
                }
            }
            if (!$changed) {
                return 'no_changes';
            }
        }

        return $this->db->table('kaadaimembers')->where('TRIM(Familymembershipid)', $Familymembershipid)->update($data);
    }


    public function processUpdateimages($Familymembershipid, $images)
    {

        $this->db->table('kaadaimembers')->where('Familymembershipid', $Familymembershipid)->update($images);
        $names = array_keys($images);
        $imagenames = ["Memberimage", "Aadharfrontimage", "Aadharbackimage", "Communitycertificate"];
        // Loop logic seems redundant if update($images) works, but keeping original logic converted
        /* 
           The loop below was updating single columns but update($images) does it all if array keys match column names.
           Assuming $images keys match DB columns.
        */
    }

    public function viewMemberundercoord($familyid)
    {
        $query = $this->db->query("SELECT * FROM kaadaimembers WHERE (Coordinator_id = '$familyid' OR Coordinator_Two_id = '$familyid') AND Approvedstatus = 'Verified' AND NOT Familymembershipid = '$familyid' AND MemberRole = 'Head' AND Role = 3");
        return $query->getResult();
    }

    public function getMemberdata($member_id)
    {
        $member_data = $this->db->query("SELECT * FROM kaadaimembers WHERE Familymembershipid = '$member_id'");
        return $member_data->getRowArray();
    }

    public function getMembereventparticipation($member_id)
    {
        $eventparticipation = $this->db->query("SELECT pr.* 
     FROM paymentreceipts pr JOIN (SELECT Eventid, MAX(dues) as max_dues FROM paymentreceipts WHERE Familymembershipid = '$member_id' GROUP BY Eventid) max_dues_subquery ON pr.Eventid = max_dues_subquery.Eventid AND pr.dues = max_dues_subquery.max_dues WHERE pr.Familymembershipid = '$member_id';");
        return $eventparticipation->getResult();
    }

    public function getPendingamount($member_id) {
    $pending_amount = $this->db->query("
        SELECT el.Id, el.EventName as eventname, el.TaxAmount as Taxamount,
        IFNULL(pr.balanceamount, el.TaxAmount) AS balanceamount,
        pr.max_dues as dues
        FROM eventlist el
        LEFT JOIN (
            SELECT pr.Eventid, pr.eventname, pr.Taxamount, pr.balanceamount, max_dues_subquery.max_dues
            FROM paymentreceipts pr
            JOIN (
                SELECT Eventid, MAX(dues) AS max_dues
                FROM paymentreceipts
                WHERE Familymembershipid = '$member_id'
                GROUP BY Eventid
            ) max_dues_subquery
            ON pr.Eventid = max_dues_subquery.Eventid
            AND pr.dues = max_dues_subquery.max_dues
            WHERE pr.Familymembershipid = '$member_id'
        ) pr ON el.Id = pr.Eventid
        WHERE el.isShow = 1
    ");
    return $pending_amount->getResult();
}


}
?>