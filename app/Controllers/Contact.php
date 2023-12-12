<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContactModel;

class Contact extends BaseController
{
    public function index(): string
    {
        $contacts = new ContactModel();
        $contacts = $contacts->join('user', 'contact.user_id = user.user_id');

        $currentPage = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;
        $totalData = 7;
        session()->setFlashdata('totalData', $totalData);

        $keyword = $this->request->getVar('keyword');

        if($keyword) {
            $contacts = $contacts->like('user.nama', $keyword)->orLike('pesan', $keyword);
        }

        $data = [
            'title' => 'Kontak',
            'contacts' => $contacts->paginate(7, 'contact'),
            'pager' => $contacts->pager,
            'currentPage' => $currentPage
        ];

        return view('/dashboard/contact/index', $data);
    }

    public function detail($contact_id): string
    {
        $contacts = new ContactModel();
        $contacts = $contacts->join('user', 'contact.user_id = user.user_id');

        $data = [
            'title' => 'Kontak',
            'contact' => $contacts->where('contact_id', $contact_id)->first(),
        ];

        return view('/dashboard/contact/detail', $data);
    }

    public function save()
    {
        $session = \Config\Services::session();

        $contact = new ContactModel();

        if (!$this->validate([
            'pesan' => [
                'rules' => 'required|max_length[1000]',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'max_length' => '{field} maksimal 100 karakter!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('pesanGagal', $validation->getError('pesan'));

            return redirect()->to(base_url() . '#contact')->withInput();
        }

        $userId = $session->get('member')['id'];

        $contact->save([
            'user_id' => $userId,
            'pesan' => $this->request->getVar('pesan')
        ]);

        session()->setFlashdata('pesan', 'Pesan anda berhasil dikirim');

        return redirect()->to(base_url() . '#contact');
    }
}
