<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {   
        $session = \Config\Services::session();

        $users = new UserModel();

        $currentPage = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;

        $data = [
            'title' => 'Pengguna',
            'member' => $session->get('member'),
            'users' => $users->paginate(8, 'users'),
            'pager' => $users->pager,
            'currentPage' => $currentPage
        ];

        return view('dashboard/user/index', $data);
    }
}
