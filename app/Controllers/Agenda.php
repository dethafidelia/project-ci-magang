<?php

namespace App\Controllers;

use App\Models\AgendaModel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use ZipArchive;

class Agenda extends BaseController
{
    public function getAllAgenda()
    {
        $model = new AgendaModel();
        $data = $model->findAll();
        echo json_encode($data);
    }

    public function cariAgenda()
    {
        $model = new AgendaModel();
        $tahun_anggaran = $this->request->getGet('tahun_anggaran');
        $bidang = $this->request->getGet('bidang');
        $timpel = $this->request->getGet('timpel');

        # Buat validasi data dulu

        $data = $model
            ->where('te', $tahun_anggaran)  # Tentukan gimana dia cari berdasarkan tahunnya,
            ->where('bidang', $bidang)  # Berdasarkan bidangnya
            ->where('timpel', $timpel);  # Berdasarkan timpelnya

        # Kembalikan kayak index, tapi data yang ditampilkan hanya yg dari $data

    }

    // Metode untuk menangani pengiriman formulir
    public function submit()
    {
        // // Dapatkan file yang diunggah menggunakan request object
        // $lpjdok = $this->request->getFile('lpj');

        // // Inisialisasi URL foto
        // $dok_url = "";

        // if ($lpjdok->isValid() && !$lpjdok->hasMoved()) {
        //     // Generate nama file baru

        //     $namaBaru = $lpjdok->getRandomName();
        //     $lokasiFolder = ROOTPATH . 'lpj/';

        //     $lpjdok->move(
        //         $lokasiFolder,
        //         $namaBaru
        //     );

        //     // Setel URL foto
        //     $dok_url = base_url('proyek-kp/lpj/' . $namaBaru);
        // }


        // Ambil data yang dikirimkan dari formulir
        $data = [
            'id_bidang' => $this->request->getPost('bidang'),
            'id_tim_pelayanan' => $this->request->getPost('timpel'),
            'SASARAN_STRATEGIS' => $this->request->getPost('sasaran_strategis'),
            'INDIKATOR' => $this->request->getPost('indikator'),
            'TARGET' => $this->request->getPost('target'),
            'ASUMSI' => $this->request->getPost('asumsi'),
            'RESIKO' => $this->request->getPost('resiko'),
            'KEGIATAN_UTAMA' => $this->request->getPost('kegiatan_utama'),
            'WAKTU' => $this->request->getPost('waktu'),
            'SWADAYA' => $this->request->getPost('swadaya'),
            'DEWAN_PAROKI' => $this->request->getPost('dewan_paroki'),
            'SUBSIDI_KAS' => $this->request->getPost('subsidi_kas'),
            'SUMBER_LAIN' => $this->request->getPost('sumber_lain'),
            'TOTAL_BIAYA' => $this->request->getPost('total_biaya'),
            'PENANGGUNG_JAWAB' => $this->request->getPost('penanggung_jawab'),
            'KETERANGAN' => $this->request->getPost('keterangan'),
        ];
        dd($data);

        // Buat instansi model
        $model = new AgendaModel();

        // Panggil metode tambah dari model untuk menyimpan data ke database
        $model->tambah($data);

        // Redirect kembali ke halaman agenda setelah data tersimpan
        return redirect()->to(base_url('agenda'));
    }



    public function index()
    {
        $model = new AgendaModel();
        $data['program'] = $model->getDetails();
        return view('gereja/header', $data)
            . view('gereja/dropdown')
            . view('gereja/AGENDA');
    }

    public function saveAgenda()
    {
        $data = [
            'id_bidang' => $this->request->getPost('bidang'),
            'id_tim_pelayanan' => $this->request->getPost('timpel'),
            'SASARAN_STRATEGIS' => $this->request->getPost('sasaran_strategis'),
            'INDIKATOR' => $this->request->getPost('indikator'),
            'TARGET' => $this->request->getPost('target'),
            'ASUMSI' => $this->request->getPost('asumsi'),
            'RESIKO' => $this->request->getPost('resiko'),
            'KEGIATAN_UTAMA' => $this->request->getPost('kegiatan_utama'),
            'WAKTU_MULAI' => $this->request->getPost('waktu_awal'),
            'WAKTU_AKHIR' => $this->request->getPost('waktu_akhir'),
            'SWADAYA' => $this->request->getPost('swadaya'),
            'DEWAN_PAROKI' => $this->request->getPost('dewan_paroki'),
            'SUBSIDI_KAS' => $this->request->getPost('subsidi_kas'),
            'SUMBER_LAIN' => $this->request->getPost('sumber_lain'),
            'TOTAL_BIAYA' => $this->request->getPost('total_biaya'),
            'PENANGGUNG_JAWAB' => $this->request->getPost('penanggung_jawab'),
            'KETERANGAN' => $this->request->getPost('keterangan'),
        ];

        $model = new AgendaModel();
        $model->tambah($data);
        return redirect()->to(base_url('agenda'));
    }

