<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="news" id="news">
    <main class="content">
        <div class="group m-3 w-100 d-flex justify-content-end">
            <div class="search-bar w-25 mx-2">
                <form class="search-form d-flex align-items-center" method="get" action="">
                    <input type="text" name="keyword" placeholder="Search" title="Enter search keyword" autofocus>
                    <button type="submit" title="Search"><i data-feather="search"></i></button>
                </form>
            </div><!-- End Search Bar -->
        </div>
        <div class="news-content mb-5 w-100">
            <?php foreach ($allNews as $news) : ?>
                <div class="news-recomendation" style="max-width: 25rem;">
                    <img src="/assets/img/news/<?= $news['image']; ?>" alt="Berita">
                    <div class="news-text">
                        <h3><?= $news['title']; ?></h3>
                        <p><?= $news['content']; ?></p>
                        <a href="<?= base_url() . 'news/' . $news['slug']; ?>">Baca lebih lanjut...</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php if (!$allnews) : ?>
            <p class="text-center">Berita tidak ada</p>
        <?php endif; ?>
        <?= $pager->links('news', 'custom_pagination'); ?>
    </main>
</div>

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="/assets/js/news.js"></script>
<script src="/assets/js/navigasi.js"></script>
<?= $this->endSection(); ?>