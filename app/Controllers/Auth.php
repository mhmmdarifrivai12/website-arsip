<?php

namespace App\Controllers;

use App\Models\Model_auth;

class Auth extends BaseController
{
    protected $Model_auth;

    public function __construct()
    {
        helper('form');
        $this->Model_auth = new Model_auth();
    }

    public function index()
    {
        $data =  array(
            'title' => 'Login',
        );
        return view('v_login', $data);
    }

    public function login()
    {
        if ($this->validate([
            'email' => [
                'label'  => 'E-Maill',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !'
                ]
            ]
        ])) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cek = $this->Model_auth->login($email, $password);
            if ($cek) {
                session()->set('log', true);
                session()->set('nama_user', $cek['nama_user']);
                session()->set('email', $cek['email']);
                session()->set('level', $cek['level']);
                session()->set('foto', $cek['foto']);
                return redirect()->to(base_url('home'));
            } else {
                session()->setFlashdata('pesan', 'Login Gagal');
                return redirect()->to(base_url('auth/index'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/index'));
        }
        # code...
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('nama_user');
        session()->remove('email');
        session()->remove('level');
        session()->remove('foto');

        session()->setFlashdata('pesan', 'Anda Telah Logout');
        return redirect()->to(base_url('auth'));
    }
}