    public function detailProgramsi($id)
    {
        $model = new AgendaModel();
        $data['program'] = $model->getDetailsById($id);
        return view('gereja/header', $data)
            . view('gereja/detailAgenda');
    }

    public function cariData()
    {
        $id_bidang = $_GET['id_bidang'];
        $id_timpel = $_GET['id_timpel'];
        $tahun = $_GET['tahun'];

        $model = new AgendaModel();
        $data = $model->cariData($id_bidang, $id_timpel, $tahun);
        return json_encode($data);
    }

    public function cariDataRealisasi()
    {
        $id_bidang = $_GET['id_bidang'];
        $id_timpel = $_GET['id_timpel'];
        $tahun = $_GET['tahun'];

        $model = new AgendaModel();
        $data = $model->cariRealisasi($id_bidang, $id_timpel, $tahun);
        return json_encode($data);
    }

    public function exportExcel()
    {
        // Retrieve parameters from GET request
        $id_bidang = $this->request->getGet('id_bidang');
        $id_timpel = $this->request->getGet('id_timpel');
        $tahun = $this->request->getGet('tahun');
        $tabel = $this->request->getGet('tabel');
        $tombol = $this->request->getGet('tombol');  // Add this line to get the 'tombol' parameter

        // Get data from model
        $model = new AgendaModel();
        $data = $model->exportExcelProgramasi($id_bidang, $id_timpel, $tahun, $tabel);

        if ($data) {
            // Define the order of columns
            $columns = [
                ["label" => "ID", "value" => "ID"],
                ["label" => "Bidang", "value" => "bidang"],
                ["label" => "Pelayanan", "value" => "pelayanan"],
                ["label" => "Sasaran Strategis", "value" => "SASARAN_STRATEGIS"],
                ["label" => "Indikator", "value" => "INDIKATOR"],
                ["label" => "Target", "value" => "TARGET"],
                ["label" => "Asumsi", "value" => "ASUMSI"],
                ["label" => "Resiko", "value" => "RESIKO"],
                ["label" => "Kegiatan Utama", "value" => "KEGIATAN_UTAMA"],
                ["label" => "Waktu Mulai", "value" => "WAKTU_MULAI"],
                ["label" => "Waktu Berakhir", "value" => "WAKTU_AKHIR"],
                ["label" => "Total Biaya", "value" => "TOTAL_BIAYA"],
                ["label" => "Swadaya", "value" => "SWADAYA"],
                ["label" => "Dewan Paroki", "value" => "DEWAN_PAROKI"],
                ["label" => "Subsidi Kas", "value" => "SUBSIDI_KAS"],
                ["label" => "Sumber Lain", "value" => "SUMBER_LAIN"],
                ["label" => "Penanggung Jawab", "value" => "PENANGGUNG_JAWAB"],
                ["label" => "Keterangan", "value" => "KETERANGAN"],
                ["label" => "Status", "value" => "STATUS"],
                ["label" => "Catatan", "value" => "CATATAN"],
            ];

            // Group data by 'pelayanan'
            $dataByPelayanan = [];
            foreach ($data as $item) {
                $dataByPelayanan[$item['pelayanan']][] = $item;
            }

            // Create a temporary directory to store the files
            $tempDir = sys_get_temp_dir() . '/export_files_' . uniqid();
            if (!mkdir($tempDir) && !is_dir($tempDir)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $tempDir));
            }

            // Generate files for each group
            foreach ($dataByPelayanan as $pelayanan => $items) {
                $excelFilename = $this->generateExcel($pelayanan, $items, $columns, $tabel, $tempDir);
                if ($tombol == 'pdf') {
                    $this->generatePdf($excelFilename, $tabel, $tempDir);
                    unlink($excelFilename); // Remove the Excel file if we're only exporting PDFs
                }
            }

