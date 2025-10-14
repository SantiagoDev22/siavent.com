<?php

/**
 * This file is part of CodeIgniter 4 Framework.
 *
 * (c) 2023 Powered by Develogy™ <soporte@develogy.mx>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableProspects extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'bigint',
                'unsigned'       => true,
                'null'           => false,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'varchar',
                'constraint' => 256,
                'null'       => false,
            ],
            'email' => [
                'type'       => 'varchar',
                'constraint' => 256,
                'null'       => false,
                // 'unique'     => true
            ],
            'phone' => [
                'type'       => 'varchar',
                'constraint' => 12,
            ],
            'service_id' => [
                'type'       => 'varchar',
                'constraint' => 256,
            ],
            'state_id' => [
                'type'       => 'varchar',
                'constraint' => 256,
            ],
            'message' => [
                'type'       => 'varchar',
                'constraint' => 1024,
                'null'       => true,
            ],
            'observations' => [
                'type'       => 'varchar',
                'constraint' => 512,
            ],
            'response' => [
                'type'       => 'tinyint',
                'constraint' => 1,
                'unsigned'   => true,
                'default'    => false,
            ],
            'landing_id' => [
                'type'       => 'char',
                'constraint' => 36,
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('landing_id', 'landings', 'id', 'cascade', 'cascade');

        $this->forge->createTable('prospects', true);
    }

    public function down()
    {
        $this->forge->dropTable('prospects', true);
    }
}
