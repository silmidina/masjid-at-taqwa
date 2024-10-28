<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    public function ViewSetting()
    {
        return $this->db->table('setting')
            ->where('id_setting', 1)
            ->get()->getRowArray();
    }

    public function UpdateSetting($data)
    {
        $this->db->table('setting')
            ->where('id_setting', 1)
            ->update($data);
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

    public function AllDonasi()
    {
        return $this->db->table('donasi')
            ->join('rekening', 'rekening.id_rekening = donasi.id_rekening', 'left')
            ->select('donasi.no_rek as no_rek_pengirim')
            ->select('donasi.nama_bank as nama_bank_pengirim')
            ->select('donasi.nama_pengirim')
            ->select('donasi.jumlah')
            ->select('donasi.bukti')
            ->select('donasi.tgl')
            ->select('donasi.jenis_donasi')
            ->select('rekening.no_rek as no_rek_tujuan')
            ->select('rekening.nama_bank as nama_bank_tujuan')
            ->orderBy('id_donasi', 'DESC')
            ->get()->getResultArray();
    }
}
