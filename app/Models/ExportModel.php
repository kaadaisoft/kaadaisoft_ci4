<?php
namespace App\Models;

use CodeIgniter\Model;

class ExportModel extends Model {

    protected $db;
    protected $encrypter;

    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->encrypter = \Config\Services::encrypter();
    }

    public function get_data(){
        $query = $this->db->query("SELECT * FROM kaadaimembers WHERE isShow = 1");
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
    
    public function get_Filterdata($eventname, $status){
        if($status == "Paid" || $status == "Pending"){
            // Note: This assumes table exists with name $eventname
            $query = $this->db->query("SELECT * FROM $eventname WHERE isPaid = '$status'");
            return $query->getResultArray();
        }
        else{
            $query = $this->db->query("SELECT * FROM $eventname");
            return $query->getResultArray();
        }
    }
}
?>
