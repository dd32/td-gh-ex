<?php
/**
 * Load Kirki options if plugin is installed
 *
 * @package beam
 */
function kirki_toolkit()
{
    if (is_plugin_active('kirki/kirki.php')) {
        require_once BEAM_THEME_DIR . 'options-config.php';
    }
}
add_action('after_setup_theme', 'kirki_toolkit');
