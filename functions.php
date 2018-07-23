<?php
add_action( 'wp_enqueue_scripts', 'awesome_business_theme_css',999);
function awesome_business_theme_css() {
    wp_enqueue_style( 'awesome-business-parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'awesome-business-child-style', get_stylesheet_uri(), array( 'awesome-business-parent-style' ) );
	wp_enqueue_style( 'awesome-business-default-css', get_stylesheet_directory_uri()."/css/colors/default.css" );
	wp_dequeue_style( 'default',get_template_directory_uri() .'/css/colors/default.css');
	wp_enqueue_script('jquery-sticky', get_stylesheet_directory_uri() . '/js/jquery.sticky.js', array('jquery'));
}
?>