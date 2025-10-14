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
 * Elimina todos los espacios sobrantes de un string.
 */
function trimAll(?string $str)
{
    return trim(preg_replace('/\s+/', ' ', $str ?? ''));
}

/**
 * Convierte un string a minúsculas.
 */
function lowerCase(?string $str)
{
    return mb_strtolower($str ?? '', 'utf-8');
}

/**
 * Elimina todos los espacios de un string.
 */
function stripAllSpaces(?string $str)
{
    return preg_replace('/\s+/', '', $str ?? '');
}

/**
 * Elimina espacios de principio y fin de un string.
 */
function strtrim(?string $str)
{
    return trim($str ?? '');
}

/**
 * Formatea el precio de un producto.
 */
function price_format(float $num)
{
    return number_format($num, 2);
}

/**
 * Busca un elemento de un array asociativo
 * dentro de una array de arrays asociativos.
 *
 * @param mixed $input
 */
function array_item_search(array $array, string $column, $input)
{
    $stack = array_column($array, $column);

    return array_search($input, $stack, true);
}

/**
 * Formatea el precio de un producto.
 */
function format_price(float $num)
{
    return number_format($num, 2);
}
