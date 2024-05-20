<div class="container">
    <form action="<?= base_url('agenda/cari') ?>" method="GET">
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="tahun_anggaran">Tahun Anggaran</label>
                <select name="tahun_anggaran" id="tahun_anggaran" class="form-control">
                    <option value="">-- SEMUA --</option>
                    <option value="00">2024</option>
                    <option value="01">2023</option>
                    <option value="02">2022</option>
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label for="bidang">Bidang</label>
                <select name="bidang" id="bidang" class="form-control" required>
                    <!-- <option value="">Pilih Bidang</option> -->
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label for="timpel">Tim Pelayanan</label>
                <select name="timpel" id="timpel" class="form-control">
                    <option value="">Pilih Tim Pelayanan</option>
                </select>
            </div>
        </div>
    </form>
</div>

</body>

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

        // Update Tim Pelayanan dropdown based on selected Bidang
        $('#bidang').change(async function() {
            var bidang = $(this).val();
            console.log(bidang)
            try {
                const response = await fetch("<?= base_url('timpel/getById') ?>?bidang=" + bidang, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });

                if (!response.ok) {
                    throw new Error('Gagal mengambil data');
                }

                const contentType = response.headers.get('content-type');
                if (!contentType || !contentType.includes('application/json')) {
                    console.log(response)
                    throw new TypeError('Respons bukan JSON');
                }

                const res = await response.json();
                console.log(res);
                $('#timpel').empty();

                // Tambahkan opsi baru berdasarkan respons dari server
                res.forEach(function(timpel) {
                    $('#timpel').append(`<option value="${timpel.id}">${timpel.nama}</option>`);
                });

            } catch (error) {
                console.error(error);
            }
        });
    });
</script>