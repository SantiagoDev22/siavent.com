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

class Auth extends BaseController
{
    /**
     * Renderiza la vista de inicio de sesión
     * y crea la sesión de un usuario.
     */
    public function login()
    {
        // Valida los campos del formulario.
        if (strtolower($this->request->getMethod()) === 'post' && $this->validate(
            [
                'email'    => 'required|max_length[256]|valid_email|is_not_unique[users.email,active,1]',
                'password' => 'required|min_length[8]|max_length[32]|password',
            ],
            [
                'password' => [
                    'password' => lang('Validation.regex_match'),
                ],
            ]
        )) {
            $userModel = model('UsersModel');
            $email     = lowerCase(trim($this->request->getPost('email')));
            // Consulta los datos del usuario.
            $user = $userModel->select('users.id, users.name, users.email, users.password, roles.name as role')
                ->getRole()
                ->where('users.email', $email)
                ->first();

            // Valida la contraseña del usuario.
            if (password_verify($this->request->getPost('password'), $user['password'])) {
                // Asigna variables de sesión del usuario.
                session()->set([
                    'user' => [
                        'id'    => $user['id'],
                        'name'  => $user['name'],
                        'email' => $user['email'],
                        'role'  => $user['role'],
                    ],
                ]);

                return redirect()->route('backend.dashboard.index');
            }

            return redirect()
                ->route('backend.auth.login')
                ->withInput()
                ->with('error', 'El correo y/o contraseña son incorrectas');
        }

        return view('auth/auth/login');
    }

    /**
     * Cierra la sesión de un usuario.
     */
    public function logout()
    {
        session()->destroy();

        return redirect('backend.auth.login');
    }

    /**
     * Renderiza la vista de recuperación de contraseñas
     * y envía un enlace de recuperación por email.
     */
    public function forgotten()
    {
        // Valida los campos del formulario.
        if (strtolower($this->request->getMethod()) === 'post' && $this->validate([
            'email' => 'required|max_length[256]|valid_email|is_not_unique[users.email,active,1]',
        ])) {
            $userModel = model('UsersModel');

            // Consulta los datos del usuario.
            $user = $userModel
                ->select('id, name, email')
                ->where('email', lowerCase(trim($this->request->getPost('email'))))
                ->where('active', true)
                ->first();

            $authModel = model('AuthModel');

            // Genera una llave aleatoria de autorización.
            $key = random_string('crypto', 32);

            $email = service('email');

            // Define el remitente y el destinatario del email.
            $email->setFrom(config('Email')->SMTPUser, setting()->get('App.general', 'company'));
            $email->setTo($user['email']);

            // Define el asunto y el cuerpo del mensaje.
            $email->setSubject('Recuperación de Cuenta');
            $email->setMessage(view('backend/emails/recovery', [
                'user' => $user,
                'key'  => $key,
            ]));

            // Envía el mensaje del email.
            if ($email->send()) {
                // Registra el hash de autorización del usuario con fecha de expiración.
                $authModel->save([
                    'user_id'    => $user['id'],
                    'secret'     => hash('sha512', $key),
                    'expires_at' => (new Time('+1 hours'))->toDateTimeString(), // 1 hora
                ]);

                return redirect()
                    ->route('backend.auth.login')
                    ->with('success', 'Hemos enviado los pasos para recuperar tu cuenta, verifica tu correo');
            }

            return redirect()
                ->route('backend.auth.forgotten')
                ->withInput()
                ->with('error', 'Tuvimos un problema para enviar tu mensaje de correo electrónico, por favor inténtelo de nuevo');
        }

        return view('auth/auth/forgotten');
    }

    /**
     * Renderiza la vista para restaurar contraseñas
     * y restaura la contraseña de un usuario.
     *
     * @param mixed|null $id
     * @param mixed|null $key
     */
    public function recovery($id = null, $key = null)
    {
        // Valida si existe el usuario.
        if ($this->validateData(
            ['id' => $id],
            ['id' => 'required|is_natural_no_zero|is_not_unique[users.id,active,1]']
        )) {
            $authModel = model('AuthModel');

            // Consulta los datos de autenticación del usuario.
            $auth = $authModel->select('id, user_id, secret, expires_at')
                ->where('user_id', $id)
                ->first();

            // Valida la llave de autenticación.
            if (! $auth || ! hash_equals($auth['secret'], hash('sha512', $key))) {
                // Valida si la llave de autenticación ha expirado.
                throw PageNotFoundException::forPageNotFound();
            }
            if (Time::now()->isAfter(Time::parse($auth['expires_at']))) {
                return redirect('backend.auth.forgotten')
                    ->with('error', 'Tu enlace de recuperación ha expirado, por favor inténtelo de nuevo');
            }

            // Valida los campos del formulario.
            if (strtolower($this->request->getMethod()) === 'post' && $this->validate(
                [
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

                // Actualiza la contraseña del usuario.
                $userModel->update($auth['user_id'], [
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                ]);

                // Elimina el registro de autenticación.
                $authModel->delete($auth['id']);

                return redirect()
                    ->route('backend.auth.login')
                    ->with('success', 'Tu contraseña se ha actualizado correctamente, ahora puedes inicia sesión');
            }

            return view('auth/auth/recovery', [
                'id'  => $auth['user_id'],
                'key' => $key,
            ]);
        }

        throw PageNotFoundException::forPageNotFound();
    }
}
