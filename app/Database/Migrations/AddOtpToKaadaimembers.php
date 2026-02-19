<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddOtpToKaadaimembers extends Migration
{
    public function up()
    {
        $fields = [
            'otp' => [
                'type'       => 'VARCHAR',
                'constraint' => '6',
                'null'       => true,
            ],
            'otp_expiry' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ];
        $this->forge->addColumn('kaadaimembers', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('kaadaimembers', ['otp', 'otp_expiry']);
    }
}
