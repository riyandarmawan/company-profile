<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Registration extends BaseController
{
    public function register(): string
    {
        $data = [
            'title' => 'Register'
        ];

        return view('registration/register', $data);
    }

    public function login(): string
    {
        $data = [
            'title' => 'Login'
        ];

        return view('registration/login', $data);
    }

    public function save()
    {
        $session = \Config\Services::session();

        $userModel = new UserModel();

        if (!$this->validate([
            'nama' => [
                'rules' => 'required|max_length[30]|',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'max_length' => '{field} maksimal 30 karakter'
                ]
            ],
            'username' => [
                'rules' => 'required|max_length[30]|is_unique[user.username]|alpha_numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'max_length' => '{field} maksimal 30 karakter',
                    'is_unique' => '{field} sudah ada yang menggunakan',
                    'alpha_numeric' => '{field} harus berupa huruf dan angka'
                ]
            ],
            'telepon' => [
                'rules' => 'required|max_length[13]|min_length[8]|is_unique[user.telepon]|numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'max_length' => '{field} maksimal 13 karakter',
                    'min_length' => '{field} minimal 8 karakter',
                    'is_unique' => '{filed} sudah ada yang menggunakan',
                    'numeric' => 'yang anda masukkan bukan angka'
                ]
            ],
            'email' => [
                'rules' => 'required|max_length[30]|is_unique[user.email]|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'max_length' => '{field} maksimal 30 karakter',
                    'is_unique' => '{field} sudah ada yang menggunakan',
                    'valid_email' => 'yang anda masukkan bukan {field}'
                ]
            ],
            'password' => [
                'rules' => 'required|max_length[60]|min_length[8]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'max_length' => '{field} maksimal 60 karakter',
                    'min_length' => '{field} minimal 8 karakter',
                ]
            ],
            'confirmPassword' => [
                'rules' => 'required|max_length[60]|min_length[8]|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi Password harus diisi',
                    'max_length' => 'Konfirmasi Password maksimal 60 karakter',
                    'min_length' => 'Konfirmasi Password minimal 8 karakter',
                    'matches' => 'Konfirmasi Password tidak cocok'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('nama', $validation->getError('nama'));
            session()->setFlashdata('username', $validation->getError('username'));
            session()->setFlashdata('telepon', $validation->getError('telepon'));
            session()->setFlashdata('email', $validation->getError('email'));
            session()->setFlashdata('password', $validation->getError('password'));
            session()->setFlashdata('confirmPassword', $validation->getError('confirmPassword'));

            return redirect()->to(base_url() . 'registration/register')->withInput();
        }

        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

        $username = $this->request->getVar('username');

        $username = strtolower($username);

        $nama = $this->request->getVar('nama');

        $nama = ucwords(strtolower($nama));

        $userModel->save([
            'nama' => $nama,
            'username' => $username,
            'telepon' => $this->request->getVar('telepon'),
            'email' => $this->request->getVar('email'),
            'password' => $password,
            'role' => 'pengunjung'
        ]);

        $user = $userModel->where('username', $username)->first();

        $session->set('member', $user);

        return redirect()->to(base_url());
    }


    public function take()
    {
        $session = \Config\Services::session();

        $userModel = new UserModel();

        $identify = $this->request->getVar('identify');

        $user = $userModel->where('username', $identify)->orWhere('telepon', $identify)->orWhere('email', $identify)->first();

        if (!$this->validate([
            'identify' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username, telepon, atau email harus diisi'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]|max_length[60]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 8 karakter',
                    'max_length' => '{field} maksimal 60 karakter'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('identify', $validation->getError('identify'));
            session()->setFlashdata('password', $validation->getError('password'));

            if (!$user) {
                session()->setFlashdata('identify', 'pengguna tidak ditemukan');
            }

            return redirect()->to(base_url() . 'registration/login')->withInput();
        }

        $password = $this->request->getVar('password');

        if ($user) {
            if (!password_verify($password, $user['password'])) {
                session()->setFlashdata('password', 'Password yang anda masukkan salah');

                return redirect()->to(base_url() . 'registration/login')->withInput();
            }
        } else {
            session()->setFlashdata('identify', 'pengguna tidak ditemukan');

            return redirect()->to(base_url() . 'registration/login')->withInput();
        }

        $session->set('member', $user);

        return redirect()->to(base_url());
    }

    public function logout() {
        $session = \Config\Services::session();

        $session->destroy();

        return redirect()->to(base_url());
    }
}
