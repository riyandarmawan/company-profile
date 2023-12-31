<?php $session = \Config\Services::session(); ?>

<?= $this->extend('layout/dashboard/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() . 'dashboard'; ?>">Beranda</a></li>
                <li class="breadcrumb-item">Pengguna</li>
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
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#account-settings">Pengaturan Akun</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <?php if (session()->getFlashdata('berhasil')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('berhasil'); ?>
                                </div>
                            <?php endif; ?>

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
                                <?php endif; ?>
                                <!-- Profile Edit Form -->
                                <form action="" method="post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
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
                                            <input type="text" name="nama" id="nama" class="form-control <?= session()->getFlashdata('nama') ? 'is-invalid' : '' ?>" value="<?= session()->getFlashdata('nama') ? $member['nama'] : old('nama', $member['nama']); ?>">
                                            <div class="invalid-feedback">
                                                <?= session()->getFlashdata('nama'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" name="username" id="username" class="form-control <?= session()->getFlashdata('username') ? 'is-invalid' : '' ?>" value="<?= session()->getFlashdata('username') ? $member['username'] : old('username', $member['username']); ?>">
                                            <div class="invalid-feedback">
                                                <?= session()->getFlashdata('username'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="telepon" class="col-md-4 col-lg-3 col-form-label">Telepon</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="tel" name="telepon" id="telepon" class="form-control <?= session()->getFlashdata('telepon') ? 'is-invalid' : '' ?>" value="<?= session()->getFlashdata('telepon') ? $member['telepon'] : old('telepon', $member['telepon']); ?>">
                                            <div class="invalid-feedback">
                                                <?= session()->getFlashdata('telepon'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="email" name="email" id="email" class="form-control <?= session()->getFlashdata('email') ? 'is-invalid' : '' ?>" value="<?= session()->getFlashdata('email') ? $member['email'] : old('email', $member['email']); ?>">
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
                                <?php if (session()->getFlashdata('passwordBerhasil')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->getFlashdata('berhasil'); ?>
                                    </div>
                                <?php endif; ?>
                                <!-- Change Password Form -->
                                <form action="my-profile/change-password" method="post">
                                    <?= csrf_field(); ?>
                                    <div class="row mb-3">
                                        <label for="oldPassword" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="password" class="form-control <?= session()->getFlashdata('oldPassword') ? 'is-invalid' : '' ?>" name="oldPassword" id="oldPassword">
                                            <div class="invalid-feedback d-block">
                                                <p class="text-center mb-0"><?= session()->getFlashdata('oldPassword'); ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="password" class="form-control <?= session()->getFlashdata('newPassword') ? 'is-invalid' : '' ?>" name="newPassword" id="newPassword">
                                            <div class="invalid-feedback d-block">
                                                <p class="text-center mb-0"><?= session()->getFlashdata('newPassword'); ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password Baru</label>
                                        <div class="col-md-7 col-lg-9">
                                            <input type="password" class="form-control <?= session()->getFlashdata('renewPassword') ? 'is-invalid' : '' ?>" name="renewPassword" id="renewPassword">
                                            <div class="invalid-feedback d-block">
                                                <p class="text-center mb-0"><?= session()->getFlashdata('renewPassword'); ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Ubah Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->
                            </div><!-- End Bordered Tabs -->

                            <div class="tab-pane fade pt-3" id="account-settings">
                                <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#removeAccount">Hapus akun ini</a>
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
                <a href="<?= base_url() . 'dashboard/my-profile/remove/' . $member['user_id']; ?>" class="btn btn-primary">Ya</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="/assets/js/myProfile.js"></script>
<?= $this->endSection(); ?>