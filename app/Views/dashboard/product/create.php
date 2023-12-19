<?php $session = \Config\Services::session();
$member = $session->get('member') ?>

<?= $this->extend('layout/dashboard/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() . 'dashboard'; ?>">Beranda</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url() . 'dashboard/berita'; ?>">Berita</a></li>
                <li class="breadcrumb-item active">Tambah Produk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="tab-content pt-2">
                            <div class="fade profile-edit pt-3 show" id="profile-edit">
                                <!-- Profile Edit Form -->
                                <form action="" method="post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="row mb-3">
                                        <label for="product-image-input" class="col-md-4 col-lg-3 col-form-label">Gambar Produk</label>
                                        <div class="col-md-8 col-lg-9">
                                            <label for="product-image-input" class="form-control w-100 rounded d-flex align-items-center justify-content-center cursor-pointer position-relative <?= $session->getFlashdata('product-image') ? 'is-invalid' : ''; ?>" style="aspect-ratio: 1 / 1; height: 10rem; width: 10rem !important; border: 1px solid #dee2e6;" id="product-image-label">
                                                <p class="product-text text-center m-0">Klik disini untuk upload gambar</p>
                                                <img src="" alt="" class="d-none h-100 position-absolute" id="product-image" style="aspect-ratio: 1 / 1; width: 100%; object-fit: cover;">
                                            </label>
                                            <div class="invalid-feedback">
                                                <?= $session->getFlashdata('product-image'); ?>
                                            </div>
                                            <div class="pt-2">
                                                <input type="file" name="product-image" id="product-image-input" class="d-none">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="product-title" class="col-md-4 col-lg-3 col-form-label">Judul Produk</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" name="product-title" id="product-title" class="form-control <?= $session->getFlashdata('product-title') ? 'is-invalid' : ''; ?>" value="<?= $session->getFlashdata('product-title') ? '' : old('product-title'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $session->getFlashdata('product-title'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="product-description" class="col-md-4 col-lg-3 col-form-label">Deskripsi Produk</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" name="product-description" id="product-description" class="form-control <?= $session->getFlashdata('product-description') ? 'is-invalid' : ''; ?>" value="<?= $session->getFlashdata('product-description') ? '' : old('product-description'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $session->getFlashdata('product-description'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="product-price" class="col-md-4 col-lg-3 col-form-label">Harga Produk</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="number" name="product-price" id="product-price" class="form-control <?= $session->getFlashdata('product-price') ? 'is-invalid' : ''; ?>" value="<?= $session->getFlashdata('product-price') ? '' : old('product-price'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $session->getFlashdata('product-price'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Tambah Berita</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="/assets/js/productCreate.js"></script>
<?= $this->endSection(); ?>