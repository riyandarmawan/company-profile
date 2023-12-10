<?php $session = \Config\Services::session(); ?>

<?= $this->extend('layout/dashboard/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() . 'dashboard'; ?>">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="/assets/img/dashboard/user/<?= $session->get('member')['profile']; ?>" alt="Profile" class="rounded-circle">
                        <h2><?= $member['nama']; ?></h2>
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
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Ubah Profil</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ubah Password</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Profil Saya</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama</div>
                                    <div class="col-lg-9 col-md-8"><?= $member['nama']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Username</div>
                                    <div class="col-lg-9 col-md-8">@<?= $member['username']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Telepon</div>
                                    <div class="col-lg-9 col-md-8"><?= $member['telepon']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?= $member['email']; ?></div>
                                </div>
                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <?php if (session()->getFlashdata('kosong')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= session()->getFlashdata('kosong'); ?>
                                    </div>
                                <?php elseif (session()->getFlashdata('berhasil')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->getFlashdata('berhasil'); ?>
                                    </div>
                                <?php endif; ?>
                                <!-- Profile Edit Form -->
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Gambar Profil</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="/assets/img/dashboard/user/<?= $session->get('member')['profile']; ?>" alt="Profile" class="photo-profile">
                                            <div class="pt-2">
                                                <label for="profile" class="btn btn-primary btn-sm"><i class="bi bi-upload text-light"></i></label>
                                                <input type="file" name="profile" id="profile" class="d-none">
                                                <?php if (session()->getFlashdata('profile')) : ?>
                                                    <div class="invalid-feedback d-block">
                                                        <p class="text-center mb-0"><?= session()->getFlashdata('profile'); ?></p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" name="nama" id="nama" class="form-control <?= session()->getFlashdata('nama') ? 'is-invalid' : '' ?>" value="<?= $member['nama']; ?>">
                                            <div class="invalid-feedback">
                                                <?= session()->getFlashdata('nama'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" name="username" id="username" class="form-control <?= session()->getFlashdata('username') ? 'is-invalid' : '' ?>" value="<?= $member['username']; ?>">
                                            <div class="invalid-feedback">
                                                <?= session()->getFlashdata('username'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="telepon" class="col-md-4 col-lg-3 col-form-label">Telepon</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="tel" name="telepon" id="telepon" class="form-control <?= session()->getFlashdata('telepon') ? 'is-invalid' : '' ?>" value="<?= $member['telepon']; ?>">
                                            <div class="invalid-feedback">
                                                <?= session()->getFlashdata('telepon'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="email" name="email" id="email" class="form-control <?= session()->getFlashdata('email') ? 'is-invalid' : '' ?>" value="<?= $member['email']; ?>">
                                            <div class="invalid-feedback">
                                                <?= session()->getFlashdata('email'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form action="my-profile/change-password" method="post">

                                    <div class="row mb-3">
                                        <label for="oldPassword" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="password" class="form-control" name="oldPassword" id="oldPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control" id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password Baru</label>
                                        <div class="col-md-7 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Ubah Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="/assets/js/myProfile.js"></script>
<?= $this->endSection(); ?>