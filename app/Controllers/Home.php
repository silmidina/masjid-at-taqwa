<?php

namespace App\Controllers;

use App\Models\ModelHome;
use App\Models\ModelAdmin;

class Home extends BaseController
{
    protected $ModelHome;
    protected $ModelAdmin;

    public function __construct()
    {
        $this->ModelHome = new ModelHome();
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $setting = $this->ModelAdmin->ViewSetting();
        $url = 'https://api.myquran.com/v2/sholat/jadwal/' . $setting['id_kota'] . '/' . date('Y') . '/' . date('m') . '/' . date('d');
        $waktu = json_decode(file_get_contents($url), true);
        $data = [
            'judul' => 'Home',
            'page' => 'v_home',
            'waktu' => $waktu,
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
