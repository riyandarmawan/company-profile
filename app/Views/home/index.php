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

<!-- contact start -->
<section class="contact" id="contact">
    <main class="content">
        <h2>Kontak <span>Kami</span></h2>
        <div class="row">
            <div class="address">
                <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d63421.28337476964!2d107.41968057060369!3d-6.543113152683946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1scafe!5e0!3m2!1sen!2sid!4v1701140876126!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <form action="home/contactSave" method="post">
                <?= csrf_field() ?>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" autocomplete="off">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" autocomplete="off">
                <label for="telepon">No Telepon</label>
                <input type="tel" name="telepon" id="telepon" autocomplete="off">
                <label for="pesan">Pesan</label>
                <textarea rows="5" type="text" name="pesan" id="pesan" autocomplete="off"></textarea>
                <button type="submit">Kirim</button>
            </form>
        </div>
    </main>
</section>
<!-- contact end -->

<?= $this->endSection(); ?>