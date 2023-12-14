<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="wrap">
    <main class="content">
        <?php if ($latestNews) : ?>
            <h2 class="my-3">Berita Terbaru</h2>
            <div class="inner mb-5">
                <?php if (count($latestNews) > 1) : ?>
                    <div class="news-control">
                        <span class="material-symbols-outlined" id="previous">
                            chevron_left
                        </span>
                        <span class="material-symbols-outlined" id="next">
                            chevron_right
                        </span>
                    </div>
                <?php endif; ?>
                <ul class="indicator-news">
                    <?php $counter = 1;
                    foreach ($latestNews as $ln) : ?>
                        <li class="active" id="indicator-news-<?= $counter; ?>"></li>
                    <?php $counter++;
                    endforeach; ?>
                </ul>
                <div class="flow page-1 <?= (count($latestNews) == 3) ? 'flow-300' : ((count($latestNews) == 2) ? 'flow-200' : ''); ?>">
                    <?php foreach ($latestNews as $ln) : ?>
                        <a href="<?= base_url() . 'news/' . $ln['slug']; ?>" class="latest-news">
                            <img src=" /assets/img/news/<?= $ln['image']; ?>" alt="<?= $ln['alt']; ?>">
                            <div class="title">
                                <h3><?= $ln['title']; ?></h3>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($news) : ?>
            <h2 class="mt-5">Berita lainnya</h2>
        <?php endif; ?>
        <?php foreach ($news as $n) : ?>
            <a href="<?= base_url() . 'news/' . $n['slug']; ?>" class="other-news">
                <img src="/assets/img/news/<?= $n['image']; ?>" alt="<?= $n['alt']; ?>">
                <div class="teks">
                    <h3><?= $n['title']; ?></h3>
                    <p><?= word_limiter($n['content'], 20); ?></p>
                </div>
            </a>
        <?php endforeach; ?>

        <?php if (!$latestNews && !$news) : ?>
            <p class="text-center">Berita tidak tersedia</p>
        <?php endif; ?>
    </main>
</div>

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="/assets/js/news.js"></script>
<script src="/assets/js/navigasi.js"></script>
<?= $this->endSection(); ?>