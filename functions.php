<?php


function arix_scripts() {
	// load main stylesheet
	wp_enqueue_style( 'arix-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	// load scripts and styles for comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Google Font
	wp_enqueue_style( 'arix-fonts', '//fonts.googleapis.com/css?family=Dosis:300,500&display=swap' );
}
add_action( 'wp_enqueue_scripts', 'arix_scripts' );



function arix_functions() {
	load_theme_textdomain( 'arix', get_template_directory() . '/languages' );

	// add <title> in <head>
	add_theme_support( 'title-tag' );

	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'responsive-embeds' );

	add_theme_support( 'customize-selective-refresh-widgets' );

	// add RSS feed links in <head>
	add_theme_support( 'automatic-feed-links' );

	// featured image support
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1000, 1000 );

	// enable html5 features
	add_theme_support( 'html5', array(
		'comment-list',
		'comment-form',
		'gallery',
		'caption',
		'search-form',
	) );

	// custom background image support
	add_theme_support( 'custom-background', array(
		'default-image'       => get_template_directory_uri() . '/images/arix-background.jpg',
		'default-repeat'      => 'no-repeat',
		'default-position-x'  => 'center',
		'default-position-y'  => 'center',
		'default-attachment'  => 'fixed',
	) );

	// custom logo support
	add_theme_support( 'custom-logo', array(
		'height'      => 360,
		'width'       => 460,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	// navigation menu
	register_nav_menus( array(
	    'main_menu' => __( 'Main Menu', 'arix' )
	) );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'style-editor.css' );
}
add_action( 'after_setup_theme', 'arix_functions' );



// widget areas
function arix_widgets() {
	register_sidebar( array(
		'name'          => __( 'Sidebar 1', 'arix' ),
		'id'            => 'sidebar',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'arix' ),
		'id'            => 'footer',
		'before_widget' => '<section id="%1$s" class="widget one-third %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'arix_widgets' );



// set content width
function arix_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'arix_content_width', 1200 );
}
add_action( 'after_setup_theme', 'arix_content_width', 0 );


?>