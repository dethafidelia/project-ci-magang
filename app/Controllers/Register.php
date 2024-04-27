<?php

namespace App\Controllers;

use App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        return view('formDPPH');
    }

    public function getAllUser()
    {
        $model = new UserModel();
        $data = $model->findAll();
        echo json_encode($data);
    }

    public function submit()
    {
        // Ambil data yang dikirimkan dari formulir
        $data = [
            'NAMA_LENGKAP' => $this->request->getPost('nama_lengkap'),
            'NAMA_BIDANG' => $this->request->getPost('nama_bidang'),
            'NAMA_TIMPEL' => $this->request->getPost('nama_timpel'),
            'USERNAME' => $this->request->getPost('username'),
            'PASSWORD' => $this->request->getPost('password'),
        ];

        // Buat instansi model
        $model = new UserModel();

        // Panggil metode tambah dari model untuk menyimpan data ke database
        $model->tambah($data);

        // Redirect kembali ke halaman agenda setelah data tersimpan
        return redirect()->to(base_url('dpph'));
    }
}
