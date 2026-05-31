<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name'       => 'Super Admin',
                'email'      => 'superadmin@smro.com',
                'password'   => password_hash('admin123', PASSWORD_DEFAULT),
                'role'       => 'superadmin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'       => 'Manager One',
                'email'      => 'manager@smro.com',
                'password'   => password_hash('manager123', PASSWORD_DEFAULT),
                'role'       => 'manager',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'       => 'Staff One',
                'email'      => 'staff@smro.com',
                'password'   => password_hash('staff123', PASSWORD_DEFAULT),
                'role'       => 'staff',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('users')->insertBatch($users);
    }
}