<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class tambahDPPH extends BaseController
{
    public function index()
    {
        return view('gereja/admin')
            . view('gereja/formDPPH');
    }

    // Metode untuk menangani pengiriman formulir
    public function tambah()
    {
        // Dapatkan file yang diunggah menggunakan request object
        $lpjdok = $this->request->getFile('proposal');

        // Inisialisasi URL foto
        $dok_url = "";

        if ($lpjdok->isValid() && !$lpjdok->hasMoved()) {
            // Generate nama file baru

            $namaBaru = $lpjdok->getRandomName();
            $lokasiFolder = ROOTPATH . 'proposal/';

            $lpjdok->move(
                $lokasiFolder,
                $namaBaru
            );

            // Setel URL foto
            $dok_url = base_url('proyek-kp/proposal/' . $namaBaru);
        }


        // Ambil data yang dikirimkan dari formulir
        $data = [
            'NAMA_LENGKAP' => $this->request->getPost('NAMA_LENGKAP'),
            'NAMA_BIDANG' => $this->request->getPost('NAMA_BIDANG'),
            'NAMA_TIMPEL' => $this->request->getPost('NAMA_TIMPEL'),
            'PROPOSAL' => $dok_url,
            'EDIT' => $this->request->getPost('EDIT'),
            'USERNAME' => $this->request->getPost('USERNAME'),
            'PASSWORD' => $this->request->getPost('PASSWORD')
        ];

        // Buat instansi model
        $model = new AnggotaModel();

        // Panggil metode tambah dari model untuk menyimpan data ke database
        $model->tambah($data);

        // Redirect kembali ke halaman setelah data tersimpan
        return redirect()->to(base_url('dpph'));
    }
}
