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
        <h1>Detail</h1>

        <div class="form-group row mb-3">
            <label for="bidang" class="col-sm-2 col-form-label font-weight-bold">Bidang</label>
            <div class="col-sm-6">
                <select name="bidang" id="bidang" class="form-control" disabled>
                    <option><?= $program['nama_bidang'] ?></option>
                </select>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="timpel" class="col-sm-2 col-form-label font-weight-bold">Tim Pelayanan</label>
            <div class="col-sm-6">
                <select name="timpel" id="timpel" class="form-control" disabled>
                    <option><?= $program['nama_tim_pelayanan'] ?></option>
                </select>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="sasaran_strategis" class="col-sm-2 col-form-label">Sasaran Strategis:</label>
            <div class="col-sm-6">
                <textarea type="text" class="form-control" id="sasaran_strategis" name="sasaran_strategis" rows="3" readonly><?= htmlspecialchars($program['SASARAN_STRATEGIS']) ?></textarea>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="indikator" class="col-sm-2 col-form-label">Indikator:</label>
            <div class="col-sm-6">
                <textarea type="text" class="form-control" id="indikator" name="indikator" rows="3" readonly><?= htmlspecialchars($program['INDIKATOR']) ?></textarea>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="target" class="col-sm-2 col-form-label">Target:</label>
            <div class="col-sm-6">
                <textarea type="text" class="form-control" id="target" name="target" readonly rows="3"><?= htmlspecialchars($program['TARGET']) ?></textarea>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="asumsi" class="col-sm-2 col-form-label">Asumsi:</label>
            <div class="col-sm-6">
                <textarea type="text" class="form-control" id="asumsi" name="asumsi" rows="3" readonly><?= htmlspecialchars($program['ASUMSI']) ?></textarea>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="resiko" class="col-sm-2 col-form-label">Resiko:</label>
            <div class="col-sm-6">
                <textarea type="text" class="form-control" id="resiko" name="resiko" rows="3" readonly><?= htmlspecialchars($program['RESIKO']) ?></textarea>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="kegiatan_utama" class="col-sm-2 col-form-label">Kegiatan Utama:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="kegiatan_utama" name="kegiatan_utama" readonly value="<?= $program['KEGIATAN_UTAMA'] ?>">
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="waktu_mulai" class="col-sm-2 col-form-label">Waktu Mulai:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="waktu_mulai" name="waktu_mulai" readonly value="<?= date('d-m-Y', strtotime($program['WAKTU_MULAI'])) ?>">
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="waktu_akhir" class="col-sm-2 col-form-label">Waktu Berakhir:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="waktu_akhir" name="waktu_akhir" readonly value="<?= date('d-m-Y', strtotime($program['WAKTU_AKHIR'])) ?>">
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="swadaya" class="col-sm-2 col-form-label">Swadaya:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="swadaya" name="swadaya" readonly value="<?= $program['SWADAYA'] ?>">
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="dewan_paroki" class="col-sm-2 col-form-label">Dewan Paroki:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="dewan_paroki" name="dewan_paroki" readonly value="<?= $program['DEWAN_PAROKI'] ?>">
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="subsidi_kas" class="col-sm-2 col-form-label">Subsidi KAS:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="subsidi_kas" name="subsidi_kas" readonly value="<?= $program['SUBSIDI_KAS'] ?>">
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="sumber_lain" class="col-sm-2 col-form-label">Sumber Lain:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="sumber_lain" name="sumber_lain" readonly value="<?= $program['SUMBER_LAIN'] ?>">
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="total_biaya" class="col-sm-2 col-form-label">TOTAL BIAYA</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="total_biaya" name="total_biaya" readonly value="<?= $program['TOTAL_BIAYA'] ?>">
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="penanggung_jawab" class="col-sm-2 col-form-label">Penanggung Jawab:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" readonly value="<?= $program['PENANGGUNG_JAWAB'] ?>">
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan:</label>
            <div class="col-sm-6">
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3" readonly><?= htmlspecialchars($program['KETERANGAN']) ?></textarea>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="status" name="status" readonly value="<?= $program['STATUS'] ?>">
            </div>
        </div>

        <?php if ($program['CATATAN'] !== null) : ?>
            <div class="form-group row mb-3">
                <label for="keterangan" class="col-sm-2 col-form-label">Catatan Pemonev:</label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3" readonly><?= htmlspecialchars($program['CATATAN']) ?></textarea>
                </div>
            </div>
        <?php endif ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var fields = ['swadaya', 'subsidi_kas', 'dewan_paroki', 'sumber_lain', 'total_biaya'];
            fields.forEach(function(field) {
                var value = $('#' + field).val();
                $('#' + field).val('Rp ' + value);
            });
        });
    </script>