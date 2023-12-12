<?= $this->extend('layout/dashboard/template'); ?>

<?= $this->section('css'); ?>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/assets/css/dashboard/table.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<main id="main">
    <?php if (session()->getFlashdata('removeContact')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('removeContact'); ?>
        </div>
    <?php endif; ?>
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
                        <td><?= strlen($contact['pesan']) > 100 ? substr($contact['pesan'], 0, 100) . '...' : substr($contact['pesan'], 0, 100); ?></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="<?= base_url() . 'dashboard/contact/detail/' . $contact['contact_id']; ?>" class="me-2 d-flex align-items-center"><span class="material-symbols-outlined">more_horiz</span></a>
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