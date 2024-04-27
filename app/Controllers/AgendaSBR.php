<?php

namespace App\Controllers;

use App\Models\AgendaModel;

class AgendaSBR extends BaseController
{
    public function index()
    {
        
        return view('gereja/SBR')
            . view('gereja/dropdown')
            . view('gereja/agendaSBR');
    }

    public function getAllAgenda()
    {
        $model = new AgendaModel();
        $data = $model->findAll();
        echo json_encode($data);
    }

    // public function insert()
    // {
    //     // Load model "programasi"
    //     $this->load->model('programasi_model');

    //     // Dapatkan data dari form HTML
    //     $bidang = $this->input->post('bidang');
    //     $sasaran_strategis = $this->input->post('sasaran_strategis');
    //     $indikator = $this->input->post('indikator');
    //     $target = $this->input->post('target');
    //     $asumsi = $this->input->post('asumsi');
    //     $resiko = $this->input->post('resiko');
    //     $kegiatan_utama = $this->input->post('kegiatan_utama');
    //     $waktu = $this->input->post('waktu');
    //     $total_biaya = $this->input->post('total_biaya');
    //     $detail_biaya = $this->input->post('detail_biaya');
    //     $penanggung_jawab = $this->input->post('penanggung_jawab');
    //     $keterangan = $this->input->post('keterangan');

    //     // Siapkan data untuk diinsert ke tabel "programasi"
    //     $data = array(
    //         'sasaran_strategis' => $sasaran_strategis,
    //         'indikator' => $indikator,
    //         'target' => $target,
    //         'asumsi' => $asumsi,
    //         'resiko' => $resiko,
    //         'kegiatan_utama' => $kegiatan_utama,
    //         'waktu' => $waktu,
    //         'total_biaya' => $total_biaya,
    //         'detail_biaya' => $detail_biaya,
    //         'penanggung_jawab' => $penanggung_jawab,
    //         'keterangan' => $keterangan
    //     );

    //     // Insert data ke tabel "programasi"
    //     $this->programasi_model->insert($data);

    //     // Redirect ke halaman sukses
    //     redirect('/programasi/success');
    // }
}
