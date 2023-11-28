<?php

namespace App\Controllers;

use App\Models\contactModel;
use App\Models\NewsModel;

class Home extends BaseController
{
    protected $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'MyCoffee'
        ];

        return view('home/index', $data);
    }

    public function contactCreate()
    {
        $data = [
            'validation' => \config\Services::validation()
        ];

        return view('/', $data);
    }

    public function contactSave()
    {
        $this->contactModel->save([
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'telepon' => $this->request->getVar('telepon'),
            'pesan' => $this->request->getVar('pesan')
        ]);

        return redirect()->to('/');
    }
}
