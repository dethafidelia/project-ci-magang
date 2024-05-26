<?php

namespace App\Models;

use CodeIgniter\Model;

class AgendaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tim_programsi';
    protected $primaryKey       = 'ID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_bidang', 'id_tim_pelayanan', 'SASARAN_STRATEGIS', 'INDIKATOR', 'TARGET', 'ASUMSI', 'RESIKO', 'KEGIATAN_UTAMA', 'WAKTU', 'TOTAL_BIAYA', 'SWADAYA', 'DEWAN_PAROKI', 'SUBSIDI_KAS', 'SUMBER_LAIN', 'PENANGGUNG_JAWAB', 'KETERANGAN', 'STATUS'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function tambah($data)
    {
        $data['TOTAL_BIAYA'] = $data['SWADAYA'] + $data['DEWAN_PAROKI'] + $data['SUBSIDI_KAS'] + $data['SUMBER_LAIN'];

        $this->save($data);
    }

    public function getDetails()
    {
        return $this->select('tim_programsi.*, bidang.nama_bidang, tim_pelayanan.nama_tim_pelayanan')
            ->join('bidang', 'bidang.id_bidang = tim_programsi.id_bidang')
            ->join('tim_pelayanan', 'tim_pelayanan.id_tim_pelayanan = tim_programsi.id_tim_pelayanan')
            ->findAll();
    }

    public function getDetailsById($id)
    {
        return $this->select('tim_programsi.*, bidang.nama_bidang, tim_pelayanan.nama_tim_pelayanan')
            ->join('bidang', 'bidang.id_bidang = tim_programsi.id_bidang')
            ->join('tim_pelayanan', 'tim_pelayanan.id_tim_pelayanan = tim_programsi.id_tim_pelayanan')
            ->where('ID', $id)
            ->first();
    }

    public function cariData($id_bidang, $id_timpel, $tahun)
    {
        $query = $this->select('ID, SASARAN_STRATEGIS, INDIKATOR, bidang.nama_bidang as bidang, tim_pelayanan.nama_tim_pelayanan as pelayanan')
            ->join('bidang', 'bidang.id_bidang = tim_programsi.id_bidang')
            ->join('tim_pelayanan', 'tim_pelayanan.id_tim_pelayanan = tim_programsi.id_tim_pelayanan');

        // Cek dan tambahkan kondisi WHERE jika parameter tidak kosong
        if ($id_timpel != '') {
            $query->where('tim_programsi.id_tim_pelayanan', $id_timpel);
        }
        if ($id_bidang != '') {
            $query->where('tim_programsi.id_bidang', $id_bidang);
        }
        if ($tahun != '') {
            $query->where('YEAR(WAKTU)', $tahun);
        }

        return $query->findAll();
    }

    public function cariRealisasi($id_bidang, $id_timpel, $tahun)
    {
        $query = $this->select('ID, SASARAN_STRATEGIS, STATUS, bidang.nama_bidang as bidang, tim_pelayanan.nama_tim_pelayanan as pelayanan')
            ->join('bidang', 'bidang.id_bidang = tim_programsi.id_bidang')
            ->join('tim_pelayanan', 'tim_pelayanan.id_tim_pelayanan = tim_programsi.id_tim_pelayanan')
            ->where('STATUS !=', 'Belum Terealisasi');

        if ($id_timpel != '') {
            $query->where('tim_programsi.id_tim_pelayanan', $id_timpel);
        }
        if ($id_bidang != '') {
            $query->where('tim_programsi.id_bidang', $id_bidang);
        }
        if ($tahun != '') {
            $query->where('YEAR(WAKTU)', $tahun);
        }

        return $query->findAll();
    }

    public function cariRencana($id_bidang, $id_timpel, $tahun)
    {
        $query = $this->select('ID, SASARAN_STRATEGIS, INDIKATOR, STATUS, bidang.nama_bidang as bidang, tim_pelayanan.nama_tim_pelayanan as pelayanan')
            ->join('bidang', 'bidang.id_bidang = tim_programsi.id_bidang')
            ->join('tim_pelayanan', 'tim_pelayanan.id_tim_pelayanan = tim_programsi.id_tim_pelayanan')
            ->where('STATUS', 'Belum Terealisasi');


        // Cek dan tambahkan kondisi WHERE jika parameter tidak kosong
        if ($id_timpel != '') {
            $query->where('tim_programsi.id_tim_pelayanan', $id_timpel);
        }
        if ($id_bidang != '') {
            $query->where('tim_programsi.id_bidang', $id_bidang);
        }
        if ($tahun != '') {
            $query->where('YEAR(WAKTU)', $tahun);
        }

        return $query->findAll();
    }

    public function getLaporan($id_bidang, $id_timpel)
    {
        return $this->select('tim_programsi.*, bidang.nama_bidang, tim_pelayanan.nama_tim_pelayanan')
            ->join('bidang', 'bidang.id_bidang = tim_programsi.id_bidang')
            ->join('tim_pelayanan', 'tim_pelayanan.id_tim_pelayanan = tim_programsi.id_tim_pelayanan')
            ->where('tim_programsi.id_bidang', $id_bidang)
            ->where('tim_programsi.id_tim_pelayanan', $id_timpel)
            ->findAll();
    }
}
