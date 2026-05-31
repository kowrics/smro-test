<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ApiTokenSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('api_tokens')->insert([
            'user_id'    => 1,
            'token'      => 'smro-secret-api-token-2024',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}