<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="container d-flex justify-content-center align-items-center vw-100 vh-85">
    <div class="form-container border border-2 p-3 px-4 rounded">
        <a href="/" class="c-white"><span class="material-symbols-outlined position-absolute fs-1">arrow_back</span></a>
        <h2 class="text-center fs-1 mb-3">Register</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-group position-relative file d-flex w-100 align-items-center flex-column">
                <label for="profile"><img id="photo-profile" src="/assets/img/dashboard/user/default.jpg" alt="photo profile" class="rounded-circle"></label>
                <input type="file" name="profile" id="profile" autocomplete="off" class="d-none" required>
                <?php if (session()->getFlashdata('profile')) : ?>
                    <div class="invalid-feedback d-block">
                        <p class="text-center mb-0"><?= session()->getFlashdata('profile'); ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group position-relative">
                <label class="position-absolute" for="nama"><span class="material-symbols-outlined">person</span></label>
                <input placeholder="Nama" type="text" name="nama" id="nama" autocomplete="off" class="form-control <?= session()->getFlashdata('nama') ? 'is-invalid' : ''; ?>" value="<?= session()->getFlashdata('nama') ? '' : old('nama'); ?>" required>
                <div class="invalid-feedback">
                    <?= session()->getFlashdata('nama'); ?>
                </div>
            </div>
            <div class="form-group position-relative">
                <label class="position-absolute" for="username"><span class="material-symbols-outlined">alternate_email</span></label>
                <input placeholder="Username" type="text" name="username" id="username" autocomplete="off" class="form-control <?= session()->getFlashdata('username') ? 'is-invalid' : ''; ?>" value="<?= session()->getFlashdata('username') ? '' : old('username'); ?>" required>
                <div class="invalid-feedback">
                    <?= session()->getFlashdata('username'); ?>
                </div>
            </div>
            <div class="form-group position-relative">
                <label class="position-absolute" for="telepon"><span class="material-symbols-outlined">call</span></label>
                <input placeholder="telepon" type="tel" name="telepon" id="telepon" autocomplete="off" class="form-control <?= session()->getFlashdata('telepon') ? 'is-invalid' : ''; ?>" value="<?= session()->getFlashdata('telepon') ? '' : old('telepon'); ?>" required>
                <div class="invalid-feedback">
                    <?= session()->getFlashdata('telepon'); ?>
                </div>
            </div>
            <div class="form-group position-relative">
                <label class="position-absolute" for="email"><span class="material-symbols-outlined">mail</span></label>
                <input placeholder="Email" type="email" name="email" id="email" autocomplete="off" class="form-control <?= session()->getFlashdata('email') ? 'is-invalid' : ''; ?>" value="<?= session()->getFlashdata('email') ? '' : old('email'); ?>" required>
                <div class="invalid-feedback">
                    <?= session()->getFlashdata('email'); ?>
                </div>
            </div>
            <div class="form-group position-relative">
                <label class="position-absolute" for="password"><span class="material-symbols-outlined">lock</span></label>
                <input placeholder="Password" type="password" name="password" id="password" autocomplete="off" class="form-control <?= session()->getFlashdata('password') ? 'is-invalid' : ''; ?>" required>
                <div class="invalid-feedback">
                    <?= session()->getFlashdata('password'); ?>
                </div>
            </div>
            <div class="form-group position-relative">
                <label class="position-absolute" for="confirm-password"><span class="material-symbols-outlined">key</span></label>
                <input placeholder="Konfirmasi Password" type="password" name="confirmPassword" id="confim-password" autocomplete="off" class="form-control <?= session()->getFlashdata('confirmPassword') ? 'is-invalid' : ''; ?>" required>
                <div class="invalid-feedback">
                    <?= session()->getFlashdata('confirmPassword'); ?>
                </div>
            </div>
            <div class="button-wrap d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
        <p class="text-center mt-1 mb-0 fs-7">Sudah punya akun? <a href="login">Login sekarang!</a></p>
        <a href="#" class="text-center d-block text-white-50 fs-7">Kebijakan Privasi</a>
    </div>
</div>

<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<script type="module" src="/assets/js/script.js"></script>
<?php $this->endSection(); ?>