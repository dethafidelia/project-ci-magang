<div class="container">
    <div class="d-flex justify-content-end mb-2">
        <a href="<?= base_url('tambah') ?>" class="btn btn-primary">Tambah Anggota</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr style="text-align:center;">
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Bidang</th>
                    <th>Tim Pelayanan</th>
                    <th>Proposal</th>
                    <th>Edit</th>
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
            url: "<?php echo base_url('register/getAllUser'); ?>",
            method: "GET",
            dataType: "JSON",
            async: false,
            success: function(data) {
                var order = 1;
                var html;
                for (var i = 0; i < data.length; i++) {
                    html += '<tr>';
                    html += '<td>' + order++ + '</td>';
                    html += '<td>' + data[i]['NAMA_LENGKAP'] + '</td>';
                    html += '<td>' + data[i]['NAMA_BIDANG'] + '</td>';
                    html += '<td>' + data[i]['NAMA_TIMPEL'] + '</td>';
                    html += '<td>' + data[i]['PROPOSAL'] + '</td>';
                    html += '<td>';
                    html += '<a href="<?= base_url('edit/') ?>' + data[i]['ID'] + '" class="btn btn-primary">Edit</a>';
                    html += '<a href="<?= base_url('delete/') ?>' + data[i]['ID'] + '" class="btn btn-danger">Hapus</a>';
                    html += '</td>';
                    html += '</tr>';
                }
                $("tbody").html(html);
            }
        })
    })
</script>

</html>