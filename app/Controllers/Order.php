<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrderModel;

class Order extends BaseController
{
    public function list(): string
    {
        $orderModel = new OrderModel();
        $orderModel = $orderModel->join('user', 'order.order_user_id = user.user_id');
        $orderModel = $orderModel->join('product', 'order.order_product_id = product.product_id');

        $currentPage = $this->request->getVar('page_order') ? $this->request->getVar('page_order') : 1;
        $totalData = 10;
        session()->setFlashdata('totalData', $totalData);

        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $orderModel = $orderModel->like('user.nama', $keyword)->orLike('product.product_title', $keyword)->orLike('product.harga_product', $keyword)->orLike('status', $keyword);
        }

        $data = [
            'title' => 'Daftar Pesanan',
            'orders' => $orderModel->orderBy('order_id', 'DESC')->paginate(10, 'order'),
            'pager' => $orderModel->pager,
            'currentPage' => $currentPage
        ];

        return view('/dashboard/order/list', $data);
    }

    public function detail($orderId)
    {
        $session = \Config\Services::session();

        $orderModel = new OrderModel();
        $orderModel = $orderModel->join('user', 'order.order_user_id = user.user_id');
        $orderModel = $orderModel->join('product', 'order.order_product_id = product.product_id');

        $data = [
            'title' => 'Detail Berita',
            'order' => $orderModel->where('order_id', $orderId)->first(),
        ];

        return view('dashboard/order/detail', $data);
    }

    public function save($id)
    {
        $session = \Config\Services::session();

        $orderModel = new OrderModel();

        $orderModel->save([
            'order_user_id' => $session->get('member')['user_id'],
            'order_product_id' => $id,
            'status' => 'dibuat'
        ]);

        session()->setFlashdata('orderSuccess', 'Pesanan berhasil dibuat');

        return redirect()->back();
    }

    public function update($id)
    {
        $session = \Config\Services::session();

        $orderModel = new OrderModel();

        $orderModel->update($id, [
            'order_status' => $this->request->getVar('status')
        ]);

        session()->setFlashdata('orderSuccess', 'Status berhasil diubah');

        return redirect()->to(base_url() . 'dashboard/order-list');
    }
}
