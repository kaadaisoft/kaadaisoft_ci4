<?php
namespace App\Models;

use CodeIgniter\Model;

class EventsModel extends Model{
    protected $db;

    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getTotalevents(){
        $query = $this->db->query("SELECT * FROM eventlist WHERE isShow = 1");
        return count($query->getResultArray());
    }

    // Consolidated getEvents method
    public function getEvents($counts = null){
        if ($counts === null) {
            // Return all events
            $query = $this->db->query("SELECT * FROM eventlist WHERE isShow = 1 ORDER BY updated_at DESC");
        } else {
            // Return paginated events
            $query = $this->db->query("SELECT * FROM eventlist WHERE isShow = 1 ORDER BY updated_at DESC LIMIT 3 OFFSET $counts");
        }
        return $query->getResultArray();
    }
    
    // Helper for explicit all events if needed internally
    public function getAllEvents() {
        return $this->getEvents(null);
    }

    public function getEventsSearchfields($searchfields){
        $query = $this->db->query("SELECT * FROM eventlist WHERE EventName LIKE '%$searchfields%' AND isShow = 1");
        return $query->getResultArray();
    }

    public function addEvent($eventname,$fromdate,$todate,$year,$taxamount,$filename){
        $sql = "INSERT INTO eventlist (EventName, From_date, To_date, Year, TaxAmount, Image) VALUES (?, ?, ?, ?, ?, ?)";
        $addevent = $this->db->query($sql, [$eventname, $fromdate, $todate, $year, $taxamount, $filename]);
        
        // Dynamic table creation was commented out in original.
        return $addevent ? true : false;
    }

    public function getEventdata($id){
        $getEvent = $this->db->query("SELECT * FROM eventlist WHERE Id = $id");
        return $getEvent->getRow();
    }

    public function updateEvent($eventid,$eventname,$fromdate,$todate, $taxamount, $eventupdate){
        $sql = "UPDATE eventlist SET EventName = ?, From_date = ?, To_date = ?, TaxAmount = ?, updated_at = ? WHERE Id = ?";
        $updateevent = $this->db->query($sql, [$eventname, $fromdate, $todate, $taxamount, $eventupdate, $eventid]);
        return $updateevent ? true : false;
    }

    public function updateBanner($id,$filename){
        $updateeventbanner = $this->db->query("UPDATE eventlist SET image = '$filename' WHERE Id = $id");
        return $updateeventbanner ? true : false;
    }

    public function eventmovetotrash($id){
        $movetotrashaction = $this->db->query("UPDATE eventlist SET isShow = 0 WHERE Id = $id");
        return $movetotrashaction ? true : false;
    }
}
?>