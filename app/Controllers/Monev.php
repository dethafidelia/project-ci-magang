<?php

namespace App\Controllers;

use App\Models\AgendaModel;
use App\Models\RencanaModel;
use App\Models\RealisasiModel;


class Monev extends BaseController
{


    // public function getAllMonev()
    // {
    //     $model = new MonevModel();
    //     $data = $model->findAll();
    //     echo json_encode($data);
    // }

    public function getAllRencana()
    {
        $model = new RencanaModel();
        $data = $model->findAll();
        echo json_encode($data);
    }

    public function getAllRealisasi()
    {
        $model = new RealisasiModel();
        $data = $model->findAll();
        echo json_encode($data);
    }


    public function index()
    {
        $model = new AgendaModel();
        $query = $model->getDetails();

        $belum = [];
        $sudah = [];
        foreach ($query as $key) {
            if ($key['STATUS'] === 'Belum Terealisasi') {
                $belum[] = $key;
            } else {
                $sudah[] = $key;
            }
        }
        $data['belum'] = $belum;
        $data['sudah'] = $sudah;
        return view('gereja/header', $data)
            . view('gereja/MONEVRealisasi')
            . view('gereja/MONEVRencana');
    }

    public function detailMonev($id)
    {
        $model = new AgendaModel();
        $data['program'] = $model->getDetailsById($id);
        return view('gereja/header', $data)
            . view('gereja/detailRealisasiRencana');
    }

    public function editMonevRealisasi($id)
    {
        $model = new AgendaModel();
        $data['program'] = $model->getDetailsById($id);
        return view('gereja/header', $data)
            . view('gereja/editRealisasi');
    }

    public function editMonevRealisasiProses()
    {
        $id_program = $this->request->getVar('id_program');

        $model = new AgendaModel();
        $program = $model->where('ID', $id_program)->first();
        if (!$program) {
            return redirect()->back();
        }

        $swadaya = $this->request->getPost('swadaya');
        $dewan_paroki = $this->request->getPost('dewan_paroki');
        $subsidi_kas = $this->request->getPost('subsidi_kas');
        $sumber_lain = $this->request->getPost('sumber_lain');
        $total = $swadaya + $dewan_paroki + $subsidi_kas + $sumber_lain;
        $data = [
            'STATUS' => $this->request->getPost('status'),
            'TARGET' => $this->request->getPost('target'),
            'ASUMSI' => $this->request->getPost('asumsi'),
            'RESIKO' => $this->request->getPost('resiko'),
            'KEGIATAN_UTAMA' => $this->request->getPost('kegiatan_utama'),
            'WAKTU_MULAI' => $this->request->getPost('waktu_mulai'),
            'WAKTU_AKHIR' => $this->request->getPost('waktu_akhir'),
            'SWADAYA' => $swadaya,
            'DEWAN_PAROKI' => $dewan_paroki,
            'SUBSIDI_KAS' => $subsidi_kas,
            'SUMBER_LAIN' => $sumber_lain,
            'TOTAL_BIAYA' => $total,
            'PENANGGUNG_JAWAB' => $this->request->getPost('penanggung_jawab'),
            'KETERANGAN' => $this->request->getPost('keterangan'),
        ];

        $updateData = $model->update($id_program, $data);
        if (!$updateData) {
            return redirect()->back();
        }
        return redirect()->to('monev');
    }

    public function addNotes($id)
    {
        $model = new AgendaModel();
        $data['program'] = $model->getDetailsById($id);
        return view('gereja/header', $data)
            . view('gereja/tambahCatatan');
    }

    public function addNotesProses()
    {
        $model = new AgendaModel();
        $id_program = $this->request->getVar('id_program');

        $program = $model->where('ID', $id_program)->first();
        if (!$program) {
            return redirect()->back();
        }

        $data = [
            'CATATAN' => $this->request->getPost('catatan')
        ];

        $updateData = $model->update($id_program, $data);
        if (!$updateData) {
            return redirect()->back();
        }
        return redirect()->to('monev');
    }
}
