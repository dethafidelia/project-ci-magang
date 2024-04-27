<div class="container">
    <form>
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
                console.log(data);
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
        $('#bidang').change(function() {
            var bidangId = $(this).val();
            if (bidangId) {
                $.ajax({
                    url: "<?php echo base_url('timpel/getAllTimPelayanan'); ?>",
                    data: {
                        idBidang: bidangId
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#timpel').empty(); // Clear existing options
                        $('#timpel').append($('<option>', {
                            value: '',
                            text: 'Pilih Tim Pelayanan'
                        }));
                        $.each(data, function(key, value) {
                            $('#timpel').append($('<option>', {
                                value: value.id_tim_pelayanan,
                                text: value.nama_tim_pelayanan
                            }));
                        });

                        $('#timpel').prop('enable', false); // Enable Tim Pelayanan dropdown
                    }
                });
            } else {
                $('#timpel').empty(); // Clear existing options
                $('#timpel').prop('enable', true); // Disable Tim Pelayanan dropdown
            }
        });
    });
</script>