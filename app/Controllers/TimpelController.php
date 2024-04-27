<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TimpelModel;

class TimpelController extends Controller
{
    public function getAllTimPelayanan()
    {
        $model = new TimpelModel();
        $data['timpel'] = $model->getAllTimPelayanan();
        return json_encode($data['timpel']);
    }
}
