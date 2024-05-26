<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'USERNAME' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'PASSWORD' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'NAMA_LENGKAP' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'STATUS' => [
                'type' => 'ENUM',
                'null' => true,
                'constraint' => ['Admin', 'Romo', 'Ketua', 'Sekretaris', 'Bendahara'],
                //1. Admin 2. Romo 3. Ketua 4. Sekretaris, 5. Bendahara
            ],
            'id_tim_pelayanan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_bidang' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_tim_pelayanan', 'tim_pelayanan', 'id_tim_pelayanan');
        $this->forge->addForeignKey('id_bidang', 'bidang', 'id_bidang');
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
