<?php //BELUM BERHASIL

namespace App\Models;

use CodeIgniter\Model;

class BidangModel extends Model
{
    protected $table      = 'bidang';
    protected $primaryKey = 'id_bidang';

    protected $allowedFields = ['nama_bidang'];

    public function getAllBidang()
    {
        return $this->findAll();
    }

    public function getTimPelayananByBidang($idBidang)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tim_pelayanan');
        $builder->where('id_bidang', $idBidang);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
