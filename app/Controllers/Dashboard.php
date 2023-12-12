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
            'title' => 'Dashboard',
            'member' => $session->get('member')
        ];

        return view('/dashboard/index', $data);
   }

   public function myProfile() 
   {    
        $session = \Config\Services::session();

        $data = [
            'title' => 'Profil Saya',
            'member' => $session->get('member')
        ];

        return view('/dashboard/my-profile', $data);
   }
}
