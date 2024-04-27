<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TimpelModel;

class Timpel extends Controller
{
    public function getAllTimPelayanan()
    {
        $idBidang = $this->request->getGet('id_bidang');

        $model = new TimpelModel();
        $model->where('id_bidang', $idBidang);
        $data = $model->findAll();

        return $this->response->setJSON($data);
    }
}
