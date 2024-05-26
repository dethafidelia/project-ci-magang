<div class="container py-3">
    <div class="row mb-3">
        <div class="col">
            <h3>Menejemen Bidang</h3>
            <form action="<?= base_url('Admin/Bidang/add') ?>" method="POST">
                <div class="form-group row mb-3 mt-3">
                    <label for="nama_bidang" class="form-label font-weight-bold">Nama Bidang</label>
                    <div class="col">
                        <input type="text" class="form-control" id="nama_bidang" name="nama_bidang" required placeholder="Masukkan nama bidang">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <div class="col">
            <h3>Menejemen Tim Pelayanan</h3>
            <form action="<?= base_url('Admin/Timpel/add') ?>" method="POST">
                <div class="form-group row mb-3 mt-3">
                    <label for="nama_timpel" class="form-label font-weight-bold">Nama Tim Pelayanan</label>
                    <div class="col">
                        <input type="text" class="form-control" id="nama_timpel" name="nama_timpel" required placeholder="Masukkan nama tim pelayanan">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="bidang" class="form-label font-weight-bold">Bidang</label>
                    <div class="col">
                        <select name="bidang" id="bidang" class="form-control">
                            <!-- <option value="">Pilih Bidang</option> -->
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr style="text-align:center;">
                        <th>No</th>
                        <th>Nama Bidang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php foreach ($bidang as $index => $key) : ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $key['nama_bidang'] ?></td>
                            <td>
                                <a href="<?= base_url('Admin/bidang/delete/' . $key["id_bidang"]) ?>" class="btn btn-danger">Hapus</a>
                            </td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="col">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr style="text-align:center;">
                        <th>No</th>
                        <th>Nama Bidang</th>
                        <th>Nama Tim Pelayanan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php foreach ($timpel as $index => $key) : ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $key['nama_bidang'] ?></td>
                            <td><?= $key['nama_tim_pelayanan'] ?></td>
                            <td>
                                <a href="<?= base_url('Admin/timpel/delete/' . $key["id_tim_pelayanan"]) ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Fetch bidang options on page load
        $.ajax({
            url: "<?php echo base_url('bidang/getAllBidang'); ?>",
            dataType: 'json',
            success: function(data) {
                console.log(data)
                $('#bidang').append($('<option>', {
                    value: '',
                    text: 'Pilih Bidang'
                }));
                $.each(data, function(key, value) {
                    $('#bidang').append($('<option>', {
                        value: value.id_bidang,
                        text: value.nama_bidang
                    }));
                });
            }
        });
    });
</script>