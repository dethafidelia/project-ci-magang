<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">
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
                if (selectedValue != '') {
                    document.getElementById("timpel").disabled = false;
                }else{
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
                // }
            });
        });
    </script>
</body>

</html>