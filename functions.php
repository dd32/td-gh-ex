<?php



/**
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function arora_theme_setup() {
    load_child_theme_textdomain( 'arora', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'arora_theme_setup' );

