<?php $session = \Config\Services::session(); ?>

<header class="header">
    <div class="header-left">
        <span class="material-symbols-outlined hamburger-menu">
            menu
        </span>
        <a href="">My<span>Coffee</span></a>
    </div>

    <nav class="navigation">
        <div class="dropdown">
            <a href="/">Beranda</a>
            <span class="material-symbols-outlined dropdown-button">
                expand_more
            </span>
            <div class="dropdown-menu p-0">
                <a href="#home">Beranda</a>
                <a href="#about">Tentang Kami</a>
                <a href="#product">Produk Kami</a>
                <a href="#contact">Kontak Kami</a>
            </div>
        </div>
        <a href="/news">Berita</a>
    </nav>

    <div class="registration">
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

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="dashboard">
                            <span class="material-symbols-outlined me-2 text-dark">grid_view</span>
                            <span class="text-dark">Dashboard</span>
                        </a>
                    </li>

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