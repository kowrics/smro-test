<?php

namespace App\Controllers;

use App\Models\MedicineModel;
use App\Models\BatchModel;
use App\Models\SupplierModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $medicineModel  = new MedicineModel();
        $batchModel     = new BatchModel();
        $supplierModel  = new SupplierModel();
        $userModel      = new UserModel();

        $today = date('Y-m-d');
        $alertDate = date('Y-m-d', strtotime('+30 days'));

        $data = [
            'total_medicines' => $medicineModel->countAll(),
            'total_suppliers' => $supplierModel->countAll(),
            'total_users'     => $userModel->countAll(),
            'expiring_soon'   => $batchModel->where('expiry_date <=', $alertDate)->where('expiry_date >=', $today)->countAllResults(),
            'expired'         => $batchModel->where('expiry_date <', $today)->countAllResults(),
        ];

        return view('dashboard/index', $data);
    }
}