            // Create a ZIP file and add all files to it
            $zip = new ZipArchive();
            $zipFilename = $tempDir . '/' . ucwords('' . $tabel) . '_' . date('Y-m-d_H-i-s') . '.zip';
            if ($zip->open($zipFilename, ZipArchive::CREATE) !== TRUE) {
                exit("Cannot open <$zipFilename>\n");
            }

            $filePattern = ($tombol == 'pdf') ? '*.pdf' : '*.xlsx';
            foreach (glob($tempDir . '/' . $filePattern) as $file) {
                $zip->addFile($file, basename($file));
            }
            $zip->close();

            // Send the ZIP file to the browser for download
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="' . ucwords('' . $tabel) . '_' . date('Y-m-d_H-i-s') . '.zip"');
            header('Content-Length: ' . filesize($zipFilename));

            readfile($zipFilename);

            // Clean up temporary files
            array_map('unlink', glob($tempDir . '/*'));
            rmdir($tempDir);

            exit;
        }
    }

    private function generateExcel($pelayanan, $data, $columns, $tabel, $tempDir)
    {
        // Load the template spreadsheet
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('asset/TemplateKedua.xlsx');
        $sheet = $spreadsheet->getActiveSheet();

        $title = 'DATA ' . strtoupper($tabel);
        $sheet->setCellValue('A8', $title);

        $sheet->mergeCells('A8:' . chr(64 + count($columns)) . '8');

        $sheet->getStyle('A8')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 18,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        $columnLetter = 'A';
        foreach ($columns as $column) {
            $sheet->setCellValue($columnLetter . '9', $column['label']);
            $columnLetter++;
        }

        $rowNumber = 10;
        foreach ($data as $item) {
            $columnLetter = 'A';
            foreach ($columns as $column) {
                $sheet->setCellValue($columnLetter . $rowNumber, $item[$column['value']]);
                $columnLetter++;
            }
            $rowNumber++;
        }

        $sheet->getStyle('A9:' . chr(64 + count($columns)) . ($rowNumber - 1))->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        $sheet->getStyle('A8:' . chr(64 + count($columns)) . ($rowNumber - 1))->applyFromArray([
            'font' => [
                'name' => 'Times New Roman',
            ],
        ]);

        // Auto width for columns
        foreach (range('A', chr(64 + count($columns))) as $columnID) {
            $sheet->getColumnDimension($columnID)->setWidth(20);
        }

        // Apply wrap text and top alignment for all cells
        $sheet->getStyle('A9:' . chr(64 + count($columns)) . ($rowNumber - 1))->applyFromArray([
            'alignment' => [
                'wrapText' => true,
                'vertical' => Alignment::VERTICAL_TOP,
            ],
        ]);

        // Mengatur agar tidak ada pembatas halaman
        $sheet->getPageSetup()->setFitToPage(true);
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        $sheet->getPageMargins()->setTop(0.5);
        $sheet->getPageMargins()->setRight(0.5);
        $sheet->getPageMargins()->setLeft(0.5);
        $sheet->getPageMargins()->setBottom(0.5);

        // Generate filename based on pelayanan and current timestamp
        $filename = $tempDir . '/' . $pelayanan . ' - ' . date('Y-m-d_H-i-s') . '.xlsx';

        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);

        return $filename;
    }



    private function generatePdf($excelFilename, $tabel, $tempDir)
    {
        // Load the Excel file
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($excelFilename);

        // Convert to HTML
        $htmlWriter = new \PhpOffice\PhpSpreadsheet\Writer\Html($spreadsheet);
        ob_start();
        $htmlWriter->save('php://output');
        $htmlContent = ob_get_clean();

        // Add custom CSS to improve PDF output
        $htmlContent = '
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid black;
                padding: 5px;
                text-align: left;
                vertical-align: middle;
            }
            th {
                background-color: #f2f2f2;
            }
            .title {
                text-align: center;
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 20px;
            }
        </style>
        <div class="title">DATA ' . strtoupper($tabel) . '</div>' . $htmlContent;

        // Convert HTML to PDF using Mpdf
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($htmlContent);
        $pdfFilename = str_replace('.xlsx', '.pdf', $excelFilename);
        $mpdf->Output($pdfFilename, \Mpdf\Output\Destination::FILE);

        return $pdfFilename;
    }


    public function cariDataRencana()
    {
        $id_bidang = $_GET['id_bidang'];
        $id_timpel = $_GET['id_timpel'];
        $tahun = $_GET['tahun'];

        $model = new AgendaModel();
        $data = $model->cariRencana($id_bidang, $id_timpel, $tahun);
        return json_encode($data);
    }
}
