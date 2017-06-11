<?php
/**
 * Template tags for the theme.
 *
 * @package Aplos
 * @since Aplos 1.2.0
 */

if (! function_exists('aplos_sanitize_columns')) :
/**
 * Sanitize a column layout selection.
 *
 * @since Aplos 1.2.0
 */
function aplos_sanitize_columns($column)
{
    return strtolower(trim($column)) === 'threecol' ? 'threecol' : 'twocol';
}
endif; // aplos_sanitize_columns

if (! function_exists('aplos_sanitize_boolean')) :
/**
 * Sanitize a boolean value.
 *
 * @since Aplos 1.2.0
 */
function aplos_sanitize_boolean($boolean)
{
    return $boolean == true ? true : false;
}
endif; // aplos_sanitize_boolean

if (! function_exists('aplos_sanitize_font')) :
/**
 * Sanitize a font selection.
 *
 * @since Aplos 1.2.0
 */
function aplos_sanitize_font($font)
{
    $font = strtolower(str_replace(array('"', "'"), '', trim($font)));

    switch ($font) {
        case 'bebasneue':
        default:
            return 'BebasNeue';
        case 'roboto condensed':
            return '\'Roboto Condensed\'';
        case 'verdana':
            return 'Verdana';
    }
}
endif; // aplos_sanitize_font
