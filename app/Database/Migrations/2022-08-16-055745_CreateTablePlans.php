<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePlans extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'plan_id' => [  // Será populado quando tivermos o retorno da gerencianet
                'type'           => 'INT',
                'constraint'     => 11,
                'null' => true, // Aceita o valor nulo
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'recorrence' => [
                'type'       => 'ENUM',
                'constraint' => ['monthly', 'quarterly', 'semester', 'yearly'],
            ],
            'adverts' => [ //identifica o numero de anúncios caso seja nulo o anunciante pode ter anúncios ilimitados
                'type' => 'INT',
                'constraint' => 11, // Aceita valor nulo
                'null' => true,
            ],
            'description' => [
                'type'       => 'TEXT',
            ],
            'value' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2'
            ],
            'is_highlighted' => [ // Indica quando um plano deve ser destacado na área de vendas.
                'type' => 'BOOLEAN',
                'default'=> false,
                'null'=>false,
            ],
        ]);
        $this->forge->addField("created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP");
        $this->forge->addField("updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
        $this->forge->addField("deleted_at TIMESTAMP NULL DEFAULT NULL");
        $this->forge->addKey('id', true); //key e primary key
        $this->forge->addKey('name'); //Somente key
        $this->forge->createTable('plans');
    }

    public function down()
    {
        $this->forge->dropTable('plans');
    }
}
