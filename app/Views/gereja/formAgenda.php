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
    <div class="container">
        <a href="<?= base_url('agenda') ?>" class="btn btn-info" role="button" aria-pressed="true" style="float:right">kembali</a>
        <h1>Form Programasi</h1>

        <form action="<?php echo base_url('agenda/submit'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group row mb-3">
                <label for="bidang" class="col-sm-2 col-form-label">Bidang:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bidang" name="bidang" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="sasaran_strategis" class="col-sm-2 col-form-label">Sasaran Strategis:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="sasaran_strategis" name="sasaran_strategis" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="indikator" class="col-sm-2 col-form-label">Indikator:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="indikator" name="indikator" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="target" class="col-sm-2 col-form-label">Target:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="target" name="target" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="asumsi" class="col-sm-2 col-form-label">Asumsi:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="asumsi" name="asumsi">
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="resiko" class="col-sm-2 col-form-label">Resiko:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="resiko" name="resiko">
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="kegiatan_utama" class="col-sm-2 col-form-label">Kegiatan Utama:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kegiatan_utama" name="kegiatan_utama" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="waktu" class="col-sm-2 col-form-label">Waktu:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="waktu" name="waktu" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="total_biaya" class="col-sm-2 col-form-label">Total Biaya:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="total_biaya" name="total_biaya" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="detail_biaya" class="col-sm-2 col-form-label">Detail Biaya:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="detail_biaya" name="detail_biaya" rows="5"></textarea>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="penanggung_jawab" class="col-sm-2 col-form-label">Penanggung Jawab:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab">
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="5"></textarea>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="lpj" class="col-sm-2 col-form-label">Upload LPJ</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" id="lpj" name="lpj">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>