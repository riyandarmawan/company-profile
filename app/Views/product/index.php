<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="group container-card">
    <div class="group m-3 w-100 d-flex justify-content-end">
        <div class="search-bar w-25 mx-2">
            <form class="search-form d-flex align-items-center" method="get" action="">
                <input type="text" name="keyword" placeholder="Search" title="Enter search keyword" autofocus>
                <button type="submit" title="Search"><i data-feather="search"></i></button>
            </form>
        </div><!-- End Search Bar -->
    </div>
    <div class="group" style="display: grid; grid-template-columns:  repeat(auto-fit, minmax(18rem, 1fr)); gap: 2rem;">
        <?php for ($i = 1; $i <= 10; $i++) : ?>
            <div class="card">
                <img src="/assets/img/product/1.jpg" class="card-img-top" alt="produk" style="object-fit: cover; aspect-ratio: 1 / 1;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text text-justify">Some quick example text to build on the card title fjaj sajk idiu ajsd</p>
                    <a href="#" class="btn btn-c-primary d-flex align-items-center" style="gap: .5rem;"><i data-feather="shopping-cart" class="shopping-cart"></i> Pesan Sekarang</a>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>

<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<script src="/assets/js/product.js"></script>
<?php $this->endSection(); ?>