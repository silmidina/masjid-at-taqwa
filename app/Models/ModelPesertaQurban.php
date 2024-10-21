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

    public function InsertData($data)
    {
        $this->db->table('kelompok')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('kelompok')
            ->where('id_kelompok', $data['id_kelompok'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('kelompok')
            ->where('id_kelompok', $data['id_kelompok'])
            ->delete($data);
    }
}
