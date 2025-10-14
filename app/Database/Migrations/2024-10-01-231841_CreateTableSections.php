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

class CreateTableSections extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'       => 'char',
                'constraint' => 48,
            ],
            'landing_id' => [ // Foreign key to landings table
                'type'       => 'CHAR',
                'constraint' => 36,
                'null'       => false,
            ],
            'section_type' => [ // e.g., 'hero', 'text_image', 'gallery', 'bullet_list', 'text_only'
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'content' => [ // Stores all specific data for this section as JSON
                'type' => 'JSON', // O 'TEXT' si no tienes JSON nativo
                'null' => true,
            ],
            'sort_order' => [ // To maintain the order of sections within a landing
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
                'default'    => 0,
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

        $this->forge->addForeignKey('landing_id', 'landings', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('sections', true);
    }

    public function down()
    {
        $this->forge->dropTable('sections', true);
    }
}
