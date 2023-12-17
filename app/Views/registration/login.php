<?php $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container d-flex justify-content-center align-items-center vw-100 vh-85">
    <div class="form-container login border border-2 p-3 px-4 rounded">
        <a href="/" class="c-white"><span class="material-symbols-outlined position-absolute fs-1">arrow_back</span></a>
        <h2 class="text-center fs-1 mb-3">Login</h2>
        <form action="" method="post">
            <?= csrf_field(); ?>
            <div class="form-group position-relative mb-2">
                <label class="position-absolute" for="identify"><span class="material-symbols-outlined">person</span></label>
                <input placeholder="Username, Telepon, atau Email" type="text" name="identify" id="identify" autocomplete="off" class="form-control <?= session()->getFlashdata('identify') ? 'is-invalid' : ''; ?>" value="<?= session()->getFlashdata('identify') ? '' : old('identify'); ?>" required>
                <div class="invalid-feedback">
                    <?= session()->getFlashdata('identify'); ?>
                </div>
            </div>
            <div class="form-group position-relative mt-4">
                <label class="position-absolute" for="password"><span class="material-symbols-outlined">lock</span></label>
                <input placeholder="Password" type="password" name="password" id="password" autocomplete="off" class="form-control <?= session()->getFlashdata('password') ? 'is-invalid' : ''; ?>" required>
                <div class="invalid-feedback">
                    <?= session()->getFlashdata('password'); ?>
                </div>
            </div>
            <div class="button-wrap d-flex justify-content-center mt-1">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        <p class="text-center mt-3 mb-0 fs-7">Belum punya akun? <a href="register">Register sekarang!</a></p>
        <a href="#" class="text-center d-block text-white-50 fs-7">Kebijakan Privasi</a>
    </div>
</div>

<?= $this->endSection(); ?>