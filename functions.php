<?php
/**
 * @package Babylog
 */

require_once ( get_template_directory() . '/theme-options.php' );

add_action( 'wp_print_styles', 'bbl_print_styles' );

function bbl_print_styles() {
	if ( ! is_admin() ) {
		$options = get_option('babylog_theme_options');

		$bbl_themestyle = $options['radioinput'];

		if ( file_exists( get_template_directory() . '/pink.css' ) && 'pink' == $bbl_themestyle ) {
			wp_register_style( 'bbl_pink', get_template_directory_uri() . '/pink.css' );
			wp_enqueue_style( 'bbl_pink' );
		} else if ( file_exists( get_template_directory() . '/blue.css' ) && 'blue' == $bbl_themestyle ) {
			wp_register_style( 'bbl_blue', get_template_directory_uri() . '/blue.css' );
			wp_enqueue_style( 'bbl_blue' );
		} else if ( file_exists( get_template_directory() . '/green.css' ) && 'green' == $bbl_themestyle ) {
			wp_register_style( 'bbl_green', get_template_directory_uri() . '/green.css' );
			wp_enqueue_style( 'bbl_green' );
		} else if ( file_exists( get_template_directory() . '/purple.css' ) ){
			wp_register_style( 'bbl_purple', get_template_directory_uri() . '/purple.css' );
			wp_enqueue_style( 'bbl_purple' );
		}
	}
}

register_sidebar( array(
	'id' => 'right-sidebar',
	'name' => 'Right Sidebar',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>'
	) 
);

if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu( 'tabmenu', 'Top Navigation Menu' );
}
 
if ( ! isset( $content_width ) ) 
	$content_width = 670;

add_theme_support('automatic-feed-links');

add_custom_background();

?>