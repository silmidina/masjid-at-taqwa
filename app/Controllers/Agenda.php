<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAgenda;
use CodeIgniter\HTTP\ResponseInterface;

class Agenda extends BaseController
{
    protected $ModelAgenda;

    public function __construct()
    {
        $this->ModelAgenda = new ModelAgenda();
    }

    public function index()
    {
        $data = [
            'judul' => '<i class="nav-icon fas fa-calendar-alt"></i> Agenda',
            'subjudul' => '',
            'menu' => 'agenda',
            'sub-menu' => '',
            'page' => 'v_agenda',
            'agenda' => $this->ModelAgenda->AllData(),
        ];
        return view('v_template_admin', $data);
    }
}
