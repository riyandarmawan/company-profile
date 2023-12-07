<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- home start -->
<section class="home" id="home">
    <main class="content">
        <h2>Selamat Datang, di My<span>Coffee</span></h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure fugit error culpa, nulla explicabo non?</p>
        <a href="#">Pesan Sekarang!</a>
    </main>
</section>
<!-- home end -->

<!-- product start -->
<section class="product" id="product">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Produk <span>Kami</span></h2>
            <main class="content d-flex flex-wrap justify-content-center">
                <div class="product-group d-flex flex-column align-items-center mx-5 my-4">
                    <img class="rounded-circle mb-2" src="/assets/img/product/1.jpg" alt="Cappucino">
                    <h3 class="mb-2 fs-5">- Cappucino -</h3>
                    <p class="mb-2 fs-7">IDR 13K</p>
                </div>
                <div class="product-group d-flex flex-column align-items-center mx-5 my-4">
                    <img class="rounded-circle mb-2" src="/assets/img/product/1.jpg" alt="Cappucino">
                    <h3 class="mb-2 fs-5">- Cappucino -</h3>
                    <p class="mb-2 fs-7">IDR 13K</p>
                </div>
                <div class="product-group d-flex flex-column align-items-center mx-5 my-4">
                    <img class="rounded-circle mb-2" src="/assets/img/product/1.jpg" alt="Cappucino">
                    <h3 class="mb-2 fs-5">- Cappucino -</h3>
                    <p class="mb-2 fs-7">IDR 13K</p>
                </div>
                <div class="product-group d-flex flex-column align-items-center mx-5 my-4">
                    <img class="rounded-circle mb-2" src="/assets/img/product/1.jpg" alt="Cappucino">
                    <h3 class="mb-2 fs-5">- Cappucino -</h3>
                    <p class="mb-2 fs-7">IDR 13K</p>
                </div>
                <div class="product-group d-flex flex-column align-items-center mx-5 my-4">
                    <img class="rounded-circle mb-2" src="/assets/img/product/1.jpg" alt="Cappucino">
                    <h3 class="mb-2 fs-5">- Cappucino -</h3>
                    <p class="mb-2 fs-7">IDR 13K</p>
                </div>
                <div class="product-group d-flex flex-column align-items-center mx-5 my-4">
                    <img class="rounded-circle mb-2" src="/assets/img/product/1.jpg" alt="Cappucino">
                    <h3 class="mb-2 fs-5">- Cappucino -</h3>
                    <p class="mb-2 fs-7">IDR 13K</p>
                </div>
            </main>
        </div>
    </div>
</section>
<!-- product end -->

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
                <input type="text" name="nama" id="nama" autocomplete="off" class="disabled <?= (session()->getFlashdata('nama') ? 'is-invalid' : ''); ?>" value="<?= $member ? $member['nama'] : ''; ?>" disabled>
                <?php if (session()->getFlashdata('nama')) : ?>
                    <div>
                        <span class="material-symbols-outlined">error</span>
                        <p><?= session()->getFlashdata('nama'); ?></p>
                    </div>
                <?php endif; ?>
                <label for="telepon">No Telepon</label>
                <input type="tel" name="telepon" id="telepon" autocomplete="off" class="disabled <?= (session()->getFlashdata('telepon') ? 'is-invalid' : ''); ?>" value="<?= $member ? $member['telepon'] : ''; ?>" disabled>
                <?php if (session()->getFlashdata('telepon')) : ?>
                    <div>
                        <span class="material-symbols-outlined">error</span>
                        <p><?= session()->getFlashdata('telepon'); ?></p>
                    </div>
                <?php endif; ?>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" autocomplete="off" class="disabled <?= (session()->getFlashdata('email') ? 'is-invalid' : ''); ?>" value="<?= $member ? $member['email'] : ''; ?>" disabled>
                <?php if (session()->getFlashdata('email')) : ?>
                    <div>
                        <span class="material-symbols-outlined">error</span>
                        <p><?= session()->getFlashdata('email'); ?></p>
                    </div>
                <?php endif; ?>
                <label for="pesan">Pesan</label>
                <textarea rows="5" type="text" name="pesan" id="pesan" autocomplete="off" class="<?= (!$member ? 'disabled' : ''); (session()->getFlashdata('pesanGagal') ? 'is-invalid' : ''); ?>" value="<?= old('pesan'); ?>" <?= !$member ? 'disabled' : ''; ?>></textarea>
                <?php if (session()->getFlashdata('pesanGagal')) : ?>
                    <div>
                        <span class="material-symbols-outlined">error</span>
                        <p><?= session()->getFlashdata('pesanGagal'); ?></p>
                    </div>
                <?php endif; ?>
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