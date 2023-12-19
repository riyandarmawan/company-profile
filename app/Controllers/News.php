<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;

class News extends BaseController
{
    public function index(): string
    {
        $news = new NewsModel();
        $news = $news->join('user', 'news.user_id = user.user_id');

        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $news = $news->like('title', $keyword)->orLike('content', $keyword)->orLike('user.nama', $keyword);
        }

        $data = [
            'title' => 'Berita',
            'allNews' => $news->orderBy('news_id', 'DESC')->paginate(12, 'news'),
            'pager' => $news->pager,
        ];

        return view('news/index', $data);
    }

    public function table(): string
    {
        $news = new NewsModel();
        $news = $news->join('user', 'news.user_id = user.user_id');

        $currentPage = $this->request->getVar('page_news') ? $this->request->getVar('page_news') : 1;
        $totalData = 5;
        session()->setFlashdata('totalData', $totalData);

        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $news = $news->like('title', $keyword)->orLike('content', $keyword)->orLike('user.nama', $keyword);
        }

        $data = [
            'title' => 'Daftar Berita',
            'news' => $news->paginate($totalData, 'news'),
            'pager' => $news->pager,
            'currentPage' => $currentPage
        ];

        return view('dashboard/news/index', $data);
    }

    public function create()
    {
        $session = \Config\Services::session();

        $news = new NewsModel();

        $data = [
            'title' => 'Tambah Berita',
            'validation' => $session->get('validation')
        ];

        return view('dashboard/news/create', $data);
    }

    public function save()
    {
        $session = \Config\Services::session();

        $news = new NewsModel();

        if (!$this->validate([
            'judul' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'max_length' => '{field} maksimal 50 Karakter',
                ]
            ],
            'image' => [
                'rules' => 'max_size[image,2048]|is_image[image]|mime_in[image,image/png,image/jpeg,image/jpg]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yang anda masukkan bukan gambar',
                    'mime_in' => 'Gambar hanya boleh PNG, JPG, dan JPEG'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi berita harus diisi'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('judul', $validation->getError('judul'));
            session()->setFlashdata('image', $validation->getError('image'));
            session()->setFlashdata('content', $validation->getError('content'));

            return redirect()->back()->withInput();
        }

        $slug = url_title($this->request->getVar('judul'), '-', true) .  '-' . date('omdHis', time());

        $image = $this->request->getFile('image');
        if ($image->getError() == 4) {
            session()->setFlashdata('image', 'gambar harus diupload');

            return redirect()->back();
        }
        $imageName = $image->getRandomName();
        $image->move('assets/img/news/', $imageName);

        $judul = ucwords(strtolower($this->request->getVar('judul')));

        $news->save([
            'user_id' => $session->get('member')['user_id'],
            'image' => $imageName,
            'title' => $judul,
            'slug' => $slug,
            'content' => $this->request->getVar('content'),
        ]);

        session()->setFlashdata('newsSuccess', 'Berita berhasil ditambahkan');

        return redirect()->to(base_url() . 'dashboard/news');
    }

    public function detail($slug)
    {
        $session = \Config\Services::session();

        $news = new NewsModel();
        $news = $news->join('user', 'news.user_id = user.user_id');
        $news = $news->where('slug', $slug)->first();
        $paragraphs = preg_split('/.\n./', $news['content']);

        $data = [
            'title' => 'Detail Berita',
            'news' => $news,
            'paragraphs' => $paragraphs
        ];

        return view('dashboard/news/detail', $data);
    }

    public function update($slug)
    {
        $session = \Config\Services::session();

        $newsModel = new NewsModel();

        $news = $newsModel->where('slug', $slug)->first();

        if (!$this->validate([
            'judul' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'max_length' => '{field} maksimal 50 Karakter',
                ]
            ],
            'image' => [
                'rules' => 'max_size[image,2048]|is_image[image]|mime_in[image,image/png,image/jpeg,image/jpg]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yang anda masukkan bukan gambar',
                    'mime_in' => 'Gambar hanya boleh PNG, JPG, dan JPEG'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi berita harus diisi'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('judul', $validation->getError('judul'));
            session()->setFlashdata('image', $validation->getError('image'));
            session()->setFlashdata('content', $validation->getError('content'));

            return redirect()->back()->withInput();
        }

        $slug = url_title($this->request->getVar('judul'), '-', true) .  '-' . date('omdHis', time());

        $image = $this->request->getFile('image');
        $oldImage = $news['image'];
        if ($image->getError() == 4) {
            $imageName = $oldImage;
        } else {
            $imageName = $image->getRandomName();
            unlink('assets/img/news/' . $oldImage);
            $image->move('assets/img/news/', $imageName);
        }

        $judul = ucwords(strtolower($this->request->getVar('judul')));

        $newsModel->update($news['news_id'], [
            'image' => $imageName,
            'title' => $judul,
            'slug' => $slug,
            'content' => $this->request->getVar('content'),
        ]);

        session()->setFlashdata('newsSuccess', 'Berita berhasil diubah');

        $news = $newsModel->where('news_id', $news['news_id'])->first();

        return redirect()->to(base_url() . 'dashboard/news/detail/' . $news['slug']);
    }

    public function delete($newsId)
    {
        $session = \Config\Services::session();

        $news = new NewsModel();

        $imageName = $news->where('news_id', $newsId)->first();
        $imageName = $imageName['image'];
        unlink('assets/img/news/' . $imageName);

        $news->delete($newsId);

        session()->setFlashdata('removeNews', 'Berita berhasil dihapus');

        return redirect()->to(base_url() . 'dashboard/news');
    }

    public function read($slug)
    {
        $session = \Config\Services::session();

        $news = new NewsModel();
        $news = $news->join('user', 'news.user_id = user.user_id');
        $news = $news->where('slug', $slug)->first();

        $data = [
            'title' => $news['title'],
            'news' => $news,
            'paragraphs' => $paragraphs = preg_split('/.\n./', $news['content'])
        ];

        return view('news/read', $data);
    }
}
