<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class DPPH extends BaseController
{
    public function index()
    {
        return view('gereja/admin')
            . view('gereja/AnggotaDPPH');
    }

    public function edit($id)
    {
        $anggotaModel = new AnggotaModel();
        $data['record'] = $anggotaModel->find($id); // Mendapatkan data anggota berdasarkan ID

        // Logika untuk menampilkan form edit atau melakukan perubahan data

        // Misalnya, tampilkan view form edit dengan data anggota yang akan diubah
        return view('edit_anggota', $data);
    }

    public function update($id)
    {
        // Logika untuk memperbarui data anggota di database

        // Misalnya, ambil data yang dikirimkan dari form edit dan lakukan perubahan data
        $newData = [
            'nama' => $this->request->getPost('nama'),
            'bidang' => $this->request->getPost('bidang'),
            'tim_pelayanan' => $this->request->getPost('tim_pelayanan'),
            'proposal' => $this->request->getPost('proposal')
        ];

        $anggotaModel = new AnggotaModel();
        $anggotaModel->update($id, $newData);

        // Redirect ke halaman index setelah berhasil memperbarui data
        return redirect()->to(base_url('dpph'));
    }

    public function delete($id)
    {
        $anggotaModel = new AnggotaModel();
        $anggotaModel->delete($id); // Hapus data anggota berdasarkan ID

        // Redirect ke halaman index setelah berhasil menghapus data
        return redirect()->to(base_url('dpph'));
    }
}
