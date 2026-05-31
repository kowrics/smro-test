<?php

namespace App\Controllers;

use App\Models\BatchModel;
use App\Models\MedicineModel;

class BatchController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new BatchModel();
    }

    public function index()
    {
        $data['batches'] = $this->model->select('batches.*, medicines.name as medicine_name')
            ->join('medicines', 'medicines.id = batches.medicine_id')
            ->paginate(10);
        $data['pager'] = $this->model->pager;
        return view('batches/index', $data);
    }

    public function new()
    {
        $data['medicines'] = (new MedicineModel())->findAll();
        return view('batches/create', $data);
    }

    public function create()
    {
        $rules = [
            'medicine_id'  => 'required',
            'batch_number' => 'required',
            'quantity'     => 'required|integer',
            'expiry_date'  => 'required|valid_date',
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->model->save([
            'medicine_id'  => $this->request->getPost('medicine_id'),
            'batch_number' => $this->request->getPost('batch_number'),
            'quantity'     => $this->request->getPost('quantity'),
            'expiry_date'  => $this->request->getPost('expiry_date'),
        ]);
return redirect()->to(base_url('batches'))->with('success', 'Batch added.');
    }

    public function edit($id)
    {
        $data['batch']     = $this->model->findOrFail($id);
        $data['medicines'] = (new MedicineModel())->findAll();
        return view('batches/edit', $data);
    }

    public function update($id)
    {
        $this->model->update($id, [
            'medicine_id'  => $this->request->getPost('medicine_id'),
            'batch_number' => $this->request->getPost('batch_number'),
            'quantity'     => $this->request->getPost('quantity'),
            'expiry_date'  => $this->request->getPost('expiry_date'),
        ]);
return redirect()->to(base_url('batches'))->with('success', 'Batch updated.');
    }

    public function delete($id)
    {
        $this->model->delete($id);
return redirect()->to(base_url('batches'))->with('success', 'Batch deleted.');
    }
}