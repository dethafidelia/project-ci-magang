<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Programasi</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqx61gVWgIGe33WN09YO5cWrHMDwWUP45RhlfYXH/ve/mR0paPXDR5+6P" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <a href="<?= base_url('agenda') ?>" class="btn btn-info" role="button" aria-pressed="true" style="float:right">kembali</a>
        <h1>Form Programasi</h1>

        <form action="<?php echo base_url('agenda/save/proses'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group row mb-3">
                <label for="bidang" class="col-sm-2 col-form-label font-weight-bold">Bidang</label>
                <div class="col-sm-6">
                    <select name="bidang" id="bidang" class="form-control" required>
                        <option value="">Pilih Bidang</option>
                    </select>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="timpel" class="col-sm-2 col-form-label font-weight-bold">Tim Pelayanan</label>
                <div class="col-sm-6">
                    <select name="timpel" id="timpel" class="form-control">
                        <option value="">Pilih Tim Pelayanan</option>
                    </select>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="sasaran_strategis" class="col-sm-2 col-form-label">Sasaran Strategis:</label>
                <div class="col-sm-6">
                    <textarea type="text" class="form-control" id="sasaran_strategis" name="sasaran_strategis" required rows="3"></textarea>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="indikator" class="col-sm-2 col-form-label">Indikator:</label>
                <div class="col-sm-6">
                    <textarea type="text" class="form-control" id="indikator" name="indikator" required rows="3"></textarea>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="target" class="col-sm-2 col-form-label">Target:</label>
                <div class="col-sm-6">
                    <textarea type="text" class="form-control" id="target" name="target" required rows="3"></textarea>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="asumsi" class="col-sm-2 col-form-label">Asumsi:</label>
                <div class="col-sm-6">
                    <textarea type="text" class="form-control" id="asumsi" name="asumsi" rows="3" required></textarea>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="resiko" class="col-sm-2 col-form-label">Resiko:</label>
                <div class="col-sm-6">
                    <textarea type="text" class="form-control" id="resiko" name="resiko" rows="3" required></textarea>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="kegiatan_utama" class="col-sm-2 col-form-label">Kegiatan Utama:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="kegiatan_utama" name="kegiatan_utama" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="waktu_mulai" class="col-sm-2 col-form-label">Waktu Mulai:</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" id="waktu_mulai" name="waktu_mulai" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="waktu_akhir" class="col-sm-2 col-form-label">Waktu Berakhir:</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" id="waktu_akhir" name="waktu_akhir" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="swadaya" class="col-sm-2 col-form-label">Swadaya:</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="swadaya" name="swadaya" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="dewan_paroki" class="col-sm-2 col-form-label">Dewan Paroki:</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="dewan_paroki" name="dewan_paroki" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="subsidi_kas" class="col-sm-2 col-form-label">Subsidi KAS:</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="subsidi_kas" name="subsidi_kas" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="sumber_lain" class="col-sm-2 col-form-label">Sumber Lain:</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="sumber_lain" name="sumber_lain" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="penanggung_jawab" class="col-sm-2 col-form-label">Penanggung Jawab:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan:</label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

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
                document.getElementById("timpel").disabled = false;

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
                        $('#timpel').append($('<option>', {
                            value: '',
                            text: 'Pilih Tim Pelayanan'
                        }));
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