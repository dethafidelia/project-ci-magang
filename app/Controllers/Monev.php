<?php

namespace App\Controllers;

use App\Models\MonevModel;
use App\Models\MonevModel2;

class Monev extends BaseController
{
    public function index()
    {
        return view('gereja/header')
            . view('gereja/dropdown')
            . view('gereja/MONEV');
    }

    // public function getAllMonev()
    // {
    //     $model = new MonevModel();
    //     $data = $model->findAll();
    //     echo json_encode($data);
    // }

    public function getAllMonev()
    {
        $model = new MonevModel();
        $data = $model->findAll();
        echo json_encode($data);

        // $model2 = new MonevModel2();
        // $data2 = $model2->findAll();
        // echo json_encode($data2);

        // $tabel1Model = new MonevModel();
        // $tabel2Model = new MonevModel2();

        // $tabel1Data = $tabel1Model->getTabel1Data();
        // $tabel2Data = $tabel2Model->getTabel2Data();

        // echo json_encode($tabel1Data);
        // echo json_encode($tabel2Data);


        // $this->load->view('halaman', [
        //     'tabel1Data' => $tabel1Data,
        //     'tabel2Data' => $tabel2Data
        // ]);
    }
}
