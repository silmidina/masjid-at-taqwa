<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => '<i class="nav-icon fas fa-home"></i> Dashboard',
            'subjudul' => '',
            'menu' => 'dashboard',
            'submenu' => '',
            'page' => 'v_dashboard',
        ];
        return view('v_template_admin', $data);
    }
}
