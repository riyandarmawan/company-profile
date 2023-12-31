<?php $currentPage = basename($_SERVER['PHP_SELF']);
$session = \Config\Services::session(); ?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <?php if ($session->get('member')['role'] != 'pengunjung') : ?>
      <div class="group">
        <li class="nav-item">
          <a class="nav-link <?= $currentPage != 'dashboard' ? 'collapsed' : ''; ?>" href="/dashboard">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li>
      <?php endif; ?>

      <?php if ($session->get('member')['role'] == 'pengunjung') : ?>
        <li class="nav-item">
          <a class="nav-link <?= $currentPage != 'my-order' ? 'collapsed' : ''; ?>" href="/dashboard/my-order">
            <span class="material-symbols-outlined news-icon fs-5" style="margin-left: -3px;">shopping_bag</span>
            <span>Pesanan Saya</span>
          </a>
        </li>
      <?php endif; ?>

      <?php if ($session->get('member')['role'] != 'pengunjung') : ?>
        <li class="nav-item">
          <a class="nav-link <?= $currentPage != 'order-list' ? 'collapsed' : ''; ?>" href="/dashboard/order-list">
            <span class="material-symbols-outlined news-icon fs-5" style="margin-left: -3px;">shopping_cart</span>
            <span>Daftar Pesanan</span>
          </a>
        </li>
      <?php endif; ?>

      <?php if ($session->get('member')['role'] != 'pengunjung') : ?>
        <li class="nav-item">
          <a class="nav-link <?= $currentPage != 'user' ? 'collapsed' : ''; ?>" href="/dashboard/user">
            <i class="bi bi-person"></i>
            <span>Pengguna</span>
          </a>
        </li>
      <?php endif; ?>

      <?php if ($session->get('member')['role'] != 'pengunjung') : ?>
        <li class="nav-item">
          <a class="nav-link <?= $currentPage != 'contact' ? 'collapsed' : ''; ?>" href="/dashboard/contact">
            <i data-feather="message-circle" class="contact-icon"></i>
            <span>Kontak</span>
          </a>
        </li>
      <?php endif; ?>

      <?php if ($session->get('member')['role'] != 'pengunjung') : ?>
        <li class="nav-item">
          <a class="nav-link <?= $currentPage != 'news' ? 'collapsed' : ''; ?>" href="/dashboard/news">
            <span class="material-symbols-outlined news-icon">newspaper</span>
            <span>Berita</span>
          </a>
        </li>
      <?php endif; ?>

      <?php if ($session->get('member')['role'] != 'pengunjung') : ?>
        <li class="nav-item">
          <a class="nav-link <?= $currentPage != 'product' ? 'collapsed' : ''; ?>" href="/dashboard/product">
            <span class="material-symbols-outlined news-icon">coffee_maker</span>
            <span>Produk</span>
          </a>
        </li>
      <?php endif; ?>
      </div>

      <div class="group">
        <li class="nav-heading">Pages</li>

        <li class="nav-item">
          <a class="nav-link <?= $currentPage != 'my-profile' ? 'collapsed' : ''; ?>" href="/dashboard/my-profile">
            <i class="bi bi-person"></i>
            <span>Profil Saya</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= $currentPage != base_url() ? 'collapsed' : ''; ?>" href="<?= base_url(); ?>">
            <i class="bi bi-house-door"></i>
            <span>Beranda</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= $currentPage != 'logout' ? 'collapsed' : ''; ?>" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="bi bi-box-arrow-left"></i>
            <span>Logout</span>
          </a>
        </li>
      </div>
  </ul>

</aside>
<!-- End Sidebar-->