<?php $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-borderless" data-bs-theme="dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telepon</th>
                            <th scope="col">Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1 + (7 * ($currentPage - 1));
                        foreach ($contacts as $contact) : ?>
                            <tr>
                                <th scope="row"><?= $counter; ?></th>
                                <td><?= $contact['nama']; ?></td>
                                <td><?= $contact['email']; ?></td>
                                <td><?= $contact['telepon']; ?></td>
                                <td class="text-justify" style="min-width: 20rem;"><?= $contact['pesan']; ?></td>
                            </tr>
                        <?php $counter++;
                        endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('contact', 'custom_pagination'); ?>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection(); ?>