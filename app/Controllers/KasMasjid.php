<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKasMasjid;
use CodeIgniter\HTTP\ResponseInterface;

class KasMasjid extends BaseController
{
    protected $ModelKasMasjid;

    public function __construct()
    {
        $this->ModelKasMasjid = new ModelKasMasjid();
    }

    public function index()
    {
        $data = [
            'judul' => '<i class="nav-icon fas fa-file-alt nav-icon text-primary"></i> Rekap Kas Masjid',
            'menu' => 'kas-masjid',
            'submenu' => 'rekap-kas',
            'page' => 'kas-masjid/v_rekap_kas_masjid',
            'kas' => $this->ModelKasMasjid->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasMasuk()
    {
        $data = [
            'judul' => '<i class="nav-icon fas fa-file-download nav-icon text-success"></i> Kas Masjid Masuk',
            'menu' => 'kas-masjid',
            'submenu' => 'kas-masuk',
            'page' => 'kas-masjid/v_kas_masjid_masuk',
            'kas' => $this->ModelKasMasjid->AllDataKasMasuk(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasKeluar()
    {
        $data = [
            'judul' => '<i class="nav-icon fas fa-file-upload nav-icon text-danger"></i> Kas Masjid Keluar',
            'menu' => 'kas-masjid',
            'submenu' => 'kas-keluar',
            'page' => 'kas-masjid/v_kas_masjid_keluar',
            'kas' => $this->ModelKasMasjid->AllDataKasKeluar(),
        ];
        return view('v_template_admin', $data);
    }
}
