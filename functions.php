<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that Medical supports
	function medical_setup() { 
		// Set max content width for img, video, and more
			global $content_width; 
			if ( ! isset( $content_width ) )
			$content_width = 610;

		// Make theme available for translation
			load_theme_textdomain('medical', get_template_directory() . '/languages');  

		// Register Menu
			register_nav_menus( array( 
				'primary' => __( 'Primary Navigation', 'medical' ), 
		 	) ); 

		// Add document title
			add_theme_support( 'title-tag' );

		// Add editor styles
			add_editor_style( array( 'custom-editor-style.css', medical_font_url() ) );

		// Custom header	
			$header_args = array(		
				'width' => 460,
				'height' => 300,
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
					'description' => __( 'Default header', 'medical' )
				)
			) );

		// Post thumbnails
			add_theme_support( 'post-thumbnails' ); 

		// Resize thumbnails
			set_post_thumbnail_size( 250, 250 ); 

		// Resize single page thumbnail
			add_image_size( 'single', 250, 250 ); 

		// This feature adds RSS feed links to html head 
			add_theme_support( 'automatic-feed-links' );

		// Switch default core markup for search form, comment form, comments and caption to output valid html5
			add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'caption' ) );

		// Background color
			$background_args = array( 
				'default-color' => 'ffffff', 
			); 
			add_theme_support( 'custom-background', $background_args ); 

		// Post formats
			add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'gallery', 'audio' ) );
	}
	add_action( 'after_setup_theme', 'medical_setup' ); 


// Enqueues scripts and styles for front-end
	function medical_scripts() {
		wp_enqueue_style( 'medical-style', get_stylesheet_uri() );
		wp_enqueue_script( 'medical-nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
		wp_enqueue_style( 'medical-googlefonts', medical_font_url() ); 

		// Add html5 support for IE 8 and older 
		wp_enqueue_script( 'medical_html5', get_template_directory_uri() . '/js/ie.js' );
		wp_script_add_data( 'medical_html5', 'conditional', 'lt IE 9' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// mobile nav args
		$medical_mobile_nav_args = array(
			'navText' => __( 'Menu', 'medical' )
		);
		// localize script with data for mobile nav
		wp_localize_script( 'medical-nav', 'objectL10n', $medical_mobile_nav_args );
	}
	add_action( 'wp_enqueue_scripts', 'medical_scripts' );


// Font family
	function medical_font_url() {
		$font_url = '//fonts.googleapis.com/css?family=Open+Sans';
		return esc_url_raw( $font_url );
	}


// Sidebars
	function medical_widgets_init() {
		register_sidebar( array(
			'name' => __( 'Primary Sidebar', 'medical' ),
			'id' => 'primary',
			'description' => __( 'You can add one or multiple widgets here.', 'medical' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Homepage Sidebar', 'medical' ),
			'id' => 'homepage',
			'description' => __( 'You can add one or multiple widgets here.', 'medical' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Right', 'medical' ),
			'id' => 'footer-right',
			'description' => __( 'You can add one or multiple widgets here.', 'medical' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Middle', 'medical' ),
			'id' => 'footer-middle',
			'description' => __( 'You can add one or multiple widgets here.', 'medical' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Left', 'medical' ),
			'id' => 'footer-left',
			'description' => __( 'You can add one or multiple widgets here.', 'medical' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'medical_widgets_init' );


// Add class to post nav 
	function medical_post_next() { 
		return 'class="nav-next"'; 
	}
	add_filter('next_posts_link_attributes', 'medical_post_next', 999); 

	function medical_post_prev() { 
		return 'class="nav-prev"'; 
	}
	add_filter('previous_posts_link_attributes', 'medical_post_prev', 999); 


// Add class to comment nav 
	function medical_comment_next() { 
		return 'class="comment-next"'; 
	}
	add_filter('next_comments_link_attributes', 'medical_comment_next', 999); 

	function medical_comment_prev() { 
		return 'class="comment-prev"'; 
	}
	add_filter('previous_comments_link_attributes', 'medical_comment_prev', 999); 


// Custom excerpt lenght (default length is 55 words)
	function medical_excerpt_length( $length ) { 
		return 55; 
	} 
	add_filter( 'excerpt_length', 'medical_excerpt_length', 999 ); 


// Theme Customizer (logo)
	function medical_theme_customizer( $wp_customize ) { 
		$wp_customize->add_section( 'medical_logo_section' , array( 
			'title' => __( 'Logo', 'medical' ), 
			'priority' => 30, 
			'description' => __( 'Set a logo to replace site title and tagline.', 'medical' ),
		) );
		$wp_customize->add_setting( 'medical_logo', array( 
			'capability' => 'edit_theme_options', 
			'sanitize_callback' => 'esc_url_raw', 
		) ); 
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'medical_logo', array( 
			'label' => __( 'Logo', 'medical' ), 
			'section' => 'medical_logo_section', 
			'settings' => 'medical_logo', 
		) ) );
	} 
	add_action('customize_register', 'medical_theme_customizer');

?>