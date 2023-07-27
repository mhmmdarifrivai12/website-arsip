<?php

namespace App\Controllers;

use App\Models\Model_Departemen;

class Departemen extends BaseController
{
    protected $Model_Departemen;

    public function __construct()
    {
        $this->Model_Departemen = new Model_Departemen();
        helper('form');
    }
    public function index()
    {
        $data =  array(
            'title' => 'Departemen',
            'Departemen' => $this->Model_Departemen->all_data(),
            'isi' => 'v_departemen'
        );
        return view('layout/v_wrapper', $data);
    }
    public function add()
    {
        $data = array('nama_departemen' => $this->request->getPost());
        $this->Model_Departemen->add($data);
        session()->setFlashdata('pesan', 'Kategori Berhasil Ditambahkan');
        return redirect()->to(base_url('departemen'));
    }

    public function edit($id_departemen)
    {
        $data = array(
            'id_departemen' => $id_departemen,
            'nama_departemen' => $this->request->getPost(),
        );
        $this->Model_Departemen->edit($data);
        session()->setFlashdata('pesan', 'Kategori Berhasil Diedit');
        return redirect()->to(base_url('departemen'));
    }


    public function delete($id_departemen)
    {
        $data = array(
            'id_departemen' => $id_departemen,
        );
        $this->Model_Departemen->delete_data($data);
        session()->setFlashdata('pesan', 'Kategori Berhasil Dihapus');
        return redirect()->to(base_url('departemen'));
    }
}
