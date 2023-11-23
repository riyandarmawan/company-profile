<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <main class="content">
        <div class="inner">
            <div class="flow">
                <a href="#" class="latest-news active" id="latest-news-1">
                    <img src="/assets/img/news/1.jpg" alt="Mouse">
                    <div class="title">
                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, ut?</h3>
                    </div>
                </a>
                <a href="#" class="latest-news" id="latest-news-2">
                    <img src="/assets/img/news/2.jpg" alt="Mouse">
                    <div class="title">
                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, ut?</h3>
                    </div>
                </a>
                <a href="#" class="latest-news" id="latest-news-3">
                    <img src="/assets/img/news/3.jpg" alt="Mouse">
                    <div class="title">
                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, ut?</h3>
                    </div>
                </a>
            </div>
        </div>
    </main>
</div>

<?= $this->endSection(); ?>