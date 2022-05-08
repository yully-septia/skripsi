<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Register extends BaseController
{
    public function index()
    {
        return view('login/register');
    }

    public function proses()
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => 'Nama Harus diisi',
                    'min_length' => 'Nama Minimal 4 Karakter',
                    'max_length' => 'Nama Maksimal 100 Karakter',
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[tbl_admin.username]',
                'errors' => [
                    'required' => 'Username Harus diisi',
                    'min_length' => 'Username Minimal 4 Karakter',
                    'max_length' => 'Username Maksimal 20 Karakter',
                    'is_unique' => 'Username sudah digunakan sebelumnya'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => 'Password Harus diisi',
                    'min_length' => 'Password Minimal 4 Karakter',
                    'max_length' => 'Password Maksimal 50 Karakter',
                ]
            ],
            'password_conf' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $users = new AdminModel();
        $users->insert([
            'name' => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),

        ]);
        return redirect()->to('/login');
    }
}
