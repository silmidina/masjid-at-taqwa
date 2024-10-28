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
}
