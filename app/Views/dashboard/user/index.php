<?= $this->extend('layout/dashboard/template'); ?>

<?= $this->section('css'); ?>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/assets/css/dashboard/table.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<main id="main">
    <?php if (session()->getFlashdata('remove')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('remove'); ?>
        </div>
    <?php endif; ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Email</th>
                    <th>nama</th>
                    <th>Username</th>
                    <th>Telepon</th>
                    <th>Role</th>
                    <?php if ($member['role'] == 'admin') : ?>
                        <th>&nbsp;</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php $counter = 1 + (session()->getFlashdata('totalData') * ($currentPage - 1));
                foreach ($users as $user) : ?>
                    <tr class="alert" role="alert">
                        <td><?= $counter; ?></td>
                        <td><span><?= $user['email']; ?></span></td>
                        <td><?= $user['nama']; ?></td>
                        <td>@<?= $user['username']; ?></td>
                        <td><?= $user['telepon']; ?></td>
                        <td><?= $user['role']; ?></td>
                        <td>
                            <a href="<?= base_url() . 'dashboard/user/detail/' . $user['username']; ?>" class="text-dark me-2 d-flex align-items-center"><span class="material-symbols-outlined">more_horiz</span></a>
                        </td>
                    </tr>
                <?php
                    $counter++;
                endforeach;; ?>
            </tbody>
        </table>
        <?php if (!$users) : ?>
            <p class="text-center">Pengguna tidak ada</p>
        <?php endif; ?>
    </div>
    <?= $pager->links('users', 'custom_pagination'); ?>
</main>

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="/assets/js/table/jquery.min.js"></script>
<script src="/assets/js/table/popper.js"></script>
<script src="/assets/js/table/bootstrap.min.js"></script>
<script src="/assets/js/table/main.js"></script>
<?= $this->endSection(); ?>