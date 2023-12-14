<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="container d-flex flex-column align-items-center news-read" style="padding-inline: 15%;">
    <h2 class="text-center my-2"><?= $news['title']; ?></h2>
    <img src="/assets/img/news/<?= $news['image']; ?>" alt="<?= $news['alt']; ?>" style="aspect-ratio: 45 / 28; width: 100%; object-fit: cover;" class="rounded my-2">
    <div class="about w-100 d-flex justify-content-between">
        <p>Penulis : <?= $news['nama']; ?></p>
        <p>Gambar : <?= $news['alt']; ?></p>
    </div>
    <?php foreach($paragraphs as $paragraph): ?>
        <p class="text-justify fs-5 my-2"><?= $paragraph; ?></p>
    <?php endforeach; ?>
</div>

<?php $this->endSection(); ?>