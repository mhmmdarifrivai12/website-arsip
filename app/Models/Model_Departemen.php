<?php

namespace App\Models;

use CodeIgniter\Database\SQLite3\Table;
use CodeIgniter\Model;

class Model_Departemen extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_departemen')
            ->orderBy('id_departemen', 'DESC')
            ->get()
            ->getResultArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_departemen')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_departemen')
            ->where('id_departemen', $data['id_departemen'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_departemen')
            ->where('id_departemen', $data['id_departemen'])
            ->delete($data);
    }

    // ...
}
