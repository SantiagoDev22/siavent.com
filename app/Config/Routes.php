<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/*
* --------------------------------------------------------------------
* Router Setup
* --------------------------------------------------------------------
*/
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Landing\Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->group('login', ['filter' => 'authredirect'], static function ($routes) {
    $routes->get('', 'Backend\Auth::login', ['as' => 'backend.auth.login']);
    $routes->post('', 'Backend\Auth::login', ['as' => 'backend.auth.login', 'filter' => 'formsrates']);
    $routes->get('recuperacion', 'Backend\Auth::forgotten', ['as' => 'backend.auth.forgotten']);
    $routes->post('recuperacion', 'Backend\Auth::forgotten', ['as' => 'backend.auth.forgotten', 'filter' => 'formsrates']);
    $routes->get('cambiar-contrasena/(:segment)/(:hash)', 'Backend\Auth::recovery/$1/$2', ['as' => 'backend.auth.recovery']);
    $routes->post('cambiar-contrasena/(:segment)/(:hash)', 'Backend\Auth::recovery/$1/$2', ['as' => 'backend.auth.recovery', 'filter' => 'formsrates']);
});

$routes->group('dashboard', ['filter' => 'auth'], static function ($routes) {
    $routes->get('', 'Backend\Dashboard::index');

    // Ruta de cierre de sesión
    $routes->get('logout', 'Backend\Auth::logout', ['as' => 'backend.auth.logout']);

    // Definición de rutas de la cuenta del usuario de sesión.
    $routes->match(['GET', 'POST'], 'mis-datos/(:segment)', 'Backend\Account::update/$1', ['as' => 'backend.account.update']);

    // Definición de rutas de configuración del backend.
    $routes->group('configuraciones', ['filter' => 'auth'], ['filter' => 'isadmin'], static function ($routes) {
        $routes->get('', 'Backend\Settings::general', ['as' => 'backend.settings.index']);
        $routes->match(['GET', 'POST'], 'general', 'Backend\Settings::general', ['as' => 'backend.settings.general']);
        $routes->match(['GET', 'POST'], 'correos', 'Backend\Settings::emails', ['as' => 'backend.settings.emails']);
        $routes->match(['GET', 'POST'], 'integraciones', 'Backend\Settings::integrations', ['as' => 'backend.settings.integrations']);
        // ruta para actualizar robots.txt
        $routes->match(['GET', 'POST'], 'robots-update', 'Website\Configurations::updateRobots', ['as' => 'backend.modules.robots.update']);
    });

    // Definición de rutas de administración de usuarios al backend.
    $routes->group('usuarios', ['filter' => 'auth'], ['filter' => 'isadmin'], static function ($routes) {
        $routes->get('', 'Backend\Users::index', ['as' => 'backend.users.index']);
        $routes->match(['GET', 'POST'], 'nuevo', 'Backend\Users::create', ['as' => 'backend.users.create']);
        $routes->match(['GET', 'POST'], 'modificar/(:segment)', 'Backend\Users::update/$1', ['as' => 'backend.users.update']);
        $routes->post('alternar-cuenta/(:segment)', 'Backend\Users::toggleActive/$1', ['as' => 'backend.users.toggleActive']);
        $routes->post('eliminar/(:segment)', 'Backend\Users::delete/$1', ['as' => 'backend.users.delete']);
    });

    // Definición de rutas de todos los módulos del backend.
    $routes->group('modulos', static function ($routes) {
        // Definición de rutas del módulo de prospectos.
        $routes->group('prospectos', ['filter' => 'auth'], static function ($routes) {
            // route default prospects
            $routes->get('', 'Backend\Modules\Prospects::index', ['as' => 'backend.modules.prospects.index']);
            // route to show prospects
            $routes->get('(:segment)', 'Backend\Modules\Prospects::show/$1', ['as' => 'backend.modules.prospects.show']);
            // route to delete prospects
            $routes->post('eliminar/(:segment)', 'Backend\Modules\Prospects::delete/$1', ['as' => 'backend.modules.prospects.delete', 'filter' => 'isnotanalyst']);
            $routes->post('marcar/(:segment)', 'Backend\Modules\Prospects::ready/$1', ['as' => 'backend.modules.prospects.ready', 'filter' => 'isnotanalyst']);
            // route to prospects download
            $routes->get('descargar', 'Backend\Modules\Prospects::download', ['as' => 'backend.modules.prospects.download']);

            // $routes->match(['GET', 'POST'], 'modificar/(:segment)', 'Backend\Modules\Prospects::update/$1', ['as' => 'backend.modules.prospects.update', 'filter' => 'isnotanalyst']);
        });

        // Definición de rutas del módulo del landing.
        $routes->group('landing', ['filter' => 'auth'], static function ($routes) {
            // route default
            $routes->get('', 'Backend\Modules\Landings::index', ['as' => 'backend.modules.landing.index']);
            // route to get and post create landing
            $routes->get('nuevo', 'Backend\Modules\Landings::create', ['as' => 'backend.modules.landing.create', 'filter' => 'isnotanalyst']);
            $routes->post('nuevo', 'Backend\Modules\Landings::store', ['as' => 'backend.modules.landing.create', 'filter' => 'isnotanalyst']);
            $routes->post('files', 'Backend\Modules\Landings::uploaded', ['as' => 'backend.modules.posts.updloaded']);
            // route to delete landing
            $routes->post('eliminar/(:segment)', 'Backend\Modules\Landings::delete/$1', ['as' => 'backend.modules.landing.delete', 'filter' => 'isnotanalyst']);
            // route to update landing
            $routes->match(['GET', 'POST'], 'actualizar/(:segment)', 'Backend\Modules\Landings::update/$1', ['as' => 'backend.modules.landing.update', 'filter' => 'isnotanalyst']);
            // route to update landing
            $routes->match(['GET', 'POST'], 'duplicar/(:segment)', 'Backend\Modules\Landings::copy/$1', ['as' => 'backend.modules.landing.copy', 'filter' => 'isnotanalyst']);
            // route to show landing
            $routes->get('(:segment)', 'Backend\Modules\Landings::show/$1', ['as' => 'backend.modules.landing.show']);
        });
        $routes->get('', 'Backend\Dashboard::index');
    });
    // Ruta por defecto.
    $routes->get('inicio', 'Backend\Dashboard::index', ['as' => 'backend.dashboard.index']);
});

