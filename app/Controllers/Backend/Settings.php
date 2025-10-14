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
use App\Libraries\ImageCompressor;

class Settings extends BaseController
{
    /**
     * Renderiza la vista de todas las configuraciones del sitio web.
     */
    public function general()
    {
        if (strtolower($this->request->getMethod()) === 'post' && $this->validate([
            'company'   => 'required|min_length[1]|max_length[256]|string',
            'phones'    => 'required|min_length[10]|max_length[256]|string',
            'schedules' => 'permit_empty|min_length[1]|max_length[256]|string',
            'favicon'   => 'if_exist|uploaded[favicon]|max_size[favicon,2048]|is_image[favicon]',
            'logo'      => 'if_exist|uploaded[logo]|max_size[logo,2048]|is_image[logo]',
        ])) {
            // Nombre de la empresa.
            setting()->set('App.general', trimAll($this->request->getPost('company')), 'company');

            // Teléfonos de contacto.
            setting()->set('App.general', trimAll($this->request->getPost('phones')), 'phones');

            // Horarios de la empresa.
            setting()->set('App.general', trimAll($this->request->getPost('schedules')), 'schedules');

            $favicon = $this->request->getFile('favicon');

            // Define la ruta de archivos subidos para las configuraciones del backend.
            $uploadsPath = FCPATH . 'uploads/settings/';

            $compress = ImageCompressor::getInstance();

            // Favicon.
            if ($favicon->isValid() && ! $favicon->hasMoved()) {
                $oldFavicon = $uploadsPath . setting()->get('App.general', 'favicon');

                // Elimina el favicon anterior.
                is_file($oldFavicon) && unlink($oldFavicon);

                $newName = $favicon->getRandomName();

                // Almacena el nuevo favicon.
                $favicon->move($uploadsPath, $newName);

                setting()->set('App.general', $newName, 'favicon');

                // Comprime el nuevo favicon.
                $compress->run($uploadsPath . $newName);

                unset($favicon, $oldFavicon, $newName);
            }

            $logo = $this->request->getFile('logo');

            // Logo.
            if ($logo->isValid() && ! $logo->hasMoved()) {
                $oldLogo = $uploadsPath . setting()->get('App.general', 'logo');

                // Elimina el logo anterior.
                is_file($oldLogo) && unlink($oldLogo);

                $newName = $logo->getRandomName();

                // Almacena el nuevo logo.
                $logo->move($uploadsPath, $newName);

                setting()->set('App.general', $newName, 'logo');

                // Comprime el nuevo logo.
                $compress->run($uploadsPath . $newName);

                unset($logo, $oldLogo, $newName);
            }

            return redirect()
                ->route('backend.settings.general')
                ->with('toast-success', 'Cambios guardados correctamente');
        }

        $path = ['module' => 'Configuración', 'view' => 'General', 'action' => ''];

        return view('backend/settings/general', [
            'path' => $path,
        ]);
    }

    /**
     * Renderiza la vista de todas las configuraciones del sitio web.
     */
    public function emails()
    {
        if (strtolower($this->request->getMethod()) === 'post' && $this->validate([
            'emails.to'  => 'required|valid_emails',
            'emails.cc'  => 'permit_empty|valid_emails',
            'emails.bcc' => 'permit_empty|valid_emails',
        ])) {
            $emails = $this->request->getPost('emails');

            // Emails de contacto.
            setting()->set('App.emails', lowerCase(trimAll($emails['to'])), 'to');
            setting()->set('App.emails', lowerCase(trimAll($emails['cc'])), 'cc');
            setting()->set('App.emails', lowerCase(trimAll($emails['bcc'])), 'bcc');

            return redirect()
                ->route('backend.settings.emails')
                ->with('toast-success', 'Cambios guardados correctamente');
        }

        $path = ['module' => 'Configuración', 'view' => 'Emails', 'action' => ''];

        return view('backend/settings/emails', [
            'path' => $path,
        ]);
    }

