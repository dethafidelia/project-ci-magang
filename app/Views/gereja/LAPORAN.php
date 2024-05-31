<div class="container">
    <div class="d-flex justify-content mb-2 mt-3">
        <h2>LAPORAN</h2>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr style="text-align:center;">
                    <th>NO</th>
                    <th>BIDANG</th>
                    <th>TIM PELAYANAN</th>
                    <th>RENCANA</th>
                    <th>REALISASI</th>
                    <th>BELUM TEREALISASI</th>
                    <th>TIDAK TEREALISASI</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php foreach($list as $index => $key): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $key['nama_bidang'] ?></td>
                        <td><?= $key['nama_tim_pelayanan'] ?></td>
                        <td><?= $key['jumlah_kegiatan'] ?></td>
                        <td><?= $key['jumlah_realisasi'] ?></td>
                        <td><?= $key['jumlah_belum_realisasi'] ?></td>
                        <td><?= $key['jumlah_tidak_realisasi'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>