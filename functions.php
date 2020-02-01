<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that theme supports
function shipyard_setup() {
	// Set max content width for img, video, and more
	global $content_width;
	if ( ! isset( $content_width ) )
	$content_width = 690;

	// Make theme available for translation
	load_theme_textdomain('shipyard', get_template_directory() . '/languages');

	// Register Menu
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'shipyard' ),
	) );

	// Add document title
	add_theme_support( 'title-tag' );

	// Add support for editor styles
	add_theme_support( 'editor-styles' );

	// Add editor styles
	add_editor_style( array( 'custom-editor-style.css', shipyard_font_url() ) );

	// Custom header
	$header_args = array(
		'width' => 1160,
		'height' => 350,
		'default-image' => get_template_directory_uri() . '/images/boats.jpg',
		'header-text' => false,
		'uploads' => true,
	);	
	add_theme_support( 'custom-header', $header_args );

	// Default header
	register_default_headers( array(
		'boats' => array(
			'url' => get_template_directory_uri() . '/images/boats.jpg',
			'thumbnail_url' => get_template_directory_uri() . '/images/boats.jpg',
			'description' => __( 'Default header', 'shipyard' )
		)
	) );

	// Post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Resize thumbnails
	set_post_thumbnail_size( 300, 300 );

	// This feature adds RSS feed links to html head
	add_theme_support( 'automatic-feed-links' );

	// Switch default core markup for search form, comment form, comments and caption to output valid html5
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'caption' ) );

	// Background color
	$background_args = array(
		'default-color' => 'f8f8f8',
	);
	add_theme_support( 'custom-background', $background_args );

	// Post formats
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'gallery', 'audio' ) );
}
add_action( 'after_setup_theme', 'shipyard_setup' );

// Enqueues scripts and styles for front-end
function shipyard_scripts() {
	wp_enqueue_style( 'shipyard-style', get_stylesheet_uri() );
	wp_enqueue_script( 'shipyard-nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
	wp_enqueue_style( 'shipyard-googlefonts', shipyard_font_url() );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shipyard_scripts' );

// Font family
function shipyard_font_url() {
	$font_url = '//fonts.googleapis.com/css?family=Open+Sans';
	return esc_url_raw( $font_url );
}

// Sidebars
function shipyard_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'shipyard' ),
		'id' => 'primary',
		'description' => __( 'You can add one or multiple widgets here.', 'shipyard' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Right', 'shipyard' ),
		'id' => 'footer-right',
		'description' => __( 'You can add one or multiple widgets here.', 'shipyard' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Left', 'shipyard' ),
		'id' => 'footer-left',
		'description' => __( 'You can add one or multiple widgets here.', 'shipyard' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'shipyard_widgets_init' );

// Add class to post nav
function shipyard_post_next() {
	return 'class="nav-next"';
}
add_filter('next_posts_link_attributes', 'shipyard_post_next', 999);

function shipyard_post_prev() {
	return 'class="nav-prev"';
}
add_filter('previous_posts_link_attributes', 'shipyard_post_prev', 999);

// Add class to comment nav
function shipyard_comment_next() {
	return 'class="comment-next"';
}
add_filter('next_comments_link_attributes', 'shipyard_comment_next', 999);

function shipyard_comment_prev() {
	return 'class="comment-prev"';
}
add_filter('previous_comments_link_attributes', 'shipyard_comment_prev', 999);

// Custom excerpt lenght (default length is 55 words)
function shipyard_excerpt_length( $length ) {
	return 55;
}
add_filter( 'excerpt_length', 'shipyard_excerpt_length', 999 );

// Theme Customizer
function shipyard_theme_customizer( $wp_customize ) {
	$wp_customize->add_section( 'shipyard_logo_section' , array(
		'title' => __( 'Logo', 'shipyard' ),
		'priority' => 30,
		'description' => __( 'Set a logo to replace site title and tagline.', 'shipyard' ),
	) );
	$wp_customize->add_setting( 'shipyard_logo', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'shipyard_logo', array(
		'label' => __( 'Logo', 'shipyard' ),
		'section' => 'shipyard_logo_section',
		'settings' => 'shipyard_logo',
	) ) );
	$wp_customize->add_section( 'shipyard_blog_section' , array(
		'title' => __( 'Blog Page', 'shipyard' ),
		'priority' => 31,
		'description' => __( 'Set a page title and content above your posts.', 'shipyard' ),
	) );
	$wp_customize->add_setting( 'shipyard_blog_title', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shipyard_blog_title', array(
		'label' => __( 'Title', 'shipyard' ),
		'section' => 'shipyard_blog_section',
		'settings' => 'shipyard_blog_title',
	) ) );
	$wp_customize->add_setting( 'shipyard_blog_content', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shipyard_blog_content', array(
		'label' => __( 'Content', 'shipyard' ), 
		'type' => 'textarea', 
		'section' => 'shipyard_blog_section', 
		'settings' => 'shipyard_blog_content', 
	) ) );
	$wp_customize->add_section( 'shipyard_post_section' , array(
		'title' => __( 'Posts', 'shipyard' ),
		'priority' => 32,
		'description' => __( 'Customize the way how posts are displayed.', 'shipyard' ),
	) );
	$wp_customize->add_setting( 'shipyard_content_type', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => 'yes',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shipyard_content_type', array(
		'label' => __( 'Show a summary', 'shipyard' ),
		'section' => 'shipyard_post_section',
		'settings' => 'shipyard_content_type',
		'type' => 'radio',
		'choices' => array(
			'yes' => __('Yes', 'shipyard'),
			'no' => __('No', 'shipyard'),
		),
	) ) );
	$wp_customize->add_setting( 'shipyard_read_more', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => 'yes',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shipyard_read_more', array(
		'label' => __( 'Show Read More button', 'shipyard' ),
		'section' => 'shipyard_post_section',
		'settings' => 'shipyard_read_more',
		'type' => 'radio',
		'choices' => array(
			'yes' => __('Yes', 'shipyard'),
			'no' => __('No', 'shipyard'),
		),
	) ) );
}
add_action('customize_register', 'shipyard_theme_customizer');
