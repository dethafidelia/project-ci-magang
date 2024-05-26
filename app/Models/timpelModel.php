<?php

namespace App\Models;

use CodeIgniter\Model;

class TimpelModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tim_pelayanan';
    protected $primaryKey       = 'id_tim_pelayanan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_bidang', 'nama_tim_pelayanan'];

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


    public function getAllTimPelayanan()
    {
        return $this->findAll();
    }

    public function getTimpelbyIdBidang($id)
    {
        return $this->where('id_bidang', $id)->findAll();
    }

    public function getBidangName()
    {
        return $this->select('tim_pelayanan.*, bidang.nama_bidang')
            ->join('bidang', 'bidang.id_bidang = tim_pelayanan.id_bidang')
            ->findAll();
    }
}
