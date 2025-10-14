<?php

/**
 * This file is part of CodeIgniter 4 Framework.
 *
 * (c) 2023 Powered by Develogy™ <soporte@develogy.mx>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use CodeIgniter\I18n\Time;

// Formatea una fecha al formato W3C Datetime.
function w3cDate(string $date)
{
    return Time::parse($date)->toLocalizedString("YYYY-MM-dd'T'HH:mm:ss+00:00");
}

/**
 * Humaniza una fecha.
 */
function format_date_humanize(string $date)
{
    return Time::parse($date)->toLocalizedString('dd MMMM, YYYY - hh:mm a');
}
