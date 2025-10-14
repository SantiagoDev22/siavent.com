<?php

/**
 * This file is part of CodeIgniter 4 Framework.
 *
 * (c) 2023 Powered by Develogy™ <soporte@develogy.mx>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Controllers\Backend\Modules;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\I18n\Time;
use Shuchkin\SimpleXLSXGen;

class Prospects extends BaseController
{
    /**
     * Renderiza la página de todos los prospectos.
     */
    public function index()
    {
        // Define los campos de filtrado de resultados.
        $filterFields = [
            'name'  => 'Nombre',
            'phone' => 'Teléfono',
            'email' => 'Email',
        ];

        $filterList = implode(',', array_keys($filterFields));

        // Define los campos de ordenamiento de resultados.
        $sortByFields = [
            'created_at' => 'Fecha de registro',
            'name'       => 'Nombre',
            'rating'     => 'Rating',
        ];

        $sortByList = implode(',', array_keys($sortByFields));

        // Define los modos de ordenamiento de resultados.
        $sortOrderFields = [
            'asc'  => 'Ascendente',
            'desc' => 'Descendente',
        ];

        $sortOrderList = implode(',', array_keys($sortOrderFields));

        // Valida los parámetros de búsqueda y consulta de resultados.
        if (! $this->validate([
            'q'          => 'if_exist|max_length[256]',
            'filter'     => "permit_empty|in_list[{$filterList}]",
            'sortBy'     => "permit_empty|in_list[{$sortByList}]",
            'sortOrder'  => "permit_empty|in_list[{$sortOrderList}]",
            'rating'     => 'permit_empty|is_natural|less_than_equal_to[10]',
            'dateFrom'   => 'permit_empty|valid_date[Y-m-d]',
            'dateTo'     => 'permit_empty|valid_date[Y-m-d]',
            'states_id'  => 'permit_empty|is_natural_no_zero|is_not_unique[origins.id]',
            'origin_id'  => 'permit_empty|is_natural_no_zero|is_not_unique[origins.id]',
            'service_id' => 'permit_empty|is_natural_no_zero|is_not_unique[origins.id]',
        ])) {
            return redirect('backend.modules.prospects.index')->withInput();
        }

        // Obtiene el patrón de búsqueda (por defecto: '').
        $queryParam = trimAll($this->request->getGet('q'));

        // Obtiene el campo de filtrado de resultados (por defecto: 'name').
        $filterParam = stripAllSpaces($this->request->getGet('filter')) ?: 'name';

        // Obtiene el campo de ordenamiento (por defecto: 'created_at').
        $sortByParam = stripAllSpaces($this->request->getGet('sortBy')) ?: 'created_at';

        // Obtiene el campo del modo de ordenamiento (por defecto: 'desc');
        $sortOrderParam = stripAllSpaces($this->request->getGet('sortOrder')) ?: 'desc';

        // Obtiene el campo de filtrado por rating (por defecto: '').
        $ratingParam = stripAllSpaces($this->request->getGet('rating'));

        // Obtiene el campo de filtrado por estado (por defecto: '')
        $stateIdParam = $this->request->getGet('states_id');

        // Obtiene el campo de filtrado por origen (por defecto: '')
        $originIdParam = $this->request->getGet('origin_id');

        // Obtiene el campo de filtrado por interes (por defecto: '')
        $serviceIdParam = $this->request->getGet('service_id');

        // Obtiene el campo de filtrado por fecha desde (por defecto: '').
        $dateFromParam = stripAllSpaces($this->request->getGet('dateFrom'));

        // Obtiene el campo de filtrado por fecha hasta (por defecto: '').
        $dateToParam = stripAllSpaces($this->request->getGet('dateTo'));

        $prospectModel = model('ProspectsModel');

        // Define los campos a seleccionar.
        $builder = $prospectModel->select('prospects.id, prospects.name, prospects.email, prospects.phone, prospects.created_at');

        // Filtra los resultados por rating.
        if ($ratingParam) {
            $builder->where('prospects.rating', $ratingParam);
        }

        // Filtra los resultados por estado.
        if ($stateIdParam) {
            $builder->where('prospects.states_id', $stateIdParam);
        }

        // Filtra los resultados por origen.
        if ($originIdParam) {
            $builder->where('prospects.origin_id', $originIdParam);
        }

        // Filtra los resultados por interes.
        if ($serviceIdParam) {
            $builder->where('prospects.service_id', $serviceIdParam);
        }

        // Filtra los resultados por fecha desde.
        if ($dateFromParam) {
            $builder->where('prospects.created_at >=', Time::parse($dateFromParam)->toDateTimeString());
        }

        // Filtra los resultados por fecha hasta.
        if ($dateToParam) {
            $builder->where('prospects.created_at <', Time::parse('+1 day ' . $dateToParam)->toDateTimeString());
        }

        /**
         * Consulta todos los prospectos
         * que coinciden con el patrón de búsqueda
         * con paginación.
         */
        $prospects = $builder
            ->like('prospects.' . $filterParam, $queryParam)
            ->orderBy('prospects.' . $sortByParam, $sortOrderParam)
            ->paginate(8, 'prospects');

        return view('backend/modules/prospects/index', [
            'sessionUser'     => session('user'),
            'queryParam'      => $queryParam,
            'filterFields'    => $filterFields,
            'filterParam'     => $filterParam,
            'sortByFields'    => $sortByFields,
            'sortByParam'     => $sortByParam,
            'sortOrderFields' => $sortOrderFields,
            'sortOrderParam'  => $sortOrderParam,
            'ratingParam'     => $ratingParam,
            'stateIdParam'    => $stateIdParam,
            'dateFromParam'   => $dateFromParam,
            'dateToParam'     => $dateToParam,
            'prospects'       => $prospects,
            'role'            => session('user.role.name'),
            'pager'           => $prospectModel->pager,
            'downloadParams'  => $this->request->getUri()->getQuery(),
        ]);
    }

    /**
     * Descarga la información de los prospectos en formato excel.
     */
    public function download()
    {
        // Valida los parámetros de búsqueda y consulta de resultados.
        if (! $this->validate([
            'q'          => 'if_exist|max_length[256]',
            'filter'     => 'permit_empty|in_list[name,phone,email]',
            'sortBy'     => 'permit_empty|in_list[created_at,name,rating]',
            'sortOrder'  => 'permit_empty|in_list[asc,desc]',
            'rating'     => 'permit_empty|is_natural|less_than_equal_to[10]',
            'dateFrom'   => 'permit_empty|valid_date[Y-m-d]',
            'dateTo'     => 'permit_empty|valid_date[Y-m-d]',
            'states_id'  => 'permit_empty|is_natural_no_zero|is_not_unique[origins.id]',
            'origin_id'  => 'permit_empty|is_natural_no_zero|is_not_unique[origins.id]',
            'service_id' => 'permit_empty|is_natural_no_zero|is_not_unique[origins.id]',
        ])) {
            return redirect('backend.modules.prospects.index')
                ->withInput();
        }

        // Obtiene el patrón de búsqueda (por defecto: '').
        $queryParam = trimAll($this->request->getGet('q'));

        // Obtiene el campo de filtrado de resultados (por defecto: 'name').
        $filterParam = stripAllSpaces($this->request->getGet('filter')) ?: 'name';

        // Obtiene el campo de ordenamiento (por defecto: 'created_at').
        $sortByParam = stripAllSpaces($this->request->getGet('sortBy')) ?: 'created_at';

        // Obtiene el campo del modo de ordenamiento (por defecto: 'desc');
        $sortOrderParam = stripAllSpaces($this->request->getGet('sortOrder')) ?: 'desc';

        // Obtiene el campo de filtrado por rating (por defecto: '').
        $ratingParam = stripAllSpaces($this->request->getGet('rating'));

        // Obtiene el campo de filtrado por estado (por defecto: '')
        $stateIdParam = $this->request->getGet('states_id');

        // Obtiene el campo de filtrado por origen (por defecto: '')
        $originIdParam = $this->request->getGet('origin_id');

        // Obtiene el campo de filtrado por interes (por defecto: '')
        $serviceIdParam = $this->request->getGet('service_id');

        // Obtiene el campo de filtrado por fecha desde (por defecto: '').
        $dateFromParam = stripAllSpaces($this->request->getGet('dateFrom'));

        // Obtiene el campo de filtrado por fecha hasta (por defecto: '').
        $dateToParam = stripAllSpaces($this->request->getGet('dateTo'));

        $prospectModel = model('ProspectsModel');

        // Define los campos a seleccionar.
        $builder = $prospectModel->select('prospects.*');

        // Filtra los resultados por rating.
        if ($ratingParam) {
            $builder->where('prospects.rating', $ratingParam);
        }

        // Filtra los resultados por estado.
        if ($stateIdParam) {
            $builder->where('prospects.states_id', $stateIdParam);
        }

        // Filtra los resultados por origen.
        if ($originIdParam) {
            $builder->where('prospects.origin_id', $originIdParam);
        }

        // Filtra los resultados por interes.
        if ($serviceIdParam) {
            $builder->where('prospects.service_id', $serviceIdParam);
        }

        // Filtra los resultados por fecha desde.
        if ($dateFromParam) {
            $builder->where('prospects.created_at >=', Time::parse($dateFromParam)->toDateTimeString());
        }

        // Filtra los resultados por fecha hasta.
        if ($dateToParam) {
            $builder->where('prospects.created_at <', Time::parse('+1 day ' . $dateToParam)->toDateTimeString());
        }
        // Aplica el filtro de búsqueda.
        if ($queryParam) {
            $builder->like('prospects.' . $filterParam, $queryParam);
        }

        // Ordena los resultados.
        $builder->orderBy('prospects.' . $sortByParam, $sortOrderParam);
        /**
         * Consulta todos los prospectos
         * que coinciden con el patrón de búsqueda.
         */
        $prospects = $builder->findAll();

        // Define los encabezados del excel.
        $data = [
            [
                '<center><b>Fecha</b></center>',
                '<center><b>Nombre</b></center>',
                '<center><b>Teléfono</b></center>',
                '<center><b>Email</b></center>',
                '<center><b>Mensaje</b></center>',
                '<center><b>Rating</b></center>',
                '<center><b>Observaciones</b></center>',
                '<center><b>Estado</b></center>',
                '<center><b>Origen</b></center>',
                '<center><b>Interés</b></center>',
            ],
        ];

        foreach ($prospects as $prospect) {
            // Consulta los datos del prospecto.
            $prospect = $prospectModel->find($prospect['id']);
            // Crea una nueva instancia del modelo para la consulta completa.
            $fullProspectQuery = $prospectModel->select('prospects.*');
            // Añade uniones condicionales.
            if (! empty($prospect['states_id'])) {
                $fullProspectQuery = $fullProspectQuery->state();
            }

            if (! empty($prospect['origin_id'])) {
                $fullProspectQuery = $fullProspectQuery->origin();
            }

            if (! empty($prospect['service_id'])) {
                $fullProspectQuery = $fullProspectQuery->service();
            }
            $fullProspect = $fullProspectQuery->find($prospect['id']);

            $data[] = [
                $fullProspect['created_at'],
                "\0" . $fullProspect['name'],
                "\0" . $fullProspect['phone'],
                $fullProspect['email'],
                "\0" . $fullProspect['message'],
                $fullProspect['rating'],
                "\0" . $fullProspect['observations'],
                "\0" . ($fullProspect['state'] ?? ''),
                "\0" . ($fullProspect['origin'] ?? ''),
                "\0" . ($fullProspect['service'] ?? ''),
            ];
        }

        // Genera el excel.
        SimpleXLSXGen::fromArray($data)
            ->downloadAs('prospectos-' . url_title(Time::now()->toDateTimeString()) . '.xlsx');
    }

    /**
     * Renderiza la página de los datos de un prospecto.
     *
     * @param mixed|null $id
     */
    public function show($id = null)
    {
        // Valida si el prospecto existe.
        if (! $this->validateData(
            ['id' => $id],
            ['id' => 'required|is_natural_no_zero|is_not_unique[prospects.id]'],
        )) {
            throw PageNotFoundException::forPageNotFound();
        }

        $prospectModel = model('ProspectsModel');

        // Consulta los datos del prospecto.
        $prospect = $prospectModel->find($id);

        if (! $prospect) {
            // Maneja el caso en que no se encuentra el prospecto.
            throw PageNotFoundException::forPageNotFound();
        }

        // Crea una nueva instancia del modelo para la consulta completa.
        $fullProspectQuery = $prospectModel->select('prospects.*');

        // Añade uniones condicionales.
        if (! empty($prospect['states_id'])) {
            $fullProspectQuery = $fullProspectQuery->state();
        }

        if (! empty($prospect['origin_id'])) {
            $fullProspectQuery = $fullProspectQuery->origin();
        }

        if (! empty($prospect['service_id'])) {
            $fullProspectQuery = $fullProspectQuery->service();
        }

        // Ejecuta la consulta.
        $fullProspect = $fullProspectQuery->find($id);

        return view('backend/modules/prospects/show', [
            'sessionUser' => session('user'),
            'prospect'    => $fullProspect,
            'role'        => session('user.role.name'),
        ]);
    }

    /**
     * Renderiza la página para modificar prospectos
     * y modifica los datos de un prospecto.
     *
     * @param mixed|null $id
     */
    public function update($id = null)
    {
        // Valida si el prospecto existe.
        if (! $this->validateData(
            ['id' => $id],
            ['id' => 'required|is_natural_no_zero|is_not_unique[prospects.id]'],
        )) {
            throw PageNotFoundException::forPageNotFound();
        }

        $prospectModel = model('ProspectsModel');

        // Valida los campos del formulario.
        if (! $this->request->is('post') || ! $this->validate([
            'name'         => 'required|max_length[128]',
            'email'        => 'required|max_length[256]|valid_email',
            'phone'        => 'required|max_length[15]|numeric',
            'company'      => 'permit_empty|max_length[255]|string',
            'message'      => 'permit_empty|max_length[4096]',
            'observations' => 'if_exist|max_length[4096]',
            'rating'       => 'permit_empty|is_natural|less_than_equal_to[10]',
            'other'        => 'permit_empty|max_length[255]',
            'custom'       => 'if_exist|max_length[255]|string',
            'custom2'      => 'if_exist|max_length[255]|string',
            'custom3'      => 'if_exist|max_length[255]|string',
            'custom4'      => 'if_exist|max_length[255]|string',
            'custom5'      => 'if_exist|max_length[255]|string',
            'states'       => 'if_exist|is_natural_no_zero|is_not_unique[origins.id]',
            'origin'       => 'if_exist|is_natural_no_zero|is_not_unique[origins.id]',
            'service'      => 'if_exist|is_natural_no_zero|is_not_unique[origins.id]',
        ])) {
            // Consulta los datos del prospecto.
            $prospect = $prospectModel->select('prospects.*')
                ->find($id);

            $originsModel = model('OriginsModel');

            // Consulta todos los estados.
            $states = $originsModel->select('id, name')
                ->where('type', 'states')
                ->orderBy('name', 'asc')
                ->findAll();

            // Consulta todos los estados.
            $services = $originsModel->select('id, name')
                ->where('type', 'service')
                ->orderBy('name', 'asc')
                ->findAll();

            // Consulta todos los estados.
            $origins = $originsModel->select('id, name')
                ->where('type', 'origin')
                ->orderBy('name', 'asc')
                ->findAll();

            return view('backend/modules/prospects/update', [
                'prospect' => $prospect,
                'states'   => $states,
                'services' => $services,
                'origins'  => $origins,
                'role'     => session('user.role.name'),
            ]);
        }

        $message      = trimAll($this->request->getPost('message'));
        $observations = trimAll($this->request->getPost('observations'));
        $custom       = trimAll($this->request->getPost('custom'));
        $custom2      = trimAll($this->request->getPost('custom2'));
        $custom3      = trimAll($this->request->getPost('custom3'));
        $custom4      = trimAll($this->request->getPost('custom4'));
        $custom5      = trimAll($this->request->getPost('custom5'));

        // Actualiza los datos del prospecto.
        $prospectModel->update($id, [
            'name'         => trimAll($this->request->getPost('name')),
            'email'        => trimAll($this->request->getPost('email')),
            'phone'        => trimAll($this->request->getPost('phone')),
            'company'      => trimAll($this->request->getPost('company')),
            'message'      => $message === '' ? null : $message,
            'rating'       => stripAllSpaces($this->request->getPost('rating')),
            'observations' => $observations === '' ? null : $observations,
            'custom'       => $custom === '' ? null : $custom,
            'custom2'      => $custom2 === '' ? null : $custom2,
            'custom3'      => $custom3 === '' ? null : $custom3,
            'custom4'      => $custom4 === '' ? null : $custom4,
            'custom5'      => $custom5 === '' ? null : $custom5,
            'states_id'    => trim($this->request->getPost('states')),
            'origin_id'    => trim($this->request->getPost('origin')),
            'service_id'   => trim($this->request->getPost('service')),
        ]);

        return redirect('backend.modules.prospects.index')
            ->with('toast-success', 'El prospecto se ha modificado correctamente');
    }

    /**
     * Elimina el registro de un prospecto.
     *
     * @param mixed|null $id
     */
    public function delete($id = null)
    {
        // Valida si el prospecto existe.
        if (! $this->validateData(
            ['id' => $id],
            ['id' => 'required|is_natural_no_zero|is_not_unique[prospects.id]'],
        )) {
            throw PageNotFoundException::forPageNotFound();
        }

        $prospectModel = model('ProspectsModel');

        // Elimina el registro del prospecto.
        $prospectModel->delete($id);

        return redirect('backend.modules.prospects.index')
            ->with('toast-success', 'El prospecto se ha eliminado correctamente');
    }

    /**
     * Renderiza la página de registro de prospectos
     * y registra un nuevo prospecto.
     */
    public function create()
    {
        // Valida los campos del formulario.
        if (! $this->request->is('post') || ! $this->validate([
            'name'         => 'required|max_length[128]',
            'phone'        => 'required|max_length[15]|numeric',
            'email'        => 'required|max_length[256]|valid_email',
            'states_id'    => 'required|is_natural_no_zero|is_not_unique[origins.id]',
            'message'      => 'required|max_length[4096]',
            'rating'       => 'required|is_natural|less_than_equal_to[10]',
            'observations' => 'if_exist|max_length[4096]',
        ])) {
            $stateModel = model('OriginsModel');

            // Consulta todos los estados.
            $states = $stateModel->select('id, name')
                ->where('type', 'states')
                ->orderBy('name', 'asc')
                ->findAll();

            return view('backend/modules/prospects/create', [
                'states' => $states,
            ]);
        }

        $prospectModel = model('ProspectsModel');

        // Registra los datos del prospecto.
        $prospectModel->insert([
            'name'         => trimAll($this->request->getPost('name')),
            'phone'        => stripAllSpaces($this->request->getPost('phone')),
            'email'        => lowerCase(stripAllSpaces($this->request->getPost('email'))),
            'states_id'    => $this->request->getPost('states_id'),
            'message'      => trimAll($this->request->getPost('message')),
            'rating'       => stripAllSpaces($this->request->getPost('rating')),
            'observations' => trimAll($this->request->getPost('observations')) ?: null,
        ]);

        return redirect('backend.modules.prospects.index')
            ->with('toast-success', 'El prospecto se ha registrado correctamente');
    }
    /**
     * Marcar como atendido un prospecto.
     *
     * @param mixed|null $id
     */
    public function ready($id = null)
    {
        // Valida si el prospecto existe.
        if (! $this->validateData(
            ['id' => $id],
            ['id' => 'required|is_natural_no_zero|is_not_unique[prospects.id]'],
        )) {
            throw PageNotFoundException::forPageNotFound();
        }

        $prospectModel = model('ProspectsModel');

        // Elimina el registro del prospecto.
        $prospect = $prospectModel->select('id, response')->find($id);
        $ready    = ! $prospect['response'];

        $prospectModel->update($prospect['id'], [
            'response' => $ready,
        ]);

        return redirect('backend.modules.prospects.index')
            ->with('toast-success', 'El prospecto se ha marcado correctamente');
    }
}
