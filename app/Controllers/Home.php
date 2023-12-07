<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Header;

class Home extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();

        $data = [
            'title' => 'MyCoffee',
            'member' => $session->get('member')
        ];


        return view('home/index', $data);
    }
}
