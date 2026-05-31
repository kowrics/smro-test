<?php

namespace App\Controllers;

use App\Models\MedicineModel;
use App\Models\SupplierModel;

class MedicineController extends BaseController
{
    protected $medicineModel;

    public function __construct()
    {
        $this->medicineModel = new MedicineModel();
    }

    public function index()
    {
        $data['medicines'] = $this->medicineModel->select('medicines.*, suppliers.name as supplier_name')
            ->join('suppliers', 'suppliers.id = medicines.supplier_id', 'left')
            ->paginate(10);
        $data['pager'] = $this->medicineModel->pager;
        return view('medicines/index', $data);
    }

    public function new()
    {
        $data['suppliers'] = (new SupplierModel())->findAll();
        return view('medicines/create', $data);
    }

    public function create()
    {
        $rules = [
            'name'  => 'required|min_length[2]',
            'unit'  => 'required',
            'stock' => 'required|integer',
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $image = $this->request->getFile('image');
        $imageName = null;
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move(WRITEPATH . 'uploads/medicines', $imageName);
            \Config\Services::image()
                ->withFile(WRITEPATH . 'uploads/medicines/' . $imageName)
                ->resize(400, 400, true)
                ->save(WRITEPATH . 'uploads/medicines/' . $imageName);
        }

        $this->medicineModel->save([
            'name'        => $this->request->getPost('name'),
            'category'    => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'unit'        => $this->request->getPost('unit'),
            'stock'       => $this->request->getPost('stock'),
            'supplier_id' => $this->request->getPost('supplier_id'),
            'image'       => $imageName,
        ]);

return redirect()->to(base_url('medicines'))->with('success', 'Medicine added successfully.');
    }

    public function edit($id)
    {
$data['medicine']  = $this->medicineModel->find($id);
        $data['suppliers'] = (new SupplierModel())->findAll();
        return view('medicines/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'name'  => 'required|min_length[2]',
            'unit'  => 'required',
            'stock' => 'required|integer',
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $medicine  = $this->medicineModel->findOrFail($id);
        $image     = $this->request->getFile('image');
        $imageName = $medicine['image'];

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move(WRITEPATH . 'uploads/medicines', $imageName);
            \Config\Services::image()
                ->withFile(WRITEPATH . 'uploads/medicines/' . $imageName)
                ->resize(400, 400, true)
                ->save(WRITEPATH . 'uploads/medicines/' . $imageName);
        }

        $this->medicineModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'category'    => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'unit'        => $this->request->getPost('unit'),
            'stock'       => $this->request->getPost('stock'),
            'supplier_id' => $this->request->getPost('supplier_id'),
            'image'       => $imageName,
        ]);

return redirect()->to(base_url('medicines'))->with('success', 'Medicine updated successfully.');
    }

    public function delete($id)
    {
        $this->medicineModel->delete($id);
return redirect()->to(base_url('medicines'))->with('success', 'Medicine deleted.');
    }
}