<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPesertaQurban extends Model
{

    public function AllDataKelompok($id_tahun)
    {
        return $this->db->table('kelompok')
            ->where('id_tahun', $id_tahun)
            ->get()->getResultArray();
    }


    public function DeleteKelompok($data)
    {
        $this->db->table('kelompok')
            ->where('id_kelompok', $data['id_kelompok'])
            ->delete($data);
    }

    public function InsertKelompok($data)
    {
        $this->db->table('kelompok')->insert($data);
    }

    public function InsertPeserta($data)
    {
        $this->db->table('peserta_kelompok')->insert($data);
    }


    public function DeletePeserta($data)
    {
        $this->db->table('peserta_kelompok')
            ->where('id_peserta', $data['id_peserta'])
            ->delete($data);
    }
}
