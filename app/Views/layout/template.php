<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- google icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- feather icon -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- bootsrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- css -->
    <?php $this->renderSection('css'); ?>

    <!-- my css -->
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <?php if ($currentPage != 'login' && $currentPage != 'register') : ?>
        <?= $this->include('layout/navbar'); ?>
    <?php endif; ?>

    <?= $this->renderSection('content'); ?>

    <?php if ($currentPage != 'login' && $currentPage != 'register') : ?>
        <?= $this->include('layout/footer'); ?>
    <?php endif; ?>

    <?= $this->include('layout/modal'); ?>

    <!-- feather icon -->
    <script>
        feather.replace();
    </script>

    <!-- bootsrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- my js -->
    <?= $this->renderSection('js'); ?>
</body>

</html>