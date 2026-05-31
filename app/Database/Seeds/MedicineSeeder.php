<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MedicineSeeder extends Seeder
{
    public function run()
    {
        $medicines = [
            ['name' => 'Paracetamol 500mg', 'category' => 'Analgesic', 'unit' => 'tablet', 'stock' => 500, 'supplier_id' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'Amoxicillin 250mg', 'category' => 'Antibiotic', 'unit' => 'capsule', 'stock' => 300, 'supplier_id' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'Ibuprofen 200mg',   'category' => 'Analgesic', 'unit' => 'tablet', 'stock' => 200, 'supplier_id' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];
        $this->db->table('medicines')->insertBatch($medicines);
    }
}