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
use CodeIgniter\Database\RawSql;

class CreateTableModules extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'       => 'char',
                'constraint' => 48,
            ],
            'name' => [
                'type'       => 'varchar',
                'constraint' => 256,
                'unique'     => true,
            ],
            'description' => [
                'type' => 'text',
                'null' => true,
            ],
            'category' => [
                'type'       => 'varchar',
                'constraint' => 256,
                'null'       => true,
            ],
            'type' => [
                'type'       => 'varchar',
                'constraint' => 256,
                'null'       => true,
            ],
            'icon' => [
                'type'       => 'varchar',
                'constraint' => 256,
                'null'       => true,
            ],
            'route' => [
                'type'       => 'varchar',
                'constraint' => 512,
                'null'       => true,
            ],
            'active' => [
                'type'       => 'tinyint',
                'constraint' => 1,
                'unsigned'   => true,
                'default'    => true,
            ],
            'created_at' => [
                'type'    => 'datetime',
                'default' => new RawSql('NOW()'),
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'datetime',
                'default' => new RawSql('NOW()'),
                'null'    => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('modules', true);
    }

    public function down()
    {
        $this->forge->dropTable('modules', true);
    }
}
