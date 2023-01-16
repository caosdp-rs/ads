<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdvertsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [  // Será populado quando tivermos o retorno da gerencianet
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true, //não permite valores em branco na base de dados
            ],
            'category_id' => [  // Será populado quando tivermos o retorno da gerencianet
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true, //não permite valores em branco na base de dados
                'null'           => true, // seta para permitir o valor nulo no campo
            ],
            'code' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'description' => [
                'type'       => 'LONGTEXT',
            ],
            'price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'is_published' => [ 
                'type' => 'BOOLEAN',
                'default'=> false,
                'null'=>false,
            ],
            'situation' => [
                'type'       => 'ENUM',
                'constraint' => ['new', 'used'],
            ],
            'zipcode' => [ 
                'type' => 'VARCHAR',
                'constraint' => '30'
            ],
            'street' => [ 
                'type' => 'VARCHAR',
                'constraint' => '140'
            ],
            'number' => [ 
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null'  => true,
            ],
            'neighborhood' => [
                'type'       => 'VARCHAR',
                'constraint' => '140',
            ],
            'city' => [
                'type'       => 'VARCHAR',
                'constraint' => '140',
            ],
            'city_slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '140',
            ],
            'state' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
        ]);
        $this->forge->addField("created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP");
        $this->forge->addField("updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
        $this->forge->addField("deleted_at TIMESTAMP NULL DEFAULT NULL");

        $this->forge->addKey('id', true); //key e primary key
        //$this->forge->addUniqueKey('title');

        $this->forge->addForeignKey('user_id','users','id','CASCADE','CASCADE');
        $this->forge->addForeignKey('category_id','categories','id','SET NULL','SET NULL');

        $this->forge->createTable('adverts');
    }

    public function down()
    {
        $this->forge->dropTable('adverts');
    }
}
