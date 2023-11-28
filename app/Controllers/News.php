<?php

namespace App\Controllers;

use App\Models\NewsModel;

class News extends BaseController
{
    protected $newsModel;

    public function __construct()
    {
        $this->newsModel = new NewsModel();
    }

    public function index(): string
    {

        $data = [
            'title' => 'Berita',
            'latestNews' => $this->newsModel->getLatestNews(),
            'news' => $this->newsModel->getNews(),
        ];
        
        return view('/news', $data);
    }
}
