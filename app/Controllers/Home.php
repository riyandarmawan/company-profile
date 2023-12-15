<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Header;
use App\Models\NewsModel;

class Home extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();

        $news = new NewsModel();
        $news = $news->join('user', 'news.user_id = user.user_id');

        $data = [
            'title' => 'MyCoffee',
            'member' => $session->get('member'),
            'news' => $news->orderBy('news_id', 'DESC')->limit(4)->find()
        ];


        return view('home/index', $data);
    }
}
