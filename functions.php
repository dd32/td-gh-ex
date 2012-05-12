<?php
function batik_setup(){
load_theme_textdomain('batik', get_template_directory() . '/languages');
add_theme_support( 'post-thumbnails' ); 
add_theme_support( 'automatic-feed-links' );
add_editor_style();
add_custom_image_header('', 'batik_admin_header_style');}
require( get_template_directory() . '/custom/custom-function.php' );
require( get_template_directory() . '/options/theme-options.php' );
add_action('admin_init', 'batik_theme_options_init');
add_action('admin_menu', 'batik_theme_options_add_page');
add_action('wp_head', 'batik_google_verification');
add_action('wp_head', 'batik_bing_verification');
add_action( 'widgets_init', 'batik_widgets_init' );
add_action( 'after_setup_theme', 'batik_setup' );
add_action('wp_enqueue_scripts', 'batik_enqueue_scripts_styles');
add_action( 'wp_enqueue_scripts', 'batik_enqueue_comment_reply' );
add_filter( 'excerpt_more', 'batik_excerpt_more' );
add_filter( 'excerpt_length', 'batik_excerpt_length' );
add_filter('the_title', 'batik_takberjudul');
register_nav_menu( 'primary', __( 'Primary Menu', 'batik' ) );
?>