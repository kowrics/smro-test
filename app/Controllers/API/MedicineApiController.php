<?php

namespace App\Controllers\Api;

use App\Models\MedicineModel;
use App\Models\ApiTokenModel;
use CodeIgniter\RESTful\ResourceController;

class MedicineApiController extends ResourceController
{
    protected $format = 'json';

    private function authenticate()
    {
        $token = $this->request->getHeaderLine('Authorization');
        $token = str_replace('Bearer ', '', $token);
        if (!$token) return false;
        $tokenModel = new ApiTokenModel();
        return $tokenModel->where('token', $token)->first();
    }

    public function index()
    {
        if (!$this->authenticate()) {
            return $this->respond(['error' => 'Unauthorized'], 401);
        }
        $medicines = (new MedicineModel())->findAll();
        return $this->respond(['status' => 'success', 'data' => $medicines], 200);
    }

    public function show($id = null)
    {
        if (!$this->authenticate()) {
            return $this->respond(['error' => 'Unauthorized'], 401);
        }
        $medicine = (new MedicineModel())->find($id);
        if (!$medicine) {
            return $this->respond(['error' => 'Not found'], 404);
        }
        return $this->respond(['status' => 'success', 'data' => $medicine], 200);
    }
}