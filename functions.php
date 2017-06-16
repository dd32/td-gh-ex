<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that PrivateBusiness supports
	function privatebusiness_setup() { 
		// Set max content width for img, video, and more
			global $content_width; 
			if ( ! isset( $content_width ) )
			$content_width = 720;

		// Make theme available for translation
			load_theme_textdomain('privatebusiness', get_template_directory() . '/languages');  

		// Register Menu
			register_nav_menus( array( 
				'primary' => __( 'Primary Navigation', 'privatebusiness' ),
				'secondary' => __( 'Secondary Navigation', 'privatebusiness' ), 
		 	) ); 

		// Add document title
			add_theme_support( 'title-tag' );

		// Add editor styles
			add_editor_style( array( 'custom-editor-style.css', privatebusiness_font_url() ) );

		// Custom header	
			$header_args = array(		
				'width' => 1200,
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
					'description' => __( 'Default header', 'privatebusiness' )
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
				'default-color' => 'eeeeee', 
			); 
			add_theme_support( 'custom-background', $background_args ); 

		// Post formats
			add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'gallery', 'audio' ) );
	}
	add_action( 'after_setup_theme', 'privatebusiness_setup' ); 


// Enqueues scripts and styles for front-end
	function privatebusiness_scripts() {
		wp_enqueue_style( 'privatebusiness-style', get_stylesheet_uri() );
		wp_enqueue_script( 'privatebusiness-nav-primary', get_template_directory_uri() . '/js/nav-primary.js', array( 'jquery' ) );
		wp_enqueue_script( 'privatebusiness-nav-secondary', get_template_directory_uri() . '/js/nav-secondary.js', array( 'jquery' ) );
		wp_enqueue_style( 'privatebusiness-googlefonts', privatebusiness_font_url() ); 

		// Add html5 support for IE 8 and older 
		wp_enqueue_script( 'privatebusiness_html5', get_template_directory_uri() . '/js/ie.js' );
		wp_script_add_data( 'privatebusiness_html5', 'conditional', 'lt IE 9' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'privatebusiness_scripts' );


// Font family
	function privatebusiness_font_url() {
		$font_url = '//fonts.googleapis.com/css?family=Open+Sans';
		return esc_url_raw( $font_url );
	}


// Sidebars
	function privatebusiness_widgets_init() {
		register_sidebar( array(
			'name' => __( 'Primary Sidebar', 'privatebusiness' ),
			'id' => 'primary',
			'description' => __( 'You can add one or multiple widgets here.', 'privatebusiness' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Homepage Right', 'privatebusiness' ),
			'id' => 'homepage-right',
			'description' => __( 'You can add one or multiple widgets here.', 'privatebusiness' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Homepage Left', 'privatebusiness' ),
			'id' => 'homepage-left',
			'description' => __( 'You can add one or multiple widgets here.', 'privatebusiness' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Right', 'privatebusiness' ),
			'id' => 'footer-right',
			'description' => __( 'You can add one or multiple widgets here.', 'privatebusiness' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Left', 'privatebusiness' ),
			'id' => 'footer-left',
			'description' => __( 'You can add one or multiple widgets here.', 'privatebusiness' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'privatebusiness_widgets_init' );


// Add class to post nav 
	function privatebusiness_post_next() { 
		return 'class="nav-next"'; 
	}
	add_filter('next_posts_link_attributes', 'privatebusiness_post_next', 999); 

	function privatebusiness_post_prev() { 
		return 'class="nav-prev"'; 
	}
	add_filter('previous_posts_link_attributes', 'privatebusiness_post_prev', 999); 


// Add class to comment nav 
	function privatebusiness_comment_next() { 
		return 'class="comment-next"'; 
	}
	add_filter('next_comments_link_attributes', 'privatebusiness_comment_next', 999); 

	function privatebusiness_comment_prev() { 
		return 'class="comment-prev"'; 
	}
	add_filter('previous_comments_link_attributes', 'privatebusiness_comment_prev', 999); 


// Custom excerpt lenght (default length is 55 words)
	function privatebusiness_excerpt_length( $length ) { 
		return 55; 
	} 
	add_filter( 'excerpt_length', 'privatebusiness_excerpt_length', 999 ); 


// Theme Customizer (logo)
	function privatebusiness_theme_customizer( $wp_customize ) { 
		$wp_customize->add_section( 'privatebusiness_logo_section' , array( 
			'title' => __( 'Logo', 'privatebusiness' ), 
			'priority' => 30, 
			'description' => __( 'Set a logo to replace site title and tagline.', 'privatebusiness' ),
		) );
		$wp_customize->add_setting( 'privatebusiness_logo', array( 
			'capability' => 'edit_theme_options', 
			'sanitize_callback' => 'esc_url_raw', 
		) ); 
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'privatebusiness_logo', array( 
			'label' => __( 'Logo', 'privatebusiness' ), 
			'section' => 'privatebusiness_logo_section', 
			'settings' => 'privatebusiness_logo', 
		) ) );
	} 
	add_action('customize_register', 'privatebusiness_theme_customizer');

?>