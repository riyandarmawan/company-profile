<?php $session = \Config\Services::session();
$member = $session->get('member') ?>

<?= $this->extend('layout/dashboard/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Buat Berita</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() . 'dashboard'; ?>">Beranda</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url() . 'dashboard/berita'; ?>">Berita</a></li>
                <li class="breadcrumb-item active">Buat Berita</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="/assets/img/dashboard/user/<?= $member['profile']; ?>" alt="Profile" class="rounded-circle">
                        <h2><?= $member['nama']; ?></h2>
                        <h3>Penulis Berita</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="tab-content pt-2">
                            <div class="fade profile-edit pt-3 show" id="profile-edit">
                                <!-- Profile Edit Form -->
                                <form action="" method="post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="row mb-3">
                                        <label for="judul" class="col-md-4 col-lg-3 col-form-label">Judul</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" name="judul" id="judul" class="form-control <?= $session->getFlashdata('judul') ? 'is-invalid' : ''; ?>" value="<?= $session->getFlashdata('judul') ? '' : old('judul'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $session->getFlashdata('judul'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="news-input" class="col-md-4 col-lg-3 col-form-label">Gambar Berita</label>
                                        <div class="col-md-8 col-lg-9">
                                            <label for="image" class="form-control w-100 rounded d-flex align-items-center justify-content-center cursor-pointer position-relative <?= $session->getFlashdata('image') ? 'is-invalid' : ''; ?>" style="aspect-ratio: 45 / 28; width: 100%; border: 1px solid #dee2e6;" id="image-label">
                                                <p class="news-text">Klik disini untuk upload gambar</p>
                                                <img src="" alt="" class="d-none h-100 position-absolute" id="news-image" style="aspect-ratio: 45 / 28; width: 100%; object-fit: cover;">
                                            </label>
                                            <div class="invalid-feedback">
                                                <?= $session->getFlashdata('image'); ?>
                                            </div>
                                            <div class="pt-2">
                                                <input type="file" name="image" id="image" class="d-none">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="deskripsi-gambar" class="col-md-4 col-lg-3 col-form-label">Deskripsi gambar</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" name="deskripsi-gambar" id="deskripsi-gambar" class="form-control <?= $session->getFlashdata('deskripsi-gambar') ? 'is-invalid' : ''; ?>" value="<?= $session->getFlashdata('deskripsi-gambar') ? '' : old('deskripsi-gambar'); ?>">
                                            <div class="invalid-feedback">
                                            <?= $session->getFlashdata('deskripsi-gambar'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="content" class="col-md-4 col-lg-3 col-form-label">Isi Berita</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea id="content" name="content" autocomplete="off" class="form-control <?= $session->getFlashdata('content') ? 'is-invalid' : ''; ?>" value="<?= $session->getFlashdata('content') ? '' : old('content'); ?>" rows="8" style="resize: none;"></textarea>
                                            <div class="invalid-feedback">
                                            <?= $session->getFlashdata('content'); ?>
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

<!-- Modal -->
<div class="modal fade" id="removeAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">My<span class="c-primary">Coffee</span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus akun ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <a href="" class="btn btn-primary">Ya</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="/assets/js/newsCreate.js"></script>
<?= $this->endSection(); ?>