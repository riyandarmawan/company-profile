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
            'profile' => [
                'rules' => 'max_size[profile,2048]|is_image[profile]|mime_in[profile,image/png,image/jpeg,image/jpg]',
                'errors' => [
                    'max_size' => 'Maksimal ukuran photo profile adalah 2mb',
                    'is_image' => 'Yang anda masukkan bukan gambar',
                    'mime_in' => 'Gambar harus berupa png, jpg, atau jpeg'
                ]
            ],
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

            session()->setFlashdata('profile', $validation->getError('profile'));
            session()->setFlashdata('nama', $validation->getError('nama'));
            session()->setFlashdata('username', $validation->getError('username'));
            session()->setFlashdata('telepon', $validation->getError('telepon'));
            session()->setFlashdata('email', $validation->getError('email'));
            session()->setFlashdata('password', $validation->getError('password'));
            session()->setFlashdata('confirmPassword', $validation->getError('confirmPassword'));

            return redirect()->to(base_url() . 'registration/register')->withInput();
        }

        $profile = $this->request->getFile('profile');

        if ($profile->getError() == 4) {
            $namaProfile = 'default.jpg';
        } else {
            $namaProfile = $profile->getRandomName();

            $profile->move('assets/img/dashboard/user', $namaProfile);
        }

        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

        $username = $this->request->getVar('username');

        $username = strtolower($username);

        $nama = $this->request->getVar('nama');

        $nama = ucwords(strtolower($nama));

        $userModel->save([
            'profile' => $namaProfile,
            'nama' => $nama,
            'username' => $username,
            'telepon' => $this->request->getVar('telepon'),
            'email' => $this->request->getVar('email'),
            'password' => $password,
            'role' => 'pengunjung'
        ]);

        $user = $userModel->where('username', $username)->first();

        $session->set('member', $user);

        return redirect()->back();
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

        return redirect()->back();
    }

    public function logout()
    {
        $session = \Config\Services::session();

        session_unset();
        $session->destroy();

        return redirect()->to(base_url());
    }

    public function update()
    {
        $session = \Config\Services::session();

        $userModel = new UserModel();

        $usernameLama = $session->get('member')['username'];
        $username = $this->request->getVar('username');

        if ($usernameLama == $username) {
            $rulesUsername = 'required|max_length[30]|alpha_numeric';
        } else {
            $rulesUsername = 'required|max_length[30]|is_unique[user.username]|alpha_numeric';
        }

        $teleponLama = $session->get('member')['telepon'];
        $telepon = $this->request->getVar('telepon');

        if ($teleponLama == $telepon) {
            $rulesTelepon = 'required|max_length[13]|min_length[8]|numeric';
        } else {
            $rulesTelepon = 'required|max_length[13]|min_length[8]|is_unique[user.telepon]|numeric';
        }

        $emailLama = $session->get('member')['email'];
        $email = $this->request->getVar('email');

        if ($emailLama == $email) {
            $rulesEmail = 'required|max_length[30]|valid_email';
        } else {
            $rulesEmail = 'required|max_length[30]|is_unique[user.email]|valid_email';
        }

        if (!$this->validate([
            'profile' => [
                'rules' => 'max_size[profile,2048]|is_image[profile]|mime_in[profile,image/png,image/jpeg,image/jpg]',
                'errors' => [
                    'max_size' => 'Maksimal ukuran photo profile adalah 2mb',
                    'is_image' => 'Yang anda masukkan bukan gambar',
                    'mime_in' => 'Gambar harus berupa png, jpg, atau jpeg'
                ]
            ],
            'nama' => [
                'rules' => 'required|max_length[30]|',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'max_length' => '{field} maksimal 30 karakter'
                ]
            ],

            'username' => [
                'rules' => $rulesUsername,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'max_length' => '{field} maksimal 30 karakter',
                    'is_unique' => '{field} sudah ada yang menggunakan',
                    'alpha_numeric' => '{field} harus berupa huruf dan angka'
                ]
            ],
            'telepon' => [
                'rules' => $rulesTelepon,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'max_length' => '{field} maksimal 13 karakter',
                    'min_length' => '{field} minimal 8 karakter',
                    'is_unique' => '{filed} sudah ada yang menggunakan',
                    'numeric' => 'yang anda masukkan bukan angka'
                ]
            ],
            'email' => [
                'rules' => $rulesEmail,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'max_length' => '{field} maksimal 30 karakter',
                    'is_unique' => '{field} sudah ada yang menggunakan',
                    'valid_email' => 'yang anda masukkan bukan {field}'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('profile', $validation->getError('profile'));
            session()->setFlashdata('nama', $validation->getError('nama'));
            session()->setFlashdata('username', $validation->getError('username'));
            session()->setFlashdata('telepon', $validation->getError('telepon'));
            session()->setFlashdata('email', $validation->getError('email'));

            return redirect()->to(base_url() . 'dashboard/my-profile')->withInput();
        }

        // profile
        $fileLama = $session->get('member')['profile'];
        $profile = $this->request->getFile('profile');

        if ($profile->getError() == 4) {
            $namaProfile = $fileLama;
        } else {
            $namaProfile = $profile->getRandomName();

            if ($fileLama != 'default.jpg') {
                // hapus file lama
                unlink('assets/img/dashboard/user/' . $fileLama);
            }

            $profile->move('assets/img/dashboard/user', $namaProfile);
        }

        // username
        $username = $this->request->getVar('username');
        $username = strtolower($username);

        // nama
        $nama = $this->request->getVar('nama');
        $nama = ucwords(strtolower($nama));

        $oldData = $session->get('member');

        $newData = [
            'profile' => $namaProfile,
            'nama' => $nama,
            'username' => $username,
            'telepon' => $this->request->getVar('telepon'),
            'email' => $this->request->getVar('email'),
        ];

        $difference = array_diff_assoc($newData, $oldData);

        if (empty($difference)) {
            session()->setFlashdata('kosong', 'Tidak ada perubahan yang anda lakukan');

            return redirect()->to(base_url() . 'dashboard/my-profile');
        }

        $userModel->update($oldData['user_id'], $newData);

        $user = $userModel->where('username', $username)->first();

        session()->setFlashdata('berhasil', 'Perubahan berhasil dilakukan');

        $session->set('member', $user);

        return redirect()->to(base_url() . 'dashboard/my-profile');
    }

    public function changePassword()
    {
        $session = \Config\Services::session();

        $userModel = new UserModel();

        if (!$this->validate([
            'oldPassword' => [
                'rules' => 'required|max_length[60]|min_length[8]',
                'errors' => [
                    'required' => 'Password lama harus diisi',
                    'max_length' => 'Password lama maksimal 60 karakter',
                    'min_length' => 'Password lama minimal 8 karakter',
                ]
            ],
            'newPassword' => [
                'rules' => 'required|max_length[60]|min_length[8]',
                'errors' => [
                    'required' => 'Password baru harus diisi',
                    'max_length' => 'Password baru maksimal 60 karakter',
                    'min_length' => 'Password baru minimal 8 karakter',
                ]
            ],
            'renewPassword' => [
                'rules' => 'required|max_length[60]|min_length[8]|matches[newPassword]',
                'errors' => [
                    'required' => 'Konfirmasi Password baru harus diisi',
                    'max_length' => 'Konfirmasi Password baru maksimal 60 karakter',
                    'min_length' => 'Konfirmasi Password baru minimal 8 karakter',
                    'matches' => 'Konfirmasi Password baru tidak cocok'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('oldPassword', $validation->getError('oldPassword'));
            session()->setFlashdata('newPassword', $validation->getError('newPassword'));
            session()->setFlashdata('renewPassword', $validation->getError('renewPassword'));

            return redirect()->to(base_url() . 'dashboard/my-profile')->withInput();
        }

        $oldData = $session->get('member');

        $oldPassword = $this->request->getVar('oldPassword');
        $hash = $oldData['password'];
        if (!password_verify($oldPassword, $hash)) {
            session()->setFlashdata('oldPassword', 'Password yang anda masukkan salah');

            return redirect()->to(base_url() . 'dashboard/my-profile');
        }

        $newPassword = password_hash($this->request->getVar('newPassword'), PASSWORD_DEFAULT);

        $newData = [
            'password' => $newPassword,
        ];

        $userModel->update($oldData['id'], $newData);

        session()->setFlashdata('passwordBerhasil', 'Perubahan berhasil dilakukan');

        $user = $userModel->where('id', $oldData['id'])->first();

        $session->set('member', $user);

        return redirect()->to(base_url() . 'dashboard/my-profile');
    }

    public function remove($user_id)
    {
        $session = \Config\Services::session();

        $users = new UserModel();

        $user = $users->where('user_id', $user_id)->first();

        if ($user['profile'] != 'default.jpg') {
            unlink('assets/img/dashboard/user' . $user['profile']);
        }

        $users->delete($user_id);

        $session->destroy();

        return redirect()->to(base_url() . 'registration/register');
    }
}
