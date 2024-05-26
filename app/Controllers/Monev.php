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

        $data = [
            'STATUS' => $this->request->getPost('status'),
        ];

        $updateData = $model->update($id_program, $data);
        if (!$updateData) {
            return redirect()->back();
        }
        return redirect()->to('monev');
    }
}
