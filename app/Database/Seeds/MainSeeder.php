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

class MainSeeder extends Seeder
{
    public function run()
    {
        $this->call('SettingsSeeder');
        $this->call('RolesSeeder');
        $this->call('UsersSeeder');
        $this->call('StatesSeeder');
        $this->call('ModulesSeeder');
        $this->call('PermissionSeeder');
    }
}
