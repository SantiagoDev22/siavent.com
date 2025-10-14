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

class CreateTableLandings extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'       => 'char',
                'null'       => false,
                'constraint' => 36,
            ],
            'slug' => [
                'type'       => 'varchar',
                'constraint' => 256,
                'unique'     => true,
            ],
            'name' => [
                'type'       => 'varchar',
                'constraint' => 256,
            ],
            'title' => [
                'type'       => 'varchar',
                'constraint' => 256,
            ],
            'subtitle' => [
                'type'       => 'varchar',
                'constraint' => 256,
                'null'       => true,
            ],
            'other' => [
                'type'       => 'varchar',
                'constraint' => 256,
                'null'       => true,
            ],

            'cover' => [
                'type'       => 'varchar',
                'constraint' => 256,
                'null'       => true,
            ],
            'phone' => [
                'type'       => 'varchar',
                'constraint' => 12,
                'null'       => true,
            ],
            'active' => [
                'type'       => 'tinyint',
                'constraint' => 1,
                'unsigned'   => true,
                'default'    => true,
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
        $this->forge->createTable('landings', true);
    }

    public function down()
    {
        $this->forge->dropTable('landings', true);
    }
}
