<div class="container mt-3">
    <form action="<?= base_url('agenda/cari') ?>" method="GET">
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="tahun_anggaran">Tahun Anggaran</label>
                <select name="tahun_anggaran" id="tahun_anggaran" class="form-control">
                    <option value="">-- SEMUA --</option>
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label for="bidang">Bidang</label>
                <select name="bidang" id="bidang" class="form-control" required>
                    <option value="">--SEMUA--</option>

                </select>
            </div>
            <div class="col-md-4 form-group">
                <label for="timpel">Tim Pelayanan</label>
                <select name="timpel" disabled id="timpel" class="form-control">
                    <option value="">--SEMUA--</option>
                </select>
            </div>
        </div>
    </form>
</div>


<div class="d-flex justify-content-end mb-2 mt-2 px-5 me-3">
    <button id="btnCariData" class="btn btn-primary me-5">Cari</button>
</div>
<div class="container mt-3">
    <div class="table-responsive">
        <h3>TABEL REALISASI</h3>
        <table class="table table-bordered " id="table-realisasi">
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
            <tbody id="tbody-realisasi">
                <?php foreach ($sudah as $index => $key) :  ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $key['nama_bidang'] ?></td>
                        <td><?= $key['nama_tim_pelayanan'] ?></td>
                        <td><?= $key['SASARAN_STRATEGIS'] ?></td>
                        <td><?= $key['STATUS'] ?></td>
                        <td>
                            <a href="<?= base_url('monev/detail/' . $key["ID"]) ?>" class="btn btn-primary">Detail</a>
                            
                            <?php  if (session('status') === 'Bendahara') : ?>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Tambah Catatan
                            </button>
                            <?php endif; ?>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
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
                    $('#timpel').append($('<option>', {
                        value: '',
                        text: '-- SEMUA --'
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
        });
    });

    $(document).ready(function() {
        $('#btnCariData').click(function() {
            var tahun_anggaran = $('#tahun_anggaran').val();
            var bidang = $('#bidang').val();
            var timpel = $('#timpel').val();

            // Lakukan ajax dan respon ke server
            $.ajax({
                url: '<?= base_url('agenda/cari-data/realisasi'); ?>',
                type: 'GET',
                data: {
                    tahun: tahun_anggaran,
                    id_bidang: bidang,
                    id_timpel: timpel
                },
                success: function(response) {
                    console.log(response);
                    console.log(tahun_anggaran);

                    // Tangani respons dari server
                    var data = JSON.parse(response);

                    // Clear existing rows
                    $('#tbody-realisasi').empty();

                    // Loop through the data and add rows to the table
                    for (var i = 0; i < data.length; i++) {
                        var row = $('<tr>');
                        row.append($('<td>').text(i + 1));
                        row.append($('<td>').text(data[i].bidang));
                        row.append($('<td>').text(data[i].pelayanan));
                        row.append($('<td>').text(data[i].SASARAN_STRATEGIS));
                        row.append($('<td>').text(data[i].STATUS));
                        var aksi = $('<td>');
                        var link = $('<a>').attr('href', '<?= base_url('monev/detail/') ?>' + data[i].ID).text('Detail').addClass('btn btn-primary');
                        aksi.append(link);
                        aksi.css('text-align', 'center');
                        row.append(aksi);
                        $('#tbody-realisasi').append(row);
                    }
                }
            });
        });
    });
</script>