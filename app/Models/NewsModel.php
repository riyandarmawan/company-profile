<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $useTimestamps = true;
    protected $allowedFields = ['title', 'content', 'image', 'alt'];

    public function getLatestNews()
    {
        return $this->orderBy('id', 'DESC')->limit(3)->find();
    }

    public function getNews()
    {
        return $this->orderBy('id', 'DESC')->offset(3)->limit(PHP_INT_MAX)->find();
    }
}