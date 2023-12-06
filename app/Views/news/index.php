<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="wrap">
    <main class="content">
        <h2 class="my-3">Berita Terbaru</h2>
        <div class="inner">
            <div class="news-control">
                <span class="material-symbols-outlined" id="previous">
                    chevron_left
                </span>
                <span class="material-symbols-outlined" id="next">
                    chevron_right
                </span>
            </div>
            <ul class="indicator-news">
                <li class="active" id="indicator-news-1"></li>
                <li id="indicator-news-2"></li>
                <li id="indicator-news-3"></li>
            </ul>
            <div class="flow page-1">
                <?php foreach ($latestNews as $ln) : ?>
                    <a href="" class="latest-news">
                        <img src=" /assets/img/news/<?= $ln['image']; ?>" alt="<?= $ln['alt']; ?>">
                        <div class="title">
                            <h3><?= $ln['title']; ?></h3>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <h2 class="mt-5">Berita lainnya</h2>
        <?php foreach ($news as $n) : ?>
            <a href="#" class="other-news">
                <img src="/assets/img/news/<?= $n['image']; ?>" alt="<?= $n['alt']; ?>">
                <div class="teks">
                    <h3><?= $n['title']; ?></h3>
                    <p><?= word_limiter($n['content'], 20); ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    </main>
</div>

<?= $this->endSection(); ?>