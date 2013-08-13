<?php

/* REDESIGN, WP FUNCTIONS FILE */

add_action('after_setup_theme', 'redesign_theme_setup');

function redesign_theme_setup() {

//CONTENT WIDTH
if ( ! isset( $content_width ) ) $content_width = 460;

//ENQUE STYLESHEETS AND SCRIPTS
add_action( 'wp_enqueue_scripts', 'prefix_add_my_stylesheet' );

//POST THUMBNAILS
add_theme_support('post-thumbnails');

//POST AND COMMENTS RSS FEED LINKS
add_theme_support( 'automatic-feed-links' );

//CUSTOM BACKGROUND
$defaults = array(
	'default-color'          => '000000',
	'default-image'          => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );


//CUSTOM HEADER
$defaults = array(
	'random-default'         => false,
	'width'                  => 960,
	'height'                 => 200,
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => 222222,
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => custom-header,
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
	'default-image'          => '',
);
add_theme_support( 'custom-header', $defaults );

}

//FUNCTIONS

function prefix_add_my_stylesheet() {
        // Respects SSL, Style.css is relative to the current file
        wp_register_style( 'prefix-style', plugins_url('style.css', __FILE__) );
        wp_enqueue_style( 'prefix-style' );
    }

//WIDGET AREAS
function redesign_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Top', 'redesign' ),
		'description' => __( 'A top banner widget area', 'redesign' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => __( 'Middle', 'redesign' ),
		'description' => __( 'A banner widget area', 'redesign' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Main sidebar', 'redesign' ),
		'description' => __( 'A sidebar widget area', 'redesign' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => __( 'Extra sidebar', 'redesign' ),
		'description' => __( 'An additional sidebar widget area', 'redesign' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Bottom', 'redesign' ),
		'description' => __( 'A footer widget area', 'redesign' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
}
add_action( 'init', 'redesign_widgets_init' );

//MENU NAVIGATION
function register_my_menus() {
  register_nav_menus(
    array(
      'top-menu' => __( 'Top Menu' ),
      'primary-menu' => __( 'Primary Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// THREADED COMMENTS
function enable_threaded_comments(){
    if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
       wp_enqueue_script('comment-reply');
    }
}
add_action('get_header', 'enable_threaded_comments');

// ADD EDITOR STYLES
function my_theme_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );

?>