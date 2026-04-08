<?php
namespace App\Models;

use CodeIgniter\Model;

class PaymentsModel extends Model
{
    protected $encrypter;

    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->encrypter = \Config\Services::encrypter();
    }

    public function getMembersdetails($counts)
    {
        $session = session();
        if ($session->get('role') == 2) {
            $coord_id = $session->get("Kaadaisoft_userId");
            $query = $this->db->query("SELECT * FROM kaadaimembers WHERE Role = 3 AND (Coordinator_id = '$coord_id' OR Coordinator_Two_id = '$coord_id') AND isShow = 1 AND Approvedstatus = 'Verified' AND MemberRole = 'Head' LIMIT 10 OFFSET $counts");
        } else {
            $query = $this->db->query("SELECT * FROM kaadaimembers WHERE (Role = 3 OR Role = 2) AND isShow = 1 AND Approvedstatus = 'Verified' AND MemberRole = 'Head' LIMIT 10 OFFSET $counts");
        }
        
        $results = $query->getResultArray();
        foreach ($results as &$row) {
            if (!empty($row['Aadharnumber'])) {
                try {
                    $row['Aadharnumber'] = $this->encrypter->decrypt(base64_decode($row['Aadharnumber']));
                } catch (\Exception $e) {}
            }
        }
        return $results;
    }

    public function get_member_collected($eventid, $familyid)
    {
        $query = $this->db->query("SELECT SUM(paidamount) AS total FROM paymentreceipts WHERE eventid = $eventid AND Familymembershipid = '$familyid'");
        $row = $query->getRow();
        return $row ? (int) $row->total : 0;
    }

    public function getTotalmembers()
    {
        $session = session();
        if ($session->get('role') == 2) {
            $coord_id = $session->get("Kaadaisoft_userId");
            $query = $this->db->query("SELECT * FROM kaadaimembers WHERE Role = 3 AND (Coordinator_id = '$coord_id' OR Coordinator_Two_id = '$coord_id') AND isShow = 1 AND Approvedstatus = 'Verified' AND MemberRole = 'Head'");
            return count($query->getResultArray());
        }
        $query = $this->db->query("SELECT * FROM kaadaimembers WHERE (Role = 3 OR Role = 2) AND isShow = 1 AND Approvedstatus = 'Verified' AND MemberRole = 'Head'");
        return count($query->getResultArray());
    }

    public function getMembersSearchfields($searchfields)
    {
        $session = session();
        $role_filter = "(Role = 3 OR Role = 2) AND MemberRole = 'Head' AND isShow = 1 AND Approvedstatus = 'Verified'";
        
        if ($session->get('role') == 2) {
            $coord_id = $session->get("Kaadaisoft_userId");
            $role_filter = "Role = 3 AND (Coordinator_id = '$coord_id' OR Coordinator_Two_id = '$coord_id') AND MemberRole = 'Head' AND isShow = 1 AND Approvedstatus = 'Verified'";
        }

        if (preg_match('/^[0-9]{12}$/', $searchfields)) {
            $query = $this->db->query("SELECT * FROM kaadaimembers WHERE ($role_filter) AND (Aadhar_hash = ?)", [hash('sha256', $searchfields)]);
        } else {
            $query = $this->db->query("SELECT * FROM kaadaimembers WHERE ($role_filter) AND (Name LIKE '%$searchfields%' OR Phonenumber LIKE '%$searchfields%' OR Taluk LIKE '%$searchfields%' OR Familymembershipid LIKE '%$searchfields%' OR District LIKE '%$searchfields%')");
        }

        $results = $query->getResultArray();
        foreach ($results as &$row) {
            if (!empty($row['Aadharnumber'])) {
                try {
                    $row['Aadharnumber'] = $this->encrypter->decrypt(base64_decode($row['Aadharnumber']));
                } catch (\Exception $e) {}
            }
        }
        return $results;
    }

    public function getMemberforPayment($memberid)
    {
        $query = $this->db->query("SELECT * FROM kaadaimembers WHERE Familymembershipid = '$memberid'");
        if ($query) {
            $row = $query->getRow();
            if ($row && !empty($row->Aadharnumber)) {
                try {
                    $row->Aadharnumber = $this->encrypter->decrypt(base64_decode($row->Aadharnumber));
                } catch (\Exception $e) {}
            }
            return $row;
        } else {
            return false;
        }
    }

    public function getEventsdetails($year)
    {
        $query = $this->db->query("SELECT * FROM eventlist WHERE Year = $year AND isShow = 1");
        return $query->getResultArray();
    }

    public function getEventdata($eventid)
    {
        $query = $this->db->query("SELECT * FROM eventlist WHERE Id = $eventid AND isShow = 1");
        return $query->getRow();
    }

    public function getEventsyear()
    {
        $query = $this->db->query("SELECT DISTINCT(Year) FROM eventlist WHERE isShow = 1");
        return $query->getResultArray();
    }

    public function getStates()
    {
        $query = $this->db->query("SELECT * FROM states ORDER BY state_title ASC");
        return $query->getResultArray();
    }

    public function getDistrictslist($stateid)
    {
        $session = session();
        if ($session->get("role") == 2) {
            $CoordinatorId = $session->get("Kaadaisoft_userId");
            $query = $this->db->query("SELECT distinct(district_name) AS district_name FROM village_table WHERE Coordinator_id = '$CoordinatorId' OR Coordinator_Two_id = '$CoordinatorId' ORDER BY district_name ASC");
        } else {
            $query = $this->db->query("SELECT distinct(district_name) AS district_name FROM village_table WHERE State_id = $stateid ORDER BY district_name ASC");
        }
        return $query->getResultArray();
    }

    public function getTaluklist($district_name)
    {
        $session = session();
        if ($session->get("role") == 2) {
            $CoordinatorId = $session->get("Kaadaisoft_userId");
            $query = $this->db->query("SELECT distinct(taluk_name) AS taluk_name FROM village_table WHERE district_name = '$district_name' AND (Coordinator_id = '$CoordinatorId' OR Coordinator_Two_id = '$CoordinatorId') ORDER BY taluk_name ASC");
        } else {
            $query = $this->db->query("SELECT distinct(taluk_name) AS taluk_name FROM village_table WHERE district_name = '$district_name' ORDER BY taluk_name ASC");
        }
        return $query->getResultArray();
    }

    public function getVillagelist($localareaid)
    {
        $query = $this->db->query("SELECT villages.village_id,villages.village_name FROM villages WHERE EXISTS (SELECT local_area_id FROM local_areas WHERE local_areas.local_area_id = villages.local_area_id AND local_area_id  = $localareaid) ORDER BY villages.village_name ASC");
        return $query->getResultArray();
    }

    public function getPanchayatlist($taluk_name)
    {
        $session = session();
        if ($session->get("role") == 2) {
            $CoordinatorId = $session->get("Kaadaisoft_userId");
            $query = $this->db->query("SELECT DISTINCT(panchayat_name) AS panchayat_name FROM village_table WHERE taluk_name = '$taluk_name' AND (Coordinator_id = '$CoordinatorId' OR Coordinator_Two_id = '$CoordinatorId') ORDER BY panchayat_name ASC");
        } else {
            $query = $this->db->query("SELECT DISTINCT(panchayat_name) AS panchayat_name FROM village_table WHERE taluk_name = '$taluk_name' ORDER BY panchayat_name ASC");
        }
        return $query->getResultArray();
    }

    public function getVillagelistByNames($panchayat_name)
    {
        $session = session();
        if ($session->get("role") == 2) {
            $CoordinatorId = $session->get("Kaadaisoft_userId");
            $query = $this->db->query("SELECT DISTINCT(village_name) AS village_name FROM village_table WHERE panchayat_name = '$panchayat_name' AND (Coordinator_id = '$CoordinatorId' OR Coordinator_Two_id = '$CoordinatorId') ORDER BY village_name ASC");
        } else {
            $query = $this->db->query("SELECT DISTINCT(village_name) AS village_name FROM village_table WHERE panchayat_name = '$panchayat_name' ORDER BY village_name ASC");
        }
        return $query->getResultArray();
    }

    public function getEventslist()
    {
        $query = $this->db->query("SELECT * FROM eventlist WHERE isShow = 1");
        return $query->getResultArray();
    }

    public function getEventsByYear($eventyear)
    {
        $query = $this->db->query("SELECT * FROM eventlist WHERE Year = $eventyear AND isShow = 1");
        return $query->getResultArray();
    }
    public function getEventswithyear($year)
    {
        $query = $this->db->query("SELECT * FROM eventlist WHERE year = $year AND isShow = 1");
        return $query->getResultArray();
    }

    public function getPaidunpaidusers($eventid = null, $status = null, $stateid = null, $districtname = null, $talukname = null, $panchayatname = null, $villagename = null, $count = 0)
    {
        $builder = $this->db->table('kaadaimembers km');
        $builder->select("
            km.Familymembershipid, 
            km.Name, 
            km.Approvedstatus, 
            pr.paymentdate, 
            pr.paidamount, 
            km.Phonenumber AS Mobile, 
            km.Taluk AS MemberTaluk, 
            km.Aadharnumber,
            pr.eventid, 
            pr.eventname, 
            pr.balanceamount
        ");
    
        $builder->join('paymentreceipts pr', 
            'pr.Familymembershipid = km.Familymembershipid AND pr.eventid = ' . (int)$eventid, 
            'left'
        );
    
        if (!empty($stateid)) {
            $builder->where('km.state_id', $stateid);
        }
        if (!empty($districtname)) {
            $builder->where('km.District', $districtname);
        }
        if (!empty($talukname)) {
            $builder->where('km.Taluk', $talukname);
        }
        if (!empty($panchayatname)) {
            $builder->where('km.Panchayat', $panchayatname);
        }
        if (!empty($villagename)) {
            $builder->where('km.Village', $villagename);
        }
    
        $session = session();
        if ($session->get('role') == 2) {
            $coord_id = $session->get("Kaadaisoft_userId");
            $builder->groupStart()
                    ->where('km.Coordinator_id', $coord_id)
                    ->orWhere('km.Coordinator_Two_id', $coord_id)
                    ->groupEnd();
            $builder->where('km.Role', 3);
        } else {
            $builder->whereIn('km.Role', [2, 3]);
        }
        $builder->where('km.MemberRole', 'Head');
        $builder->where('km.Approvedstatus', 'Verified');
    
        if ($status == "Pending") {
            $builder->groupStart();
            $builder->where('pr.Familymembershipid IS NULL');
            $builder->orWhere('pr.status', 'Pending');
            $builder->groupEnd();
        } else {
            $builder->where('pr.status', 'Paid');
        }
    
        $builder->limit(10, $count);
    
        $results = $builder->get()->getResultArray();
        foreach ($results as &$row) {
            if (!empty($row['Aadharnumber'])) {
                try {
                    $row['Aadharnumber'] = $this->encrypter->decrypt(base64_decode($row['Aadharnumber']));
                } catch (\Exception $e) {}
            }
        }
        return $results;
    }
    
    public function getPaidorunpaidusers($eventid = null, $status = null, $stateid = null, $districtname = null, $talukname = null, $panchayatname = null, $villagename = null)
    {
        $builder = $this->db->table('kaadaimembers km');
        $builder->select("km.Familymembershipid");
        $builder->join('paymentreceipts pr', 
            'pr.Familymembershipid = km.Familymembershipid AND pr.eventid = ' . (int)$eventid, 
            'left'
        );
    
        if (!empty($stateid)) {
            $builder->where('km.state_id', $stateid);
        }
        if (!empty($districtname)) {
            $builder->where('km.District', $districtname);
        }
        if (!empty($talukname)) {
            $builder->where('km.Taluk', $talukname);
        }
        if (!empty($panchayatname)) {
            $builder->where('km.Panchayat', $panchayatname);
        }
        if (!empty($villagename)) {
            $builder->where('km.Village', $villagename);
        }
    
        $session = session();
        if ($session->get('role') == 2) {
            $coord_id = $session->get("Kaadaisoft_userId");
            $builder->groupStart()
                    ->where('km.Coordinator_id', $coord_id)
                    ->orWhere('km.Coordinator_Two_id', $coord_id)
                    ->groupEnd();
            $builder->where('km.Role', 3);
        } else {
            $builder->whereIn('km.Role', [2, 3]);
        }
        $builder->where('km.MemberRole', 'Head');
        $builder->where('km.Approvedstatus', 'Verified');
    
        if ($status == "Pending") {
            $builder->groupStart();
            $builder->where('pr.Familymembershipid IS NULL');
            $builder->orWhere('pr.status', 'Pending');
            $builder->groupEnd();
        } else {
            $builder->where('pr.status', 'Paid');
        }
    
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getVillagedata($villageid)
    {
        $query = $this->db->query("SELECT * FROM villages WHERE village_id = $villageid");
        return $query->getRow();
    }

    public function getCitieslist($districtid)
    {
        $query = $this->db->query("SELECT city.id,city.name FROM city WHERE EXISTS (SELECT districtid FROM districts WHERE city.districtid = districts.districtid AND districtid = $districtid)");
        return $query->getResultArray();
    }

    public function getPaydetails($memberid, $eventid)
    {
        $query = $this->db->query("SELECT SUM(paidamount) AS paidamount FROM paymentreceipts WHERE Familymembershipid = '$memberid' AND eventid = $eventid");
        return $query->getRow();
    }

    public function getEventname($eventid)
    {
        $query = $this->db->query("SELECT EventName FROM eventlist WHERE Id = $eventid AND isShow = 1");
        return $query->getRow();
    }

    public function getFilteredmembers($villageid, $eventid, $status)
    {
        $eventquery = $this->db->query("SELECT EventName FROM eventlist WHERE Id = $eventid AND isShow = 1");
        $eventdata = $eventquery->getRow();
        $eventname = $eventdata->EventName;
        $query = $this->db->query("SELECT * FROM $eventname WHERE Villageid = $villageid AND isPaid = '$status'");
        return $query->getResultArray();
    }

    public function getFilteredmembersdetails($searchfields, $villageid, $eventid, $status)
    {
        $eventquery = $this->db->query("SELECT EventName FROM eventlist WHERE Id = $eventid AND isShow = 1");
        $eventdata = $eventquery->getRow();
        $eventname = $eventdata->EventName;
        $query = $this->db->query("SELECT * FROM $eventname WHERE Name LIKE '%$searchfields%' OR Mobile LIKE '%$searchfields%' OR Aadhar LIKE '%$searchfields%' OR Userid LIKE '%$searchfields%' OR Area LIKE '%$searchfields%' HAVING(Villageid = $villageid AND isPaid = '$status')");
        return $query->getResultArray();
    }

    public function saveTaxreport($eventid, $eventname, $fromdate, $todate, $taxamount, $year, $memberid, $membermobile, $membertaluk, $name, $paymenttype, $paidamount, $bankname, $transactionid, $banknameforcheckque, $checkqueno, $upitranscationid, $cashtype, $balanceamount, $paymentdate, $wheretopay, $receivedby = null, $other_bank_name = null)
    {

        $duecount = $this->db->query("SELECT count(Familymembershipid) AS dues FROM paymentreceipts WHERE eventid = $eventid AND Familymembershipid = '$memberid'");

        $currentdue = "";
        // $receiptdate = date("Y-m-d");
        $collectedamount = $taxamount - $balanceamount;
        $due = $duecount->getRow();
        $getdue = $due->dues;
        $currentdue = (int) $getdue + 1;
        $status = "";
        if ($balanceamount == 0) {
            $status = "Paid";
        } else {
            $status = "Pending";
        }

        $updatereport = $this->db->query("UPDATE paymentreceipts SET status = null WHERE Familymembershipid = '$memberid' AND eventid = $eventid AND status = 'Pending'");

        $savereceipt = $this->db->query("INSERT INTO paymentreceipts (eventid,eventname,fromdate,todate,year,Familymembershipid,Membername,Mobile,MemberTaluk,Taxamount,paymentdate,dues,paidamount,Collectedamount,balanceamount,paymenttype,bankname,transactionid,banknameforcheckque,checkqueno,upitransactionid,wheretopay,status,receivedby,other_bank_name) VALUES($eventid,'$eventname','$fromdate','$todate',$year,'$memberid','$name',$membermobile,'$membertaluk',$taxamount,'$paymentdate',$currentdue,$paidamount,$collectedamount,$balanceamount,'$paymenttype','$bankname','$transactionid','$banknameforcheckque','$checkqueno','$upitranscationid','$wheretopay','$status','$receivedby','$other_bank_name')");
        if ($updatereport && $savereceipt) {
            return $currentdue;
        } else {
            return false;
        }
    }

    public function getMember($userid)
    {
        $query = $this->db->query("SELECT * FROM kaadaimembers WHERE Familymembershipid = '$userid'");
        $row = $query->getRow();
        if ($row && !empty($row->Aadharnumber)) {
            try {
                $row->Aadharnumber = $this->encrypter->decrypt(base64_decode($row->Aadharnumber));
            } catch (\Exception $e) {}
        }
        return $row;
    }

    public function getReceiptdetail($userid, $dues, $eventid)
    {
        $query = $this->db->query("SELECT * FROM paymentreceipts WHERE Familymembershipid = '$userid' AND dues = $dues HAVING(eventid = $eventid)");
        return $query->getRow();
    }

    public function searchEventforpayment($event)
    {
        $query = $this->db->query("SELECT * FROM eventlist WHERE EventName LIKE '%$event%' AND isShow = 1");
        return $query->getResultArray();
    }

    public function getReceiptlist($memberid)
    {
        $query = $this->db->query("SELECT * FROM paymentreceipts WHERE Familymembershipid = '$memberid' AND status IS NOT NULL ORDER BY eventid, dues ASC");
        return $query->getResultArray();
    }

    public function getCoordinatordata($coord_id)
    {
        $query = $this->db->query("SELECT kaadaimembers.Familymembershipid,kaadaimembers.Aadharnumber,kaadaimembers.State,village_table.* FROM kaadaimembers LEFT JOIN village_table ON (kaadaimembers.Familymembershipid = village_table.Coordinator_id OR kaadaimembers.Familymembershipid = village_table.Coordinator_Two_id) WHERE kaadaimembers.Familymembershipid = '$coord_id' AND kaadaimembers.isShow = 1");
        $row = $query->getRow();
        if ($row && !empty($row->Aadharnumber)) {
            try {
                $row->Aadharnumber = $this->encrypter->decrypt(base64_decode($row->Aadharnumber));
            } catch (\Exception $e) {}
        }
        return $row;
    }

    public function getCoordinatorTaluks($coord_id)
    {
        $query = $this->db->query("SELECT DISTINCT(taluk_name) AS taluk_name FROM village_table WHERE Coordinator_id = '$coord_id' OR Coordinator_Two_id = '$coord_id'");
        return $query->getResultArray();
    }
}
?>