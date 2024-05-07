<?php

namespace App\Models;

use CodeIgniter\Model;

class MonevModel extends Model
{
    protected $table = 'rencana';
    protected $primaryKey = 'NO';
    protected $allowedFields = [
        'SASARAN_STRATEGIS', 'INDIKATOR', 'TARGET', 'ASUMSI',
        'RESIKO', 'KEGIATAN_UTAMA', 'WAKTU', 'SWADAYA',
        'DEWAN_PAROKI', 'SUBSIDI_KAS', 'SUMBER_LAIN', 'TOTAL_BIAYA',
        'PJ', 'KETERANGAN', 'CATATAN'
    ];

    public function tambah($data)
    {
        $this->save([
            'SASARAN_STRATEGIS' => $data['SASARAN_STRATEGIS'],
            'INDIKATOR' => $data['INDIKATOR'],
            'TARGET' => $data['TARGET'],
            'ASUMSI' => $data['ASUMSI'],
            'RESIKO' => $data['RESIKO'],
            'KEGIATAN_UTAMA' => $data['KEGIATAN_UTAMA'],
            'WAKTU' => $data['WAKTU'],
            'SWADAYA' => $data['SWADAYA'],
            'DEWAN_PAROKI' => $data['DEWAN_PAROKI'],
            'SUBSIDI_KAS' => $data['SUBSIDI_KAS'],
            'SUMBER_LAIN' => $data['SUMBER_LAIN'],
            'TOTAL_BIAYA' => $data['TOTAL_BIAYA'],
            'PJ' => $data['PJ'],
            'KETERANGAN' => $data['KETERANGAN'],
            'CATATAN' => $data['CATATAN']
        ]);
    }

    // public function getTabel1Data()
    // {
    //     $db = $this->db;
    //     $query = $db->query('SELECT * FROM rencana');
    //     return $query->getResultArray();
    // }
}

// class MonevModel2 extends Model
// {
//     protected $table = 'realisasi';
//     protected $primaryKey = 'NO';
//     protected $allowedFields = [
//         'SASARAN_STRATEGIS', 'INDIKATOR', 'TARGET', 'ASUMSI',
//         'RESIKO', 'K_KEGIATAN_UTAMA', 'K_WAKTU', 'SWADAYA',
//         'DEWAN_PAROKI', 'SUBSIDI_KAS', 'SUMBER_LAIN', 'TOTAL_BIAYA',
//         'PJ', 'KETERANGAN', 'CATATAN'
//     ];

//     public function tambah($data)
//     {
//         $this->save([
//             'SASARAN_STRATEGIS' => $data['SASARAN_STRATEGIS'],
//             'INDIKATOR' => $data['INDIKATOR'],
//             'TARGET' => $data['TARGET'],
//             'ASUMSI' => $data['ASUMSI'],
//             'RESIKO' => $data['RESIKO'],
//             'K_KEGIATAN_UTAMA' => $data['K_KEGIATAN_UTAMA'],
//             'K_WAKTU' => $data['K_WAKTU'],
//             'SWADAYA' => $data['SWADAYA'],
//             'DEWAN_PAROKI' => $data['DEWAN_PAROKI'],
//             'SUBSIDI_KAS' => $data['SUBSIDI_KAS'],
//             'SUMBER_LAIN' => $data['SUMBER_LAIN'],
//             'TOTAL_BIAYA' => $data['TOTAL_BIAYA'],
//             'PENANGGUNG_JAWAB' => $data['PENANGGUNG_JAWAB'],
//             'KETERANGAN' => $data['KETERANGAN'],
//             'CATATAN' => $data['CATATAN']
//         ]);
//     }
// }
