<?php

namespace App\Controllers;

use App\Models\Model_arsipp;
use App\Models\Model_Kategori;

class arsipp extends BaseController
{
    protected $Model_arsipp;
    protected $Model_Kategori;


    public function __construct()
    {
        $this->Model_arsipp = new Model_arsipp();
        $this->Model_Kategori = new Model_Kategori();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'arsipp',
            'arsipp' => $this->Model_arsipp->all_data(),
            'isi'    => 'arsipp/v_index'
        );
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'title' => 'Add arsipp',
            'kategori' => $this->Model_Kategori->all_data(),
            'isi'    => 'arsipp/v_add'
        );
        return view('layout/v_wrapper', $data);
    }
    //--------------------------------------------------------------------

    public function insert()
    {
        if ($this->validate([
            'nama_arsipp' => [
                'label'  => 'Nama arsipp',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_kategori' => [
                'label'  => 'Kategori',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],
            'deskripsi' => [
                'label'  => 'Deskripsi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],
        ])) {
            //mengambil file foto yg akan di upload di form
            $file_arsipp = $this->request->getFile('file_arsipp');
            //merandom nama file foto
            $nama_file = $file_arsipp->getRandomName();
            //mengambil ukuran file
            $ukuran_file = $file_arsipp->getSize('kb');
            //jika valid
            $data = array(
                'id_kategori' => $this->request->getPost('id_kategori'),
                'no_arsipp' => $this->request->getPost('no_arsipp'),
                'nama_arsipp' => $this->request->getPost('nama_arsipp'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'tgl_upload' => date('Y-m-d'),
                'tgl_update' => date('Y-m-d'),
                'id_departemen' => session()->get('id_departemen'),
                'id_user' => session()->get('id_user'),
                'file_arsipp' => $nama_file,
                'ukuran_file' => $ukuran_file,
            );

            $file_arsipp->move('file_arsipp', $nama_file); //directori upload file
            $this->Model_arsipp->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
            return redirect()->to(base_url('arsipp'));
        } else {
            //jika Tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('arsipp/add'));
        }
    }

    //edit
    public function edit($id_arsipp)
    {
        $data = array(
            'title' => 'Edit Document',
            'kategori' => $this->Model_Kategori->all_data(),
            'arsipp'    => $this->Model_arsipp->detail_data($id_arsipp),
            'isi'    => 'arsipp/v_edit'
        );
        return view('layout/v_wrapper', $data);
    }

    public function update($id_arsipp)
    {
        if ($this->validate([
            'nama_arsipp' => [
                'label'  => 'Nama Document',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_kategori' => [
                'label'  => 'Kategori',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],
            'deskripsi' => [
                'label'  => 'Deskripsi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],
        ])) {
            //mengambil file foto yg akan di upload di form
            $file_arsipp = $this->request->getFile('file_arsipp');
            if ($file_arsipp->getError() == 4) {
                //jika file tidak di ganti
                $data = array(
                    'id_arsipp'  => $id_arsipp,
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'no_arsipp' => $this->request->getPost('no_arsipp'),
                    'nama_arsipp' => $this->request->getPost('nama_arsipp'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'tgl_update' => date('Y-m-d'),
                    'id_departemen' => session()->get('id_departemen'),
                    'id_user' => session()->get('id_user'),
                );
                $this->Model_arsipp->edit($data);
            } else {
                //jika file di ganti
                //menghapus foto lama
                $arsipp = $this->Model_arsipp->detail_data($id_arsipp);
                if ($arsipp['file_arsipp'] != "") {
                    unlink('file_arsipp/' . $arsipp['file_arsipp']);
                }
                //merandom nama file foto
                $nama_file = $file_arsipp->getRandomName();
                //mengambil ukuran file
                $ukuran_file = $file_arsipp->getSize('kb');
                //jika valid
                $data = array(
                    'id_arsipp'  => $id_arsipp,
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'no_arsipp' => $this->request->getPost('no_arsipp'),
                    'nama_arsipp' => $this->request->getPost('nama_arsipp'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'tgl_update' => date('Y-m-d'),
                    'id_departemen' => session()->get('id_departemen'),
                    'id_user' => session()->get('id_user'),
                    'file_arsipp' => $nama_file,
                    'ukuran_file' => $ukuran_file,
                );
                $file_arsipp->move('file_arsipp', $nama_file); //directori upload file
                $this->Model_arsipp->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
            return redirect()->to(base_url('arsipp'));
        } else {
            //jika Tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('arsipp/edit' . $id_arsipp));
        }
    }

    public function delete($id_arsipp)
    {
        //menghapus foto lama
        $arsipp = $this->Model_arsipp->detail_data($id_arsipp);
        if ($arsipp['file_arsipp'] != "") {
            unlink('file_arsipp/' . $arsipp['file_arsipp']);
        }

        $data = array(
            'id_arsipp' => $id_arsipp,
        );
        $this->Model_arsipp->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('arsipp'));
    }

    public function viewpdf($id_arsipp)
    {
        $data = array(
            'title' => 'View Document',
            'arsipp' => $this->Model_arsipp->detail_data($id_arsipp),
            'isi'    => 'arsipp/v_viewpdf'
        );
        return view('layout/v_wrapper', $data);
    }
}
