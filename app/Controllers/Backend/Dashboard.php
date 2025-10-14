<?php

/**
 * This file is part of CodeIgniter 4 Framework.
 *
 * (c) 2023 Powered by Develogy™ <soporte@develogy.mx>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        // Define los campos de filtrado de resultados.
        $filterFields = [
            'name'  => 'Nombre',
            'phone' => 'Teléfono',
            'email' => 'Email',
        ];

        $prospectModel = model('ProspectsModel');

        // Selecciona los campos a consultar.
        $prospects = $prospectModel->select('prospects.id, prospects.name, prospects.phone, email, prospects.created_at, response, landings.title as landing')
            ->landing()->orderBy('prospects.created_at', 'DESC')
            ->limit(6)->find();

        $graph = $prospectModel->select(' landings.title as landing_name, COUNT(prospects.id) as value')
            ->join('landings', 'landings.id = prospects.landing_id')
            ->groupBy('prospects.landing_id')
            ->findAll();

        $graphConvert = json_encode($graph);

        $path = ['module' => 'Dashboard', 'view' => 'Inicio', 'action' => ''];

        return view('backend/modules/dashboard/index', [
            'role'      => session('user.role'),
            'prospects' => $prospects,
            'graph'     => $graphConvert,
            'path'      => $path,
        ]);
    }
}
