<?php

namespace App\Controllers;

use App\Models\Model_User;
use App\Models\Model_Departemen;

class User extends BaseController
{
    protected $Model_User;
    protected $Model_Departemen;

    public function __construct()
    {
        $this->Model_User = new Model_User();
        $this->Model_Departemen = new Model_Departemen();
        helper('form');
    }

    public function index()
    {
        $data =  array(
            'title' => 'User',
            'user' => $this->Model_User->all_data(),
            'isi' => 'user\v_index'
        );
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data =  array(
            'title' => 'Add',
            'departemen' => $this->Model_Departemen->all_data(),
            'isi' => 'user\v_add'
        );
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'nama_user' => [
                'label'  => 'Nama User',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'email' => [
                'label'  => 'email',
                'rules'  => 'required|is_unique[tbl_user.email] ',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                    'is_unique' => 'Username Sudah Ada !',
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'level' => [
                'label'  => 'Level',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'id_departemen' => [
                'label'  => 'Departemen',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'foto' => [
                'label'  => 'Foto',
                'rules'  => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                    'max_size' => 'Ukuran {field} Max 1024 KB',
                    'mime_in' => 'Format {field} Harus PNG, JPG, JPEG',
                ]
            ],
        ])) {
            //valid
            //file foto yg akan diupload di form
            $foto = $this->request->getFile('foto');
            //merandom nama file foto
            $nama_file = $foto->getRandomName();

            $data = array(
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'level' => $this->request->getPost('level'),
                'id_departemen' => $this->request->getPost('id_departemen'),
                'foto' => $nama_file,

            );

            $foto->move('foto', $nama_file);
            $this->Model_User->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
            return redirect()->to(base_url('user'));
        } else {
            //tidak
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/add'));
        }
    }

    public function edit($id_user)
    {
        $data =  array(
            'title' => 'Edit User ',
            'departemen' => $this->Model_Departemen->all_data(),
            'user' => $this->Model_User->detail_data($id_user),
            'isi' => 'user\v_edit'
        );
        return view('layout/v_wrapper', $data);
    }

    public function update($id_user)
    {
        if ($this->validate([
            'nama_user' => [
                'label'  => 'Nama User',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'level' => [
                'label'  => 'Level',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'id_departemen' => [
                'label'  => 'Departemen',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'foto' => [
                'label'  => 'Foto',
                'rules'  => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 1024 KB',
                    'mime_in' => 'Format {field} Harus PNG, JPG, JPEG',
                ]
            ],
        ])) {
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $data = array(
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'password' => $this->request->getPost('password'),
                    'level' => $this->request->getPost('level'),
                    'id_departemen' => $this->request->getPost('id_departemen'),
                );
                $this->Model_User->edit($data);
            } else {
                //menghapus foto lama
                $user = $this->Model_User->detail_data($id_user);
                if ($user['foto'] != "") {
                    unlink('foto/' . $user['foto']);
                }
                //merandom nama file foto
                $nama_file = $foto->getRandomName();
                $data = array(
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'password' => $this->request->getPost('password'),
                    'level' => $this->request->getPost('level'),
                    'id_departemen' => $this->request->getPost('id_departemen'),
                    'foto' => $nama_file,
                );
                $foto->move('foto', $nama_file); //directori upload file
                $this->Model_User->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
            return redirect()->to(base_url('user'));
        } else {
            //jika Tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/edit/' . $id_user));
        }
    }

    public function delete($id_user)
    {
        //menghapus foto lama
        $user = $this->Model_User->detail_data($id_user);
        if ($user['foto'] != "") {
            unlink('foto/' . $user['foto']);
        }

        $data = array(
            'id_user' => $id_user,
        );
        $this->Model_User->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('user'));
    }
}
