<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TimpelModel;
use CodeIgniter\API\ResponseTrait;

class TimpelController extends Controller
{
    use ResponseTrait;
    public function getAllTimPelayanan()
    {
        $model = new TimpelModel();
        $data['timpel'] = $model->getAllTimPelayanan();
        return json_encode($data['timpel']);
    }

    public function getTimpelById()
    {
        $id = $_GET['id_bidang'];
        $model = new TimpelModel();
        $data  = $model->getTimpelbyIdBidang($id);
        return json_encode($data);
    }
}
