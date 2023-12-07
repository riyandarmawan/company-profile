<?= $this->extend('layout/dashboard/template'); ?>

<?= $this->section('content'); ?>

<main id="main">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Telepon</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php $counter = 1 + (8 * ($currentPage - 1));
            foreach ($users as $user) : ?>
                <tr>
                    <th scope="row"><?= $counter; ?></th>
                    <td><?= $user['nama']; ?></td>
                    <td><?= $user['username']; ?></td>
                    <td><?= $user['telepon']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['role']; ?></td>
                    <td>
                        <a href="#" class="btn btn-warning">Ubah</a>
                        <a href="#" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php $counter++;
            endforeach; ?>
        </tbody>
    </table>
    <?= $pager->links('users', 'custom_pagination'); ?>
</main>

<?= $this->endSection(); ?>