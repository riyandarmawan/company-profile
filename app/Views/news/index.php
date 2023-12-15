<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="news" id="news">
    <main class="content">
        <div class="group d-flex w-100 justify-content-between m-4 align-items-center">
            <nav aria-label="breadcrumb" style="height: 1rem; line-height: 1rem;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Berita</li>
                </ol>
            </nav>
            <div class="search-bar">
                <form class="search-form d-flex align-items-center" method="get" action="">
                    <input type="text" name="keyword" placeholder="Search" title="Enter search keyword">
                    <button type="submit" title="Search"><i data-feather="search"></i></button>
                </form>
            </div><!-- End Search Bar -->
        </div>
        <div class="news-content mb-5">
            <?php foreach ($allNews as $news) : ?>
                <div class="news-recomendation">
                    <img src="/assets/img/news/<?= $news['image']; ?>" alt="<?= $news['alt']; ?>">
                    <div class="news-text">
                        <h3><?= $news['title']; ?></h3>
                        <p><?= substr($news['content'], 0, 80); ?>...</p>
                        <a href="<?= base_url() . 'news/' . $news['slug']; ?>">Baca lebih lanjut...</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?= $pager->links('news', 'custom_pagination'); ?>
    </main>
</div>

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="/assets/js/news.js"></script>
<script src="/assets/js/navigasi.js"></script>
<?= $this->endSection(); ?>