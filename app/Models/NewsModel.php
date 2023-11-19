<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $useTimestamps = true;
    protected $allowedFields = ['title', 'content'];

    public function getNews()
    {
        return $this->findAll();
    }
}