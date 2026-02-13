<?php
namespace App\Models;

use CodeIgniter\Model;
use Exception;

class Bulk_upload_model extends Model
{
    protected $db;

    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    // Method for bulk insert
    public function bulk_insert($data)
    {
        foreach ($data as &$row) {
            $row['MemberRole'] = 'Head';  // Ensure default
        }
        
        $this->db->transStart();
        // Bulk insert to the target table
        try {
            // Perform the bulk insert inside the try block
            $this->db->table('kaadaimembers')->insertBatch($data);  // The line where the bulk insert happens

            $this->db->transComplete();

            // Check for errors during the transaction
            if ($this->db->transStatus() === FALSE) {
                // If an error occurred, roll back the transaction
                // transComplete() handles rollback if failed but we can enforce check
                throw new Exception('Transaction failed! Data not inserted.');
            } else {
                return true;
            }
        } catch (Exception $e) {
            // transStart/Complete handles rollback automatically on failure, but explicit rollback if needed
            // $this->db->transRollback(); 
            throw $e;  // 
        }
    }

    public function getMembersdetails()
    {
        $query = $this->db->query("SELECT km.Familymembershipid, km.Name, pr.paymentdate, km.Phonenumber AS Mobile, km.Taluk AS MemberTaluk, pr.eventid, pr.eventname,pr.paidamount,pr.balanceamount 
        FROM kaadaimembers AS km LEFT JOIN paymentreceipts AS pr ON pr.Familymembershipid = km.Familymembershipid");
        return $query->getResultArray();
    }
}
?>