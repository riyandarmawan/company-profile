<?php $session = \Config\Services::session(); ?>

<?= $this->extend('layout/dashboard/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() . 'dashboard'; ?>">Beranda</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url() . 'dashboard/user'; ?>">Pengguna</a></li>
                <li class="breadcrumb-item">Detail</li>
                <li class="breadcrumb-item active"><?= $user['nama']; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="/assets/img/dashboard/user/<?= $user['profile']; ?>" alt="Profile" class="rounded-circle">
                        <h2><?= $user['nama']; ?></h2>
                        <h3><?= $user['role']; ?></h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <div class="tab-content pt-2">
                            <?php if (session()->getFlashdata('role')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('role'); ?>
                                </div>
                            <?php endif; ?>

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Profil <?= $user['nama']; ?></h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama</div>
                                    <div class="col-lg-9 col-md-8"><?= $user['nama']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Username</div>
                                    <div class="col-lg-9 col-md-8">@<?= $user['username']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Telepon</div>
                                    <div class="col-lg-9 col-md-8"><?= $user['telepon']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?= $user['email']; ?></div>
                                </div>
                                <form action="" method="post">
                                    <div class="row mb-3">
                                        <label for="role" class="col-md-4 col-lg-3 col-form-label label">Role</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select name="role" id="role" class="form-select" aria-label="Default select example">
                                                <option value="pengunjung">Pengunjung</option>
                                                <option value="petugas">Petugas</option>
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