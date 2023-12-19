<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>


<div class="container d-flex flex-column news-read" style="padding-inline: 15%;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url() . 'news'; ?>">Berita</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $news['title']; ?></li>
        </ol>
    </nav>
    <img src="/assets/img/news/<?= $news['image']; ?>" alt="berita" style="aspect-ratio: 45 / 28; width: 100%; object-fit: cover; object-position: center;" class="rounded my-2">
    <h2 class="my-2 fs-1 fw-medium"><?= $news['title']; ?></h2>
    <?php foreach ($paragraphs as $paragraph) : ?>
        <p class="text-justify fs-5 my-2 fw-normal"><?= $paragraph; ?></p>
    <?php endforeach; ?>
    <p style="font-weight: 100; color: gray;">Penulis : <?= $news['nama']; ?></p>
</div>

<?php $this->endSection(); ?>