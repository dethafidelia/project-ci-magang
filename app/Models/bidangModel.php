<?php

namespace App\Models;

use CodeIgniter\Model;

class BidangModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'bidang';
    protected $primaryKey       = 'id_bidang';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_bidang'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

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
