<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHome extends Model
{
    public function Agenda()
    {
        return $this->db->table('agenda')
            ->where('month(tanggal)', date('m'))
            ->where('year(tanggal)', date('Y'))
            ->orderBy('tanggal', 'ASC')
            ->get()->getResultArray();
    }

    public function AllDataKelompok()
    {
        return $this->db->table('kelompok')
            ->join('tahun', 'tahun.id_tahun = kelompok.id_tahun', 'left')
            ->where('tahun_m', date('Y'))
            ->get()->getResultArray();
    }

    public function AllDataKasMasjid()
    {
        return $this->db->table('kas_masjid')
            ->where('month(tanggal)', date('m'))
            ->where('year(tanggal)', date('Y'))
            ->get()->getResultArray();
    }

    public function AllDataKasSosial()
    {
        return $this->db->table('kas_sosial')
            ->where('month(tanggal)', date('m'))
            ->where('year(tanggal)', date('Y'))
            ->get()->getResultArray();
    }
}
