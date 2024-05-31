<div class="container mt-3">
    <div class="d-flex justify-content-end mb-2">
        <button id="btnCariData" class="btn btn-primary me-2">Cari</button>
        <?php if (session('status') === 'Ketua') : ?>
            <a href="<?= base_url('programasi') ?>" class="btn btn-primary">Tambah Data</a>
        <?php endif ?>
    </div>
    <div class="d-flex justify-content-start mb-3">
        <button type="button" class="btn btn-success me-2" id="exportExcel">
            <span><i class="bi bi-file-earmark-excel"></i>&nbsp;</span>Export Excel
        </button>
        <button type="button" class="btn btn-danger" id="exportPdf">
            <i class="bi bi-file-earmark-pdf"></i>&nbsp;Export PDF
        </button>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr style="text-align:center;">
                    <th>NO</th>
                    <th>BIDANG</th>
                    <th>TIM PELAYANAN</th>
                    <th>KEGIATAN UTAMA</th>
                    <th>WAKTU</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php foreach ($program as $index => $key) :  ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $key['nama_bidang'] ?></td>
                        <td><?= $key['nama_tim_pelayanan'] ?></td>
                        <td><?= $key['KEGIATAN_UTAMA'] ?></td>
                        <td><?= date('d-m-Y', strtotime($key['WAKTU_MULAI'])) ?> sampai  <?= date('d-m-Y', strtotime($key['WAKTU_AKHIR'])) ?></td>

                        <td>
                            <a href="<?= base_url('agenda/detail/' . $key["ID"]) ?>" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#btnCariData').click(function() {
            var tahun_anggaran = $('#tahun_anggaran').val();
            var bidang = $('#bidang').val();
            var timpel = $('#timpel').val();

            // Lakukan ajax dan respon ke server
            $.ajax({
                url: '<?= base_url('agenda/cariData'); ?>',
                type: 'GET',
                data: {
                    tahun: tahun_anggaran,
                    id_bidang: bidang,
                    id_timpel: timpel
                },
                success: function(response) {
                    // Tangani respons dari server
                    console.log(response);
                    var data = JSON.parse(response);

                    // Clear existing rows
                    $('#tbody').empty();

                    // Loop through the data and add rows to the table
                    for (var i = 0; i < data.length; i++) {
                        var row = $('<tr>');
                        row.append($('<td>').text(i + 1)); // NO
                        row.append($('<td>').text(data[i].bidang)); // BIDANG
                        row.append($('<td>').text(data[i].pelayanan)); // BIDANG
                        row.append($('<td>').text(data[i].SASARAN_STRATEGIS)); // SASARAN STRATEGIS
                        row.append($('<td>').text(data[i].INDIKATOR)); // INDIKATOR
                        var aksi = $('<td>');
                        var link = $('<a>').attr('href', '<?= base_url('agenda/detail/') ?>' + data[i].ID).text('Detail').addClass('btn btn-primary');
                        aksi.append(link);
                        aksi.css('text-align', 'center'); // Mengatur tata letak ke tengah menggunakan CSS
                        row.append(aksi);
                        $('#tbody').append(row);
                    }
                }
            });

        });
    });
    $('#exportExcel').on('click', function() {
        var tahun_anggaran = $('#tahun_anggaran').val();
        var bidang = $('#bidang').val();
        var timpel = $('#timpel').val();
        var url = "<?php echo base_url('agenda/exportExcel'); ?>";

        // Buat URL lengkap dengan parameter GET
        var fullUrl = url + "?tahun=" + tahun_anggaran + "&id_bidang=" + bidang + "&id_timpel=" + timpel + "&tabel=programasi&tombol=excel";

        // Arahkan browser untuk mengunduh file
        window.location.href = fullUrl;
    });
    $('#exportPdf').on('click', function() {
        var tahun_anggaran = $('#tahun_anggaran').val();
        var bidang = $('#bidang').val();
        var timpel = $('#timpel').val();
        var url = "<?php echo base_url('agenda/exportExcel'); ?>";

        // Buat URL lengkap dengan parameter GET
        var fullUrl = url + "?tahun=" + tahun_anggaran + "&id_bidang=" + bidang + "&id_timpel=" + timpel + "&tabel=programasi&tombol=pdf";

        // Arahkan browser untuk mengunduh file
        window.location.href = fullUrl;
    });
</script>
</body>

</html>