<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that BlueGray supports
	function bluegray_setup() { 
		// Set max content width for img, video, and more
			global $content_width; 
			if ( ! isset( $content_width ) )
			$content_width = 760;

		// Make theme available for translation
			load_theme_textdomain('bluegray', get_template_directory() . '/languages');  

		// Register Menu
			register_nav_menus( array( 
				'primary' => __( 'Primary Navigation', 'bluegray' ), 
		 	) ); 

		// Add document title
			add_theme_support( 'title-tag' );

		// Add editor styles
			add_editor_style( array( 'custom-editor-style.css', bluegray_font_url() ) );

		// Custom header	
			$header_args = array(		
				'width' => 1700,
				'height' => 400,
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
					'description' => __( 'Default header', 'bluegray' )
				)
			) );

		// Post thumbnails
			add_theme_support( 'post-thumbnails' ); 

		// Resize thumbnails
			set_post_thumbnail_size( 350, 350 ); 

		// Resize single page thumbnail
			add_image_size( 'single', 350, 350 ); 

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
	add_action( 'after_setup_theme', 'bluegray_setup' ); 


// Enqueues scripts and styles for front-end
	function bluegray_scripts() {
		wp_enqueue_style( 'bluegray-style', get_stylesheet_uri() );
		wp_enqueue_script( 'bluegray-nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
		wp_enqueue_style( 'bluegray-googlefonts', bluegray_font_url() ); 

		// Add html5 support for IE 8 and older 
		wp_enqueue_script( 'bluegray_html5', get_template_directory_uri() . '/js/ie.js' );
		wp_script_add_data( 'bluegray_html5', 'conditional', 'lt IE 9' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'bluegray_scripts' );


// Font family
	function bluegray_font_url() {
		$font_url = '//fonts.googleapis.com/css?family=Open+Sans';
		return esc_url_raw( $font_url );
	}


// Sidebars
	function bluegray_widgets_init() {
		register_sidebar( array(
			'name' => __( 'Primary Sidebar', 'bluegray' ),
			'id' => 'primary',
			'description' => __( 'You can add one or multiple widgets here.', 'bluegray' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Homepage Right', 'bluegray' ),
			'id' => 'homepage-right',
			'description' => __( 'You can add one or multiple widgets here.', 'bluegray' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Homepage Middle', 'bluegray' ),
			'id' => 'homepage-middle',
			'description' => __( 'You can add one or multiple widgets here.', 'bluegray' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Homepage Left', 'bluegray' ),
			'id' => 'homepage-left',
			'description' => __( 'You can add one or multiple widgets here.', 'bluegray' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Right', 'bluegray' ),
			'id' => 'footer-right',
			'description' => __( 'You can add one or multiple widgets here.', 'bluegray' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Middle', 'bluegray' ),
			'id' => 'footer-middle',
			'description' => __( 'You can add one or multiple widgets here.', 'bluegray' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Left', 'bluegray' ),
			'id' => 'footer-left',
			'description' => __( 'You can add one or multiple widgets here.', 'bluegray' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'bluegray_widgets_init' );


// Add class to post nav 
	function bluegray_post_next() { 
		return 'class="nav-next"'; 
	}
	add_filter('next_posts_link_attributes', 'bluegray_post_next', 999); 

	function bluegray_post_prev() { 
		return 'class="nav-prev"'; 
	}
	add_filter('previous_posts_link_attributes', 'bluegray_post_prev', 999); 


// Add class to comment nav 
	function bluegray_comment_next() { 
		return 'class="comment-next"'; 
	}
	add_filter('next_comments_link_attributes', 'bluegray_comment_next', 999); 

	function bluegray_comment_prev() { 
		return 'class="comment-prev"'; 
	}
	add_filter('previous_comments_link_attributes', 'bluegray_comment_prev', 999); 


// Custom excerpt lenght (default length is 55 words)
	function bluegray_excerpt_length( $length ) { 
		return 55; 
	} 
	add_filter( 'excerpt_length', 'bluegray_excerpt_length', 999 ); 


// Theme Customizer (logo)
	function bluegray_theme_customizer( $wp_customize ) { 
		$wp_customize->add_section( 'bluegray_logo_section' , array( 
			'title' => __( 'Logo', 'bluegray' ), 
			'priority' => 30, 
			'description' => __( 'Set a logo to replace site title and tagline.', 'bluegray' ),
		) );
		$wp_customize->add_setting( 'bluegray_logo', array( 
			'capability' => 'edit_theme_options', 
			'sanitize_callback' => 'esc_url_raw', 
		) ); 
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bluegray_logo', array( 
			'label' => __( 'Logo', 'bluegray' ), 
			'section' => 'bluegray_logo_section', 
			'settings' => 'bluegray_logo', 
		) ) );
	} 
	add_action('customize_register', 'bluegray_theme_customizer');

?>