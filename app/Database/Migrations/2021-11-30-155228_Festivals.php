<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Festivals extends Migration
{
    public function up()
    {

        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'auto_increment' => true,
                'unsigned'       => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'date' => [
                'type'       => 'DATETIME',
            ],
            'price' => [
                'type'        => 'DECIMAL',
                'constraint'  => 5,
            ],
            'address' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'image_url' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'category_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('category_id','categories','id','CASCADE','SET NULL');

        $this->forge->createTable('festivals');

        $this->db->enableForeignKeyChecks();

    }

    public function down()
    {
        
        $this->forge->dropTable('festivals');

    }
}
