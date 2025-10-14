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

class Account extends BaseController
{
    /**
     * Renderiza la vista para editar la cuenta del usuario de sesión
     * y modifica los datos del usuario de sesión.
     *
     * @param mixed|null $user
     */
    public function update($user = null)
    {
        $userModel = model('UsersModel');

        // Consulta los datos del usuario de sesión.
        $user = $userModel->select('users.id, users.name, users.email, users.phone, users.password, roles.name as role')->getRole()->find(session('user.id'));

        // Valida los campos del formulario.
        if (strtolower($this->request->getMethod()) === 'post' && $this->validate(
            [
                'name'         => 'required|max_length[64]',
                'email'        => "required|max_length[256]|valid_email|is_unique[users.email,id,{$user['id']}]",
                'password'     => 'permit_empty|min_length[8]|max_length[32]|password',
                'pass_confirm' => 'required_with[password]|matches[password]',
            ],
            [
                'password' => [
                    'password' => lang('Validation.regex_match'),
                ],
            ]
        )) {
            $password = $this->request->getPost('password');

            // Actualiza los datos del usuario de sesión.
            $userModel->update($user['id'], [
                'name'     => trimAll($this->request->getPost('name')),
                'email'    => lowerCase(trim($this->request->getPost('email'))),
                'password' => $password
                    ? password_hash($password, PASSWORD_DEFAULT)
                    : $user['password'],
            ]);

            // Consulta los datos actualizados del usuario de sesión.
            $user = $userModel->select('users.id, users.name, users.email, users.phone, users.password, roles.name as role')->getRole()->find($user['id']);

            // Actualiza las variables de sesión del usuario.
            session()->set([
                'user' => [
                    'id'    => $user['id'],
                    'name'  => $user['name'],
                    'email' => $user['email'],
                    'role'  => $user['role'],
                ],
            ]);

            return redirect()
                ->route('backend.dashboard.index')
                ->with('toast-success', 'Tu cuenta se ha actualizado correctamente');
        }

        $roleModel = model('RolesModel');

        // Consulta todos los roles del backend.
        $roles = $roleModel->select('id, description')
            ->orderBy('name', 'asc')
            ->findAll();
        $path = ['module' => 'Configuraciones', 'view' => 'Usuarios', 'action' => '> Mis Datos'];

        return view('backend/account/update', [
            'path'  => $path,
            'roles' => $roles,
            'user'  => $user,
        ]);
    }
}
