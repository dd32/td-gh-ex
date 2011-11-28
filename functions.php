<?php
/**
 * @package Babylog
 */

require_once ( get_template_directory() . '/theme-options.php' );

add_action( 'wp_print_styles', 'bbl_print_styles' );

function bbl_print_styles() {
	if ( ! is_admin() ) {
		
		wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Vidaloka');
		wp_enqueue_style( 'googleFonts');
 
		$options = get_option('babylog_theme_options');
		
		$bbl_themestyle = $options['blogcolorinput'];
		$bbl_skin = $options['skincolorinput'];
		$bbl_hair = $options['haircolorinput'];
		$bbl_customcss = $options['customcss'];

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
		
		if ( $bbl_themestyle ) { 
			$color = $options['blogcolorinput'];
		} else {
			$color = "purple";
		}
		
		if ( $bbl_skin ) { 
			$skin = $options['skincolorinput'];
		} else {
			$skin = "light";
		}
		
		if ( $bbl_hair ) { 
			$hair = $options['haircolorinput'];
		} else {
			$hair = "brown";
		}
		
		echo "<style type='text/css'>";
		echo ".baby-graphic { background-image:url(" . get_template_directory_uri() . "/images/" . $color . "-" . $skin . "-" . $hair . '.png) }';
		echo "\n";
		if ( $bbl_customcss ) { 
			echo $bbl_customcss; 
		}
		echo "</style>";	}
		 
}
function babylog_sidebars() {
	
	register_sidebar( array(
		'id' => 'right-sidebar',
		'name' => __( 'Right Sidebar', 'babylog' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>'
		) 
	);
}

add_action( 'widgets_init', 'babylog_sidebars' );

function babylog_scripts(){
	if ( !is_admin() && is_singular() && get_option( 'thread_comments' ) ) 
		wp_enqueue_script( 'comment-reply' ); 
}

add_action( 'wp_enqueue_scripts', 'babylog_scripts' );

function babylog_admin_scripts() { 
	
	if ( is_admin() ) {
		wp_register_script( 'admin-controls', get_template_directory_uri() . '/admin.js' );	
		$babylogdirectory = array( 'directory' => get_template_directory_uri() . "/images/" );
		wp_localize_script( 'admin-controls', 'template', $babylogdirectory );
		
		wp_enqueue_script( 'admin-controls' );
	}
}
		
add_action( 'admin_init', 'babylog_admin_scripts' );

if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu( 'tabmenu', 'Top Navigation Menu' );
}
 
if ( ! isset( $content_width ) ) 
	$content_width = 670;

add_theme_support('automatic-feed-links');

add_custom_background();

load_theme_textdomain( 'babylog', get_template_directory() . '/languages' );

$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
if ( is_readable( $locale_file ) ) {
	require_once( $locale_file );
}

?>