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
            'judul' => '<i class="nav-icon fas fa-file-alt nav-icon"></i> Rekap Kas Masjid',
            'subjudul' => '',
            'menu' => 'kas-masjid',
            'submenu' => 'rekap-kas',
            'page' => 'v_rekap_kas_masjid',
            'kas' => $this->ModelKasMasjid->AllData(),
        ];
        return view('v_template_admin', $data);
    }
}
