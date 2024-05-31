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
        <a href="<?= base_url('monev') ?>" class="btn btn-info" role="button" aria-pressed="true" style="float:right">kembali</a>
        <h1>Edit</h1>
        <form action="<?= base_url('monev/edit/proses') ?>" method="POST">
            <input type="text" name="id_program" value="<?= $program['ID'] ?>" hidden>
            <div class="form-group row mb-3">
                <label for="status" class="col-sm-2 col-form-label font-weight-bold">Status</label>
                <div class="col-sm-6">
                    <select name="status" id="status" class="form-control">
                        <option selected value="<?= $program['STATUS'] ?>"><?= $program['STATUS'] ?></option>

                        <option value="Belum Terealisasi">Belum Terealisasi</option>
                        <option value="Tidak Terealisasi">Tidak Terealisasi</option>
                        <option value="Realisasi">Realisasi</option>
                    </select>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="bidang" class="col-sm-2 col-form-label font-weight-bold">Bidang</label>
                <div class="col-sm-6">
                    <select name="bidang" id="bidang" class="form-control" disabled>
                        <option value="<?= $program['id_bidang'] ?>"><?= $program['nama_bidang'] ?></option>
                    </select>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="timpel" class="col-sm-2 col-form-label font-weight-bold">Tim Pelayanan</label>
                <div class="col-sm-6">
                    <select name="timpel" id="timpel" class="form-control" disabled>
                        <option value="<?= $program['nama_tim_pelayanan'] ?>"><?= $program['nama_tim_pelayanan'] ?></option>
                    </select>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="sasaran_strategis" class="col-sm-2 col-form-label">Sasaran Strategis:</label>
                <div class="col-sm-6">
                    <textarea type="text" class="form-control" id="sasaran_strategis" name="sasaran_strategis" rows="3" disabled><?= htmlspecialchars($program['SASARAN_STRATEGIS']) ?></textarea>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="indikator" class="col-sm-2 col-form-label">Indikator:</label>
                <div class="col-sm-6">
                    <textarea type="text" class="form-control" id="indikator" name="indikator" rows="3" disabled><?= htmlspecialchars($program['INDIKATOR']) ?></textarea>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="target" class="col-sm-2 col-form-label">Target:</label>
                <div class="col-sm-6">
                    <textarea type="text" class="form-control" id="target" name="target" rows="3"><?= htmlspecialchars($program['TARGET']) ?></textarea>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="asumsi" class="col-sm-2 col-form-label">Asumsi:</label>
                <div class="col-sm-6">
                    <textarea type="text" class="form-control" id="asumsi" name="asumsi" rows="3"><?= htmlspecialchars($program['ASUMSI']) ?></textarea>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="resiko" class="col-sm-2 col-form-label">Resiko:</label>
                <div class="col-sm-6">
                    <textarea type="text" class="form-control" id="resiko" name="resiko" rows="3"><?= htmlspecialchars($program['RESIKO']) ?></textarea>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="kegiatan_utama" class="col-sm-2 col-form-label">Kegiatan Utama:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="kegiatan_utama" name="kegiatan_utama" value="<?= $program['KEGIATAN_UTAMA'] ?>">
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="waktu_mulai" class="col-sm-2 col-form-label">Waktu Mulai:</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" id="waktu_mulai" name="waktu_mulai" value="<?= $program['WAKTU_MULAI'] ?>">
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="waktu_akhir" class="col-sm-2 col-form-label">Waktu Berakhir:</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" id="waktu_akhir" name="waktu_akhir" value="<?= $program['WAKTU_AKHIR'] ?>">
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="swadaya" class="col-sm-2 col-form-label">Swadaya:</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="swadaya" name="swadaya" value="<?= $program['SWADAYA'] ?>">
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="dewan_paroki" class="col-sm-2 col-form-label">Dewan Paroki:</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="dewan_paroki" name="dewan_paroki" value="<?= $program['DEWAN_PAROKI'] ?>">
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="subsidi_kas" class="col-sm-2 col-form-label">Subsidi KAS:</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="subsidi_kas" name="subsidi_kas" value="<?= $program['SUBSIDI_KAS'] ?>">
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="sumber_lain" class="col-sm-2 col-form-label">Sumber Lain:</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="sumber_lain" name="sumber_lain" value="<?= $program['SUMBER_LAIN'] ?>">
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="total_biaya" class="col-sm-2 col-form-label">TOTAL BIAYA</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="total_biaya" name="total_biaya" disabled value="<?= $program['TOTAL_BIAYA'] ?>">
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="penanggung_jawab" class="col-sm-2 col-form-label">Penanggung Jawab:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" value="<?= $program['PENANGGUNG_JAWAB'] ?>">
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan:</label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= htmlspecialchars($program['KETERANGAN']) ?></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>

        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        })
    </script>