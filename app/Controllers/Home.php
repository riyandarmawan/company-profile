<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Header;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'MyCoffee'
        ];

        $session = \Config\Services::session();

        dd($session->get('user')['nama']);

        return view('home/index', $data);
    }
}
