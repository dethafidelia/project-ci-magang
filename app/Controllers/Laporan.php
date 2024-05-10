<?php

namespace App\Controllers;
use App\Models\LaporanModel;

class Laporan extends BaseController
{
    public function index()
    {
        return view('gereja/header')
            . view('gereja/LAPORAN');
    }

    public function getAllLaporan()
    {
        $model = new LaporanModel();
        $data = $model->findAll();
        echo json_encode($data);
    }
}
