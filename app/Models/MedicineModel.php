<?php

namespace App\Models;

use CodeIgniter\Model;

class MedicineModel extends Model
{
    protected $table         = 'medicines';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['name', 'category', 'description', 'unit', 'stock', 'image', 'supplier_id'];
    protected $useTimestamps = true;
}