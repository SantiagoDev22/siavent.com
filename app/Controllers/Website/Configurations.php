<?php

/**
 * This file is part of CodeIgniter 4 Framework.
 *
 * (c) Genotipo ®️
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Controllers\Website;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class Configurations extends BaseController
{
    public function updateRobots()
    {
        // Asegúrate de que solo los administradores pueden realizar esta acción
        if (session('user.role') !== 'admin') {
            return redirect()->back()->with('error', 'You do not have permission to edit this file.');
        }

        // Obtén la ruta del archivo robots.php
        $fileRobots = FCPATH . 'robots.php';

        if (file_exists($fileRobots)) {
            // Realiza una copia de seguridad del archivo original
            $backupFile = FCPATH . 'backups/backup_robots_' . date('Ymd_His') . '.php';
            copy($fileRobots, $backupFile);

            // Obtén el contenido actual del archivo
            $currentContent = htmlspecialchars(file_get_contents($fileRobots));

            // Obtén el nuevo contenido del POST
            $newContent   = $this->request->getPost('robots');
            $updateRobots = htmlspecialchars_decode($newContent);

            // Valida el nuevo contenido
            if ($this->isValidRobotsContent($updateRobots) && $updateRobots !== $currentContent) {
                // Escribe el nuevo contenido en el archivo robots.php
                if (file_put_contents($fileRobots, $updateRobots) === false) {
                    // En caso de error, restaura desde la copia de seguridad
                    copy($backupFile, $fileRobots);

                    return redirect()->back()->with('error', 'Failed to update robots.php. Changes have been reverted.');
                }

                return redirect()->back()->with('success', 'robots.php updated successfully.');
            }

            return redirect()->back()->with('error', 'Invalid content or no changes detected.');
        }

        return redirect()->back()->with('error', 'robots.php file not found.');
    }

    private function isValidRobotsContent($content)
    {
        // Implementa aquí tu lógica de validación del contenido de robots.php
        // Por ejemplo, puedes asegurarte de que el contenido no esté vacío y siga un formato válido.
        return ! empty($content);
    }

    public function robots()
    {
        $fileRobots = FCPATH . 'robots.php';
        $this->response->setContentType('text/plain');

        if (file_exists($fileRobots)) {
            ob_start();
            include $fileRobots;
            $content = ob_get_clean();

            return $this->response->setBody($content);
        }

        return $this->response->setBody("User-agent: *\nDisallow: /");
    }

    public function error404()
    {
        // Obtener el subdominio actual
        $subdomain = $this->request->getServer('HTTP_HOST');
        $subdomain = str_replace('www.', '', $subdomain);
        $subdomain = explode('.', $subdomain)[0];

        $this->response->setStatusCode(404);
        // Establecer el controlador de error 404 apropiado según el subdominio
        if ($subdomain === 'namesubdomain') {
            return view('landing/general/pages/error404');
        }

        return view('website/pages/error404');
    }

    public function sitemap()
    {
        $this->response->setContentType('text/xml');

        // Define el directorio de las vistas.
        $viewDirectory = config('Paths')->viewDirectory . '/';

        // Obtiene la fecha de la última modificación de una vista.
        $fileTime = static fn (string $view) => Time::createFromTimestamp(filemtime($viewDirectory . $view . '.php'))
            ->toLocalizedString("YYYY-MM-dd'T'HH:mm:ss+00:00");

        return view('website/pages/sitemap', [
            'fileTime' => $fileTime,
            'posts'    => $posts ?? [],
        ]);
    }
}
