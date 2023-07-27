<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_arsipp extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_arsip_2')
            ->join('tbl_departemen', 'tbl_departemen.id_departemen = tbl_arsip_2.id_departemen', 'left')
            ->join('tbl_user', 'tbl_user.id_user = tbl_arsip_2.id_user', 'left')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_arsip_2.id_kategori', 'left')
            ->orderBy('id_arsipp', 'DESC')
            ->where('tbl_arsip_2.id_user', session()->get('id_user'))
            ->get()
            ->getResultArray();
    }

    public function detail_data($id_arsipp)
    {
        return $this->db->table('tbl_arsip_2')
            ->join('tbl_departemen', 'tbl_departemen.id_departemen = tbl_arsip_2.id_departemen', 'left')
            ->join('tbl_user', 'tbl_user.id_user = tbl_arsip_2.id_user', 'left')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_arsip_2.id_kategori', 'left')
            ->where('id_arsipp', $id_arsipp)
            ->get()
            ->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_arsip_2')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_arsip_2')
            ->where('id_arsipp', $data['id_arsipp'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_arsip_2')
            ->where('id_arsipp', $data['id_arsipp'])
            ->delete($data);
    }
}
