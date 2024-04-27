<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table = 'anggota'; // Sesuaikan dengan nama tabel Anda

    protected $primaryKey = 'id'; // Sesuaikan dengan nama kolom kunci utama Anda

    protected $allowedFields = ['nama', 'bidang', 'tim_pelayanan', 'proposal']; // Kolom yang dapat diisi

    public function getAll()
    {
        return $this->findAll(); // Mendapatkan semua data anggota
    }

    public function getById($id)
    {
        return $this->find($id); // Mendapatkan data anggota berdasarkan ID
    }

    public function updateData($id, $data)
    {
        $this->update($id, $data); // Memperbarui data anggota berdasarkan ID
    }

    public function deleteData($id)
    {
        $this->delete($id); // Menghapus data anggota berdasarkan ID
    }
}
