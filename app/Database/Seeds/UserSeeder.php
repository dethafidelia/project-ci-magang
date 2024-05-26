<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'USERNAME' => 'admin',
                'PASSWORD' => '123',
                'NAMA_LENGKAP' => 'Super Admin',
                'STATUS' => 'Admin',
                'id_bidang' => 1,
                'id_tim_pelayanan' => 1
            ],
        ];

        $this->db->table('user')->insertBatch($data);
    }
}
