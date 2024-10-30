<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKasSosial extends Model
{
    public function AllData()
    {
        return $this->db->table('kas_sosial')
            ->get()->getResultArray();
    }

    public function AllDataKasMasuk()
    {
        return $this->db->table('kas_sosial')
            ->where('status', 'Masuk')
            ->get()->getResultArray();
    }

    public function AllDataKasKeluar()
    {
        return $this->db->table('kas_sosial')
            ->where('status', 'Keluar')
            ->get()->getResultArray();
    }

    public function InsertKasMasuk($data)
    {
        $this->db->table('kas_sosial')->insert($data);
    }

    public function InsertKasKeluar($data)
    {
        $this->db->table('kas_sosial')->insert($data);
    }

    public function UpdateKasMasuk($data)
    {
        $this->db->table('kas_sosial')
            ->where('id_kas_sosial', $data['id_kas_sosial'])
            ->update($data);
    }

    public function UpdateKasKeluar($data)
    {
        $this->db->table('kas_sosial')
            ->where('id_kas_sosial', $data['id_kas_sosial'])
            ->update($data);
    }

    public function DeleteKasMasuk($data)
    {
        $this->db->table('kas_sosial')
            ->where('id_kas_sosial', $data['id_kas_sosial'])
            ->delete($data);
    }

    public function DeleteKasKeluar($data)
    {
        $this->db->table('kas_sosial')
            ->where('id_kas_sosial', $data['id_kas_sosial'])
            ->delete($data);
    }

    public function AllDataBulanan($bulan, $tahun)
    {
        return $this->db->table('kas_sosial')
            ->where('month(tanggal)', $bulan)
            ->where('year(tanggal)', $tahun)
            ->get()->getResultArray();
    }
}
