<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-4">
        <h1 class="fs-5">Formulir Pendaftaran Anggota DPPH</h1>
        <p class="fs-6">Silahkan isi formulir di bawah ini untuk mendaftar.</p>
        <form action="<?php echo base_url('dpph/add/user'); ?>" method="POST" class="border p-3">
            <div class="form-group row mb-3">
                <label for="nama_lengkap" class="col-sm-2 col-form-label font-weight-bold">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required placeholder="Masukkan nama lengkap Anda">
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="bidang" class="col-sm-2 col-form-label font-weight-bold">Bidang</label>
                <div class="col-sm-10">
                    <select name="bidang" id="bidang" class="form-control">
                        <option value="">Pilih Bidang</option>
                    </select>
                </div>
            </div>


            <div class="form-group row mb-3">
                <label for="timpel" class="col-sm-2 col-form-label font-weight-bold">Tim Pelayanan</label>
                <div class="col-sm-10">
                    <select name="timpel" id="timpel" class="form-control">
                        <option value="">Pilih Tim Pelayanan</option>
                    </select>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="username" class="col-sm-2 col-form-label font-weight-bold">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" required placeholder="Masukkan username Anda">
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="status" class="col-sm-2 col-form-label font-weight-bold">Status</label>
                <div class="col-sm-10">
                    <select name="status" id="status" class="form-control">
                        <option disabled>Pilih Status</option>
                        <option value="Admin">Admin</option>
                        <option value="Romo">Romo</option>
                        <option value="Ketua">Ketua</option>
                        <option value="Sekretaris">Sekretaris</option>
                        <option value="Bendahara">Bendahara</option>
                        <option value="Pemonev">Pemonev</option>
                    </select>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="password" class="col-sm-2 col-form-label font-weight-bold">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan password Anda">
                </div>
            </div>

            <div class="form-group row mb-3">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="<?= base_url('dpph') ?>" class="btn btn-info" role="button" aria-pressed="true" style="float:right">kembali</a>
                </div>
            </div>
        </form>
    </div>
</body>

<script>
    $(document).ready(function() {
        // Fetch bidang options on page load
        $.ajax({
            url: "<?= base_url('bidang/getAllBidang'); ?>",
            dataType: 'json',
            success: function(data) {
                // console.log(data)

                $.each(data, function(key, value) {
                    $('#bidang').append($('<option>', {
                        value: value.id_bidang,
                        text: value.nama_bidang
                    }));
                });
            }
        });

        $('#bidang').on('change', function() {
            var selectedValue = $(this).val();
            // if (selectedValue !== "") {
            // Mengaktifkan elemen <select> dengan id="timpel"
            if (selectedValue != '') {
                document.getElementById("timpel").disabled = false;
            } else {
                document.getElementById("timpel").disabled = true;
            }

            $.ajax({
                type: "GET",
                url: "<?= base_url('timpel/getById'); ?>",
                data: {
                    id_bidang: selectedValue
                },
                dataType: 'json',
                success: function(response) {
                    // Kosongkan opsi tim pelayanan sebelumnya
                    $('#timpel').empty();
                    // Tambahkan opsi baru berdasarkan respons dari server
                    $.each(response, function(key, value) {
                        $('#timpel').append($('<option>', {
                            value: value.id_tim_pelayanan,
                            text: value.nama_tim_pelayanan
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Terjadi kesalahan: " + error);
                }
            });
            // }
        });
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>