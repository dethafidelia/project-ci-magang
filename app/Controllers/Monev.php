<?php

namespace App\Controllers;

use App\Models\MonevModel;

class Monev extends BaseController
{
    public function index()
    {
        return view('gereja/header')
            . view('gereja/dropdown')
            . view('gereja/MONEV');
    }

    public function getAllMonev()
    {
        $model = new MonevModel();
        $data = $model->findAll();
        echo json_encode($data);
    }
}
