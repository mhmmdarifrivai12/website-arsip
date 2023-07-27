<?php

namespace App\Controllers;

use App\Models\Model_home;

class Home extends BaseController
{
    protected $Model_home;

    public function __construct()
    {
        $this->Model_home = new Model_home();
    }

    public function index()
    {
        $data = array(
            'title' => 'Home',
            'tot_arsip' => $this->Model_home->tot_arsip(),
            'tot_arsipp' => $this->Model_home->tot_arsipp(),
            'tot_dep' => $this->Model_home->tot_dep(),
            'tot_user' => $this->Model_home->tot_user(),
            'tot_kategori' => $this->Model_home->tot_kategori(),
            'total' => $this->Model_home->total(),
            'isi'    => 'v_home'
        );
        return view('layout/v_wrapper', $data);
    }
}
