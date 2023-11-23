<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- home start -->
<section class="home" id="home">
    <main class="content">
        <h2>Selamat Datang, di <span>Company Profile</span></h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure fugit error culpa, nulla explicabo non?</p>
        <a href="#">Pelajari lebih lanjut!</a>
    </main>
</section>
<!-- home end -->

<!-- news start -->
<section class="news" id="news">
    <main class="content">
        <h2>Berita</h2>
        <div class="news-content">
            <?php foreach($news as $n) : ?>
            <div class="news-recomendation">
                <img src="/assets/img/news/<?= $n['image']; ?>" alt="<?= $n['alt']; ?>">
                <div class="news-text">
                    <h3><?= $n['title']; ?></h3>
                    <p><?= substr($n['content'], 0, 80);?>...</p>
                    <a href="#">Baca lebih lanjut...</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </main>
</section>
<!-- news end -->

<?= $this->endSection(); ?>