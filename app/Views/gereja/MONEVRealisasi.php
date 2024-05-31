<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>

</head>
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
    <div class="d-flex justify-content-end mb-2 mt-2 ">
    <button id="btnCariData" class="btn btn-primary">Cari</button>
</div>
</div>



<div class="container mt-3">
    <div class="table-responsive">
        <h3>TABEL REALISASI</h3>
        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-success me-2" id="exportExcelRealisasi">
                <span><i class="bi bi-file-earmark-excel"></i>&nbsp;</span>Export Excel
            </button>
            <button type="button" class="btn btn-danger" id="exportPdfRealisasi">
                <i class="bi bi-file-earmark-pdf"></i>&nbsp;Export PDF
            </button>
        </div>
        <table class="table table-striped table-bordered" id="table-realisasi">
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
            <tbody id="tbody-rencana">
                <?php foreach ($sudah as $index => $key) :  ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $key['nama_bidang'] ?></td>
                        <td><?= $key['nama_tim_pelayanan'] ?></td>
                        <td><?= $key['SASARAN_STRATEGIS'] ?></td>
                        <td><?= $key['STATUS'] ?></td>
                        <td>
                            <a href="<?= base_url('monev/detail/' . $key["ID"]) ?>" class="btn btn-primary">Detail</a>
                            <?php if (session('status') == 'Pemonev' && $key['CATATAN'] === null) : ?>
                                <a href="<?= base_url('monev/add/catatan/' . $key["ID"]) ?>" class="btn btn-primary">Tambah Catatan</a>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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


        $('#exportExcelRealisasi').on('click', function() {
        var tahun_anggaran = $('#tahun_anggaran').val();
        var bidang = $('#bidang').val();
        var timpel = $('#timpel').val();
        var url = "<?php echo base_url('agenda/exportExcel'); ?>";

        // Buat URL lengkap dengan parameter GET
        var fullUrl = url + "?tahun=" + tahun_anggaran + "&id_bidang=" + bidang + "&id_timpel=" + timpel + "&tabel=realisasi&tombol=excel";

        // Arahkan browser untuk mengunduh file
        window.location.href = fullUrl;
    });
    $('#exportPdfRealisasi').on('click', function() {
        var tahun_anggaran = $('#tahun_anggaran').val();
        var bidang = $('#bidang').val();
        var timpel = $('#timpel').val();
        var url = "<?php echo base_url('agenda/exportExcel'); ?>";

        // Buat URL lengkap dengan parameter GET
        var fullUrl = url + "?tahun=" + tahun_anggaran + "&id_bidang=" + bidang + "&id_timpel=" + timpel + "&tabel=realisasi&tombol=pdf";

        // Arahkan browser untuk mengunduh file
        window.location.href = fullUrl;
    });


        function createAndDownloadExcel(data, tahun_anggaran) {
            // Define the order of columns
            const columns = [{
                    label: "ID",
                    value: "ID"
                },
                {
                    label: "Bidang",
                    value: "bidang"
                },
                {
                    label: "Pelayanan",
                    value: "pelayanan"
                },
                {
                    label: "Sasaran Strategis",
                    value: "SASARAN_STRATEGIS"
                },
                {
                    label: "Indikator",
                    value: "INDIKATOR"
                },
                {
                    label: "Target",
                    value: "TARGET"
                },
                {
                    label: "Asumsi",
                    value: "ASUMSI"
                },
                {
                    label: "Resiko",
                    value: "RESIKO"
                },
                {
                    label: "Kegiatan Utama",
                    value: "KEGIATAN_UTAMA"
                },
                {
                    label: "Waktu",
                    value: "WAKTU"
                },
                {
                    label: "Total Biaya",
                    value: "TOTAL_BIAYA"
                },
                {
                    label: "Swadaya",
                    value: "SWADAYA"
                },
                {
                    label: "Dewan Paroki",
                    value: "DEWAN_PAROKI"
                },
                {
                    label: "Subsidi Kas",
                    value: "SUBSIDI_KAS"
                },
                {
                    label: "Sumber Lain",
                    value: "SUMBER_LAIN"
                },
                {
                    label: "Penanggung Jawab",
                    value: "PENANGGUNG_JAWAB"
                },
                {
                    label: "Keterangan",
                    value: "KETERANGAN"
                },
                {
                    label: "Status",
                    value: "STATUS"
                }
            ];

            // Map data to match the columns order
            const mappedData = data.map(item => {
                const row = {};
                columns.forEach(col => {
                    row[col.label] = item[col.value];
                });
                return row;
            });

            // Create a new workbook and worksheet
            const workbook = XLSX.utils.book_new();
            const worksheet = XLSX.utils.json_to_sheet(mappedData, {
                origin: 'A3'
            });

            // Add title
            const title = 'DATA REALISASI TAHUN ' + tahun_anggaran;
            XLSX.utils.sheet_add_aoa(worksheet, [
                [title]
            ], {
                origin: 'A1'
            });

            // Merge the title cells
            const mergeTitle = {
                s: {
                    r: 0,
                    c: 0
                },
                e: {
                    r: 0,
                    c: columns.length - 1
                }
            };
            if (!worksheet['!merges']) worksheet['!merges'] = [];
            worksheet['!merges'].push(mergeTitle);

            // Style the title
            worksheet['A1'].s = {
                font: {
                    bold: true,
                    sz: 18
                },
                alignment: {
                    horizontal: 'center'
                }
            };

            // Add borders and auto width to the columns
            const range = XLSX.utils.decode_range(worksheet['!ref']);
            for (let R = range.s.r; R <= range.e.r; ++R) {
                for (let C = range.s.c; C <= range.e.c; ++C) {
                    const cell_address = {
                        c: C,
                        r: R
                    };
                    const cell_ref = XLSX.utils.encode_cell(cell_address);
                    if (!worksheet[cell_ref]) continue;
                    if (!worksheet[cell_ref].s) worksheet[cell_ref].s = {};
                    worksheet[cell_ref].s.border = {
                        top: {
                            style: "thin",
                            color: {
                                auto: 1
                            }
                        },
                        right: {
                            style: "thin",
                            color: {
                                auto: 1
                            }
                        },
                        bottom: {
                            style: "thin",
                            color: {
                                auto: 1
                            }
                        },
                        left: {
                            style: "thin",
                            color: {
                                auto: 1
                            }
                        }
                    };
                }
            }

            // Set auto width for columns
            const wscols = [];
            columns.forEach((col, index) => {
                let maxLength = col.label.length;
                data.forEach(item => {
                    const cellValue = item[col.value];
                    if (cellValue && cellValue.toString().length > maxLength) {
                        maxLength = cellValue.toString().length;
                    }
                });
                wscols.push({
                    wch: maxLength + 2
                }); // Add some padding
            });
            worksheet['!cols'] = wscols;

            // Append worksheet to workbook
            XLSX.utils.book_append_sheet(workbook, worksheet, "Realisasi");

            // Create Excel file
            XLSX.writeFile(workbook, 'Realisasi' + tahun_anggaran + '.xlsx');
        }
        $('#exportPdfButton').on('click', function() {
            var tahun_anggaran = $('#tahun_anggaran').val();
            var bidang = $('#bidang').val();
            var timpel = $('#timpel').val();
            $.ajax({
                url: "<?php echo base_url('agenda/getAllRealisasi'); ?>",
                method: "GET",
                dataType: "JSON",
                data: {
                    tahun: tahun_anggaran,
                    id_bidang: bidang,
                    id_timpel: timpel
                },
                success: function(data) {
                    createAndDownloadPDF(data, tahun_anggaran);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX error:", status, error);
                }
            });

        });

        function createAndDownloadPDF(data, tahun_anggaran) {
            var docDefinition = {
                content: [{
                        text: 'DATA REALISASI TAHUN ' + tahun_anggaran,
                        style: 'header'
                    },
                    {
                        style: 'tableExample',
                        table: {
                            headerRows: 1,
                            body: [
                                ["ID", "Bidang", "Pelayanan", "Sasaran Strategis", "Indikator", "Target", "Asumsi", "Resiko", "Kegiatan Utama", "Waktu", "Total Biaya", "Swadaya", "Dewan Paroki", "Subsidi Kas", "Sumber Lain", "Penanggung Jawab", "Keterangan", "Status"],
                                ...data.map(item => Object.values(item))
                            ]
                        }
                    }
                ],
                styles: {
                    header: {
                        fontSize: 18,
                        bold: true,
                        alignment: 'center',
                        margin: [0, 0, 0, 10]
                    },
                    tableExample: {
                        margin: [0, 5, 0, 15]
                    }
                }
            };

            pdfMake.createPdf(docDefinition).download('Realisasi' + tahun_anggaran + '.pdf');
        }

    });
</script>