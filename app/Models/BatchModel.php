<?php

namespace App\Models;

use CodeIgniter\Model;

class BatchModel extends Model
{
    protected $table         = 'batches';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['medicine_id', 'batch_number', 'quantity', 'expiry_date'];
    protected $useTimestamps = true;
}