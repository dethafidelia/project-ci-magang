<?php

namespace App\Controllers;

use App\Models\BidangModel;
use App\Models\TimpelModel;

class HomeAdmin extends BaseController
{
    public function index()
    {
        return view('gereja/admin')
            . view('gereja/HOME');
    }

    public function bidtim()
    {
        $bidang = new BidangModel();
        $timpel = new TimpelModel();

        $data['bidang'] = $bidang->findAll();
        $data['timpel'] = $timpel->getBidangName();

        return view('gereja/admin', $data)
            . view('gereja/bidtim');
    }

    public function addBidang()
    {
        $model = new BidangModel();
        $namaBidang = $this->request->getVar('nama_bidang');

        $model->save([
            'nama_bidang' => $namaBidang
        ]);

        return redirect()->to(base_url('Admin/Bidang-Timpel'));
    }

    public function addTimpel()
    {
        $model = new TimpelModel();
        $namaTimpel = $this->request->getVar('nama_timpel');
        $id_bidang = $this->request->getPost('bidang');

        $model->save([
            'id_bidang' => $id_bidang,
            'nama_tim_pelayanan' => $namaTimpel
        ]);

        return redirect()->to(base_url('Admin/Bidang-Timpel'));
    }

    public function deleteBidang($id)
    {
        $model = new BidangModel();
        $model->delete($id);
        return redirect()->to(base_url('Admin/Bidang-Timpel'));
    }

    public function deleteTimpel($id)
    {
        $model = new TimpelModel();
        $model->delete($id);
        return redirect()->to(base_url('Admin/Bidang-Timpel'));
    }
}
