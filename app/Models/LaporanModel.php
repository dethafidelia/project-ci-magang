<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'NO';
    protected $allowedFields = [
        'BIDANG', 'TIMPEL', 'RENCANA', 'REALISASI',
        'BELUM_LAPOR', 'EVALUASI'        
    ];

    public function tambah($data)
    {
        
    }
}
