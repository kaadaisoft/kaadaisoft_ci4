<?php
namespace App\Models;

use CodeIgniter\Model;

class ReportsModel extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getTotalreports()
    {
        $query = $this->db->query("SELECT * FROM kaadaimembers WHERE isShow = 1 AND MemberRole = 'Head' AND Approvedstatus = 'Verified'");
        return count($query->getResultArray());
    }

    public function getreports($counts = 0)
    {
        $sql = "SELECT * FROM kaadaimembers WHERE isShow = 1 AND MemberRole = 'Head' AND Approvedstatus = 'Verified' LIMIT 10";
        if ($counts > 0) {
            $sql .= " OFFSET $counts";
        }
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function getReportswithlimit($counts)
    {
        $query = $this->db->query("SELECT * FROM kaadaimembers WHERE isShow = 1 AND MemberRole = 'Head' AND Approvedstatus = 'Verified' LIMIT 10 OFFSET $counts");
        return $query->getResultArray();
    }

    public function getReportsSearchfields($searchfields)
    {
        // Safe binding
        $sql = "SELECT * FROM kaadaimembers WHERE (Name LIKE ? OR Familymembershipid LIKE ? OR Taluk LIKE ? OR Phonenumber LIKE ? OR Aadharnumber LIKE ? OR Role LIKE ?) AND MemberRole = 'Head' AND isShow = 1 AND Approvedstatus = 'Verified'";
        $like = "%$searchfields%";
        $query = $this->db->query($sql, [$like, $like, $like, $like, $like, $like]);
        return $query->getResultArray();
    }

    public function getReportdata($id)
    {
        $query = $this->db->query("SELECT * FROM report WHERE Id = ?", [$id]);
        return $query->getResultArray();
    }

    public function getMemberforPayment($userid)
    {
        $query = $this->db->query("SELECT * FROM kaadaimembers WHERE Userid = ?", [$userid]);
        return $query->getRow();
    }

    public function getEventyears()
    {
        $query = $this->db->query("SELECT DISTINCT(Year) FROM eventlist");
        return $query->getResultArray();
    }

    public function getEventslistbyYear($year)
    {
        $query = $this->db->query("SELECT * FROM eventlist WHERE year = ?", [$year]);
        return $query->getResultArray();
    }

    public function getSearcheventslist($searchdata)
    {
        $sql = "SELECT * FROM eventlist WHERE EventName LIKE ?";
        $query = $this->db->query($sql, ["%$searchdata%"]);
        return $query->getResultArray();
    }

    public function getSearchFilteredeventslist($searchdata)
    {
        // Same as above?
        return $this->getSearcheventslist($searchdata);
    }

    public function getMembersHistory($eventid, $status)
    {
        $builder = $this->db->table('kaadaimembers km');
        $builder->select('km.Familymembershipid, km.Role, km.Name, km.Phonenumber AS Mobile, MAX(pr.Taxamount) AS Taxamount, SUM(pr.paidamount) AS paidamount, MIN(pr.balanceamount) AS balancemount, MAX(pr.paymentdate) AS paymentdate');
        $escapedEventId = (int)$eventid;
        $builder->join('paymentreceipts pr', "pr.Familymembershipid = km.Familymembershipid AND pr.eventid = $escapedEventId", 'left');

        if ($status == 'Paid') {
            $builder->where("km.Familymembershipid IN (SELECT Familymembershipid FROM paymentreceipts WHERE eventid = $escapedEventId AND status = 'Paid')");
        } else if ($status == 'Pending') {
            $builder->where("km.Familymembershipid NOT IN (SELECT Familymembershipid FROM paymentreceipts WHERE eventid = $escapedEventId AND status = 'Paid')");
        }

        $builder->where('km.MemberRole', 'Head');
        $builder->where('km.isShow', 1);
        $builder->where('km.Approvedstatus', 'Verified');
        $builder->groupBy('km.Familymembershipid');
        $builder->limit(10);
        return $builder->get()->getResultArray();
    }

    public function getTotalmembershistory($eventid, $status)
    {
        $builder = $this->db->table('kaadaimembers km');
        $builder->select('km.Familymembershipid');
        $escapedEventId = (int)$eventid;
        $builder->join('paymentreceipts pr', "pr.Familymembershipid = km.Familymembershipid AND pr.eventid = $escapedEventId", 'left');

        if ($status == 'Paid') {
            $builder->where("km.Familymembershipid IN (SELECT Familymembershipid FROM paymentreceipts WHERE eventid = $escapedEventId AND status = 'Paid')");
        } else if ($status == 'Pending') {
            $builder->where("km.Familymembershipid NOT IN (SELECT Familymembershipid FROM paymentreceipts WHERE eventid = $escapedEventId AND status = 'Paid')");
        }

        $builder->where('km.MemberRole', 'Head');
        $builder->where('km.isShow', 1);
        $builder->where('km.Approvedstatus', 'Verified');
        $builder->groupBy('km.Familymembershipid');
        return $builder->get()->getResultArray();
    }
    
    public function getFilteredeventreports($eventname, $status, $counts) {
         $builder = $this->db->table('kaadaimembers km');
         $builder->select('km.Familymembershipid, km.Role, km.Name, km.Phonenumber AS Mobile, MAX(pr.Taxamount) AS Taxamount, SUM(pr.paidamount) AS paidamount, MIN(pr.balanceamount) AS balancemount, MAX(pr.paymentdate) AS paymentdate');
         $escapedEventId = (int)$eventname;
         $builder->join('paymentreceipts pr', "pr.Familymembershipid = km.Familymembershipid AND pr.eventid = $escapedEventId", 'left');

         if ($status == 'Paid') {
            $builder->where("km.Familymembershipid IN (SELECT Familymembershipid FROM paymentreceipts WHERE eventid = $escapedEventId AND status = 'Paid')");
         } else if ($status == 'Pending') {
            $builder->where("km.Familymembershipid NOT IN (SELECT Familymembershipid FROM paymentreceipts WHERE eventid = $escapedEventId AND status = 'Paid')");
         }
         
         $builder->where('km.MemberRole', 'Head');
         $builder->where('km.isShow', 1);
         $builder->where('km.Approvedstatus', 'Verified');
         $builder->groupBy('km.Familymembershipid');
         $builder->limit(10, $counts); // limit 10 offset $counts
         return $builder->get()->getResultArray();
    }
    
    public function getFilFteredeventreports($eventname, $status, $counts) {
        // Typo in method name in Controller line 354: getFilFteredeventreports
        // I should stick to that name or fix it.
        // I'll implement it to match.
        return $this->getFilteredeventreports($eventname, $status, $counts);
    }
    
    public function getFilteredReportsSearchfields($searchfields, $eventname, $status) {
         $builder = $this->db->table('kaadaimembers km');
         $builder->select('km.Familymembershipid, km.Role, km.Name, km.Phonenumber AS Mobile, MAX(pr.Taxamount) AS Taxamount, SUM(pr.paidamount) AS paidamount, MIN(pr.balanceamount) AS balancemount, MAX(pr.paymentdate) AS paymentdate');
         $escapedEventId = (int)$eventname;
         $builder->join('paymentreceipts pr', "pr.Familymembershipid = km.Familymembershipid AND pr.eventid = $escapedEventId", 'left');
         
         $builder->groupStart()
                ->like('km.Name', $searchfields)
                ->orLike('km.Familymembershipid', $searchfields) 
                ->orLike('km.Role', $searchfields)
                ->orLike('km.Phonenumber', $searchfields)
                ->groupEnd();

         if ($status == 'Paid') {
            $builder->where("km.Familymembershipid IN (SELECT Familymembershipid FROM paymentreceipts WHERE eventid = $escapedEventId AND status = 'Paid')");
         } elseif ($status == 'Pending') {
            $builder->where("km.Familymembershipid NOT IN (SELECT Familymembershipid FROM paymentreceipts WHERE eventid = $escapedEventId AND status = 'Paid')");
         }
         
         $builder->where('km.MemberRole', 'Head');
         $builder->where('km.isShow', 1);
         $builder->where('km.Approvedstatus', 'Verified');
         $builder->groupBy('km.Familymembershipid');
         return $builder->get()->getResultArray();
    }
    
    public function getEventreportcount($eventname, $status) {
        // Controller line 182 calls this.
        return count($this->getTotalmembershistory($eventname, $status));
    }

    public function getMembersHistoryForDownload($eventid, $status, $talukname = null, $panchayatname = null, $villagename = null)
    {
        if (empty($eventid)) {
            return [];
        }
        $escapedEventId = (int)$eventid;
        
        // Fetch event details for default tax amount
        $event = $this->db->table('eventlist')->where('Id', $escapedEventId)->get()->getRow();
        $defaultTax = $event ? $event->TaxAmount : 0;
        
        $builder = $this->db->table('kaadaimembers km');
        $builder->select("km.Familymembershipid, km.Role, km.Name, km.Phonenumber AS Mobile, km.Taluk, km.Panchayat, km.Village, 
            COALESCE(MAX(pr.Taxamount), $defaultTax) AS EventMoney, 
            COALESCE(SUM(pr.paidamount), 0) AS PaidCash, 
            COALESCE(MIN(pr.balanceamount), $defaultTax) AS Pending, 
            MAX(pr.paymentdate) AS LastPaidDate");
        $builder->join('paymentreceipts pr', "pr.Familymembershipid = km.Familymembershipid AND pr.eventid = $escapedEventId", 'left');

        if (!empty($talukname)) {
            $builder->where('km.Taluk', $talukname);
        }
        if (!empty($panchayatname)) {
            $builder->where('km.Panchayat', $panchayatname);
        }
        if (!empty($villagename)) {
            $builder->where('km.Village', $villagename);
        }

        if (strtolower($status) == 'paid') {
            $builder->where("km.Familymembershipid IN (SELECT Familymembershipid FROM paymentreceipts WHERE eventid = $escapedEventId AND status = 'Paid')");
        } else if (strtolower($status) == 'pending') {
            $builder->where("km.Familymembershipid NOT IN (SELECT Familymembershipid FROM paymentreceipts WHERE eventid = $escapedEventId AND status = 'Paid')");
        }
        
        $builder->where('km.MemberRole', 'Head');
        $builder->where('km.isShow', 1);
        $builder->where('km.Approvedstatus', 'Verified');
        $builder->groupBy('km.Familymembershipid');
        return $builder->get()->getResultArray();
    }

    public function getFilteredMembersForDownload($searchfields)
    {
        $builder = $this->db->table('kaadaimembers');
        $builder->where('Role', 3);
        $builder->where('isShow', 1);
        $builder->where('MemberRole', 'Head');

        if (is_array($searchfields)) {
            if (!empty($searchfields['state_id'])) {
                $builder->where('state_id', $searchfields['state_id']);
            }
            if (!empty($searchfields['district'])) {
                $builder->where('District', $searchfields['district']);
            }
            if (!empty($searchfields['taluk'])) {
                $builder->where('Taluk', $searchfields['taluk']);
            }
            if (!empty($searchfields['panchayat'])) {
                $builder->where('Panchayat', $searchfields['panchayat']);
            }
            if (!empty($searchfields['bloodgroup'])) {
                $builder->where('Bloodgroup', $searchfields['bloodgroup']);
            }
            if (!empty($searchfields['gender'])) {
                $builder->where('Gender', $searchfields['gender']);
            }
            if (!empty($searchfields['occupation'])) {
                $builder->where('Profession', $searchfields['occupation']);
            }
            if (!empty($searchfields['search'])) {
                $term = $searchfields['search'];
                $builder->groupStart();
                $builder->like('Name', $term);
                $builder->orLike('Familymembershipid', $term);
                $builder->orLike('Phonenumber', $term);
                $builder->orLike('Aadharnumber', $term);
                $builder->orLike('District', $term);
                $builder->groupEnd();
            }
        }

        if (session()->get('role') == 2) {
            $coord_id = session()->get("Kaadaisoft_userId");
            $builder->groupStart()
                    ->where('Coordinator_id', $coord_id)
                    ->orWhere('Coordinator_Two_id', $coord_id)
                    ->groupEnd();
        }

        return $builder->get()->getResultArray();
    }
    
    public function getMemberById($id) {
         return $this->db->table('kaadaimembers')->where('Familymembershipid', $id)->get()->getRowArray();
    }
    
    public function getAllMembers() {
         return $this->db->table('kaadaimembers')->where('isShow', 1)->get()->getResultArray();
    }
}
?>