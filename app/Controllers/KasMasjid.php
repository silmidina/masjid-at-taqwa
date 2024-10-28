<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKasMasjid;
use App\Models\ModelAdmin;
use CodeIgniter\HTTP\ResponseInterface;

class KasMasjid extends BaseController
{
    protected $ModelKasMasjid;
    protected $ModelAdmin;

    public function __construct()
    {
        $this->ModelKasMasjid = new ModelKasMasjid();
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'judul' => '<i class="nav-icon fas fa-file-alt nav-icon text-primary"></i> Rekap Kas Masjid',
            'menu' => 'kas-masjid',
            'submenu' => 'rekap-kas',
            'page' => 'kas-masjid/v_rekap_kas_masjid',
            'kas_m' => $this->ModelKasMasjid->AllData(),
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
            'kas_m' => $this->ModelKasMasjid->AllDataKasMasuk(),
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
            'kas_m' => $this->ModelKasMasjid->AllDataKasKeluar(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertKasMasuk()
    {
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kas_masuk'),
            'kas_keluar' => 0,
            'status' => 'Masuk',
        ];
        $this->ModelKasMasjid->InsertKasMasuk($data);
        session()->setFlashdata('pesan', '<i class="fas fa-check"></i> Data Berhasil Ditambahkan!! ');
        return redirect()->to(base_url('KasMasjid/KasMasuk'));
    }

    public function InsertKasKeluar()
    {
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_keluar' => $this->request->getPost('kas_keluar'),
            'kas_masuk' => 0,
            'status' => 'Keluar',
        ];
        $this->ModelKasMasjid->InsertKasMasuk($data);
        session()->setFlashdata('pesan', '<i class="fas fa-check"></i> Data Berhasil Ditambahkan!! ');
        return redirect()->to(base_url('KasMasjid/KasKeluar'));
    }

    public function UpdateKasMasuk($id_kas_masjid)
    {
        $data = [
            'id_kas_masjid' => $id_kas_masjid,
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kas_masuk'),
        ];
        $this->ModelKasMasjid->UpdateKasMasuk($data);
        session()->setFlashdata('pesan', '<i class="fas fa-check"></i> Data Berhasil Diupdate!! ');
        return redirect()->to(base_url('KasMasjid/KasMasuk'));
    }

    public function UpdateKasKeluar($id_kas_masjid)
    {
        $data = [
            'id_kas_masjid' => $id_kas_masjid,
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_keluar' => $this->request->getPost('kas_keluar'),
        ];
        $this->ModelKasMasjid->UpdateKasKeluar($data);
        session()->setFlashdata('pesan', '<i class="fas fa-check"></i> Data Berhasil Diupdate!! ');
        return redirect()->to(base_url('KasMasjid/KasKeluar'));
    }

    public function DeleteKasMasuk($id_kas_masjid)
    {
        $data = [
            'id_kas_masjid' => $id_kas_masjid,
        ];
        $this->ModelKasMasjid->DeleteKasMasuk($data);
        session()->setFlashdata('pesan', '<i class="fas fa-check"></i> Data Berhasil Didelete!! ');
        return redirect()->to(base_url('KasMasjid/KasMasuk'));
    }

    public function DeleteKasKeluar($id_kas_masjid)
    {
        $data = [
            'id_kas_masjid' => $id_kas_masjid,
        ];
        $this->ModelKasMasjid->DeleteKasKeluar($data);
        session()->setFlashdata('pesan', '<i class="fas fa-check"></i> Data Berhasil Didelete!! ');
        return redirect()->to(base_url('KasMasjid/KasKeluar'));
    }

    public function Laporan()
    {
        $data = [
            'judul' => '<i class="nav-icon fas fa-file-alt nav-icon text-warning"></i> Laporan Kas Masjid',
            'menu' => 'laporan-kas-masjid',
            'submenu' => 'laporan-kas-masjid',
            'page' => 'kas-masjid/v_laporan_kas_masjid',
            'masjid' => $this->ModelAdmin->ViewSetting(),
            //'kas_m' => $this->ModelKasMasjid->AllData(),
        ];
        return view('v_template_admin', $data);
    }
}
