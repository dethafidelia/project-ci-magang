<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">

<div class="container">
    <div class="d-flex justify-content-end mb-2 py-3">
        <a href="<?= base_url('register') ?>" class="btn btn-primary">Tambah Anggota</a>
    </div>
    <div class="table-responsive">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Status</th>
                    <th>Bidang</th>
                    <th>Tim Pelayanan</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user as $indes => $key) : ?>
                    <tr>
                        <td><?= $indes + 1 ?></td>
                        <td><?= $key['NAMA_LENGKAP'] ?></td>
                        <td><?= $key['STATUS'] ?></td>
                        <td><?= $key['nama_bidang'] ?></td>
                        <td><?= $key['nama_tim_pelayanan'] ?></td>
                        <td><?= $key['USERNAME'] ?></td>
                        <td><?= $key['PASSWORD'] ?></td>
                        <td>
                            <a href="<?= base_url('dpph/edit/user/' . $key["id"]) ?>" class="btn btn-primary">Edit</a>
                            <a href="<?= base_url('dpph/delete/user/' . $key["id"]) ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>



<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="<?= base_url('asset/js/index.js') ?>"></script>
</body>

</html>