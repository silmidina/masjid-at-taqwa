<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKasMasjid extends Model
{
    public function AllData()
    {
        return $this->db->table('kas_masjid')
            ->get()->getResultArray();
    }

    public function AllDataKasMasuk()
    {
        return $this->db->table('kas_masjid')
            ->where('status', 'Masuk')
            ->get()->getResultArray();
    }

    public function AllDataKasKeluar()
    {
        return $this->db->table('kas_masjid')
            ->where('status', 'Keluar')
            ->get()->getResultArray();
    }

    public function InsertKasMasuk($data)
    {
        $this->db->table('kas_masjid')->insert($data);
    }

    public function InsertKasKeluar($data)
    {
        $this->db->table('kas_masjid')->insert($data);
    }

    public function UpdateKasMasuk($data)
    {
        $this->db->table('kas_masjid')
            ->where('id_kas_masjid', $data['id_kas_masjid'])
            ->update($data);
    }

    public function UpdateKasKeluar($data)
    {
        $this->db->table('kas_masjid')
            ->where('id_kas_masjid', $data['id_kas_masjid'])
            ->update($data);
    }

    public function DeleteKasMasuk($data)
    {
        $this->db->table('kas_masjid')
            ->where('id_kas_masjid', $data['id_kas_masjid'])
            ->delete($data);
    }

    public function DeleteKasKeluar($data)
    {
        $this->db->table('kas_masjid')
            ->where('id_kas_masjid', $data['id_kas_masjid'])
            ->delete($data);
    }

    public function AllDataBulanan($bulan, $tahun)
    {
        return $this->db->table('kas_masjid')
            ->where('month(tanggal)', $bulan)
            ->where('year(tanggal)', $tahun)
            ->get()->getResultArray();
    }
}
