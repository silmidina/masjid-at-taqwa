<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;

class Admin extends BaseController
{
    protected $ModelAdmin;

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
    }

    public function Setting()
    {
        $url = 'https://api.myquran.com/v2/sholat/kota/semua';
        $response = file_get_contents($url);

        // Cek apakah response valid
        if ($response === false) {
            // Log error jika perlu
            log_message('error', 'Failed to fetch data from API');
            $kota = []; // Set default array kosong
        } else {
            $kota = json_decode($response, true);
            // Pastikan hasil decode adalah array dan bukan false
            if (!is_array($kota)) {
                $kota = []; // Set default array kosong jika decode gagal
            }
        }

        $data = [
            'judul' => '<i class="nav-icon fas fa-cog"></i> Setting',
            'subjudul' => '',
            'menu' => 'setting',
            'submenu' => '',
            'page' => 'v_setting',
            'setting' => $this->ModelAdmin->ViewSetting(),
            'kota' => $kota,
        ];

        return view('v_template_admin', $data);
    }

    public function UpdateSetting()
    {
        $data = [
            'id_setting' => 1,
            'nama_masjid' => $this->request->getPost('nama_masjid'),
            'id_kota' => $this->request->getPost('id_kota'),
            'alamat' => $this->request->getPost('alamat'),
        ];
        $this->ModelAdmin->UpdateSetting($data);
        session()->setFlashdata('pesan', '<i class="fas fa-check"></i> Setting Berhasil Diupdate!! ');
        return redirect()->to(base_url('Admin/Setting'));
    }
}
