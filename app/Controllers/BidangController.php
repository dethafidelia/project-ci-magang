<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BidangModel;
use App\Models\TimpelModel;

class BidangController extends Controller
{
    // public function index()
    // {
    //     return view('bidang_form');
    // }

    public function getAllBidang()
    {
        $model = new BidangModel();
        $data['bidang'] = $model->getAllBidang();
        return json_encode($data['bidang']);
    }

    public function getTimPelayananByBidang($idBidang)
    {
        $model = new TimpelModel();
        $data['timpel'] = $model->getTimPelayananByBidang($idBidang);
        return json_encode($data['timpel']);
    }
}
