<?= $this->extend('layout/dashboard/template'); ?>

<?= $this->section('css'); ?>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/assets/css/dashboard/table.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<main id="main">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Nama</th>
                    <th>Pesan</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php $counter = 1 + (session()->getFlashdata('totalData') * ($currentPage - 1));
                foreach ($contacts as $contact) : ?>
                    <tr class="alert" role="alert">
                        <td><?= $counter; ?></td>
                        <td><?= $contact['nama']; ?></td>
                        <td><?= $contact['pesan']; ?></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="<?= base_url() . 'dashboard/contact/detail/' . $contact['contact_id']; ?>" class="btn btn-success me-2 d-flex align-items-center"><span class="material-symbols-outlined">more_horiz</span></a>
                                <a href="#" class="btn btn-danger me-2 d-flex align-items-center"><span class="material-symbols-outlined">delete</span></i></a>
                            </div>
                        </td>
                    </tr>
                <?php $counter++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $pager->links('users', 'custom_pagination'); ?>
</main>

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="/assets/js/table/jquery.min.js"></script>
<script src="/assets/js/table/popper.js"></script>
<script src="/assets/js/table/bootstrap.min.js"></script>
<script src="/assets/js/table/main.js"></script>
<?= $this->endSection(); ?>