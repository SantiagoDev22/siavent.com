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

class StatesSeeder extends Seeder
{
    public function run()
    {
        $statesModel = model('StatesModel');

        // Insert a services.
        $statesModel->ignore(true)->InsertBatch([
            [
                'name'        => 'Aguascalientes',
                'description' => 'Estado de Aguascalientes',
            ],
            [
                'name'        => 'Baja California',
                'description' => 'Estado de Baja California',
            ],
            [
                'name'        => 'Baja California Sur',
                'description' => 'Estado de Baja California Sur',
            ],
            [
                'name'        => 'Campeche',
                'description' => 'Estado de Campeche',
            ],
            [
                'name'        => 'Chiapas',
                'description' => 'Estado de Chiapas',
            ],
            [
                'name'        => 'Chihuahua',
                'description' => 'Estado de Chihuahua',
            ],
            [
                'name'        => 'Ciudad de México',
                'description' => 'Ciudad de México',
            ],
            [
                'name'        => 'Coahuila',
                'description' => 'Estado de Coahuila',
            ],
            [
                'name'        => 'Colima',
                'description' => 'Estado de Colima',
            ],
            [
                'name'        => 'Durango',
                'description' => 'Estado de Durango',
            ],
            [
                'name'        => 'Guanajuato',
                'description' => 'Estado de Guanajuato',
            ],
            [
                'name'        => 'Guerrero',
                'description' => 'Estado de Guerrero',
            ],
            [
                'name'        => 'Hidalgo',
                'description' => 'Estado de Hidalgo',
            ],
            [
                'name'        => 'Jalisco',
                'description' => 'Estado de Jalisco',
            ],
            [
                'name'        => 'Estado de México',
                'description' => 'Estado de México',
            ],
            [
                'name'        => 'Michoacán',
                'description' => 'Estado de Michoacán',
            ],
            [
                'name'        => 'Morelos',
                'description' => 'Estado de Morelos',
            ],
            [
                'name'        => 'Nayarit',
                'description' => 'Estado de Nayarit',
            ],
            [
                'name'        => 'Nuevo León',
                'description' => 'Estado de Nuevo León',
            ],
            [
                'name'        => 'Oaxaca',
                'description' => 'Estado de Oaxaca',
            ],
            [
                'name'        => 'Puebla',
                'description' => 'Estado de Puebla',
            ],
            [
                'name'        => 'Querétaro',
                'description' => 'Estado de Querétaro',
            ],
            [
                'name'        => 'Quintana Roo',
                'description' => 'Estado de Quintana Roo',
            ],
            [
                'name'        => 'San Luis Potosí',
                'description' => 'Estado de San Luis Potosí',
            ],
            [
                'name'        => 'Sinaloa',
                'description' => 'Estado de Sinaloa',
            ],
            [
                'name'        => 'Sonora',
                'description' => 'Estado de Sonora',
            ],
            [
                'name'        => 'Tabasco',
                'description' => 'Estado de Tabasco',
            ],
            [
                'name'        => 'Tamaulipas',
                'description' => 'Estado de Tamaulipas',
            ],
            [
                'name'        => 'Tlaxcala',
                'description' => 'Estado de Tlaxcala',
            ],
            [
                'name'        => 'Veracruz',
                'description' => 'Estado de Veracruz',
            ],
            [
                'name'        => 'Yucatán',
                'description' => 'Estado de Yucatán',
            ],
            [
                'name'        => 'Zacatecas',
                'description' => 'Estado de Zacatecas',
            ],
        ]);
    }
}
