<?php $session = \Config\Services::session(); ?>

<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- home start -->
<section class="home" id="home">
    <main class="content">
        <h2>Selamat Datang, di My<span>Coffee</span></h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure fugit error culpa, nulla explicabo non?</p>
        <a href="<?= base_url() . 'product'; ?>">Pesan Sekarang!</a>
    </main>
</section>
<!-- home end -->

<!-- about start -->
<div class="container" id="about">
    <section class="about d-flex">
        <div class="gambar flex-basis-25 d-flex align-items-center justify-content-center me-5">
            <img src="/assets/img/about.jpg" alt="tentang" class="rounded-pill">
        </div>
        <div class="content flex-basis-50">
            <h2 class="text-center">Tentang <span class="c-primary">Kami</span></h2>
            <p class="text-indent-2rem fs-6 text-justify">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus consequuntur possimus laboriosam magnam velit blanditiis amet molestiae, nihil tempore nemo dolorum aut vel atque adipisci, sit impedit. Perspiciatis inventore quasi, eos praesentium beatae animi id tempora, reprehenderit accusantium deserunt voluptate fugiat, temporibus expedita necessitatibus tempore. Amet veritatis iste suscipit. Perspiciatis.</p>
            <p class="text-indent-2rem fs-6 text-justify">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus consequuntur possimus laboriosam magnam velit blanditiis amet molestiae, nihil tempore nemo dolorum aut vel atque adipisci, sit impedit. Perspiciatis inventore quasi, eos praesentium beatae animi id tempora, reprehenderit accusantium deserunt voluptate fugiat, temporibus expedita necessitatibus tempore. Amet veritatis iste suscipit. Perspiciatis.</p>
            <p class="text-indent-2rem fs-6 text-justify">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus consequuntur possimus laboriosam magnam velit blanditiis amet molestiae, nihil tempore nemo dolorum aut vel atque adipisci, sit impedit. Perspiciatis inventore quasi, eos praesentium beatae animi id tempora, reprehenderit accusantium deserunt voluptate fugiat, temporibus expedita necessitatibus tempore. Amet veritatis iste suscipit. Perspiciatis.</p>
        </div>
    </section>
</div>
<!-- about end -->

<!-- product start -->
<section class="product" id="product">
    <div class="row">
        <div class="col">
            <h2 class="text-center mb-5">Produk <span>Kami</span></h2>
            <div class="row">
                <?php if (session()->getFlashdata('orderSuccess')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('orderSuccess'); ?>
                    </div>
                <?php endif; ?>
                <main class="content w-100" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(18rem, 1fr)); gap: 5rem;">
                    <?php foreach ($products as $product) : ?>
                        <div class="card">
                            <img src="/assets/img/product/<?= $product['product_image']; ?>" class="card-img-top" alt="produk" style="object-fit: cover; aspect-ratio: 1 / 1;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $product['product_title']; ?></h5>
                                <p class="card-text text-justify mb-1" style="-webkit-line-clamp: 1; line-clamp: 1; overflow: hidden; display: -webkit-box;"><?= $product['product_description']; ?></p>
                                <h5 class="card-text text-justify">Rp. <?= number_format($product['product_price'], 0, '.', '.'); ?></h5>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </main>
            </div>
            <a href="<?= base_url() . 'product'; ?>" class="c-primary fs-5 my-5 text-center w-100 d-inline-block card-muat">
                << Pesan disini >>
            </a>
        </div>
    </div>
</section>
<!-- product end -->

<!-- news start -->
<section class="news" id="news">
    <main class="content">
        <h2>Berita</h2>
        <div class="news-content">
            <?php foreach ($news as $n) : ?>
                <div class="news-recomendation">
                    <img src="/assets/img/news/<?= $n['image']; ?>" alt="<?= $n['alt']; ?>">
                    <div class="news-text">
                        <h3><?= $n['title']; ?></h3>
                        <p><?= $n['content']; ?></p>
                        <a href="<?= base_url() . 'news/' . $n['slug']; ?>">Baca lebih lanjut...</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="<?= base_url() . 'news'; ?>" class="c-primary fs-5 m-5 card-muat">
            << Muat Lebih>>
        </a>
    </main>
</section>
<!-- news end -->

<!-- contact start -->
<section class="contact" id="contact">
    <main class="content">
        <h2>Kontak <span>Kami</span></h2>
        <div class="wrapper">
            <div class="address">
                <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d63421.28337476964!2d107.41968057060369!3d-6.543113152683946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1scafe!5e0!3m2!1sen!2sid!4v1701140876126!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <form action="/home/contactSave" method="post">
                <?php
                if (!$member) : ?>
                    <div class="alert alert-warning" role="alert">
                        Anda harus <a href="registration/login" class="mx-1">login</a> untuk bisa mengakses fitur ini
                    </div>
                <?php endif; ?>
                <?= csrf_field() ?>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <p><?= session()->getFlashdata('pesan'); ?></p>
                <?php endif; ?>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" autocomplete="off" class="disabled" value="<?= $member ? $member['nama'] : ''; ?>" disabled>
                <label for="telepon">No Telepon</label>
                <input type="tel" name="telepon" id="telepon" autocomplete="off" class="disabled" value="<?= $member ? $member['telepon'] : ''; ?>" disabled>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" autocomplete="off" class="disabled" value="<?= $member ? $member['email'] : ''; ?>" disabled>
                <label for="pesan">Pesan</label>
                <textarea rows="5" type="text" name="pesan" id="pesan" autocomplete="off" class="form-control <?= (!$member ? 'disabled' : ''); ?> <?= session()->getFlashdata('pesanGagal') ? 'is-invalid' : ''; ?>" <?= !$member ? 'disabled' : ''; ?>></textarea>
                <div class="invalid-feedback">
                    <?= session()->getFlashdata('pesanGagal'); ?>
                </div>
                <button type="submit">Kirim</button>
            </form>
        </div>
    </main>
</section>
<!-- contact end -->

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="/assets/js/navigasi.js"></script>
<?= $this->endSection(); ?>