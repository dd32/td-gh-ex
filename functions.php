<?php

/* Redesign, WP FUNCTIONS FILE */

add_action('after_setup_theme', 'redesign_theme_setup');

function redesign_theme_setup() {
	
load_theme_textdomain('redesign', get_template_directory() . '/languages');
	
//CONTENT WIDTH
global $content_width;
if ( ! isset( $content_width ) )
$content_width = 700;
	
//THEME SUPPORT

add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );

add_theme_support( 'title-tag' );

add_theme_support('post-thumbnails');

add_theme_support('automatic-feed-links');

add_editor_style( 'editor-style.css' );

add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	
add_theme_support( 'custom-logo' );
	

//CUSTOM BACKGROUND
$defaults = array(
	'default-color'          => '#EEEEEE',
	'default-image' => '%1$s/img/bridge.jpg',
	'wp-head-callback'       => '_custom_background_cb',
);
add_theme_support( 'custom-background', $defaults );

//ADD NAVIGATION
add_action( 'init', 'redesign_register_menus' );

//ADD SIDEBARS
add_action( 'widgets_init', 'redesign_register_sidebars' );

//ENQUE STYLESHEETS AND SCRIPTS
add_action( 'wp_enqueue_scripts', 'redesign_load_scripts' );

}

//FUNCTIONS

//MENU NAVIGATION
function redesign_register_menus() {
  register_nav_menus(
    array(
      	'top-menu' => __( 'Top Menu', 'redesign' ),
      	'primary-menu' => __( 'Primary Menu', 'redesign' ),
	'footer-menu' => __( 'Footer Menu', 'redesign' )
    )
  );
}

//WIDGET AREAS
function redesign_register_sidebars() {
	register_sidebar( array(
		'name' => __( 'Big banner', 'redesign' ),
		'id' => __( 'banner-1', 'redesign' ),
		'description' => __( 'One big widget area', 'redesign' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => __( 'Front cards', 'redesign' ),
		'id' => __( 'banner-2', 'redesign' ),
		'description' => __( '4 widget areas', 'redesign' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );


	register_sidebar( array(
		'name' => __( 'Front sidebar', 'redesign' ),
		'id' => __( 'sidebar-1', 'redesign' ),
		'description' => __( 'Sidebar widget area on front page', 'redesign' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => __( 'Post sidebar', 'redesign' ),
		'id' => __( 'sidebar-2', 'redesign' ),
		'description' => __( 'Sidebar widget area', 'redesign' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => __( 'Page sidebar', 'redesign' ),
		'id' => __( 'sidebar-3', 'redesign' ),
		'description' => __( 'Sidebar widget area', 'redesign' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );


	register_sidebar( array(
		'name' => __( 'Bottom', 'redesign' ),
		'id' => __( 'footer-1', 'redesign' ),
		'description' => __( 'Footer, 4 widget areas', 'redesign' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
}

//SCRIPTS THREADED COMMENTS
function redesign_load_scripts() {

	if ( is_singular() && get_option( 'thread_comments' ) && comments_open() )
		wp_enqueue_script( 'comment-reply' );
}

?>