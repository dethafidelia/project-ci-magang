<div class="container">
    <div class="d-flex justify-content-end mb-2">
        <a href="<?= base_url('agenda') ?>" class="btn btn-primary mr-2">Cari</a>
        <a href="<?= base_url('programasi') ?>" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr style="text-align:center;">
                    <th>NO</th>
                    <th>BIDANG</th>
                    <th>SASARAN STRATEGIS</th>
                    <th>INDIKATOR</th>
                    <th>TARGET</th>
                    <th>ASUMSI</th>
                    <th>RESIKO</th>
                    <th>KEGIATAN UTAMA</th>
                    <th>WAKTU</th>
                    <th>SWADAYA</th>
                    <th>DEWAN PAROKI</th>
                    <th>SUBSIDI KAS</th>
                    <th>SUMBER LAIN</th>
                    <th>TOTAL BIAYA</th>
                    <th>PENANGGUNG JAWAB</th>
                    <th>KETERANGAN</th>
                    <!-- <th>LPJ</th> -->
                </tr>
            </thead>
            <tbody id="tbody">
                <!-- Isi tabel -->
            </tbody>
        </table>
    </div>
</div>

</body>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "<?php echo base_url('agenda/getAllAgenda'); ?>",
            method: "GET",
            dataType: "JSON",
            async: false,
            success: function(data) {

                var order = 1;
                var html;
                console.log(data);
                for (var i = 0; i < data.length; i++) {

                    html += '<tr>';
                    html += '<td>' + order++ + '</td>';
                    html += '<td>' + data[i]['BIDANG'] + '</td>';
                    html += '<td>' + data[i]['SASARAN_STRATEGIS'] + '</td>';
                    html += '<td>' + data[i]['INDIKATOR'] + '</td>';
                    html += '<td>' + data[i]['TARGET'] + '</td>';
                    html += '<td>' + data[i]['ASUMSI'] + '</td>';
                    html += '<td>' + data[i]['RESIKO'] + '</td>';
                    html += '<td>' + data[i]['KEGIATAN_UTAMA'] + '</td>';
                    html += '<td>' + data[i]['WAKTU'] + '</td>';
                    html += '<td>' + formatRupiah(data[i]['SWADAYA']) + '</td>';
                    html += '<td>' + formatRupiah(data[i]['DEWAN_PAROKI']) + '</td>';
                    html += '<td>' + formatRupiah(data[i]['SUBSIDI_KAS']) + '</td>';
                    html += '<td>' + formatRupiah(data[i]['SUMBER_LAIN']) + '</td>';
                    html += '<td>' + formatRupiah(data[i]['TOTAL_BIAYA']) + '</td>';
                    html += '<td>' + data[i]['PENANGGUNG_JAWAB'] + '</td>';
                    html += '<td>' + data[i]['KETERANGAN'] + '</td>';
                    // html += '<td>' + data[i]['LPJ'] + '</td>';
                    html += '</tr>';
                }
                $("tbody").html(html);
            }
        })
        // Fungsi untuk format mata uang rupiah
        function formatRupiah(angka) {
            var number_string = angka.toString();
            var sisa = number_string.length % 3;
            var rupiah = number_string.substr(0, sisa);
            var ribuan = number_string.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                var separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            return 'Rp ' + rupiah;
        }
    })
</script>

</html>