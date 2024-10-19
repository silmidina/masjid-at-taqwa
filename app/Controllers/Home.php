<?php

namespace App\Controllers;

use App\Models\ModelHome;

class Home extends BaseController
{
    protected $ModelHome;

    public function __construct()
    {
        $this->ModelHome = new ModelHome();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Home',
            'page' => 'v_home',
        ];
        return view('v_template', $data);
    }

    public function Agenda()
    {
        $data = [
            'judul' => 'Agenda',
            'page' => 'front-end/v_agenda',
            'agenda' => $this->ModelHome->Agenda(),
        ];
        return view('v_template', $data);
    }
}
