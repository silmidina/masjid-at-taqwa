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
}
