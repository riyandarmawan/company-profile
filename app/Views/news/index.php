<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <main class="content">
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
            <?php $count = 1; ?>
            <?php foreach($news as $n) : ?>
                <a href="#" class="latest-news" id="latest-news-<?= $count; ?>">
                    <img src="/assets/img/news/<?= $n['image']; ?>" alt="<?= $n['alt']; ?>">
                    <div class="title">
                        <h3><?= $n['title']; ?></h3>
                    </div>
                </a>
                <?php $count++ ?>
            <?php endforeach; ?>
        </div>
    </main>
</div>

<?= $this->endSection(); ?>