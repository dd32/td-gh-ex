<?php

/**
 * Load theme updater functions.
 * Action is used so that child themes can easily disable.
 * 
 * @package WordPress
 * @subpackage Artwork
 * @since Artwork 1.1.0
 */

function mp_artwork_updater() {
    require( get_template_directory() . '/classes/theme/theme-updater.php' );
}

add_action('after_setup_theme', 'mp_artwork_updater');
