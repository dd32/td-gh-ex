<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that theme supports
function darkorange_setup() {
	// Set max content width for img, video, and more
	global $content_width;
	if ( ! isset( $content_width ) )
	$content_width = 670;

	// Make theme available for translation
	load_theme_textdomain('darkorange', get_template_directory() . '/languages');

	// Register Menu
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'darkorange' ),
	) );

	// Add document title
	add_theme_support( 'title-tag' );

	// Add support for editor styles
	add_theme_support( 'editor-styles' );

	// Add editor styles
	add_editor_style( array( 'custom-editor-style.css', darkorange_font_url() ) );

	// Custom header
	$header_args = array(
		'width' => 650,
		'height' => 450,
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
			'description' => __( 'Default header', 'darkorange' )
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
		'default-color' => 'f2f2f2',
	);
	add_theme_support( 'custom-background', $background_args );

	// Post formats
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'gallery', 'audio' ) );
}
add_action( 'after_setup_theme', 'darkorange_setup' );

// Enqueues scripts and styles for front-end
function darkorange_scripts() {
	wp_enqueue_style( 'darkorange-style', get_stylesheet_uri() );
	wp_enqueue_script( 'darkorange-nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
	wp_enqueue_style( 'darkorange-googlefonts', darkorange_font_url() );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'darkorange_scripts' );

// Font family
function darkorange_font_url() {
	$font_url = '//fonts.googleapis.com/css?family=Open+Sans';
	return esc_url_raw( $font_url );
}

// Sidebars
function darkorange_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'darkorange' ),
		'id' => 'primary',
		'description' => __( 'You can add one or multiple widgets here.', 'darkorange' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Homepage Sidebar', 'darkorange' ),
		'id' => 'homepage',
		'description' => __( 'You can add one or multiple widgets here.', 'darkorange' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Right', 'darkorange' ),
		'id' => 'footer-right',
		'description' => __( 'You can add one or multiple widgets here.', 'darkorange' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Left', 'darkorange' ),
		'id' => 'footer-left',
		'description' => __( 'You can add one or multiple widgets here.', 'darkorange' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'darkorange_widgets_init' );

// Add class to post nav
function darkorange_post_next() {
	return 'class="nav-next"';
}
add_filter('next_posts_link_attributes', 'darkorange_post_next', 999);

function darkorange_post_prev() {
	return 'class="nav-prev"';
}
add_filter('previous_posts_link_attributes', 'darkorange_post_prev', 999);

// Add class to comment nav
function darkorange_comment_next() {
	return 'class="comment-next"';
}
add_filter('next_comments_link_attributes', 'darkorange_comment_next', 999);

function darkorange_comment_prev() {
	return 'class="comment-prev"';
}
add_filter('previous_comments_link_attributes', 'darkorange_comment_prev', 999);

// Custom excerpt lenght (default length is 55 words)
function darkorange_excerpt_length( $length ) {
	return 55;
}
add_filter( 'excerpt_length', 'darkorange_excerpt_length', 999 );

// Theme Customizer
function darkorange_theme_customizer( $wp_customize ) {
	$wp_customize->add_section( 'darkorange_logo_section' , array(
		'title' => __( 'Logo', 'darkorange' ),
		'priority' => 30,
		'description' => __( 'Set a logo to replace site title and tagline.', 'darkorange' ),
	) );
	$wp_customize->add_setting( 'darkorange_logo', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'darkorange_logo', array(
		'label' => __( 'Logo', 'darkorange' ),
		'section' => 'darkorange_logo_section',
		'settings' => 'darkorange_logo',
	) ) );
	$wp_customize->add_section( 'darkorange_blog_section' , array(
		'title' => __( 'Blog Page', 'darkorange' ),
		'priority' => 31,
		'description' => __( 'Set a page title and content above your posts.', 'darkorange' ),
	) );
	$wp_customize->add_setting( 'darkorange_blog_title', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'darkorange_blog_title', array(
		'label' => __( 'Title', 'darkorange' ),
		'section' => 'darkorange_blog_section',
		'settings' => 'darkorange_blog_title',
	) ) );
	$wp_customize->add_setting( 'darkorange_blog_content', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'darkorange_blog_content', array(
		'label' => __( 'Content', 'darkorange' ),
		'type' => 'textarea',
		'section' => 'darkorange_blog_section',
		'settings' => 'darkorange_blog_content',
	) ) );
	$wp_customize->add_section( 'darkorange_post_section' , array(
		'title' => __( 'Posts', 'darkorange' ),
		'priority' => 32,
		'description' => __( 'Customize the way how posts are displayed.', 'darkorange' ),
	) );
	$wp_customize->add_setting( 'darkorange_content_type', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => 'yes',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'darkorange_content_type', array(
		'label' => __( 'Show a summary', 'darkorange' ),
		'section' => 'darkorange_post_section',
		'settings' => 'darkorange_content_type',
		'type' => 'radio',
		'choices' => array(
			'yes' => __('Yes', 'darkorange'),
			'no' => __('No', 'darkorange'),
		),
	) ) );
	$wp_customize->add_setting( 'darkorange_read_more', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => 'yes',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'darkorange_read_more', array(
		'label' => __( 'Show Read More button', 'darkorange' ),
		'section' => 'darkorange_post_section',
		'settings' => 'darkorange_read_more',
		'type' => 'radio',
		'choices' => array(
			'yes' => __('Yes', 'darkorange'),
			'no' => __('No', 'darkorange'),
		),
	) ) );
}
add_action('customize_register', 'darkorange_theme_customizer');
