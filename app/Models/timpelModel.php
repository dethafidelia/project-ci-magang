<?php //BELUM BERHASIL

namespace App\Models;

use CodeIgniter\Model;

class TimpelModel extends Model
{
    protected $table      = 'tim_pelayanan';
    protected $primaryKey = 'id_tim_pelayanan';

    protected $allowedFields = ['id_bidang', 'nama_tim_pelayanan'];

    public function getAllTimPelayanan()
    {
        return $this->findAll();
    }

    public function getTimpelbyIdBidang($id)
    {
        return $this->where('id_bidang', $id)->findAll();
    }
}
