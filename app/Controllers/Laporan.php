<?php

namespace App\Controllers;

use App\Models\AgendaModel;
use App\Models\BidangModel;
use App\Models\LaporanModel;
use App\Models\TimpelModel;

class Laporan extends BaseController
{
    public function index()
    {
        $modelAgenda = new AgendaModel();
        $modelBidang = new BidangModel();
        $modelTimpel = new TimpelModel();

        $_timpel = $modelTimpel->findAll();
        $daftar = [];

        foreach ($_timpel as $key) {
            $agenda = $modelAgenda->getLaporan($key['id_bidang'], $key['id_tim_pelayanan']);

            $daftar = array_merge($daftar, $agenda);
        }

        $kegiatanCount = [];
        $realisasiCount = [];
        $tidakRealisasiCount = [];
        $belumRealisasiCount = [];

        foreach ($daftar as $index) {
            $nama_bidang = $index['nama_bidang'];
            $nama_tim_pelayanan = $index['nama_tim_pelayanan'];
            $status = $index['STATUS'];

            $key = $nama_bidang . '_' . $nama_tim_pelayanan;
            if (!isset($kegiatanCount[$key])) {
                $kegiatanCount[$key] = 0;
            }
            $kegiatanCount[$key]++;

            if ($status === 'Realisasi') {
                if (!isset($realisasiCount[$key])) {
                    $realisasiCount[$key] = 0;
                }
                $realisasiCount[$key]++;
            } elseif ($status === 'Tidak Terealisasi') {
                if (!isset($tidakRealisasiCount[$key])) {
                    $tidakRealisasiCount[$key] = 0;
                }
                $tidakRealisasiCount[$key]++;
            } elseif ($status === 'Belum Terealisasi') {
                if (!isset($belumRealisasiCount[$key])) {
                    $belumRealisasiCount[$key] = 0;
                }
                $belumRealisasiCount[$key]++;
            }
        }

        $list = [];

        foreach ($kegiatanCount as $key => $count) {
            list($nama_bidang, $nama_tim_pelayanan) = explode('_', $key);
            $realisasi = isset($realisasiCount[$key]) ? $realisasiCount[$key] : 0;
            $tidakRealisasi = isset($tidakRealisasiCount[$key]) ? $tidakRealisasiCount[$key] : 0;
            $belumRealisasi = isset($belumRealisasiCount[$key]) ? $belumRealisasiCount[$key] : 0;

            $list[] = [
                'nama_bidang' => $nama_bidang,
                'nama_tim_pelayanan' => $nama_tim_pelayanan,
                'jumlah_kegiatan' => $count,
                'jumlah_realisasi' => $realisasi,
                'jumlah_tidak_realisasi' => $tidakRealisasi,
                'jumlah_belum_realisasi' => $belumRealisasi
            ];
        }

        $data['list'] = $list;
        return view('gereja/header', $data)
            . view('gereja/LAPORAN');
    }

    public function getAllLaporan()
    {
        $model = new LaporanModel();
        $data = $model->findAll();
        echo json_encode($data);
    }
}
