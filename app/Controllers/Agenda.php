<?php

namespace App\Controllers;

use App\Models\AgendaModel;

class Agenda extends BaseController
{
    public function index()
    {

        return view('gereja/header')
            . view('gereja/dropdown')
            . view('gereja/AGENDA');
    }

    public function getAllAgenda()
    {
        $model = new AgendaModel();
        $data = $model->findAll();
        echo json_encode($data);
    }

    // Metode untuk menangani pengiriman formulir
    public function submit()
    {


        // Dapatkan file yang diunggah menggunakan request object
        $lpjdok = $this->request->getFile('lpj');

        // Inisialisasi URL foto
        $dok_url = "";

        if ($lpjdok->isValid() && !$lpjdok->hasMoved()) {
            // Generate nama file baru

            $namaBaru = $lpjdok->getRandomName();
            $lokasiFolder = ROOTPATH . 'lpj/';

            $lpjdok->move(
                $lokasiFolder,
                $namaBaru
            );

            // Setel URL foto
            $dok_url = base_url('proyek-kp/lpj/' . $namaBaru);
        }


        // Ambil data yang dikirimkan dari formulir
        $data = [
            'BIDANG' => $this->request->getPost('bidang'),
            'SASARAN_STRATEGIS' => $this->request->getPost('sasaran_strategis'),
            'INDIKATOR' => $this->request->getPost('indikator'),
            'TARGET' => $this->request->getPost('target'),
            'ASUMSI' => $this->request->getPost('asumsi'),
            'RESIKO' => $this->request->getPost('resiko'),
            'KEGIATAN_UTAMA' => $this->request->getPost('kegiatan_utama'),
            'WAKTU' => $this->request->getPost('waktu'),
            'TOTAL_BIAYA' => $this->request->getPost('total_biaya'),
            'DETAIL_BIAYA' => $this->request->getPost('detail_biaya'),
            'PENANGGUNG_JAWAB' => $this->request->getPost('penanggung_jawab'),
            'KETERANGAN' => $this->request->getPost('keterangan'),
            'LPJ' => $dok_url

        ];

        // Buat instansi model
        $model = new AgendaModel();

        // Panggil metode tambah dari model untuk menyimpan data ke database
        $model->tambah($data);

        // Redirect kembali ke halaman agenda setelah data tersimpan
        return redirect()->to(base_url('agenda'));
    }
}
