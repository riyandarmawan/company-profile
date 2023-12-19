<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Product extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Produk Kami'
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
            $productModel = $productModel->like('nama_product', $keyword)->orLike('deskripsi_product', $keyword)->orLike('harga_product', $keyword);
        }

        $data = [
            'title' => 'Daftar Produk',
            'products' => $productModel->paginate($totalData, 'product'),
            'pager' => $productModel->pager,
            'currentPage' => $currentPage
        ];

        return view('dashboard/product/index', $data);
    }
}
