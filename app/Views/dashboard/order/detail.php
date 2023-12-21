<?php $session = \Config\Services::session(); ?>

<?= $this->extend('layout/dashboard/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Detail</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() . 'dashboard'; ?>">Beranda</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url() . 'dashboard/order-list'; ?>">Daftar Pesanan</a></li>
                <li class="breadcrumb-item">Detail</li>
                <li class="breadcrumb-item active"><?= $order['product_title']; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col>
                <div class=" card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Nama Pemesan</div>
                                <div class="col-lg-9 col-md-8"><?= $order['nama']; ?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Produk yang dipesan</div>
                                <div class="col-lg-9 col-md-8"><?= $order['product_title']; ?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Harga produk</div>
                                <div class="col-lg-9 col-md-8">Rp. <?= number_format($order['product_price'], 0, '.', '.'); ?></div>
                            </div>
                            <form action="" method="post">
                                <?= csrf_field(); ?>
                                <div class="row mb-3">
                                    <label for="status" class="col-md-4 col-lg-3 col-form-label label">Status</label>
                                    <div class="col-md-8 col-lg-9">
                                        <select name="status" id="status" class="form-select" aria-label="Default select example">
                                            <option value="dibuat">dibuat</option>
                                            <option value="diantar">diantar</option>
                                            <option value="selesai">selesai</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
        </div>
    </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>