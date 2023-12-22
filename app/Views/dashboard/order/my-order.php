<?php $session = \Config\Services::session(); ?>

<?= $this->extend('layout/dashboard/template'); ?>

<?= $this->section('css'); ?>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/assets/css/dashboard/table.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<main id="main">
    <?php if (session()->getFlashdata('orderSuccess')) :  ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('orderSuccess'); ?>
        </div>
    <?php endif; ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Produk yang di pesan</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <form action="" method="post">
                    <?php $counter = 1 + (session()->getFlashdata('totalData') * ($currentPage - 1));
                    foreach ($orders as $order) : ?>
                        <tr class="alert" role="alert">
                            <td><?= $counter; ?></td>
                            <td><?= $order['product_title']; ?></td>
                            <td>Rp. <?= number_format($order['product_price'], 0, '.', '.'); ?></td>
                            <td class="<?= $order['order_status'] == 'dibuat' ? 'text-danger' : ($order['order_status'] == 'diantar' ? 'c-warning' : 'text-success'); ?>"><?= $order['order_status']; ?></td>
                            <td><a href="<?= base_url() . 'dashboard/my-order/delete/' . $order['order_id']; ?>" class="btn btn-danger fs-6"><i data-feather="trash-2"></i></a></td>
                        </tr>
                    <?php $counter++;
                    endforeach; ?>
                </form>
            </tbody>
        </table>
        <?php if (!$orders) : ?>
            <p class="text-center">Pesanan tidak ada</p>
        <?php endif; ?>
    </div>
    <?= $pager->links('order', 'custom_pagination'); ?>
</main>

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="/assets/js/table/jquery.min.js"></script>
<script src="/assets/js/table/popper.js"></script>
<script src="/assets/js/table/bootstrap.min.js"></script>
<script src="/assets/js/table/main.js"></script>
<?= $this->endSection(); ?>