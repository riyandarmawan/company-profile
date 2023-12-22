<?php $session = \Config\Services::session(); ?>

<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<?php if ($session->get('member')) : ?>
    <div class="group container-card">
        <div class="group m-3 w-100 d-flex justify-content-end">
            <div class="search-bar w-25 mx-2">
                <form class="search-form d-flex align-items-center" method="get" action="">
                    <input type="text" name="keyword" placeholder="Search" title="Enter search keyword" autofocus>
                    <button type="submit" title="Search"><i data-feather="search"></i></button>
                </form>
            </div><!-- End Search Bar -->
        </div>
        <?php if (session()->getFlashdata('orderSuccess')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('orderSuccess'); ?>
            </div>
        <?php endif; ?>
        <div class="group grid mb-5" style="display: grid; grid-template-columns:  repeat(auto-fit, minmax(18rem, 1fr)); gap: 2rem;">
            <?php foreach ($products as $product) : ?>
                <div class="card">
                    <img src="/assets/img/product/<?= $product['product_image']; ?>" class="card-img-top" alt="produk" style="object-fit: cover; aspect-ratio: 1 / 1;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['product_title']; ?></h5>
                        <p class="card-text text-justify mb-1" style="-webkit-line-clamp: 1; line-clamp: 1; overflow: hidden; display: -webkit-box;"><?= $product['product_description']; ?></p>
                        <h5 class="card-text text-justify">Rp. <?= number_format($product['product_price'], 0, '.', '.'); ?></h5>
                        <a href="<?= base_url() . 'product/order/' . $product['product_id']; ?>" class="btn btn-c-primary d-flex align-items-center" style="gap: .5rem;"><i data-feather="shopping-cart" class="shopping-cart"></i> Pesan Sekarang</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?= $pager->links('product', 'custom_pagination'); ?>
    </div>
<?php else : ?>
    <div class="container">
        <p class="text-center">anda harus <a href="<?= base_url() . 'registration/login'; ?>">Login</a> untuk bisa mengakses fitur ini</p>
    </div>
<?php endif; ?>

<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<script src="/assets/js/product.js"></script>
<?php $this->endSection(); ?>