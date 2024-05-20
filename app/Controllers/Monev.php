<?php

namespace App\Controllers;

use App\Models\RencanaModel;
use App\Models\RealisasiModel;


class Monev extends BaseController
{
    public function index()
    {
        return view('gereja/header')
            . view('gereja/dropdown')
            . view('gereja/MONEVRencana')
            . view('gereja/MONEVRealisasi');
    }

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

}
