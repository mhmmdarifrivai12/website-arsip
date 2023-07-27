<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_home extends Model
{

    public function tot_arsip()
    {
        return $this->db->table('tbl_arsip')->countAll();
    }

    public function tot_arsipp()
    {
        return $this->db->table('tbl_arsip_2')->countAll();
    }

    public function tot_dep()
    {
        return $this->db->table('tbl_departemen')->countAll();
    }

    public function tot_user()
    {
        return $this->db->table('tbl_user')->countAll();
    }
    public function tot_kategori()
    {
        return $this->db->table('tbl_kategori')->countAll();
    }

    public function total()
    {
        $total1 = $this->db->table('tbl_arsip')->countAll();
        $total2 = $this->db->table('tbl_arsip_2')->countAll();

        $total = $total1 + $total2;

        return $total;
    }
}
