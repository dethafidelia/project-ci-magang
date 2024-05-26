<?php

namespace App\Controllers;

use App\Models\AgendaModel;

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
            'WAKTU' => $this->request->getPost('waktu'),
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

    public function cariDataRealisasi() {
        $id_bidang = $_GET['id_bidang'];
        $id_timpel = $_GET['id_timpel'];
        $tahun = $_GET['tahun'];

        $model = new AgendaModel();
        $data = $model->cariRealisasi($id_bidang, $id_timpel, $tahun);
        return json_encode($data);
    }

    public function cariDataRencana() {
        $id_bidang = $_GET['id_bidang'];
        $id_timpel = $_GET['id_timpel'];
        $tahun = $_GET['tahun'];

        $model = new AgendaModel();
        $data = $model->cariRencana($id_bidang, $id_timpel, $tahun);
        return json_encode($data);
    }
    
}
