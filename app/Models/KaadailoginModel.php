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
        
        // Handle encrypted Aadhar searching via hash
        if ($identifier == 'Aadharnumber') {
            $builder->where('Aadhar_hash', hash('sha256', $value));
        } else {
            $builder->where($identifier, $value);
        }
        
        // Prioritize Login: Alive members first, then Family Heads
        $builder->orderBy('is_dead', 'ASC'); 
        $builder->orderBy("CASE WHEN MemberRole = 'Head' THEN 0 ELSE 1 END", 'ASC', false); 
        $query = $builder->get();
        return $query->getRow();
    }

    public function updateOTP($identifier, $value, $otp, $expiry)
    {
        $builder = $this->db->table('kaadaimembers');
        
        if ($identifier == 'Aadharnumber') {
            $builder->where('Aadhar_hash', hash('sha256', $value));
        } else {
            $builder->where($identifier, $value);
        }
        
        return $builder->update([
                'otp' => $otp,
                'otp_expiry' => $expiry
            ]);
    }

    public function verifyOTP($identifier, $value, $otp)
    {
        $builder = $this->db->table('kaadaimembers');
        
        if ($identifier == 'Aadharnumber') {
            $builder->where('Aadhar_hash', hash('sha256', $value));
        } else {
            $builder->where($identifier, $value);
        }
        
        $query = $builder->where('otp', $otp)
            ->where('otp_expiry >=', date('Y-m-d H:i:s'))
            ->get();
        return $query->getRow();
    }

    public function updatePassword($identifier, $value, $newPassword)
    {
        $builder = $this->db->table('kaadaimembers');
        
        if ($identifier == 'Aadharnumber') {
            $builder->where('Aadhar_hash', hash('sha256', $value));
        } else {
            $builder->where($identifier, $value);
        }
        
        return $builder->update([
                'Password' => password_hash($newPassword, PASSWORD_BCRYPT),
                'otp' => null,
                'otp_expiry' => null
            ]);
    }
}