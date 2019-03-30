<?php
/**
 * Load Kirki options if plugin is installed
 *
 * @package beam
 */
function kirki_toolkit()
{
    if ( class_exists( 'Kirki' ) ) {
        require_once BEAM_THEME_DIR . 'options-config.php';
    }
}
add_action('after_setup_theme', 'kirki_toolkit');
