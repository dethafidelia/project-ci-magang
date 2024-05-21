<?php

namespace App\Controllers;

use App\Models\UserModel;

class DPPH extends BaseController
{
    public function index()
    {
        return view('gereja/admin')
            . view('gereja/AnggotaDPPH');
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
            'NAMA_BIDANG' => $this->request->getPost('bidang'),
            'NAMA_TIMPEL' => $this->request->getPost('timpel'),
            'USERNAME' => $this->request->getPost('username'),
            'PASSWORD' => $this->request->getPost('password')
        ];

        // Buat instansi model
        $model = new UserModel();

        // Panggil metode tambah dari model untuk menyimpan data ke database
        $model->tambah($data);

        // Redirect kembali ke halaman dpph setelah data tersimpan
        return redirect()->to(base_url('dpph'));
    }

    public function edit($id)
    {
        $anggotaModel = new UserModel();
        $data['record'] = $anggotaModel->find($id); // Mendapatkan data anggota berdasarkan ID

        // Logika untuk menampilkan form edit atau melakukan perubahan data

        // Misalnya, tampilkan view form edit dengan data anggota yang akan diubah
        return view('gereja/formDPPHedit', $data);
    }

    public function update($id)
    {
        // Logika untuk memperbarui data anggota di database

        // Misalnya, ambil data yang dikirimkan dari form edit dan lakukan perubahan data
        $newData = [
            'NAMA_LENGKAP' => $this->request->getPost('nama_lengkap'),
            'NAMA_BIDANG' => $this->request->getPost('bidang'),
            'NAMA_TIMPEL' => $this->request->getPost('timpel'),
            'USERNAME' => $this->request->getPost('username'),
            'PASSWORD' => $this->request->getPost('password')
        ];

        $anggotaModel = new UserModel();
        $anggotaModel->update($id, $newData);

        // Redirect ke halaman index setelah berhasil memperbarui data
        return redirect()->to(base_url('dpph/update'));
    }

    public function delete($id)
    {
        $anggotaModel = new UserModel();
        $anggotaModel->delete($id); // Hapus data anggota berdasarkan ID

        // Redirect ke halaman index setelah berhasil menghapus data
        return redirect()->to(base_url('dpph'));
    }
}
