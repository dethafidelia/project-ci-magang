<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TimpelMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tim_pelayanan' => [
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
            'nama_tim_pelayanan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);

        $this->forge->addPrimaryKey('id_tim_pelayanan');
        $this->forge->addForeignKey('id_bidang', 'bidang', 'id_bidang'); // Add onDelete and onUpdate actions if needed
        $this->forge->createTable('tim_pelayanan');
    }

    public function down()
    {
        $this->forge->dropTable('tim_pelayanan');
    }
}
