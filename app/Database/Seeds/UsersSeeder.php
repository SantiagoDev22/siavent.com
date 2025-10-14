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

class UsersSeeder extends Seeder
{
    public function run()
    {
        $roleModel = model('RolesModel');
        $role      = $roleModel->select('id')
            ->where('name', 'admin')
            ->first();

        $userModel = model('UsersModel');
        $userModel->ignore(true)->insertBatch([
            [
                'name'     => 'Develogy',
                'email'    => 'info@develogy.mx',
                'phone'    => '4463131161',
                'password' => '$2y$10$zQ2WM5dZsZ.BnkRgSrgpSurz2bFnVMpxX1A1HB2LZk/3wtsLZz7oS',
                'active'   => true,
                'role_id'  => $role['id'],
            ]
        ]);
    }
}
