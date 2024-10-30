<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKasSosial;
use App\Models\ModelAdmin;
use CodeIgniter\HTTP\ResponseInterface;

class KasSosial extends BaseController
{
    protected $ModelKasSosial;
    protected $ModelAdmin;

    public function __construct()
    {
        $this->ModelKasSosial = new ModelKasSosial();
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'judul' => '<i class="nav-icon fas fa-file-alt nav-icon text-primary"></i> Rekap Kas Sosial',
            'menu' => 'kas-sosial',
            'submenu' => 'rekap-kas',
            'page' => 'kas-sosial/v_rekap_kas_sosial',
            'kas_s' => $this->ModelKasSosial->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasMasuk()
    {
        $data = [
            'judul' => '<i class="nav-icon fas fa-file-download nav-icon text-success"></i> Kas Sosial Masuk',
            'menu' => 'kas-sosial',
            'submenu' => 'kas-masuk',
            'page' => 'kas-sosial/v_kas_sosial_masuk',
            'kas_s' => $this->ModelKasSosial->AllDataKasMasuk(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasKeluar()
    {
        $data = [
            'judul' => '<i class="nav-icon fas fa-file-upload nav-icon text-danger"></i> Kas Sosial Keluar',
            'menu' => 'kas-sosial',
            'submenu' => 'kas-keluar',
            'page' => 'kas-sosial/v_kas_sosial_keluar',
            'kas_s' => $this->ModelKasSosial->AllDataKasKeluar(),
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
        $this->ModelKasSosial->InsertKasMasuk($data);
        session()->setFlashdata('pesan', '<i class="fas fa-check"></i> Data Berhasil Ditambahkan!! ');
        return redirect()->to(base_url('KasSosial/KasMasuk'));
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
        $this->ModelKasSosial->InsertKasMasuk($data);
        session()->setFlashdata('pesan', '<i class="fas fa-check"></i> Data Berhasil Ditambahkan!! ');
        return redirect()->to(base_url('KasSosial/KasKeluar'));
    }

    public function UpdateKasMasuk($id_kas_sosial)
    {
        $data = [
            'id_kas_sosial' => $id_kas_sosial,
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kas_masuk'),
        ];
        $this->ModelKasSosial->UpdateKasMasuk($data);
        session()->setFlashdata('pesan', '<i class="fas fa-check"></i> Data Berhasil Diupdate!! ');
        return redirect()->to(base_url('KasSosial/KasMasuk'));
    }

    public function UpdateKasKeluar($id_kas_sosial)
    {
        $data = [
            'id_kas_sosial' => $id_kas_sosial,
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_keluar' => $this->request->getPost('kas_keluar'),
        ];
        $this->ModelKasSosial->UpdateKasKeluar($data);
        session()->setFlashdata('pesan', '<i class="fas fa-check"></i> Data Berhasil Diupdate!! ');
        return redirect()->to(base_url('KasSosial/KasKeluar'));
    }

    public function DeleteKasMasuk($id_kas_sosial)
    {
        $data = [
            'id_kas_sosial' => $id_kas_sosial,
        ];
        $this->ModelKasSosial->DeleteKasMasuk($data);
        session()->setFlashdata('pesan', '<i class="fas fa-check"></i> Data Berhasil Didelete!! ');
        return redirect()->to(base_url('KasSosial/KasMasuk'));
    }

    public function DeleteKasKeluar($id_kas_sosial)
    {
        $data = [
            'id_kas_sosial' => $id_kas_sosial,
        ];
        $this->ModelKasSosial->DeleteKasKeluar($data);
        session()->setFlashdata('pesan', '<i class="fas fa-check"></i> Data Berhasil Didelete!! ');
        return redirect()->to(base_url('KasSosial/KasKeluar'));
    }

    public function Laporan()
    {
        $data = [
            'judul' => '<i class="nav-icon fas fa-file-alt nav-icon text-warning"></i> Laporan Kas Sosial',
            'menu' => 'laporan-kas',
            'submenu' => 'laporan-kas-sosial',
            'page' => 'kas-sosial/v_laporan_kas_sosial',
            'masjid' => $this->ModelAdmin->ViewSetting(),
            //'kas_m' => $this->ModelKasMasjid->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function ViewLaporan()
    {
        //$this->request->getPost('bulan');
        $bulan =  $this->request->getPost('bulan');
        $tahun =  $this->request->getPost('tahun');
        $data = [
            'kas' => $this->ModelKasSosial->AllDataBulanan($bulan, $tahun),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];
        $response = [
            'data' => view('kas-sosial/v_data_laporan', $data),
        ];
        echo json_encode($response);
    }
}
