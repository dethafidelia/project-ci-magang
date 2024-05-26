<?php

namespace App\Controllers;

use App\Models\UserModel;

class DPPH extends BaseController
{
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




    public function index()
    {
        $model = new UserModel();
        $data['user'] = $model->getUsersWithDetails();
        return view('gereja/admin', $data) . view('gereja/AnggotaDPPH');
    }

    public function prosesAddUser()
    {
        $data = [
            'NAMA_LENGKAP' => $this->request->getPost('nama_lengkap'),
            'USERNAME' => $this->request->getPost('username'),
            'PASSWORD' => $this->request->getPost('password'),
            'STATUS' => $this->request->getPost('status'),
            'id_bidang' => $this->request->getPost('bidang'),
            'id_tim_pelayanan' => $this->request->getPost('timpel')
        ];

        $model = new UserModel();
        $model->tambah($data);
        return redirect()->to(base_url('dpph'));
    }

    public function viewEditUser($id)
    {
        $anggotaModel = new UserModel();
        $data['user'] = $anggotaModel->getDetails($id);
        return view('gereja/formDPPHedit', $data);
    }

    public function editProses()
    {
        $model = new UserModel();
        $validation = \Config\Services::validation();

        $id_user = $this->request->getVar('id_user');
        $user = $model->where('id', $id_user)->first();
        if (!$user) {
            return redirect()->to(base_url('dpph'));
        }

        $newPassword = $this->request->getVar('password_new');
        $password = $this->request->getVar('password_old');
        // dd($newPassword, $password);

        if (!empty($newPassword)) {
            if ($password !== $user['PASSWORD']) {
                dd('salah passwordd');
                return redirect()->to(base_url('dpph'));
            }
            $validate = [
                'password_new' => 'required',
                'password_confirmation' => 'matches[password_new]'
            ];

            if (!$validation->setRules($validate)->run($this->request->getPost())) {
                dd($validate);
                return redirect()->to(base_url('dpph'));
            }
        }

        $bidang = $this->request->getPost('bidang');
        $timpel = $this->request->getPost('timpel');

        $updatePegawai = $model->update(
            $id_user,
            [
                'USERNAME' => $this->request->getPost('username'),
                'PASSWORD' => !empty($newPassword) ? $newPassword : $user['PASSWORD'],
                'NAMA_LENGKAP' => $this->request->getPost('nama_lengkap'),
                'STATUS' => $this->request->getPost('status'),
                'id_bidang' => $bidang,
                'id_tim_pelayanan' => $timpel,
            ]
        );

        if (!$updatePegawai) {
            return redirect()->to(base_url('dpph'));
        }
        return redirect()->to(base_url('dpph'));
    }

    public function delete($id)
    {
        $anggotaModel = new UserModel();
        $hapus = $anggotaModel->delete($id);
        if (!$hapus) {
            dd('gagal happus');
        }
        return redirect()->to(base_url('dpph'));
    }
}
