



<div class="container mt-3">
    <h3>TABEL RENCANA</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr style="text-align:center;">
                    <th>NO</th>
                    <th>BIDANG</th>
                    <th>TIM PELAYANAN</th>
                    <th>SASARAN STRATEGIS</th>
                    <th>STATUS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="tbody-rencana">
                <?php foreach ($belum as $index => $key) :  ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $key['nama_bidang'] ?></td>
                        <td><?= $key['nama_tim_pelayanan'] ?></td>
                        <td><?= $key['SASARAN_STRATEGIS'] ?></td>
                        <td><?= $key['STATUS'] ?></td>
                        <td>
                            <a href="<?= base_url('monev/detail/' . $key["ID"]) ?>" class="btn btn-primary">Detail</a>
                            <a href="<?= base_url('monev/edit/' . $key["ID"]) ?>" class="btn btn-primary">Edit</a>
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
                url: '<?= base_url('agenda/cari-data/rencana'); ?>',
                type: 'GET',
                data: {
                    tahun: tahun_anggaran,
                    id_bidang: bidang,
                    id_timpel: timpel
                },
                success: function(response) {
                    // Tangani respons dari server
                    console.log(tahun_anggaran);

                    var data = JSON.parse(response);

                    // Clear existing rows
                    $('#tbody-rencana').empty();

                    // Loop through the data and add rows to the table
                    for (var i = 0; i < data.length; i++) {
                        var row = $('<tr>');
                        row.append($('<td>').text(i + 1)); // NO
                        row.append($('<td>').text(data[i].bidang)); // BIDANG
                        row.append($('<td>').text(data[i].pelayanan)); // BIDANG
                        row.append($('<td>').text(data[i].SASARAN_STRATEGIS)); // SASARAN STRATEGIS
                        row.append($('<td>').text(data[i].STATUS)); // INDIKATOR
                        var aksi = $('<td>');
                        var link = $('<a>').attr('href', '<?= base_url('monev/detail/') ?>' + data[i].ID).text('Detail').addClass('btn btn-primary');
                        aksi.append(link);
                        aksi.css('text-align', 'center'); // Mengatur tata letak ke tengah menggunakan CSS
                        row.append(aksi);
                        $('#tbody-rencana').append(row);
                    }
                }
            });

        });
    });
</script>