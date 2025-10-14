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

class ModulesSeeder extends Seeder
{
    public function run()
    {
        $modules = model('ModulesModel');

        $modules->ignore(true)->insertBatch([
            [
                'name'        => 'Inicio',
                'description' => '',
                'category'    => 'dashboard',
                'icon'        => '<i class="ri-dashboard-fill"></i>',
                'route'       => 'backend.dashboard.index',
                'active'      => true,
            ],
            [
                'name'        => 'Prospectos',
                'description' => '',
                'category'    => 'modules',
                'icon'        => '<i class="ri-folder-user-fill"></i>',
                'route'       => 'backend.modules.prospects.index',
                'active'      => true,
            ],
            [
                'name'        => 'Landing',
                'description' => '',
                'category'    => 'modules',
                'icon'        => '<i class="ri-flight-land-fill"></i>',
                'route'       => 'backend.modules.landing.index',
                'active'      => true,
            ],
            // Configuration
            [
                'name'        => 'General',
                'description' => 'Consulta todas las configuraciones del sitio web.',
                'category'    => 'config',
                'icon'        => '<i class="ri-tools-fill"></i>',
                'route'       => 'backend.settings.general',
                'active'      => true,
            ],
            [
                'name'        => 'Correos',
                'description' => 'Configuración de correos.',
                'category'    => 'config',
                'icon'        => '<i class="ri-mail-settings-fill"></i>',
                'route'       => 'backend.settings.emails',
                'active'      => true,
            ],
            [
                'name'        => 'Integraciones',
                'description' => 'Integraciones.',
                'category'    => 'config',
                'icon'        => '<i class="ri-settings-4-fill"></i>',
                'route'       => 'backend.settings.integrations',
                'active'      => true,
            ],
            [
                'name'        => 'Usuarios',
                'description' => 'Búsqueda y consulta de todos los usuarios de acceso.',
                'category'    => 'config',
                'icon'        => '<i class="ri-team-fill"></i>',
                'route'       => 'backend.users.index',
                'active'      => true,
            ],
        ]);
    }
}
