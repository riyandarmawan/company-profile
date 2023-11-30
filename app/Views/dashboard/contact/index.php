<?php $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
<div class="row">
        <?php foreach ($contacts as $contact) : ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card text-bg-primary mb-4 mx-auto" style="min-width: 13rem; max-width: 30rem;">
                    <div class="card-header">Dari : <?= $contact['nama']; ?></div>
                    <div class="card-header">Email : <?= $contact['email']; ?></div>
                    <div class="card-header">Telepon : <?= $contact['telepon']; ?></div>
                    <div class="card-body">
                        <p class="card-text"><?= $contact['pesan']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>

<?= $this->endSection(); ?>