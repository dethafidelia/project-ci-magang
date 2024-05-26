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
        ];

        $this->db->table('bidang')->insertBatch($data);
    }
}
