<?php $session = \Config\Services::session(); ?>

<?= $this->extend('layout/dashboard/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Detail berita</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() . 'dashboard'; ?>">Beranda</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url() . 'dashboard/news'; ?>">Berita</a></li>
                <li class="breadcrumb-item">Detail</li>
                <li class="breadcrumb-item active"><?= substr($news['title'], 0, 15); ?>...</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="/assets/img/dashboard/user/<?= $news['profile']; ?>" alt="Profile" class="rounded-circle">
                        <h2><?= $news['nama']; ?></h2>
                        <h3>Penulis Berita</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Detail</button>
                            </li>
                            <?php if ($session->get('member')['role'] == 'petugas') : ?>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#news-edit">Ubah Berita</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#news-delete">Hapus Berita</button>
                                </li>
                            <?php endif; ?>
                        </ul>

                        <div class="tab-content pt-2">
                            <?php if (session()->getFlashdata('newsSuccess')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('newsSuccess'); ?>
                                </div>
                            <?php endif; ?>
                            <!-- news detail -->
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h4 class="text-center fb-3 fw-bold mt-2"><?= $news['title']; ?></h4>
                                <div><img src="/assets/img/news/<?= $news['image']; ?>" alt="berita" style="aspect-ratio: 45 / 28; width: 100%; object-fit: cover;" class="rounded my-3"></div>
                                <?php foreach ($paragraphs as $paragraph) : ?>
                                    <p class="small fw-medium text-indent-2rem"><?= $paragraph; ?></p>
                                <?php endforeach; ?>
                            </div>

                            <?php if ($session->get('member')['role'] == 'petugas') : ?>
                                <div class="tab-pane fade profile-edit pt-3 show" id="news-edit">
                                    <!-- Profile Edit Form -->
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <div class="row mb-3">
                                            <label for="judul" class="col-md-4 col-lg-3 col-form-label">Judul</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" name="judul" id="judul" class="form-control <?= $session->getFlashdata('judul') ? 'is-invalid' : ''; ?>" value="<?= session()->getFlashdata('judul') ? $news['title'] : old('judul', $news['title']); ?>">
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
                                                    <img src="/assets/img/news/<?= $news['image']; ?>" alt="berita" class="rounded h-100 position-absolute" id="news-image" style="aspect-ratio: 45 / 28; width: 100%; object-fit: cover; right: 0;">
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
                                            <label for="content" class="col-md-4 col-lg-3 col-form-label">Isi Berita</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea id="content" name="content" autocomplete="off" class="form-control <?= $session->getFlashdata('content') ? 'is-invalid' : ''; ?>" rows="8" style="resize: none;"><?= session()->getFlashdata('content') ? $news['content'] : old('content', $news['content']); ?></textarea>
                                                <div class="invalid-feedback">
                                                    <?= $session->getFlashdata('content'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-warning">Ubah Berita</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>
                            <?php endif; ?>

                            <div class="tab-pane fade pt-3" id="news-delete">
                                <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#deleteNews">Hapus berita ini</a>
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
                Apakah anda yakin ingin menghapus berita ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <a href="<?= base_url() . 'dashboard/news/detail/delete/' . $news['news_id']; ?>" class="btn btn-primary">Ya</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="/assets/js/newsCreate.js"></script>
<?= $this->endSection(); ?>