<?php

namespace App\Models;

use CodeIgniter\Database\SQLite3\Table;
use CodeIgniter\Model;

class Model_User extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_user')
            ->join('tbl_departemen', 'tbl_departemen.id_departemen = tbl_user.id_departemen', 'left')
            ->orderBy('id_user', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function detail_data($id_user)
    {
        return $this->db->table('tbl_user')
            ->join('tbl_departemen', 'tbl_departemen.id_departemen = tbl_user.id_departemen', 'left')
            ->where('id_user', $id_user)
            ->get()
            ->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_user')->insert($data);
    }

    public function edit($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_user');

        $builder->where('id_user', $data['id_user']);
        $builder->update($data);
    }


    public function delete_data($data)
    {
        $this->db->table('tbl_user')
            ->where('id_user', $data['id_user'])
            ->delete($data);
    }

    // ...
}
