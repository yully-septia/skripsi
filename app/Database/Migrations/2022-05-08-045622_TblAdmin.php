<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblAdmin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id_admin" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
                "auto_increment" => true,
            ],
            'username'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'password'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'            => true,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'            => true,
            ]

        ]);
        $this->forge->addPrimaryKey('id_admin', true);
        $this->forge->createTable('tbl_admin');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_admin');
    }
}
