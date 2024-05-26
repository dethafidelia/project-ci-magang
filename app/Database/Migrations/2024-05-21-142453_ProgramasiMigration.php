<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProgramasiMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ID' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_bidang' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_tim_pelayanan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'SASARAN_STRATEGIS' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'INDIKATOR' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'TARGET' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'ASUMSI' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'RESIKO' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'KEGIATAN_UTAMA' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'WAKTU' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'TOTAL_BIAYA' => [
                'type' => 'INT',
                'constraint' => 255,
            ],
            'SWADAYA' => [
                'type' => 'INT',
                'constraint' => 255,
                'null' => true
            ],
            'DEWAN_PAROKI' => [
                'type' => 'INT',
                'constraint' => 255,
                'null' => true
            ],
            'SUBSIDI_KAS' => [
                'type' => 'INT',
                'constraint' => 255,
                'null' => true
            ],
            'SUMBER_LAIN' => [
                'type' => 'INT',
                'constraint' => 255,
                'null' => true
            ],
            'PENANGGUNG_JAWAB' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'KETERANGAN' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'STATUS' => [
                'type' => 'ENUM',
                'null' => true,
                'constraint' => ['Belum Terealisasi', 'Tidak Terealisasi', 'Realisasi'],
                'default' => 'Belum Terealisasi'
            ],
        ]);

        $this->forge->addPrimaryKey('ID', 'tim_programsi');
        $this->forge->addForeignKey('id_bidang', 'bidang', 'id_bidang');
        $this->forge->addForeignKey('id_tim_pelayanan', 'tim_pelayanan', 'id_tim_pelayanan');
        $this->forge->createTable('tim_programsi');
    }

    public function down()
    {
        $this->forge->dropTable('tim_programsi');
    }
}
