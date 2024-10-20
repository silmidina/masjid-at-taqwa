<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAgenda extends Model
{
    public function AllData()
    {
        return $this->db->table('agenda')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('agenda')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('agenda')
            ->where('id_agenda', $data['id_agenda'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('agenda')
            ->where('id_agenda', $data['id_agenda'])
            ->delete($data);
    }
}
