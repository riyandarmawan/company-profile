<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="top d-flex justify-content-between align-items-center mb-3">
                <h2>Daftar data user</h2>
                <a href="user/create" class="btn btn-primary">Tambah Data</a>
            </div>
            <?php if (session()->getFlashdata('pesanUpdate') || session()->getFlashdata('pesanDelete')) : ?>
                <div class="alert alert-success" role="alert">
                    <?=
                        session()->getFlashdata('pesanUpdate');
                        session()->getFlashdata('pesanDelete');
                    ?>
                </div>
            <?php endif; ?>
            <table class="table table-bordered" data-bs-theme="dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1;
                    foreach ($users as $user) :
                    ?>
                        <tr>
                            <td scope="row"><?= $count; ?></td>
                            <td><?= $user['nama']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['role']; ?></td>
                            <td>
                                <a href="user/edit/<?= $user['id']; ?>" class="btn btn-warning">Ubah</a>
                                <a href="user/delete/<?= $user['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php $count++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>