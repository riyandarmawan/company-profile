<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Product extends BaseController
{
    public function index(): string
    {
        $productModel = new ProductModel();

        $currentPage = $this->request->getVar('page_product') ? $this->request->getVar('page_product') : 1;
        $totalData = 10;
        session()->setFlashdata('totalData', $totalData);

        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $productModel = $productModel->like('product_title', $keyword)->orLike('product_description', $keyword)->orLike('product_price', $keyword);
        }

        $data = [
            'title' => 'Produk Kami',
            'products' => $productModel->paginate($totalData, 'product'),
            'pager' => $productModel->pager,
            'currentPage' => $currentPage
        ];

        return view('product/index', $data);
    }

    public function table(): string
    {
        $productModel = new ProductModel();

        $currentPage = $this->request->getVar('page_product') ? $this->request->getVar('page_product') : 1;
        $totalData = 5;
        session()->setFlashdata('totalData', $totalData);

        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $productModel = $productModel->like('product_title', $keyword)->orLike('product_description', $keyword)->orLike('product_price', $keyword);
        }

        $data = [
            'title' => 'Daftar Produk',
            'products' => $productModel->paginate($totalData, 'product'),
            'pager' => $productModel->pager,
            'currentPage' => $currentPage
        ];

        return view('dashboard/product/index', $data);
    }

    public function create(): string
    {
        $productModel = new ProductModel();

        $data = [
            'title' => 'Tambah Produk',
        ];

        return view('dashboard/product/create', $data);
    }

    public function save()
    {
        $session = \Config\Services::session();

        $productModel = new ProductModel();

        if (!$this->validate([
            'product-image' => [
                'rules' => 'max_size[product-image,2048]|is_image[product-image]|mime_in[product-image,image/png,image/jpeg,image/jpg]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yang anda masukkan bukan gambar',
                    'mime_in' => 'Gambar hanya boleh PNG, JPG, dan JPEG'
                ]
            ],
            'product-title' => [
                'rules' => 'required|max_length[30]',
                'errors' => [
                    'required' => 'judul produk harus diisi',
                    'max_length' => 'judul produk maksimal 30 Karakter',
                ]
            ],
            'product-description' => [
                'rules' => 'required|max_length[70]',
                'errors' => [
                    'required' => 'Deskripsi produk harus diisi',
                    'max_length' => 'deskripsi produk maksimal 70 Karakter',
                ]
            ],
            'product-price' => [
                'rules' => 'required|max_length[6]|numeric',
                'errors' => [
                    'required' => 'Deskripsi produk harus diisi',
                    'max_length' => 'Harga produk maksimal 6 angka',
                    'numeric' => 'Harga produk harus berupa angka',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('product-image', $validation->getError('product-image'));
            session()->setFlashdata('product-title', $validation->getError('product-title'));
            session()->setFlashdata('product-description', $validation->getError('product-description'));
            session()->setFlashdata('product-price', $validation->getError('product-price'));

            return redirect()->back()->withInput();
        }

        $slug = url_title($this->request->getVar('product-title'), '-', true) .  '-' . date('omdHis', time());

        $productImage = $this->request->getFile('product-image');
        if ($productImage->getError() == 4) {
            session()->setFlashdata('product-image', 'gambar harus diupload');

            return redirect()->back();
        }
        $imageName = $productImage->getRandomName();
        $productImage->move('assets/img/product/', $imageName);

        $productTitle = ucwords(strtolower($this->request->getVar('product-title')));

        $productModel->save([
            'product_image' => $imageName,
            'product_title' => $productTitle,
            'product_slug' => $slug,
            'product_description' => $this->request->getVar('product-description'),
            'product_price' => $this->request->getVar('product-price'),
        ]);

        session()->setFlashdata('productSuccess', 'Produk berhasil ditambahkan');

        return redirect()->to(base_url() . 'dashboard/product');
    }

    public function detail($slug)
    {
        $session = \Config\Services::session();

        $products = new ProductModel();

        $data = [
            'title' => 'Detail Berita',
            'product' => $products->where('product_slug', $slug)->first(),
        ];

        return view('dashboard/product/detail', $data);
    }
    
    public function update($slug)
    {
        $session = \Config\Services::session();

        $productModel = new ProductModel();
        $product = $productModel->where('product_slug', $slug)->first();

        if (!$this->validate([
            'product-image' => [
                'rules' => 'max_size[product-image,2048]|is_image[product-image]|mime_in[product-image,image/png,image/jpeg,image/jpg]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yang anda masukkan bukan gambar',
                    'mime_in' => 'Gambar hanya boleh PNG, JPG, dan JPEG'
                ]
            ],
            'product-title' => [
                'rules' => 'required|max_length[30]',
                'errors' => [
                    'required' => 'judul produk harus diisi',
                    'max_length' => 'judul produk maksimal 30 Karakter',
                ]
            ],
            'product-description' => [
                'rules' => 'required|max_length[70]',
                'errors' => [
                    'required' => 'Deskripsi produk harus diisi',
                    'max_length' => 'deskripsi produk maksimal 70 Karakter',
                ]
            ],
            'product-price' => [
                'rules' => 'required|max_length[6]|numeric',
                'errors' => [
                    'required' => 'Deskripsi produk harus diisi',
                    'max_length' => 'Harga produk maksimal 6 angka',
                    'numeric' => 'Harga produk harus berupa angka',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('product-image', $validation->getError('product-image'));
            session()->setFlashdata('product-title', $validation->getError('product-title'));
            session()->setFlashdata('product-description', $validation->getError('product-description'));
            session()->setFlashdata('product-price', $validation->getError('product-price'));

            return redirect()->back()->withInput();
        }

        $slug = url_title($this->request->getVar('product-title'), '-', true) .  '-' . date('omdHis', time());

        $productImage = $this->request->getFile('product-image');
        $oldImage = $product['product_image'];
        if ($productImage->getError() == 4) {
            $imageName = $oldImage;
        } else {
            $imageName = $productImage->getRandomName();
            unlink('assets/img/product/' . $oldImage);
            $productImage->move('assets/img/product/', $imageName);
        }

        $productTitle = ucwords(strtolower($this->request->getVar('product-title')));

        $productModel->update($product['product_id'], [
            'product_image' => $imageName,
            'product_title' => $productTitle,
            'product_slug' => $slug,
            'product_description' => $this->request->getVar('product-description'),
            'product_price' => $this->request->getVar('product-price'),
        ]);

        $product = $productModel->where('product_id', $product['product_id'])->first();

        session()->setFlashdata('productSuccess', 'Produk berhasil diubah');

        return redirect()->to(base_url() . 'dashboard/product/detail/' . $product['product_slug']);
    }

    public function delete($productId)
    {
        $session = \Config\Services::session();

        $productModel = new ProductModel();

        $imageName = $productModel->where('product_id', $productId)->first();
        $imageName = $imageName['product_image'];
        unlink('assets/img/product/' . $imageName);

        $productModel->delete($productId);

        session()->setFlashdata('removeProduct', 'Produk berhasil dihapus');

        return redirect()->to(base_url() . 'dashboard/product');
    }
}
