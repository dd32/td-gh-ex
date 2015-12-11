<?php
add_action( 'wp_enqueue_scripts', 'appointment_green_theme_css',999);
function appointment_green_theme_css() {
    wp_enqueue_style( 'appointment-green-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'appointment-green-child-style', get_stylesheet_uri(), array( 'appointment-green-parent-style' ) );
	wp_enqueue_style( 'appointment-green-child-menu', get_stylesheet_directory_uri()."/css/theme-menu.css" );
}
?>