<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'login';
    protected $primaryKey = 'USERNAME';
    protected $allowedFields = ['USERNAME', 'PASSWORD'];

    public function getUser($USERNAME)
    {
        return $this->where(['username' => $USERNAME])->first();
    }

    public function saveUser($data)
    {
        $this->insert($data);
    }
}
