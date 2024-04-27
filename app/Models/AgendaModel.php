<?php

namespace App\Models;

use CodeIgniter\Model;

class AgendaModel extends Model
{
    protected $table = 'programasi';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'BIDANG', 'SASARAN_STRATEGIS', 'INDIKATOR', 'TARGET',
        'ASUMSI', 'RESIKO', 'KEGIATAN_UTAMA', 'WAKTU', 'TOTAL_BIAYA',
        'DETAIL_BIAYA', 'PENANGGUNG_JAWAB', 'KETERANGAN', 'LPJ'
    ];

    public function tambah($data)
    {
        $this->save([
            'BIDANG' => $data['BIDANG'],
            'SASARAN_STRATEGIS' => $data['SASARAN_STRATEGIS'],
            'INDIKATOR' => $data['INDIKATOR'],
            'TARGET' => $data['TARGET'],
            'ASUMSI' => $data['ASUMSI'],
            'RESIKO' => $data['RESIKO'],
            'KEGIATAN_UTAMA' => $data['KEGIATAN_UTAMA'],
            'WAKTU' => $data['WAKTU'],
            'TOTAL_BIAYA' => $data['TOTAL_BIAYA'],
            'DETAIL_BIAYA' => $data['DETAIL_BIAYA'],
            'PENANGGUNG_JAWAB' => $data['PENANGGUNG_JAWAB'],
            'KETERANGAN' => $data['KETERANGAN'],
            'LPJ' => $data['LPJ']
        ]);
    }
}
