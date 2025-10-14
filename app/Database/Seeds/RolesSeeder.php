<?php

/**
 * This file is part of CodeIgniter 4 Framework.
 *
 * (c) 2023 Powered by Develogy™ <soporte@develogy.mx>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $roleModel = model('RolesModel');

        $roleModel->ignore(true)->InsertBatch([
            [
                'name'        => 'admin',
                'description' => 'Administrador',
            ],
            [
                'name'        => 'editor',
                'description' => 'Editor',
            ],
            [
                'name'        => 'analyst',
                'description' => 'Analista',
            ],
        ]);
    }
}
