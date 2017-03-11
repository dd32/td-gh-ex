<?php
/**
 * Loads the child theme textdomain.
 */
function savoy_child_theme_setup() {
    load_child_theme_textdomain( 'savoy');
}
add_action( 'after_setup_theme', 'savoy_child_theme_setup' );

function savoy_child_enqueue_styles() {
    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	 
}
add_action( 'wp_enqueue_scripts', 'savoy_child_enqueue_styles',99);
?>