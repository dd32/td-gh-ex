<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that SimplyBlack supports
	function simplyblack_setup() { 
		// Set max content width for img, video, and more
			global $content_width; 
			if ( ! isset( $content_width ) )
			$content_width = 760;

		// Make theme available for translation
			load_theme_textdomain('simplyblack', get_template_directory() . '/languages');  

		// Register Menu
			register_nav_menus( array( 
				'primary' => __( 'Primary Navigation', 'simplyblack' ), 
		 	) ); 

		// Add document title
			add_theme_support( 'title-tag' );

		// Add editor styles
			add_editor_style( array( 'custom-editor-style.css', simplyblack_font_url() ) );

		// Custom header	
			$header_args = array(		
				'width' => 1160,
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
					'description' => __( 'Default header', 'simplyblack' )
				)
			) );

		// Post thumbnails
			add_theme_support( 'post-thumbnails' ); 

		// Resize thumbnails
			set_post_thumbnail_size( 300, 300 ); 

		// Resize single page thumbnail
			add_image_size( 'single', 300, 300 ); 

		// This feature adds RSS feed links to html head 
			add_theme_support( 'automatic-feed-links' );

		// Switch default core markup for search form, comment form, comments and caption to output valid html5
			add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'caption' ) );

		// Background color
			$background_args = array( 
				'default-color' => '333333', 
			); 
			add_theme_support( 'custom-background', $background_args ); 

		// Post formats
			add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'gallery', 'audio' ) );
	}
	add_action( 'after_setup_theme', 'simplyblack_setup' ); 


// Enqueues scripts and styles for front-end
	function simplyblack_scripts() {
		wp_enqueue_style( 'simplyblack-style', get_stylesheet_uri() );
		wp_enqueue_script( 'simplyblack-nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
		wp_enqueue_style( 'simplyblack-googlefonts', simplyblack_font_url() ); 

		// Add html5 support for IE 8 and older 
		wp_enqueue_script( 'simplyblack_html5', get_template_directory_uri() . '/js/ie.js' );
		wp_script_add_data( 'simplyblack_html5', 'conditional', 'lt IE 9' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// mobile nav args
		$simplyblack_mobile_nav_args = array(
			'navText' => __( 'Menu', 'simplyblack' )
		);
		// localize script with data for mobile nav
		wp_localize_script( 'simplyblack-nav', 'objectL10n', $simplyblack_mobile_nav_args );
	}
	add_action( 'wp_enqueue_scripts', 'simplyblack_scripts' );


// Font family
	function simplyblack_font_url() {
		$font_url = '//fonts.googleapis.com/css?family=Open+Sans';
		return esc_url_raw( $font_url );
	}


// Sidebars
	function simplyblack_widgets_init() {
		register_sidebar( array(
			'name' => __( 'Primary Sidebar', 'simplyblack' ),
			'id' => 'primary',
			'description' => __( 'You can add one or multiple widgets here.', 'simplyblack' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Right', 'simplyblack' ),
			'id' => 'footer-right',
			'description' => __( 'You can add one or multiple widgets here.', 'simplyblack' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Middle', 'simplyblack' ),
			'id' => 'footer-middle',
			'description' => __( 'You can add one or multiple widgets here.', 'simplyblack' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Left', 'simplyblack' ),
			'id' => 'footer-left',
			'description' => __( 'You can add one or multiple widgets here.', 'simplyblack' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'simplyblack_widgets_init' );


// Add class to post nav 
	function simplyblack_post_next() { 
		return 'class="nav-next"'; 
	}
	add_filter('next_posts_link_attributes', 'simplyblack_post_next', 999); 

	function simplyblack_post_prev() { 
		return 'class="nav-prev"'; 
	}
	add_filter('previous_posts_link_attributes', 'simplyblack_post_prev', 999); 


// Add class to comment nav 
	function simplyblack_comment_next() { 
		return 'class="comment-next"'; 
	}
	add_filter('next_comments_link_attributes', 'simplyblack_comment_next', 999); 

	function simplyblack_comment_prev() { 
		return 'class="comment-prev"'; 
	}
	add_filter('previous_comments_link_attributes', 'simplyblack_comment_prev', 999); 


// Custom excerpt lenght (default length is 55 words)
	function simplyblack_excerpt_length( $length ) { 
		return 55; 
	} 
	add_filter( 'excerpt_length', 'simplyblack_excerpt_length', 999 ); 


// Theme Customizer (logo)
	function simplyblack_theme_customizer( $wp_customize ) { 
		$wp_customize->add_section( 'simplyblack_logo_section' , array( 
			'title' => __( 'Logo', 'simplyblack' ), 
			'priority' => 30, 
			'description' => __( 'Set a logo to replace site title and tagline.', 'simplyblack' ),
		) );
		$wp_customize->add_setting( 'simplyblack_logo', array( 
			'capability' => 'edit_theme_options', 
			'sanitize_callback' => 'esc_url_raw', 
		) ); 
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'simplyblack_logo', array( 
			'label' => __( 'Logo', 'simplyblack' ), 
			'section' => 'simplyblack_logo_section', 
			'settings' => 'simplyblack_logo', 
		) ) );
	} 
	add_action('customize_register', 'simplyblack_theme_customizer');

?>