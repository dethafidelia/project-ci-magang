<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BidangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_bidang' => 'Bidang 1',
            ],
            [
                'nama_bidang' => 'Bidang 2',
            ],
            [
                'nama_bidang' => 'Bidang 3',
            ],
        ];

        $this->db->table('bidang')->insertBatch($data);
    }
}
