<?php

namespace App\Controllers;

use App\Models\Model_Kategori;

class Kategori extends BaseController
{
    protected $Model_Kategori;

    public function __construct()
    {
        $this->Model_Kategori = new Model_Kategori();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'Category    ',
            'kategori' => $this->Model_Kategori->all_data(),
            'isi'    => 'v_kategori'
        );
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = array('nama_kategori' => $this->request->getPost('nama_kategori'));
        $this->Model_Kategori->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->to(base_url('kategori'));
    }

    public function edit($id_kategori)
    {
        $data = array(
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        );
        $this->Model_Kategori->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('kategori'));
    }

    public function delete($id_kategori)
    {
        $data = array(
            'id_kategori' => $id_kategori,
        );
        $this->Model_Kategori->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('kategori'));
    }
    //--------------------------------------------------------------------

}
