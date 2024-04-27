<?php

namespace App\Models;

use CodeIgniter\Model;

class MonevModel extends Model
{
    protected $table = 'programasi';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'BIDANG', 'SASARAN_STRATEGIS', 'INDIKATOR', 'TARGET',
        'ASUMSI', 'RESIKO', 'KEGIATAN_UTAMA', 'WAKTU', 'TOTAL_BIAYA',
        'DETAIL_BIAYA', 'PENANGGUNG_JAWAB', 'KETERANGAN'
    ];
}
