<?php
namespace App\Models;

use CodeIgniter\Model;
use Exception;

class Bulk_upload_model extends Model
{
    protected $db;
    protected $encrypter;

    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->encrypter = \Config\Services::encrypter();
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
                throw new Exception('Transaction failed! Data not inserted.');
            } else {
                return true;
            }
        } catch (Exception $e) {
            throw $e;  
        }
    }

    public function getMembersdetails()
    {
        $query = $this->db->query("SELECT km.Familymembershipid, km.Name, km.Aadharnumber, pr.paymentdate, km.Phonenumber AS Mobile, km.Taluk AS MemberTaluk, pr.eventid, pr.eventname, pr.paidamount, pr.balanceamount 
        FROM kaadaimembers AS km LEFT JOIN paymentreceipts AS pr ON pr.Familymembershipid = km.Familymembershipid");
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
}