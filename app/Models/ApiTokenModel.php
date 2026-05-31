<?php

namespace App\Models;

use CodeIgniter\Model;

class ApiTokenModel extends Model
{
    protected $table         = 'api_tokens';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['user_id', 'token'];
    protected $useTimestamps = true;
}