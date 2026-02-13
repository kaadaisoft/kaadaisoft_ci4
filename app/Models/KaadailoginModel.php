<?php
namespace App\Models;

use CodeIgniter\Model;

class KaadailoginModel extends Model
{
    protected $db;

    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getDetails($identifier, $value)
    {
        $builder = $this->db->table('kaadaimembers');
        $builder->where($identifier, $value);
        // Prioritize Login: Alive members first, then Family Heads
        $builder->orderBy('is_dead', 'ASC'); 
        $builder->orderBy("CASE WHEN MemberRole = 'Head' THEN 0 ELSE 1 END", 'ASC', false); 
        $query = $builder->get();
        return $query->getRow();
    }
}
?>