<div class="container">
    <div class="d-flex justify-content-end mb-2">
        <a href="<?= base_url('monev') ?>" class="btn btn-primary mr-2">Cari</a>
    </div>
    <h3>RENCANA</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr style="text-align:center;">
                    <th>NO</th>
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
                    <th>DETAIL BIAYA</th>
                    <th>PENANGGUNG JAWAB</th>
                    <th>KETERANGAN</th>
                    <th>CATATAN</th>
                </tr>
            </thead>
            <tbody id="tbody">

            </tbody>
        </table>
    </div>
    <h3>REALISASI</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr style="text-align:center;">
                    <th>NO</th>
                    <th>SASARAN STRATEGIS</th>
                    <th>INDIKATOR</th>
                    <th>TARGET</th>
                    <th>ASUMSI</th>
                    <th>RESIKO</th>
                    <th>KETERLAKSANAAN KEGIATAN UTAMA</th>
                    <th>KETERLAKSANAAN WAKTU</th>
                    <th>SWADAYA</th>
                    <th>DEWAN PAROKI</th>
                    <th>SUBSIDI KAS</th>
                    <th>SUMBER LAIN</th>
                    <th>TOTAL BIAYA</th>
                    <th>DETAIL BIAYA</th>
                    <th>PENANGGUNG JAWAB</th>
                    <th>KETERANGAN</th>
                    <th>CATATAN</th>
                </tr>
            </thead>
            <tbody id="tbody2">

            </tbody>
        </table>
    </div>
</div>

</body>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "<?php echo base_url('monev/getAllMonev'); ?>",
            method: "GET",
            dataType: "JSON",
            async: false,
            success: function(data) {
                var order = 1;
                var html;
                for (var i = 0; i < data.length; i++) {
                    html += '<tr>';
                    html += '<td>' + order++ + '</td>';
                    // html += '<td>' + data[i]['BIDANG'] + '</td>';
                    html += '<td>' + data[i]['SASARAN_STRATEGIS'] + '</td>';
                    html += '<td>' + data[i]['INDIKATOR'] + '</td>';
                    html += '<td>' + data[i]['TARGET'] + '</td>';
                    html += '<td>' + data[i]['ASUMSI'] + '</td>';
                    html += '<td>' + data[i]['RESIKO'] + '</td>';
                    html += '<td>' + data[i]['KEGIATAN_UTAMA'] + '</td>';
                    html += '<td>' + data[i]['WAKTU'] + '</td>';
                    html += '<td>' + data[i]['SWADAYA'] + '</td>';
                    html += '<td>' + data[i]['DEWAN_PAROKI'] + '</td>';
                    html += '<td>' + data[i]['SUBSIDI_KAS'] + '</td>';
                    html += '<td>' + data[i]['SUMBER_LAIN'] + '</td>';
                    html += '<td>' + data[i]['TOTAL_BIAYA'] + '</td>';
                    html += '<td>' + data[i]['PJ'] + '</td>';
                    html += '<td>' + data[i]['KETERANGAN'] + '</td>';
                    html += '<td>' + data[i]['CATATAN'] + '</td>';
                    html += '</tr>';
                }
                $("tbody").html(html);
            }
        })
    })
    // $(document).ready(function() {
    //     $.ajax({
    //         url: "<?php echo base_url('monev/getAllMonev'); ?>",
    //         method: "GET",
    //         dataType: "JSON",
    //         async: false,
    //         success: function($data2) {
    //             var order = 1;
    //             var html;
    //             for (var i = 0; i < data.length; i++) {
    //                 html += '<tr>';
    //                 html += '<td>' + order++ + '</td>';
    //                 // html += '<td>' + data[i]['BIDANG'] + '</td>';
    //                 html += '<td>' + data[i]['SASARAN_STRATEGIS'] + '</td>';
    //                 html += '<td>' + data[i]['INDIKATOR'] + '</td>';
    //                 html += '<td>' + data[i]['TARGET'] + '</td>';
    //                 html += '<td>' + data[i]['ASUMSI'] + '</td>';
    //                 html += '<td>' + data[i]['RESIKO'] + '</td>';
    //                 html += '<td>' + data[i]['K_KEGIATAN_UTAMA'] + '</td>';
    //                 html += '<td>' + data[i]['K_WAKTU'] + '</td>';
    //                 html += '<td>' + data[i]['SWADAYA'] + '</td>';
    //                 html += '<td>' + data[i]['DEWAN_PAROKI'] + '</td>';
    //                 html += '<td>' + data[i]['SUBSIDI_KAS'] + '</td>';
    //                 html += '<td>' + data[i]['SUMBER_LAIN'] + '</td>';
    //                 html += '<td>' + data[i]['TOTAL_BIAYA'] + '</td>';
    //                 html += '<td>' + data[i]['PJ'] + '</td>';
    //                 html += '<td>' + data[i]['KETERANGAN'] + '</td>';
    //                 html += '<td>' + data[i]['CATATAN'] + '</td>';
    //                 html += '</tr>';
    //             }
    //             $("tbody2").html(html);
    //         }
    //     })
    // })
</script>

</html>