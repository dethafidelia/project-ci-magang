<?php

namespace App\Models;

use CodeIgniter\Model;

class AgendaModel extends Model
{
    protected $table = 'programasi';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'BIDANG', 'SASARAN_STRATEGIS', 'INDIKATOR', 'TARGET',
        'ASUMSI', 'RESIKO', 'KEGIATAN_UTAMA', 'WAKTU', 'SWADAYA',
        'DEWAN_PAROKI', 'SUBSIDI_KAS', 'SUMBER_LAIN', 'TOTAL_BIAYA',
        'PENANGGUNG_JAWAB', 'KETERANGAN'
    ];

    public function tambah($data)
    {
        // Calculate total biaya before saving
        $data['TOTAL_BIAYA'] = $data['SWADAYA'] + $data['DEWAN_PAROKI'] + $data['SUBSIDI_KAS'] + $data['SUMBER_LAIN'];

        $this->save($data);
    }
}
