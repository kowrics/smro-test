<?php

namespace App\Controllers;

use App\Models\SupplierModel;

class SupplierController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new SupplierModel();
    }

    public function index()
    {
        $data['suppliers'] = $this->model->paginate(10);
        $data['pager']     = $this->model->pager;
        return view('suppliers/index', $data);
    }

    public function new()
    {
        return view('suppliers/create');
    }

    public function create()
    {
        if (!$this->validate(['name' => 'required'])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->model->save([
            'name'    => $this->request->getPost('name'),
            'contact' => $this->request->getPost('contact'),
            'address' => $this->request->getPost('address'),
        ]);
return redirect()->to(base_url('suppliers'))->with('success', 'Supplier added.');
    }

    public function edit($id)
    {
$data['supplier'] = $this->model->find($id);        return view('suppliers/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate(['name' => 'required'])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->model->update($id, [
            'name'    => $this->request->getPost('name'),
            'contact' => $this->request->getPost('contact'),
            'address' => $this->request->getPost('address'),
        ]);
return redirect()->to(base_url('suppliers'))->with('success', 'Supplier updated.');
    }

    public function delete($id)
    {
        $this->model->delete($id);
return redirect()->to(base_url('suppliers'))->with('success', 'Supplier deleted.');
    }
}