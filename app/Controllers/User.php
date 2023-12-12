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
        $totalData = 7;
        session()->setFlashdata('totalData', $totalData);

        $keyword = $this->request->getVar('keyword');

        if($keyword) {
            $users = $users->like('nama', $keyword)->orLike('username', $keyword)->orLike('telepon', $keyword)->orLike('email', $keyword);
        }

        $data = [
            'title' => 'Pengguna',
            'member' => $session->get('member'),
            'users' => $users->paginate($totalData, 'users'),
            'pager' => $users->pager,
            'currentPage' => $currentPage
        ];

        return view('dashboard/user/index', $data);
    }

    public function detail($username)
    {   
        $users = new UserModel();

        $data = [
            'title' => 'Detail Pengguna',
            'user' => $users->where('username', $username)->first()
        ];

        return view('dashboard/user/detail', $data);
    }

    public function change($username)
    {   
        $session = \Config\Services::session();
        
        $users = new UserModel();

        $user = $users->where('username', $username)->first();

        $users->update($user['id'], [
            'role' => $this->request->getVar('role')
        ]);

        session()->setFlashdata('role', 'Role berhasil diubah');

        $session->set('member', $user);

        return redirect()->to(base_url() . 'dashboard/user/detail/' . $username);
    }

    public function remove($id)
    {   
        $session = \Config\Services::session();

        $users = new UserModel();

        $user = $users->where('username', $id)->first();

        $users->delete($id);

        session()->setFlashdata('remove', 'User berhasil dihapus');

        $session->set('member', $user);

        return redirect()->to(base_url() . 'dashboard/user');
    }
}
