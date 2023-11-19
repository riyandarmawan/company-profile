<?php

namespace App\Controllers;

use App\Models\NewsModel;

class Company extends BaseController
{
    protected $newsModel;

    public function __construct()
    {
        $this->newsModel = new NewsModel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Company Profile',
            'news' => $this->newsModel->paginate(4, 'news')
        ];

        return view('pages/home', $data);
    }
}
