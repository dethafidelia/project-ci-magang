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
            [
                'USERNAME' => 'pemonev',
                'PASSWORD' => '123',
                'NAMA_LENGKAP' => 'Super Admin',
                'STATUS' => 'Pemonev',
                'id_bidang' => 2,
                'id_tim_pelayanan' => 2
            ],
            [
                'USERNAME' => 'ketua',
                'PASSWORD' => '123',
                'NAMA_LENGKAP' => 'Super Admin',
                'STATUS' => 'Ketua',
                'id_bidang' => 3,
                'id_tim_pelayanan' => 3
            ],
        ];

        $this->db->table('user')->insertBatch($data);
    }
}
