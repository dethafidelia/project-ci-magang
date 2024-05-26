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
        ];

        $this->db->table('tim_pelayanan')->insertBatch($data);
    }
}
