<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'USERNAME', 'PASSWORD', 'NAMA_LENGKAP', 'STATUS',  'id_tim_pelayanan', 'id_bidang'
    ];

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

    public function tambah($data)
    {
        $this->save([
            'NAMA_LENGKAP' => $data['NAMA_LENGKAP'],
            'USERNAME' => $data['USERNAME'],
            'PASSWORD' => $data['PASSWORD'],
            'STATUS' => $data['STATUS'],
            'id_bidang' => $data['id_bidang'],
            'id_tim_pelayanan' => $data['id_tim_pelayanan'],
        ]);
    }

    public function getUser($USERNAME = false)
    {
        if ($USERNAME === false) {
            return $this->findAll();
        }
        return $this->where(['username' => $USERNAME])->first();
    }

    public function saveUser($data)
    {
        $this->insert($data);
    }

    public function getUsersWithDetails()
    {
        return $this->select('user.*, bidang.nama_bidang, tim_pelayanan.nama_tim_pelayanan')
            ->join('bidang', 'bidang.id_bidang = user.id_bidang')
            ->join('tim_pelayanan', 'tim_pelayanan.id_tim_pelayanan = user.id_tim_pelayanan')
            ->findAll();
    }
    public function getDetails($id)
    {
        return $this->select('user.*, bidang.nama_bidang, tim_pelayanan.nama_tim_pelayanan')
            ->join('bidang', 'bidang.id_bidang = user.id_bidang')
            ->join('tim_pelayanan', 'tim_pelayanan.id_tim_pelayanan = user.id_tim_pelayanan')
            ->where('id', $id)
            ->first();
    }
}