    /**
     * Renderiza la vista de todas las configuraciones del sitio web.
     */
    public function integrations()
    {
        if (strtolower($this->request->getMethod()) === 'post' && $this->validate([
            'whatsapp' => 'permit_empty|valid_url_strict',
            'gtag'     => 'if_exist|max_length[256]',
        ])) {
            $emails = $this->request->getPost('emails');

            // WhatsApp.
            setting()->set('App.apps', stripAllSpaces($this->request->getPost('whatsapp')), 'whatsapp');

            // ID de Google Tag Manager.
            setting()->set('App.apps', strtrim($this->request->getPost('gtag')), 'google:tagManager');

            return redirect()
                ->route('backend.settings.integrations')
                ->with('toast-success', 'Cambios guardados correctamente');
        }

        $path = ['module' => 'Configuración', 'view' => 'Integraciones', 'action' => ''];

        return view('backend/settings/integrations', [
            'path' => $path,
        ]);
    }

    /**
     * Renderiza la vista para editar las configuraciones del sitio web
     * y modifica las configuraciones del sitio web.
     */
    public function update()
    {
        // Lista de temas de colores de daisyUI.
        $themes = [
            'light', 'dark', 'cupcake', 'bumblebee', 'emerald', 'corporate', 'synthwave', 'retro',
            'cyberpunk', 'valentine', 'halloween', 'garden', 'forest', 'aqua', 'lofi', 'pastel',
            'fantasy', 'wireframe', 'black', 'luxury', 'dracula', 'cmyk', 'autumn', 'business',
            'acid', 'lemonade', 'night', 'coffee', 'winter',
        ];

        $themeslist = implode(',', $themes);

        // Valida los campos del formulario.
        if (strtolower($this->request->getMethod()) === 'post' && $this->validate([
            'company'                   => 'required|max_length[256]',
            'phones'                    => 'required|max_length[256]',
            'address'                   => 'required|max_length[256]',
            'schedules'                 => 'required|max_length[256]',
            'theme'                     => "permit_empty|string|in_list[{$themeslist}]",
            'favicon'                   => 'if_exist|uploaded[favicon]|max_size[favicon,2048]|is_image[favicon]',
            'background'                => 'if_exist|uploaded[background]|max_size[background,2048]|is_image[background]',
            'logo'                      => 'if_exist|uploaded[logo]|max_size[logo,2048]|is_image[logo]',
            'emails.to'                 => 'required|valid_emails',
            'emails.cc'                 => 'permit_empty|valid_emails',
            'emails.bcc'                => 'permit_empty|valid_emails',
            'whatsapp'                  => 'if_exist|max_length[15]|numeric',
            'googleTagManager'          => 'if_exist|max_length[256]',
            'googleSearchConsole'       => 'if_exist|uploaded[googleSearchConsole]|max_size[googleSearchConsole,2]|mime_in[googleSearchConsole,text/plain]|ext_in[googleSearchConsole,html]',
            'deleteGoogleSearchConsole' => 'if_exist|in_list[1]',
            'googleRecaptcha'           => 'if_exist|max_length[256]',
            'googleMaps'                => 'if_exist|valid_url_strict',
        ])) {
            // Nombre de la empresa.
            setting()->set('App.general', trimAll($this->request->getPost('company')), 'company');

            // Teléfonos de contacto.
            setting()->set('App.general', trimAll($this->request->getPost('phones')), 'phones');

            // Dirección de la empresa.
            setting()->set('App.general', trimAll($this->request->getPost('address')), 'address');

            // Horarios de la empresa.
            setting()->set('App.general', trimAll($this->request->getPost('schedules')), 'schedules');

            // Tema de colores.
            setting()->set('App.general', strtrim($this->request->getPost('theme')), 'theme');

            $favicon = $this->request->getFile('favicon');

            // Define la ruta de archivos subidos para las configuraciones del backend.
            $uploadsPath = FCPATH . 'uploads/settings/';

            $compress = ImageCompressor::getInstance();

            // Favicon.
            if ($favicon->isValid() && ! $favicon->hasMoved()) {
                $oldFavicon = $uploadsPath . setting()->get('App.general', 'favicon');

                // Elimina el favicon anterior.
                is_file($oldFavicon) && unlink($oldFavicon);

                $newName = $favicon->getRandomName();

                // Almacena el nuevo favicon.
                $favicon->move($uploadsPath, $newName);

                setting()->set('App.general', $newName, 'favicon');

                // Comprime el nuevo favicon.
                $compress->run($uploadsPath . $newName);

                unset($favicon, $oldFavicon, $newName);
            }

            $background = $this->request->getFile('background');

            // Fondo del login.
            if ($background->isValid() && ! $background->hasMoved()) {
                $oldBackground = $uploadsPath . setting()->get('App.general', 'background');

                // Elimina el fondo anterior.
                is_file($oldBackground) && unlink($oldBackground);

                $newName = $background->getRandomName();

                // Almacena el nuevo fondo.
                $background->move($uploadsPath, $newName);

                setting()->set('App.general', $newName, 'background');

                // Comprime el nuevo fondo.
                $compress->run($uploadsPath . $newName);

                unset($background, $oldBackground, $newName);
            }

            $logo = $this->request->getFile('logo');

            // Logo.
            if ($logo->isValid() && ! $logo->hasMoved()) {
                $oldLogo = $uploadsPath . setting()->get('App.general', 'logo');

                // Elimina el logo anterior.
                is_file($oldLogo) && unlink($oldLogo);

                $newName = $logo->getRandomName();

                // Almacena el nuevo logo.
                $logo->move($uploadsPath, $newName);

                setting()->set('App.general', $newName, 'logo');

                // Comprime el nuevo logo.
                $compress->run($uploadsPath . $newName);

                unset($logo, $oldLogo, $newName);
            }

            $emails = $this->request->getPost('emails');

            // Emails de contacto.
            setting()->set('App.emails', lowerCase(trimAll($emails['to'])), 'to');
            setting()->set('App.emails', lowerCase(trimAll($emails['cc'])), 'cc');
            setting()->set('App.emails', lowerCase(trimAll($emails['bcc'])), 'bcc');

            // WhatsApp.
            setting()->set('App.apps', stripAllSpaces($this->request->getPost('whatsapp')), 'whatsapp');

            // ID de Google Tag Manager.
            setting()->set('App.apps', strtrim($this->request->getPost('googleTagManager')), 'google:tagManager');

            // Elimina el archivo de Google Search Console.
            if ($this->request->getPost('deleteGoogleSearchConsole')) {
                $file = FCPATH . setting()->get('App.apps', 'google:searchConsole');

                is_file($file) && unlink($file);

                setting()->forget('App.apps', 'google:searchConsole');

                unset($file);
            }

            $googleSearchConsole = $this->request->getFile('googleSearchConsole');

            // Google Search Console.
            if ($googleSearchConsole->isValid() && ! $googleSearchConsole->hasMoved()) {
                $oldGoogleSearchConsole = FCPATH . setting()->get('App.apps', 'google:searchConsole');

                // Elimina el archivo anterior.
                is_file($oldGoogleSearchConsole) && unlink($oldGoogleSearchConsole);

                // Almacena el archivo.
                $googleSearchConsole->move(FCPATH);

                setting()->set('App.apps', $googleSearchConsole->getName(), 'google:searchConsole');

                unset($googleSearchConsole, $oldGoogleSearchConsole);
            }

            // Google reCAPTCHA.
            setting()->set('App.apps', strtrim($this->request->getPost('googleRecaptcha')), 'google:recaptcha');

            // Google Maps URL.
            setting()->set('App.apps', strtrim($this->request->getPost('googleMaps')), 'google:maps');

            return redirect()
                ->route('backend.settings.index')
                ->with('toast-success', 'El sitio web se ha modificado correctamente');
        }

        return view('backend/settings/update', [
            'themes'       => $themes,
            'currentTheme' => setting()->get('App.general', 'theme'),
        ]);
    }
}
