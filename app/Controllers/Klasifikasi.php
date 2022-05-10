<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Klasifikasi extends BaseController
{
    public function __construct()
    {
        $this->data['currentAdminMenu'] = 'klasifikasi';
    }
    public function index()
    {
        return view('admin/klasifikasi', $this->data);
    }
}
