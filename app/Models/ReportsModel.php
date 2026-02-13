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
        $query = $this->db->query("SELECT * FROM kaadaimembers WHERE isShow = 1");
        return count($query->getResultArray());
    }

    public function getreports($counts = 0)
    {
        // Original getreports() line 11 did not take arguments in one version, but line 56 in controller calls it with counts.
        // Line 13 original: "SELECT * FROM kaadaimembers WHERE isShow = 1 LIMIT 8"
        // Wait, line 56 in controller: $reports = $this->ReportsModel->getreports($counts);
        // But original model definition line 11: public function getreports() { ... } (No args).
        // This implies the controller passed an arg that was ignored, or the model I see is different?
        // Ah, likely ignored or I should add limit/offset if the intention was pagination.
        // However, `getReportswithlimit` exists (line 17).
        // I'll stick to original behavior (LIMIT 8 fixed) unless I see pagination logic relying on it.
        // Controller line 56 seems to pass $counts which is session data `reportscounts`.
        // If the original ignored it, it returned first 8.
        // But `displayReports` calls `getReportswithlimit`.
        // `changeReportspagesetup` calls `getreports($counts)`.
        // So `getreports` MUST support offset.
        // I will add offset support to `getreports`.
        
        $sql = "SELECT * FROM kaadaimembers WHERE isShow = 1 LIMIT 8";
        if ($counts > 0) {
            $sql .= " OFFSET $counts";
        }
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function getReportswithlimit($counts)
    {
        $query = $this->db->query("SELECT * FROM kaadaimembers WHERE isShow = 1 LIMIT 8 OFFSET $counts");
        return $query->getResultArray();
    }

    public function getReportsSearchfields($searchfields)
    {
        // Safe binding
        $sql = "SELECT * FROM kaadaimembers WHERE Name LIKE ? OR Familymembershipid LIKE ? OR Taluk LIKE ? OR Phonenumber LIKE ? OR Aadharnumber LIKE ? OR Role LIKE ?";
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
        // $eventid is required.
        $builder = $this->db->table('kaadaimembers km');
        $builder->select('km.Familymembershipid, km.Role, km.Name, pr.paymentdate, pr.paidamount, pr.Mobile, pr.MemberTaluk, pr.eventid, pr.eventname, pr.balanceamount');
        $builder->join('paymentreceipts pr', "pr.Familymembershipid = km.Familymembershipid AND pr.eventid = $eventid", 'left');

        if ($status == 'All') {
            $builder->limit(8);
            return $builder->get()->getResultArray();
        } else if ($status == 'Pending') {
            // (pr.Familymembershipid IS NULL OR pr.status = '$status')
            $builder->groupStart()
                    ->where('pr.Familymembershipid IS NULL')
                    ->orWhere('pr.status', $status)
                    ->groupEnd();
            $builder->limit(8);
            return $builder->get()->getResultArray();
        } else {
            // Published/Paid
            $builder->where('pr.status', $status);
            $builder->limit(8);
            return $builder->get()->getResultArray();
        }
    }

    public function getTotalmembershistory($eventid, $status)
    {
        $builder = $this->db->table('kaadaimembers km');
        $builder->select('km.Familymembershipid, km.Name, km.Role, pr.paymentdate, pr.paidamount, pr.Mobile, pr.Taxamount, pr.balanceamount, pr.paymentdate');
        $builder->join('paymentreceipts pr', "pr.Familymembershipid = km.Familymembershipid AND pr.eventid = $eventid", 'left');

        if ($status == "Pending") {
            $builder->groupStart()
                    ->where('pr.Familymembershipid IS NULL')
                    ->orWhere('pr.status', $status)
                    ->groupEnd();
        } elseif ($status == "Paid") {
             $builder->where('pr.status', $status);
        } else {
             // "All" or other? Original logic for 'else' was: WHERE pr.Familymembershipid IS NULL (Wait, original lines 101-104: WHERE pr.Familymembershipid IS NULL).
             // But line 91 status == "Pending" handles IS NULL OR status=Pending.
             // Line 101 status is not Pending or Paid. Typically this means "Unpaid" strictly? 
             // Original: "WHERE pr.Familymembershipid IS NULL" means never paid anything.
             // I'll stick to original logic order.
             $builder->where('pr.Familymembershipid IS NULL');
        }
        
        return $builder->get()->getResultArray();
    }
    
    public function getFilteredeventreports($eventname, $status, $counts) {
         // This method was commented out in my reading of ReportsModel but Controller `Reports.php` line 189 calls `getFilteredeventreports`.
         // I MUST implement it.
         // Wait, line 133 in ReportsModel was commented.
         // Controller calls it.
         // $eventname is likely $eventid here? Controller passes $eventname ($this->session->userdata("eventname")) which was set to $eventid in `reportFilterlist`.
         // So $eventname is ID.
         // Wait, query in commented code: `SELECT * FROM $eventname ...`
         // It implies dynamic table name? Or maybe `eventname` variable holds table name?
         // In `paymentreceipts` join queries, `pr.eventname` is a column.
         // But `reportFilterlist` (controller line 338) sets `eventname` = `eventid`.
         // So it passes ID.
         // But `getFilteredeventreports` original commented code used `FROM $eventname`.
         // This suggests originally events might have been separate tables?
         // HISTORY: The active code `getMembersHistory` joins `kaadaimembers` and `paymentreceipts`. 
         // `getFilteredeventreports` seems to be legacy or incorrect in the commented block.
         // BUT `Reports.php` calls it!
         // `Reports.php` line 189: `$reports = $this->ReportsModel->getFilteredeventreports($eventname,$status,$counts);`
         // If I don't implement it, it will crash.
         // I should implement it using `getMembersHistory` logic with Offset.
         
         // Re-implement getFilteredeventreports using logic similar to getMembersHistory but with OFFSET.
         
         $builder = $this->db->table('kaadaimembers km');
         $builder->select('km.Familymembershipid, km.Role, km.Name, pr.paymentdate, pr.paidamount, pr.Mobile, pr.MemberTaluk, pr.eventid, pr.eventname, pr.balanceamount');
         $builder->join('paymentreceipts pr', "pr.Familymembershipid = km.Familymembershipid AND pr.eventid = $eventname", 'left');

         if ($status == 'All') {
            // No status filter
         } else if ($status == 'Pending') {
            $builder->groupStart()
                    ->where('pr.Familymembershipid IS NULL')
                    ->orWhere('pr.status', $status)
                    ->groupEnd();
         } else {
             // Paid
             $builder->where('pr.status', $status);
         }
         
         $builder->limit(8, $counts); // limit 8 offset $counts
         return $builder->get()->getResultArray();
    }
    
    public function getFilFteredeventreports($eventname, $status, $counts) {
        // Typo in method name in Controller line 354: getFilFteredeventreports
        // I should stick to that name or fix it.
        // I'll implement it to match.
        return $this->getFilteredeventreports($eventname, $status, $counts);
    }
    
    public function getFilteredReportsSearchfields($searchfields, $eventname, $status) {
         // Controller line 107 calls this.
         // Implement search with event filter.
         $builder = $this->db->table('kaadaimembers km');
         $builder->select('km.Familymembershipid, km.Role, km.Name, pr.paymentdate, pr.paidamount, pr.Mobile, pr.MemberTaluk, pr.eventid, pr.eventname, pr.balanceamount');
         $builder->join('paymentreceipts pr', "pr.Familymembershipid = km.Familymembershipid AND pr.eventid = '$eventname'", 'left');
         
         $builder->groupStart()
                ->like('km.Name', $searchfields)
                ->orLike('km.Familymembershipid', $searchfields) 
                ->orLike('km.Role', $searchfields)
                ->orLike('km.Phonenumber', $searchfields)
                ->groupEnd();

         if ($status == 'Pending') {
             $builder->groupStart()
                     ->where('pr.Familymembershipid IS NULL')
                     ->orWhere('pr.status', 'Pending') 
                     ->groupEnd();
         } elseif ($status == 'Paid') {
             $builder->where('pr.status', 'Paid');
         }
         
         return $builder->get()->getResultArray();
    }
    
    public function getEventreportcount($eventname, $status) {
        // Controller line 182 calls this.
        return count($this->getTotalmembershistory($eventname, $status));
    }

    public function getMembersHistoryForDownload($eventid, $status, $talukname = null)
    {
        $eventid = $this->db->escape($eventid);
        
        // Build query manually or via builder
        // Original used explicit SQL. I'll use builder.
        $builder = $this->db->table('kaadaimembers km');
        $builder->select('km.Familymembershipid, km.Role, km.Name, pr.paymentdate, pr.paidamount, pr.Mobile, pr.MemberTaluk, pr.eventid, pr.eventname, pr.balanceamount');
        $builder->join('paymentreceipts pr', "pr.Familymembershipid = km.Familymembershipid AND pr.eventid = $eventid", 'left');

        if (!empty($talukname)) {
            $builder->where('km.Taluk', $talukname);
        }

        if (strtolower($status) != 'all') {
            if (strtolower($status) == 'paid') {
                $builder->where('pr.status', 'Paid');
            } else {
                $builder->groupStart()
                        ->where('pr.Familymembershipid IS NULL')
                        ->orWhere('pr.status', $status)
                        ->groupEnd();
            }
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