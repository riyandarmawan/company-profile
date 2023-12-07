<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Dashboard extends BaseController
{
   public function index() 
   {    
        $session = \Config\Services::session();

        $data = [
            'title' => 'dashboard',
            'user' => $session->get('member')
        ];

        return view('/dashboard/index', $data);
   }
}
