<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContactModel;

class Contact extends BaseController
{
    public function index(): string
    {
        $contact = new ContactModel();

        $currentPage = $this->request->getVar('page_contact') ? $this->request->getVar('page_contact') : 1;

        $data = [
            'title' => 'Pesan',
            'contacts' => $contact->orderBy('id', 'DESC')->paginate(7, 'contact'),
            'pager' => $contact->pager,
            'currentPage' => $currentPage
        ];

        return view('/dashboard/contact/index', $data);
    }

    public function save()
    {
        $contact = new ContactModel();

        if (!$this->validate([
            'nama' => [
                'rules' => 'required|max_length[30]',
                'errors' => [
                    'required' => '{fiweld} harus diisi!',
                    'max_length' => '{field} maksimal 30 karakter!'
                ]
            ],
            'email' => [
                'rules' => 'required|max_length[30]|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'max_length' => '{field} maksimal 30 karakter!',
                    'valid_email' => 'yang anda masukkan bukan {field}'
                ]
            ],
            'telepon' => [
                'rules' => 'required|max_length[13]|numeric',
                'errors' => [
                    'required' => 'nomor {field} harus diisi!',
                    'max_length' => '{field} maksimal 13 karakter!',
                    'numeric' => 'yang anda isi bukan nomor {field}!'
                ]
            ],
            'pesan' => [
                'rules' => 'required|max_length[1000]',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'max_length' => '{field} maksimal 100 karakter!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('nama', $validation->getError('nama'));
            session()->setFlashdata('email', $validation->getError('email'));
            session()->setFlashdata('telepon', $validation->getError('telepon'));
            session()->setFlashdata('pesanGagal', $validation->getError('pesan'));

            return redirect()->to(base_url() . '#contact')->withInput();
        }

        $contact->save([
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'telepon' => $this->request->getVar('telepon'),
            'pesan' => $this->request->getVar('pesan')
        ]);

        session()->setFlashdata('pesan', 'Pesan anda berhasil dikirim');

        return redirect()->to(base_url() . '#contact');
    }
}
