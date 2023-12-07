<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link <?= $currentPage != 'dashboard' ? 'collapsed' : ''; ?>" href="/dashboard">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link <?= $currentPage != 'user' ? 'collapsed' : ''; ?>" href="/dashboard/user">
        <i class="bi bi-person"></i>
        <span>Pengguna</span>
      </a>
    </li>

    <li class="nav-heading">Pages</li>

  </ul>

</aside>
<!-- End Sidebar-->