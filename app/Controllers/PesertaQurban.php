<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPesertaQurban;
use App\Models\ModelTahun;
use CodeIgniter\HTTP\ResponseInterface;

class PesertaQurban extends BaseController
{
    protected $ModelPesertaQurban;
    protected $ModelTahun;

    public function __construct()
    {
        $this->ModelPesertaQurban = new ModelPesertaQurban();
        $this->ModelTahun = new ModelTahun();
    }


    public function index()
    {
        $data = [
            'judul' => '<i class="nav-icon far fa-user text-secondary"></i> Peserta Qurban',
            'menu' => 'qurban',
            'submenu' => 'peserta-qurban',
            'page' => 'qurban/v_peserta_qurban',
            'tahun' => $this->ModelTahun->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function KelompokQurban($id_tahun)
    {
        $tahun = $this->ModelTahun->DetailData($id_tahun);
        $data = [
            'judul' => '<i class="nav-icon fas fa-users text-secondary"></i> Peserta Qurban Tahun ' . $tahun['tahun_h'] . 'H/' . $tahun['tahun_m'] . 'M',
            'menu' => 'qurban',
            'submenu' => 'peserta-qurban',
            'page' => 'qurban/v_kelompok_qurban',
            'tahun' => $tahun,
            'kelompok' => $this->ModelPesertaQurban->AllDataKelompok($id_tahun),
        ];
        return view('v_template_admin', $data);
    }
}
