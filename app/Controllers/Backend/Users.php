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
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\I18n\Time;

class Users extends BaseController
{
    /**
     * Renderiza la vista de registro de usuarios
     * y registra un nuevo usuario.
     */
    public function create()
    {
        // Valida los campos del formulario.
        if (strtolower($this->request->getMethod()) === 'post' && $this->validate(
            [
                'name'         => 'required|max_length[64]',
                'phone'        => 'permit_empty|max_length[64]|numeric',
                'email'        => 'required|max_length[256]|valid_email|is_unique[users.email]',
                'role'         => 'required|min_length[36]|is_not_unique[roles.id]',
                'password'     => 'required|min_length[8]|max_length[32]|password',
                'pass_confirm' => 'required|matches[password]',
            ],
            [
                'password' => [
                    'password' => lang('Validation.regex_match'),
                ],
            ]
        )) {
            $userModel = model('UsersModel');

            // Registra el nuevo usuario.
            $userModel->insert([
                'name'     => trimAll($this->request->getPost('name')),
                'phone'    => trimAll($this->request->getPost('phone')),
                'email'    => lowerCase(trim($this->request->getPost('email'))),
                'role_id'  => $this->request->getPost('role'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ]);

            return redirect()
                ->route('backend.users.index')
                ->with('toast-success', 'El usuario de acceso se ha registrado correctamente');
        }

        $roleModel = model('RolesModel');

        // Consulta todos los roles del backend.
        $roles = $roleModel->select('id, description')
            ->orderBy('name', 'asc')
            ->findAll();

        $path = ['module' => 'Configuraciones', 'view' => 'Usuarios', 'action' => '> Crear'];

        return view('backend/users/create', [
            'path'  => $path,
            'roles' => $roles,
        ]);
    }

    /**
     * Renderiza la vista de todos los usuarios registrados
     * y realiza búsquedas y consultas de todos los usuarios registrados.
     */
    public function index()
    {
        // Define los campos de filtrado de resultados.
        $filterFields = [
            'name'  => 'Nombre',
            'email' => 'Email',
        ];

        $filterList = implode(',', array_keys($filterFields));

        // Define los campos de ordenamiento de resultados.
        $sortByFields = [
            'name'       => 'Nombre',
            'created_at' => 'Fecha',
        ];

        $sortByList = implode(',', array_keys($sortByFields));

        // Define los modos de ordenamiento de resultados.
        $sortOrderFields = [
            'asc'  => 'Ascendente',
            'desc' => 'Descendente',
        ];

        $sortOrderList = implode(',', array_keys($sortOrderFields));

        // Valida los parámetros de búsqueda y filtrado de resultados.
        if (! $this->validate([
            'q'         => 'if_exist|max_length[256]',
            'filter'    => "permit_empty|string|in_list[{$filterList}]",
            'sortBy'    => "permit_empty|string|in_list[{$sortByList}]",
            'sortOrder' => "permit_empty|string|in_list[{$sortOrderList}]",
            'role'      => 'permit_empty|is_natural_no_zero|is_not_unique[roles.id]',
            'dateFrom'  => 'permit_empty|valid_date[Y-m-d]',
            'dateTo'    => 'permit_empty|valid_date[Y-m-d]',
        ])) {
            return redirect()
                ->route('backend.users.index')
                ->withInput();
        }

        // Obtiene el patrón de búsqueda (por defecto: '').
        $queryParam = trimAll($this->request->getGet('q'));

        // Obtiene el campo de filtrado de resultados (por defecto: 'name').
        $filterParam = strtrim($this->request->getGet('filter') ?: 'name');

        // Obtiene el campo de ordenamiento (por defecto: 'created_at').
        $sortByParam = strtrim($this->request->getGet('sortBy') ?: 'created_at');

        // Obtiene el campo del modo de ordenamiento (por defecto: 'desc');
        $sortOrderParam = strtrim($this->request->getGet('sortOrder') ?: 'desc');

        // Obtiene el campo de filtrado por rol (por defecto: '').
        $roleParam = strtrim($this->request->getGet('role'));

        // Obtiene el campo de filtrado de fecha desde (por defecto: '').
        $dateFromParam = strtrim($this->request->getGet('dateFrom'));

        // Obtiene el campo de filtrado de fecha hasta (por defecto: '').
        $dateToParam = strtrim($this->request->getGet('dateTo'));

        $userModel = model('UsersModel');

        // Selecciona los campos a consultar.
        $builder = $userModel->select('users.id, users.name, users.email, users.created_at, users.active, roles.name as role')->getRole();

        // Filtra los resultados por role.
        if ($roleParam) {
            $builder->where('roles.id', $roleParam);
        }

        // Filtra los resultados por fecha desde.
        if ($dateFromParam) {
            $builder->where('users.created_at >=', Time::parse($dateFromParam)->toDateTimeString());
        }

        // Filtra los resultados por fecha hasta.
        if ($dateToParam) {
            $builder->where('users.created_at <', Time::parse('+1 day' . $dateToParam)->toDateTimeString());
        }

        $roleModel = model('RolesModel');

        // Consulta todos los roles del backend.
        $roles = $roleModel->select('id, description')
            ->findAll();

        /**
         * Consulta los datos de todos los usuarios
         * que coinciden con el patrón de búsqueda
         * con paginación.
         */
        $users = $builder
            ->where('users.id !=', session('user.id'))
            ->where('users.email !=', 'info@develogy.mx')
            ->like('users.' . $filterParam, $queryParam)
            ->orderBy('users.' . $sortByParam, $sortOrderParam)
            ->paginate(8, 'users');

        $path = ['module' => 'Configuración', 'view' => 'Usuarios', 'action' => ''];

        return view('backend/users/index', [
            'path'            => $path,
            'users'           => $users,
            'queryParam'      => $queryParam,
            'filterFields'    => $filterFields,
            'filterParam'     => $filterParam,
            'sortByFields'    => $sortByFields,
            'sortByParam'     => $sortByParam,
            'sortOrderFields' => $sortOrderFields,
            'sortOrderParam'  => $sortOrderParam,
            'dateFromParam'   => $dateFromParam,
            'dateToParam'     => $dateToParam,
            'roleParam'       => $roleParam,
            'roles'           => $roles,
            'pager'           => $userModel->pager,
        ]);
    }

    /**
     * Modifica el estado de cuenta de un usuario.
     *
     * @param mixed|null $id
     */
    public function toggleActive($id = null)
    {
        // Valida si existe el usuario.
        if (session('user.id') !== $id && $this->validateData(
            ['id' => $id],
            ['id' => 'required|min_length[36]|is_not_unique[users.id]']
        )) {
            $userModel = model('UsersModel');

            // Consulta los datos del usuario.
            $user = $userModel->select('id, active')
                ->find($id);

            // Realiza un toggle del estado de cuenta.
            $active = ! $user['active'];

            // Actualiza el estado de cuenta.
            $userModel->update($user['id'], [
                'active' => $active,
            ]);

            return redirect()
                ->back()
                ->with('toast-success', 'La cuenta de ha ' . ($active ? 'activado' : 'desactivado') . ' correctamente');
        }

        throw PageNotFoundException::forPageNotFound();
    }

    /**
     * Renderiza la vista de los datos de un usuario.
     *
     * @param mixed|null $id
     */
    public function show($id = null)
    {
        // Valida si existe el usuario.
        if (session('user.id') !== $id && $this->validateData(
            ['id' => $id],
            ['id' => 'required|min_length[36]|is_not_unique[users.id]']
        )) {
            $userModel = model('UsersModel');

            // Consulta los datos del usuario.
            $user = $userModel->role()->find($id);

            return view('backend/users/show', [
                'user' => $user,
            ]);
        }

        throw PageNotFoundException::forPageNotFound();
    }

    /**
     * Renderiza la vista para editar un usuario
     * y modifica los datos de un usuario.
     *
     * @param mixed|null $id
     */
    public function update($id = null)
    {
        // Valida si existe el usuario.
        if (session('user.id') !== $id && $this->validateData(
            ['id' => $id],
            ['id' => 'required|min_length[36]|is_not_unique[users.id]']
        )) {
            $userModel = model('UsersModel');

            $user = $userModel->find($id);

            $modulesModel = model('ModulesModel');
            $modules      = $modulesModel->select('id, name, active')
                ->where('active', true)
                ->orderBy('name', 'asc')
                ->findAll();

            $permissionsModel = model('PermissionModel');
            $permissions      = $permissionsModel->select('id, module_id, user_email')
                ->where('user_email', $user['email'])->findAll();

            // Valida los campos del formulario.
            if (strtolower($this->request->getMethod()) === 'post' && $this->validate(
                [
                    'name'         => 'required|max_length[64]',
                    'phone'        => 'required|max_length[15]',
                    'email'        => "required|max_length[256]|valid_email|is_unique[users.email,id,{$user['id']}]",
                    'role'         => 'required|min_length[36]|is_not_unique[roles.id]',
                    'password'     => 'permit_empty|min_length[8]|max_length[32]|password',
                    'pass_confirm' => 'required_with[password]|matches[password]',
                ],
                [
                    'password' => [
                        'password' => lang('Validation.regex_match'),
                    ],
                ]
            )) {
                $modulesModel     = model('ModulesModel');
                $permissionsModel = model('PermissionModel');

                $password = $this->request->getPost('password');
                $modules  = $this->request->getPost('modules');
                $email    = lowerCase(stripAllSpaces($this->request->getPost('email')));
                $role_id    = lowerCase(stripAllSpaces($this->request->getPost('role')));

                // Elimina los permisos no existentes
                $permissionsModel->where('user_email', $email)->whereNotIn('module_id', $modules)->delete();
                // Valida Modulos seleccionados
                if (! empty($modules)) {
                    // Intersa los permisos seleccionados del usuario
                    foreach ($modules as $module) {
                        $exist = $permissionsModel->select('id, module_id')->where('user_email', $email)->where('module_id', $module)->where('active', true)->first();
                        if (empty($exist)) {
                            $permissionsModel->ignore(true)->insertBatch([
                                [
                                    'module_id'  => $module,
                                    'user_email' => $email,
                                    'role_id'    => $role_id,
                                    'active'     => true,
                                ],
                            ]);
                        } else {
                            $permissionsModel->update($exist['id'], [
                                'module_id'  => $module,
                                'user_email' => $email,
                                'active'     => true,
                            ]);
                        }
                    }
                }

                // Actualiza los datos del usuario.
                $userModel->update($user['id'], [
                    'name'     => trimAll($this->request->getPost('name')),
                    'phone'    => trimAll($this->request->getPost('phone')),
                    'email'    => lowerCase(trim($this->request->getPost('email'))),
                    'role_id'  => $this->request->getPost('role'),
                    'password' => $password
                        ? password_hash($password, PASSWORD_DEFAULT)
                        : $user['password'],
                ]);

                return redirect()
                    ->route('backend.users.index')
                    ->with('toast-success', 'Los datos se han guardado correctamente');
            }

            $roleModel = model('RolesModel');

            // Consulta todos los roles del backend.
            $roles = $roleModel->select('id, description')
                ->orderBy('name', 'asc')
                ->findAll();

            $path = ['module' => 'Configuración', 'view' => 'Usuarios', 'action' => '> Editar'];

            return view('backend/users/update', [
                'path'        => $path,
                'user'        => $user,
                'roles'       => $roles,
                'modules'     => $modules,
                'permissions' => $permissions,
            ]);
        }

        throw PageNotFoundException::forPageNotFound();
    }

    /**
     * Elimina un Usuario
     *
     * @param mixed|null $id
     */
    public function delete($id = null)
    {
        // Valida si existe el usuario.
        if (session('user.id') !== $id && $this->validateData(
            ['id' => $id],
            ['id' => 'required|min_length[36]|is_not_unique[users.id]']
        )) {
            $userModel = model('UsersModel');

            // Consulta los datos del usuario.
            $user = $userModel->select('id, name, active')
                ->find($id);

            // elimina una cuenta.
            $userModel->delete($user['id']);

            return redirect()
                ->back()
                ->with('toast-success', 'Se ha eliminado "' . esc($user['name']) . '" correctamente');
        }

        throw PageNotFoundException::forPageNotFound();
    }
}
