<?php

/**
 * This file is part of CodeIgniter 4 Framework.
 *
 * (c) 2023 Powered by Develogy™ <soporte@develogy.mx>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Validation;

use CodeIgniter\I18n\Time;

class OtherValidations
{
    // public function custom_rule(): bool
    // {
    //     return true;
    // }

    /**
     * Valida que una contraseña no contenga espacios o secuencias de escape.
     */
    public function password(string $password): bool
    {
        return ctype_graph($password);
    }

    /**
     * Valida que una fecha sea mayor o igual a la fecha actual.
     */
    public function date_greater_than_equal_to_now(string $date): bool
    {
        return Time::parse($date)->isAfter(Time::now());
    }
}
