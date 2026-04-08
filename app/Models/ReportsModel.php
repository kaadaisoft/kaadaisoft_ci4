<?php
namespace App\Models;

use CodeIgniter\Model;

class ReportsModel extends Model
{
    protected $encrypter;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->encrypter = \Config\Services::encrypter();
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

    public function getReportswithlimit($counts)
    {
        $query = $this->db->query("SELECT * FROM kaadaimembers WHERE isShow = 1 AND MemberRole = 'Head' AND Approvedstatus = 'Verified' LIMIT 10 OFFSET $counts");
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

    public function getReportsSearchfields($searchfields)
    {
        // Fix search logic for Aadhar
        if (preg_match('/^[0-9]{12}$/', $searchfields)) {
            $sql = "SELECT * FROM kaadaimembers WHERE (Aadhar_hash = ?) AND MemberRole = 'Head' AND isShow = 1 AND Approvedstatus = 'Verified'";
            $query = $this->db->query($sql, [hash('sha256', $searchfields)]);
        } else {
            $sql = "SELECT * FROM kaadaimembers WHERE (Name LIKE ? OR Familymembershipid LIKE ? OR Taluk LIKE ? OR Phonenumber LIKE ? OR Role LIKE ? OR District LIKE ?) AND MemberRole = 'Head' AND isShow = 1 AND Approvedstatus = 'Verified'";
            $like = "%$searchfields%";
            $query = $this->db->query($sql, [$like, $like, $like, $like, $like, $like]);
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
        $builder->select('km.Familymembershipid, km.Role, km.Name, km.Phonenumber AS Mobile, km.Aadharnumber, MAX(pr.Taxamount) AS Taxamount, SUM(pr.paidamount) AS paidamount, MIN(pr.balanceamount) AS balancemount, MAX(pr.paymentdate) AS paymentdate');
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
         $builder->select('km.Familymembershipid, km.Role, km.Name, km.Phonenumber AS Mobile, km.Aadharnumber, MAX(pr.Taxamount) AS Taxamount, SUM(pr.paidamount) AS paidamount, MIN(pr.balanceamount) AS balancemount, MAX(pr.paymentdate) AS paymentdate');
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
    
    public function getFilFteredeventreports($eventname, $status, $counts) {
        // Typo in method name in Controller line 354: getFilFteredeventreports
        return $this->getFilteredeventreports($eventname, $status, $counts);
    }
    
    public function getFilteredReportsSearchfields($searchfields, $eventname, $status) {
         $builder = $this->db->table('kaadaimembers km');
         $builder->select('km.Familymembershipid, km.Role, km.Name, km.Phonenumber AS Mobile, km.Aadharnumber, MAX(pr.Taxamount) AS Taxamount, SUM(pr.paidamount) AS paidamount, MIN(pr.balanceamount) AS balancemount, MAX(pr.paymentdate) AS paymentdate');
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
    
    public function getEventreportcount($eventname, $status) {
        return count($this->getTotalmembershistory($eventname, $status));
    }

    public function getMembersHistoryForDownload($eventid, $status, $talukname = null, $panchayatname = null, $villagename = null)
    {
        if (empty($eventid)) {
            return [];
        }
        $escapedEventId = (int)$eventid;
        
        $event = $this->db->table('eventlist')->where('Id', $escapedEventId)->get()->getRow();
        $defaultTax = $event ? $event->TaxAmount : 0;
        
        $builder = $this->db->table('kaadaimembers km');
        $builder->select("km.Familymembershipid, km.Role, km.Name, km.Phonenumber AS Mobile, km.Aadharnumber, km.Taluk, km.Panchayat, km.Village, 
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

        if (is_array($searchfields) && !empty($searchfields['search'])) {
            $term = $searchfields['search'];
            if (preg_match('/^[0-9]{12}$/', $term)) {
                $builder->orWhere('Aadhar_hash', hash('sha256', $term));
            }
        }

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
    
    public function getMemberById($id) {
         $member = $this->db->table('kaadaimembers')->where('Familymembershipid', $id)->get()->getRowArray();
         if ($member && !empty($member['Aadharnumber'])) {
             try {
                 $member['Aadharnumber'] = $this->encrypter->decrypt(base64_decode($member['Aadharnumber']));
             } catch (\Exception $e) {}
         }
         return $member;
    }
    
    public function getAllMembers() {
         $results = $this->db->table('kaadaimembers')->where('isShow', 1)->get()->getResultArray();
         foreach ($results as &$row) {
             if (!empty($row['Aadharnumber'])) {
                 try {
                     $row['Aadharnumber'] = $this->encrypter->decrypt(base64_decode($row['Aadharnumber']));
                 } catch (\Exception $e) {}
             }
         }
         return $results;
    }
}