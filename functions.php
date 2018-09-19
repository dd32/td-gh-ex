<?php
add_action( 'wp_enqueue_scripts', 'rockers_theme_css',999);
function rockers_theme_css() {
    wp_enqueue_style( 'rockers-parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style('bootstrap', ST_TEMPLATE_DIR . '/css/bootstrap.css');
	wp_enqueue_style('theme-menu-style', get_stylesheet_directory_uri().'/css/theme-menu.css');
    wp_enqueue_style('rockers-child-style',get_stylesheet_directory_uri() . '/style.css',array('parent-style'));
	wp_enqueue_style('default-style-css', get_stylesheet_directory_uri()."/css/default.css" );
	wp_enqueue_style('media-responsive-css', get_stylesheet_directory_uri()."/css/media-responsive.css" );
	wp_dequeue_style('default-css', get_template_directory_uri() .'/css/default.css');
	
}

require( get_stylesheet_directory() .'/functions/widgets/wdl_social_icon.php');
require( get_stylesheet_directory() .'/functions/widgets/wdl_header_topbar_info_ct_widget.php');
require( get_stylesheet_directory() . '/functions/widgets/sidebars.php');



if ( ! function_exists( 'rockers_theme_setup' ) ) :

function rockers_theme_setup() {

//Load text domain for translation-ready
load_theme_textdomain( 'rockers', get_stylesheet_directory() . '/languages' );

require( get_stylesheet_directory() . '/functions/rockers-info/welcome-screen.php' );
require( get_stylesheet_directory() . '/functions/customizer/customizer_general_settings.php' );

}
endif; 
add_action( 'after_setup_theme', 'rockers_theme_setup' );

add_action( 'admin_init', 'rockers_detect_button' );
	function rockers_detect_button() {
	wp_enqueue_style('rockers-info-button', get_stylesheet_directory_uri().'/css/import-button.css');
}

/**
 * Import options from SpicePress
 *
 */
function rockers_get_lite_options() {
	$spicepress_mods = get_option( 'theme_mods_spicepress' );
	if ( ! empty( $spicepress_mods ) ) {
		foreach ( $spicepress_mods as $spicepress_mod_k => $spicepress_mod_v ) {
			set_theme_mod( $spicepress_mod_k, $spicepress_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'rockers_get_lite_options' );