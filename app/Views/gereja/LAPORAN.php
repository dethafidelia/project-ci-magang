<div class="container">
    <div class="d-flex justify-content mb-2">
        <h2>LAPORAN</h2>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr style="text-align:center;">
                    <th>NO</th>
                    <th>BIDANG</th>
                    <th>TIM PELAKSANA</th>
                    <th>RENCANA</th>
                    <th>REALISASI</th>
                    <th>BELUM LAPOR</th>
                    <th>EVALUSASI</th>
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
            url: "<?php echo base_url('laporan/getAllLaporan'); ?>",
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
                    html += '<td>' + data[i]['TIMPEL'] + '</td>';
                    html += '<td>' + data[i]['RENCANA'] + '</td>';
                    html += '<td>' + data[i]['REALISASI'] + '</td>';
                    html += '<td>' + data[i]['RENCANA'] + '</td>';
                    html += '<td>' + data[i]['BELUM_LAPOR'] + '</td>';
                    html += '<td>' + data[i]['EVALUASI'] + '</td>';
                    html += '</tr>';
                }
                $("tbody").html(html);
            }
        })

    })
</script>

</html>