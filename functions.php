<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that DarkOrange supports
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

		// Add editor styles
			add_editor_style( 'custom-editor-style.css' );

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

		// Resize mode thumbnails
			set_post_thumbnail_size( 350, 350 ); 

		// Resize homepage thumbnails
			add_image_size( 'homepage', 250, 250 ); 

		// Resize single page thumbnail
			add_image_size( 'single', 350, 350 ); 

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
			add_theme_support( 'post-formats', array( 'aside', 'status', 'image', 'video', 'gallery', 'audio' ) );
	}
	add_action( 'after_setup_theme', 'darkorange_setup' ); 


// Add html5 support for IE 8 and older 
	function darkorange_html5() { 
		echo '<!--[if lt IE 9]>'. "\n"; 
		echo '<script src="' . esc_url( get_template_directory_uri() . '/js/ie.js' ) . '"></script>'. "\n"; 
		echo '<![endif]-->'. "\n"; 
	}
	add_action( 'wp_head', 'darkorange_html5' ); 


// Enqueues scripts and styles for front-end
	function darkorange_scripts() {
		wp_enqueue_style( 'darkorange-style', get_stylesheet_uri() );
		wp_enqueue_script( 'darkorange-nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
		wp_enqueue_style( 'darkorange-googlefonts', '//fonts.googleapis.com/css?family=Open+Sans' ); 

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// mobile nav args
		$darkorange_mobile_nav_args = array(
			'navText' => __( 'Menu', 'darkorange' )
		);
		// localize script with data for mobile nav
		wp_localize_script( 'darkorange-nav', 'objectL10n', $darkorange_mobile_nav_args );
	}
	add_action( 'wp_enqueue_scripts', 'darkorange_scripts' );


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


// Theme Customizer (logo)
	function darkorange_theme_customizer( $wp_customize ) { 
		$wp_customize->add_section( 'darkorange_logo_section' , array( 
			'title' => __( 'Logo', 'darkorange' ), 
			'priority' => 30, 
			'description' => __( 'Upload a logo to replace blogname and description in header.', 'darkorange' ),
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
	} 
	add_action('customize_register', 'darkorange_theme_customizer');

?>