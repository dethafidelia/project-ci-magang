<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TimpelSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_bidang' => 1,
                'nama_tim_pelayanan' => 'Timpel 1',
            ],
            [
                'id_bidang' => 2,
                'nama_tim_pelayanan' => 'Timpel 2',
            ],
            [
                'id_bidang' => 3,
                'nama_tim_pelayanan' => 'Timpel 3',
            ],
        ];

        $this->db->table('tim_pelayanan')->insertBatch($data);
    }
}
