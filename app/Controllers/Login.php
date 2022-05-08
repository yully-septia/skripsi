<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login/index');
    }

    public function proses()
    {
        $model = new AdminModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataAdmin = $model->where([
            'username' => $username,
        ])->first();
        if ($dataAdmin) {
            if (password_verify($password, $dataAdmin->password)) {
                session()->set([
                    'username' => $dataAdmin->username,
                    'name' => $dataAdmin->name,
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('home'));
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
