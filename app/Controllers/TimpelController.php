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
        $data = $_GET['bidang'] ?? null;

        if ($data) {
            $model = new TimpelModel();
            $list = $model->getTimpelbyIdBidang($data);

            $result = [];
            foreach ($list as $key) {
                $result[] = [
                    'id_timpel' => $key['id_tim_pelayanan'],
                    'nama' => $key['nama_tim_pelayanan']
                ];
            }

            return $this->respond($result);
        }
    }
}
