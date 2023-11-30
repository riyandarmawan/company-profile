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
}
