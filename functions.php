<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that GridBulletin supports
	function gridbulletin_setup() { 
		// Set max content width for img, video, and more
			global $content_width; 
			if ( ! isset( $content_width ) )
			$content_width = 700;

		// Make theme available for translation
			load_theme_textdomain('gridbulletin', get_template_directory() . '/languages');  

		// Register Menu
			register_nav_menus( array( 
				'primary' => __( 'Primary Navigation', 'gridbulletin' ), 
		 	) ); 

		// Add document title
			add_theme_support( 'title-tag' );

		// Add editor styles
			add_editor_style( array( 'custom-editor-style.css', gridbulletin_font_url() ) );

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
					'description' => __( 'Default header', 'gridbulletin' )
				)
			) );

		// Post thumbnails
			add_theme_support( 'post-thumbnails' ); 

		// Resize thumbnails
			set_post_thumbnail_size( 300, 300 ); 

		// Resize post thumbnail in list
			add_image_size( 'list', 240, 240 ); 

		// Resize page thumbnail
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
	add_action( 'after_setup_theme', 'gridbulletin_setup' ); 


// Enqueues scripts and styles for front-end
	function gridbulletin_scripts() {
		wp_enqueue_style( 'gridbulletin-style', get_stylesheet_uri() );
		wp_enqueue_script( 'gridbulletin-nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
		wp_enqueue_style( 'gridbulletin-googlefonts', gridbulletin_font_url() ); 

		// Add html5 support for IE 8 and older 
		wp_enqueue_script( 'gridbulletin_html5', get_template_directory_uri() . '/js/ie.js' );
		wp_script_add_data( 'gridbulletin_html5', 'conditional', 'lt IE 9' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// mobile nav args
		$gridbulletin_mobile_nav_args = array(
			'navText' => __( 'Menu', 'gridbulletin' )
		);
		// localize script with data for mobile nav
		wp_localize_script( 'gridbulletin-nav', 'objectL10n', $gridbulletin_mobile_nav_args );
	}
	add_action( 'wp_enqueue_scripts', 'gridbulletin_scripts' );


// Font family
	function gridbulletin_font_url() {
		$font_url = '//fonts.googleapis.com/css?family=Open+Sans';
		return esc_url_raw( $font_url );
	}


// Sidebars
	function gridbulletin_widgets_init() {
		register_sidebar( array(
			'name' => __( 'Primary Sidebar', 'gridbulletin' ),
			'id' => 'primary',
			'description' => __( 'You can add one or multiple widgets here.', 'gridbulletin' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Right', 'gridbulletin' ),
			'id' => 'footer-right',
			'description' => __( 'You can add one or multiple widgets here.', 'gridbulletin' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Middle', 'gridbulletin' ),
			'id' => 'footer-middle',
			'description' => __( 'You can add one or multiple widgets here.', 'gridbulletin' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Left', 'gridbulletin' ),
			'id' => 'footer-left',
			'description' => __( 'You can add one or multiple widgets here.', 'gridbulletin' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'gridbulletin_widgets_init' );


// Add class to post nav 
	function gridbulletin_post_next() { 
		return 'class="nav-next"'; 
	}
	add_filter('next_posts_link_attributes', 'gridbulletin_post_next', 999); 

	function gridbulletin_post_prev() { 
		return 'class="nav-prev"'; 
	}
	add_filter('previous_posts_link_attributes', 'gridbulletin_post_prev', 999); 


// Add class to comment nav 
	function gridbulletin_comment_next() { 
		return 'class="comment-next"'; 
	}
	add_filter('next_comments_link_attributes', 'gridbulletin_comment_next', 999); 

	function gridbulletin_comment_prev() { 
		return 'class="comment-prev"'; 
	}
	add_filter('previous_comments_link_attributes', 'gridbulletin_comment_prev', 999); 


// Custom excerpt lenght (default length is 55 words)
	function gridbulletin_excerpt_length( $length ) { 
		return 20; 
	} 
	add_filter( 'excerpt_length', 'gridbulletin_excerpt_length', 999 ); 


// Theme Customizer (logo and settings for archive page)
	function gridbulletin_theme_customizer( $wp_customize ) { 
		$wp_customize->add_section( 'gridbulletin_logo_section' , array( 
			'title' => __( 'Logo', 'gridbulletin' ), 
			'priority' => 30, 
			'description' => __( 'Set a logo to replace site title and tagline.', 'gridbulletin' ),
		) );
		$wp_customize->add_setting( 'gridbulletin_logo', array( 
			'capability' => 'edit_theme_options', 
			'sanitize_callback' => 'esc_url_raw', 
		) ); 
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'gridbulletin_logo', array( 
			'label' => __( 'Logo', 'gridbulletin' ), 
			'section' => 'gridbulletin_logo_section', 
			'settings' => 'gridbulletin_logo', 
		) ) );
		$wp_customize->add_section( 'gridbulletin_archive_section' , array( 
			'title' => __( 'Archive Page', 'gridbulletin' ), 
			'priority' => 31, 
			'description' => __( 'Settings for the archive page.', 'gridbulletin' ),
		) );
		$wp_customize->add_setting( 'gridbulletin_sidebar', array( 
			'capability' => 'edit_theme_options', 
			'sanitize_callback' => 'sanitize_text_field', 
			'default' => '0', 
		) ); 
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gridbulletin_sidebar', array( 
			'label' => __( 'Sidebar', 'gridbulletin' ), 
			'section' => 'gridbulletin_archive_section', 
			'settings' => 'gridbulletin_sidebar', 
			'type' => 'radio', 
			'choices' => array( 
				'0' => __('Yes', 'gridbulletin'), 
				'1' => __('No', 'gridbulletin'), 
			), 
		) ) );
		$wp_customize->add_setting( 'gridbulletin_archive_title', array( 
			'capability' => 'edit_theme_options', 
			'sanitize_callback' => 'sanitize_text_field',
			'default' => '0', 
		) ); 
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gridbulletin_archive_title', array( 
			'label' => __( 'Archive title', 'gridbulletin' ), 
			'section' => 'gridbulletin_archive_section', 
			'settings' => 'gridbulletin_archive_title', 
			'type' => 'radio', 
			'choices' => array( 
				'0' => __('Yes', 'gridbulletin'), 
				'1' => __('No', 'gridbulletin'), 
			), 
		) ) );
	} 
	add_action('customize_register', 'gridbulletin_theme_customizer');

?>