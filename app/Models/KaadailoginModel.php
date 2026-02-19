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

    public function updateOTP($identifier, $value, $otp, $expiry)
    {
        return $this->db->table('kaadaimembers')
            ->where($identifier, $value)
            ->update([
                'otp' => $otp,
                'otp_expiry' => $expiry
            ]);
    }

    public function verifyOTP($identifier, $value, $otp)
    {
        $query = $this->db->table('kaadaimembers')
            ->where($identifier, $value)
            ->where('otp', $otp)
            ->where('otp_expiry >=', date('Y-m-d H:i:s'))
            ->get();
        return $query->getRow();
    }

    public function updatePassword($identifier, $value, $newPassword)
    {
        return $this->db->table('kaadaimembers')
            ->where($identifier, $value)
            ->update([
                'Password' => password_hash($newPassword, PASSWORD_BCRYPT),
                'otp' => null,
                'otp_expiry' => null
            ]);
    }
}
?>