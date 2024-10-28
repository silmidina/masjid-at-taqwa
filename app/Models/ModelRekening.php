<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRekening extends Model
{
    public function AllData()
    {
        return $this->db->table('rekening')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('rekening')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('rekening')
            ->where('id_rekening', $data['id_rekening'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('rekening')
            ->where('id_rekening', $data['id_rekening'])
            ->delete($data);
    }
}
