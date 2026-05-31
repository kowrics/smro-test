<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        $suppliers = [
            ['name' => 'PharmaCorp Inc.', 'contact' => '09171234567', 'address' => 'Manila, Philippines', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'MediSupply Co.', 'contact' => '09281234567', 'address' => 'Cebu, Philippines', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];
        $this->db->table('suppliers')->insertBatch($suppliers);
    }
}