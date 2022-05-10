<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->data['currentAdminMenu'] = 'dashboard';
    }
    public function index()
    {
        return view('admin/dashboard', $this->data);
    }
}
