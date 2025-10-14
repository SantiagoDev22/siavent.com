<?php

/**
 * This file is part of CodeIgniter 4 Framework.
 *
 * (c) 2023 Powered by Develogy™ <soporte@develogy.mx>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

/**
 * Valida si la URL actual es hijo de la URL del nombre de una ruta.
 */
function url_is_child(string $routeName)
{
    $path = single_service('uri', url_to($routeName))->getPath();

    return url_is($path . '*');
}
