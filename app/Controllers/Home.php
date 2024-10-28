<?php

namespace App\Controllers;

use App\Models\ModelHome;
use App\Models\ModelAdmin;
use App\Models\ModelKasMasjid;
use App\Models\ModelKasSosial;

class Home extends BaseController
{
    protected $ModelHome;
    protected $ModelAdmin;
    protected $ModelKasMasjid;
    protected $ModelKasSosial;

    public function __construct()
    {
        $this->ModelHome = new ModelHome();
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelKasMasjid = new ModelKasMasjid();
        $this->ModelKasSosial = new ModelKasSosial();
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
            'kas_m' => $this->ModelKasMasjid->AllData(),
            'kas_s' => $this->ModelKasSosial->AllData(),
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

    public function PesertaQurban()
    {
        $y = date('Y');
        $m = $y - 579;
        $data = [
            'judul' => 'Peserta Qurban Tahun ' . $m . 'H / ' . date('Y') . 'M',
            'page' => 'front-end/v_peserta_qurban',
            'kelompok' => $this->ModelHome->AllDataKelompok(),
        ];
        return view('v_template', $data);
    }

    public function RekapKasMasjid()
    {
        $data = [
            'judul' => 'Rekap Kas Masjid',
            'page' => 'front-end/v_rekap_kas_masjid',
            'kas' => $this->ModelHome->AllDataKasMasjid(),
        ];
        return view('v_template', $data);
    }

    public function RekapKasSosial()
    {
        $data = [
            'judul' => 'Rekap Kas Sosial',
            'page' => 'front-end/v_rekap_kas_sosial',
            'kas' => $this->ModelHome->AllDataKasSosial(),
        ];
        return view('v_template', $data);
    }
}
