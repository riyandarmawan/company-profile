<?php $session = \Config\Services::session(); ?>

<header class="header">
    <div class="header-left">
        <span class="material-symbols-outlined hamburger-menu">
            menu
        </span>
        <a href="<?= base_url(); ?>">My<span>Coffee</span></a>
    </div>

    <nav class="navigation" style="display: flex; gap: 1rem;">
        <a href="<?= base_url(); ?>">Beranda</a>
        <a href="<?= base_url() . 'product'; ?>">produk</a>
        <a href="<?= base_url() . 'news'; ?>">Berita</a>
    </nav>

    <div class="registration d-flex align-items-center">
        <?php if ($session->get('member')) : ?>
            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="/assets/img/dashboard/user/<?= $session->get('member')['profile']; ?>" alt="Profile" class="rounded-circle">
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6 class="text-dark"><?= $session->get('member')['nama']; ?></h6>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <?php if ($session->get('member')['role'] != 'pengunjung') : ?>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="dashboard">
                                <span class="material-symbols-outlined me-2 text-dark">grid_view</span>
                                <span class="text-dark">Dashboard</span>
                            </a>
                        </li>
                    <?php elseif ($session->get('member')['role'] == 'pengunjung') : ?>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="dashboard/my-order">
                                <span class="material-symbols-outlined text-dark" style="margin-left: -3px; margin-right: 10px;">shopping_bag</span>
                                <span class="text-dark">Pesanan Saya</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center rounded-bottom rounded-end" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <span class="material-symbols-outlined me-2 text-dark">logout</span>
                            <span class="text-dark">Logout</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li>
        <?php else : ?>
            <a href="/registration/login" class="login">Login</a>
            <a href="/registration/register" class="register">Register</a>
        <?php endif; ?>
    </div>
</header>