/**
 * Definición de rutas para subdominios modo production.
 */
$routes->environment('production', static function ($routes) {
    $routes->group('/', ['subdomain' => 'landing'], static function ($routes) {
        $routes->get('gracias', 'Landing\Pages::thanks', ['as' => 'landing.pages.thanks']);
        $routes->get('aviso-privacidad', 'Landing\Pages::privacy', ['as' => 'website.pages.privacy']);
        // Index
        $routes->post('gracias', 'Landing\Pages::prospects', ['as' => 'landing.pages.prospects']);
        $routes->get('(:segment)', 'Landing\Pages::index/$1', ['as' => 'landing.pages.index']);

        // Thanks
        $routes->addRedirect('', 'la-opcion-para-planear-tu-graduacion');
    });
});

/**
 * Definición de rutas para subdominios modo desarrollo.
 */
$routes->environment('development', static function ($routes) {
    $routes->group('landing', static function ($routes) {
        $routes->get('gracias', 'Landing\Pages::thanks', ['as' => 'landing.pages.thanks']);
        $routes->get('aviso-privacidad', 'Landing\Pages::privacy', ['as' => 'website.pages.privacy']);
        // Index
        $routes->post('gracias', 'Landing\Pages::prospects', ['as' => 'landing.pages.prospects']);
        $routes->get('(:segment)', 'Landing\Pages::index/$1', ['as' => 'landing.pages.index']);

        // Thanks
        $routes->addRedirect('', 'la-opcion-para-planear-tu-graduacion');
    });
});


/**
 * Rutas de configuraciones de sitio web
 */
$routes->get('robots.txt', 'Website\Configurations::robots', ['as' => 'website.pages.robots']);

$routes->get('sitemap.xml', 'Website\Configurations::sitemap', ['as' => 'website.pages.sitemap']);

$routes->get('gracias', 'Landing\Pages::thanks', ['as' => 'landing.pages.thanks']);

$routes->post('gracias', 'Landing\Pages::prospects', ['as' => 'landing.pages.prospects']);

$routes->get('aviso-privacidad', 'Landing\Pages::privacy', ['as' => 'website.pages.privacy']);

$routes->get('(:segment)', 'Landing\Pages::index/$1', ['as' => 'website.pages.index']);

$routes->addRedirect('/', 'la-opcion-para-planear-tu-graduacion');

$routes->environment('production', static function ($routes) {
    // The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
    $routes->set404Override('App\Controllers\Website\Configurations::error404');
});
