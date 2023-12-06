<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    public function user(): string
    {
        $user = new UserModel();

        $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;

        $data = [
            'title' => 'User',
            'users' => $user->paginate(9, 'user'),
            'pager' => $user->pager,
            'currentPage' => $currentPage
        ];

        return view('dashboard/user/index', $data);
    }

    public function create(): string
    {
        $data = [
            'title' => 'Tambah User'
        ];

        return view('dashboard/user/create', $data);
    }

    public function save()
    {
        $userModel = new UserModel();

        $userModel->save([
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'role' => $this->request->getVar('role')
        ]);

        session()->setFlashdata('pesan', 'User berhasil ditambahkan');

        return redirect()->to(base_url() . 'dashboard/user');
    }

    public function edit($id)
    {
        $userModel = new UserModel();

        $data = [
            'title' => 'Ubah data user',
            'user' => $userModel->find($id)
        ];

        return view('dashboard/user/edit', $data);
    }

    public function update($id)
    {
        $userModel = new UserModel();

        $userModel->update($id, [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'role' => $this->request->getVar('role')
        ]);

        session()->setFlashdata('pesanUpdate', 'Data berhasil diubah!');

        return redirect()->to(base_url() . 'dashboard/user');
    }

    public function delete($id)
    {
        $userModel = new UserModel();

        $userModel->delete($id);

        session()->setFlashdata('pesanDelete', 'Data user berhasil dihapus!');

        return redirect()->to(base_url() . 'dashboard/user');
    }
}
