<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMedicinesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'        => ['type' => 'VARCHAR', 'constraint' => 150],
            'category'    => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'description' => ['type' => 'TEXT', 'null' => true],
            'unit'        => ['type' => 'VARCHAR', 'constraint' => 50],
            'stock'       => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'image'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'supplier_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('supplier_id', 'suppliers', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('medicines');
    }

    public function down()
    {
        $this->forge->dropTable('medicines');
    }
}