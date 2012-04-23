<?php
function artblogazine_setup(){
load_theme_textdomain('artblogazine', get_template_directory() . '/translation');
require( get_template_directory() . '/custom/costum-css.php' );
require( get_template_directory() . '/custom/costum-template.php' );
add_theme_support( 'post-thumbnails' ); 
add_theme_support( 'automatic-feed-links' );
add_editor_style(); }
add_action( 'widgets_init', 'artblogazine_widgets_init' );
add_action( 'after_setup_theme', 'artblogazine_setup' );
add_action('wp_enqueue_scripts', 'artblogazine_enqueue_scripts_styles');
add_action( 'wp_enqueue_scripts', 'artblogazine_enqueue_comment_reply' );
add_action('admin_menu', 'artblogazine_pt_add_custom_box');
add_action('save_post', 'artblogazine_pt_save_postdata', 1, 2); 
add_action('the_content', 'artblogazine_inline');
add_action('publish_page','artblogazine_save_postdata');
add_action('publish_post','artblogazine_save_postdata');
add_action('save_post','artblogazine_save_postdata');
add_action('edit_post','artblogazine_save_postdata');
add_filter( 'excerpt_more', 'artblogazine_excerpt_more' );
add_filter( 'excerpt_length', 'artblogazine_excerpt_length' );
add_filter('single_template', 'artblogazine_get_post_template');
register_nav_menu( 'primary', __( 'Primary Menu', 'artblogazine' ) );
?>