<?php $session = \Config\Services::session(); ?>

<?= $this->extend('layout/dashboard/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Detail produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() . 'dashboard'; ?>">Beranda</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url() . 'dashboard/product'; ?>">Produk</a></li>
                <li class="breadcrumb-item">Detail</li>
                <li class="breadcrumb-item active"><?= substr($product['product_title'], 0, 15); ?>...</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#product-detail">Detail</button>
                            </li>
                            <?php if ($session->get('member')['role'] == 'petugas') : ?>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#news-edit">Ubah Produk</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#news-delete">Hapus Produk</button>
                                </li>
                            <?php endif; ?>
                        </ul>

                        <div class="tab-content pt-2">
                            <?php if (session()->getFlashdata('productSuccess')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('productSuccess'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="tab-pane fade product-detail active pt-3 show" id="product-detail">
                                <!-- news detail -->
                                <div class="row mb-3">
                                    <p class="col-md-4 col-lg-3 col-form-label py-0">Gambar Produk</p>
                                    <img src="/assets/img/product/<?= $product['product_image']; ?>" alt="Produk" class="p-0" style="aspect-ratio: 1 / 1; width: 10rem; height: 10rem; object-fit: cover;">
                                </div>
                                <div class="row mb-3">
                                    <p class="col-md-4 col-lg-3 col-form-label py-0">Judul Produk</p>
                                    <p class="col-md-8 col-lg-9 ps-0"><?= $product['product_title']; ?></p>
                                </div>
                                <div class="row mb-3">
                                    <p class="col-md-4 col-lg-3 col-form-label py-0">Deskripsi Produk</p>
                                    <p class="col-md-8 col-lg-9 ps-0"><?= $product['product_description']; ?></p>
                                </div>
                                <div class="row mb-3">
                                    <p class="col-md-4 col-lg-3 col-form-label py-0">Harga Produk</p>
                                    <p class="col-md-8 col-lg-9 ps-0"><?= number_format($product['product_price'], 0, '.', '.'); ?></p>
                                </div>
                            </div>

                            <?php if ($session->get('member')['role'] == 'petugas') : ?>
                                <div class="tab-pane fade profile-edit pt-3 show" id="news-edit">
                                    <!-- Profile Edit Form -->
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <div class="row mb-3">
                                            <label for="product-image-input" class="col-md-4 col-lg-3 col-form-label">Gambar Produk</label>
                                            <div class="col-md-8 col-lg-9">
                                                <label for="product-image-input" class="form-control w-100 rounded d-flex align-items-center justify-content-center cursor-pointer position-relative <?= $session->getFlashdata('product-image') ? 'is-invalid' : ''; ?>" style="aspect-ratio: 1 / 1; height: 10rem; width: 10rem !important; border: 1px solid #dee2e6;" id="product-image-label">
                                                    <p class="product-text text-center m-0">Klik disini untuk upload gambar</p>
                                                    <img src="/assets/img/product/<?= $product['product_image']; ?>" alt="" class="h-100 position-absolute" id="product-image" style="aspect-ratio: 1 / 1; width: 100%; object-fit: cover; top: 0; left: 0; right: 0; bottom: 0;">
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
                                                <input type="text" name="product-title" id="product-title" class="form-control <?= $session->getFlashdata('product-title') ? 'is-invalid' : ''; ?>" value="<?= $session->getFlashdata('product-title') ? $product['product_title'] : old('product-title', $product['product_title']); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $session->getFlashdata('product-title'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="product-description" class="col-md-4 col-lg-3 col-form-label">Deskripsi Produk</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" name="product-description" id="product-description" class="form-control <?= $session->getFlashdata('product-description') ? 'is-invalid' : ''; ?>" value="<?= $session->getFlashdata('product-description') ? $product['product_description'] : old('product-description', $product['product_description']); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $session->getFlashdata('product-description'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="product-price" class="col-md-4 col-lg-3 col-form-label">Harga Produk</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="number" name="product-price" id="product-price" class="form-control <?= $session->getFlashdata('product-price') ? 'is-invalid' : ''; ?>" value="<?= $session->getFlashdata('product-price') ? $product['product_price'] : old('product-price', $product['product_price']); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $session->getFlashdata('product-price'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Ubah Produk</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>
                            <?php endif; ?>

                            <div class="tab-pane fade pt-3" id="news-delete">
                                <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#deleteNews">Hapus produk ini</a>
                            </div>
                        </div><!-- End Bordered Tabs -->
                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<div class="modal fade" id="deleteNews" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">My<span class="c-primary">Coffee</span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus produk ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <a href="<?= base_url() . 'dashboard/product/detail/delete/' . $product['product_id']; ?>" class="btn btn-primary">Ya</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="/assets/js/productCreate.js"></script>
<?= $this->endSection(); ?>