<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->model->paginate(10);
        $data['pager'] = $this->model->pager;
        return view('users/index', $data);
    }

    public function new()
    {
        return view('users/create');
    }

    public function create()
    {
        $rules = [
            'name'     => 'required',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'role'     => 'required|in_list[superadmin,manager,staff]',
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->model->save([
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getPost('role'),
        ]);
return redirect()->to(base_url('users'))->with('success', 'User created.');
    }

    public function edit($id)
    {
        $data['user'] = $this->model->findOrFail($id);
        return view('users/edit', $data);
    }

    public function update($id)
    {
        $this->model->update($id, [
            'name' => $this->request->getPost('name'),
            'role' => $this->request->getPost('role'),
        ]);
return redirect()->to(base_url('users'))->with('success', 'User updated.');
    }

    public function delete($id)
    {
        $this->model->delete($id);
return redirect()->to(base_url('users'))->with('success', 'User deleted.');
    }
}