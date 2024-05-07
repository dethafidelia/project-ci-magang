<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'login';
    protected $primaryKey = 'USERNAME';
    protected $allowedFields = ['NAMA_LENGKAP', 'NAMA_BIDANG', 'NAMA_TIMPEL', 'USERNAME', 'PASSWORD'];

    public function tambah($data)
    {
        $this->save([
            'NAMA_LENGKAP' => $data['NAMA_LENGKAP'],
            'NAMA_BIDANG' => $data['NAMA_BIDANG'],
            'NAMA_TIMPEL' => $data['NAMA_TIMPEL'],
            'USERNAME' => $data['USERNAME'],
            'PASSWORD' => $data['PASSWORD']
        ]);
    }

    public function getUser($USERNAME)
    {
        return $this->where(['username' => $USERNAME])->first();
    }

    public function saveUser($data)
    {
        $this->insert($data);
    }
}
