<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBatchesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'medicine_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'batch_number'=> ['type' => 'VARCHAR', 'constraint' => 100],
            'quantity'    => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'expiry_date' => ['type' => 'DATE'],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('medicine_id', 'medicines', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('batches');
    }

    public function down()
    {
        $this->forge->dropTable('batches');
    }
}