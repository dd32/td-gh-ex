<?php



/**
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function arora_theme_setup() {
    load_child_theme_textdomain( 'arora', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'arora_theme_setup' );


//Load Java Scripts to header
function arora_head_js() { 
if ( !is_admin() ) {
wp_enqueue_script('jquery');
wp_enqueue_script('hathor_js',get_template_directory_uri().'/other2.js');





}
}
add_action('wp_enqueue_scripts', 'arora_head_js');