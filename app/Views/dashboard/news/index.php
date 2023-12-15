<?php $session = \Config\Services::session(); ?>

<?= $this->extend('layout/dashboard/template'); ?>

<?= $this->section('css'); ?>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/assets/css/dashboard/table.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<main id="main">
    <?php if (session()->getFlashdata('removeNews')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('removeNews'); ?>
        </div>
    <?php endif; ?>
    <div class="table-responsive">
        <?php if ($session->get('member')['role'] == 'petugas') : ?>
            <a href="<?= base_url() . 'dashboard/news/create'; ?>" class="btn btn-primary">Tambah berita</a>
        <?php endif; ?>
        <table class="table">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Penulis</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php $counter = 1 + (session()->getFlashdata('totalData') * ($currentPage - 1));
                foreach ($news as $news) : ?>
                    <tr class="alert" role="alert">
                        <td><?= $counter; ?></td>
                        <td><?= $news['nama']; ?></td>
                        <td><?= $news['title']; ?></td>
                        <td><?= strlen($news['content']) > 100 ? substr($news['content'], 0, 100) . '...' : substr($news['content'], 0, 100); ?></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="<?= base_url() . 'dashboard/news/detail/' . $news['slug']; ?>" class="text-dark me-2 d-flex align-items-center"><span class="material-symbols-outlined">more_horiz</span></a>
                            </div>
                        </td>
                    </tr>
                <?php $counter++;
                endforeach; ?>
            </tbody>
        </table>
        <?php if (!$news) : ?>
            <p class="text-center">Berita tidak ada</p>
        <?php endif; ?>
    </div>
    <?= $pager->links('news', 'custom_pagination'); ?>
</main>

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="/assets/js/table/jquery.min.js"></script>
<script src="/assets/js/table/popper.js"></script>
<script src="/assets/js/table/bootstrap.min.js"></script>
<script src="/assets/js/table/main.js"></script>
<?= $this->endSection(); ?>