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

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permisssions = model('PermissionModel');

        $modulesModel = model('ModulesModel');
        $modules      = $modulesModel->select('id, name, active')->where('active', true)->findAll();

        $usersModel = model('UsersModel');
        $user       = $usersModel->select('id, email, role_id')->where('email', 'info@develogy.mx')->first();
        
        foreach ($modules as $module) {
            $permisssions->ignore(true)->insertBatch([
                [
                    'module_id'  => $module['id'],
                    'user_email' => $user['email'],
                    'role_id'    => $user['role_id'],
                    'active'     => true,
                ],
            ]);
        }

    }
}
