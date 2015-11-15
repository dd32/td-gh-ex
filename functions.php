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
		register_nav_menus( 
		array( 'primary' => __( 'Primary Navigation', 'medical' ), 
	 	) ); 

	// Add document title
		add_theme_support( 'title-tag' );

	// Add editor styles
		add_editor_style( array( 'custom-editor-style.css' ) );

	// Custom header	
		$args = array(		
		'width' => 460,
		'height' => 300,
		'default-image' => get_template_directory_uri() . '/images/boats.jpg',
		'header-text' => false,
		'uploads' => true,
		);	
		add_theme_support( 'custom-header', $args );

	// Default header
		register_default_headers( array(
		'boats' => array(
			'url' => '%s/images/boats.jpg',
			'thumbnail_url' => '%s/images/boats-thumbnail.jpg',
			'description' => __( 'Boats', 'medical' )
		)
		) );

	// Post thumbnails
		add_theme_support( 'post-thumbnails' ); 

	// Resize mode thumbnails
		set_post_thumbnail_size( 250, 250 ); 

	// Resize single page thumbnail
		add_image_size( 'single', 250, 250 ); 

	// This feature adds RSS feed links to html head 
		add_theme_support( 'automatic-feed-links' );

	// Switches default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	// Background color
		$args = array( 'default-color' => 'ffffff', 
		); 
		add_theme_support( 'custom-background', $args ); 

	}
	add_action( 'after_setup_theme', 'medical_setup' ); 


// Add html5 support for IE 8 and older 
	function medical_html5() { 
		echo '<!--[if lt IE 9]>'. "\n"; 
		echo '<script src="' . esc_url( get_template_directory_uri() . '/js/ie.js' ) . '"></script>'. "\n"; 
		echo '<![endif]-->'. "\n"; 
		}
	add_action( 'wp_head', 'medical_html5' ); 


// Enqueues scripts and styles for front-end
	function medical_scripts() {
			wp_enqueue_style( 'medical-style', get_stylesheet_uri() );
			wp_enqueue_script( 'medical-nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
			wp_enqueue_style( 'medical-googlefonts', '//fonts.googleapis.com/css?family=Open+Sans' ); 

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
	}
	add_action( 'wp_enqueue_scripts', 'medical_scripts' );


// Sidebars
	function medical_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'medical' ),
		'id' => 'primary',
		'description' => __( 'You can add one or multiple widgets here.', 'medical' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Sidebar', 'medical' ),
		'id' => 'homepage',
		'description' => __( 'You can add one or multiple widgets here.', 'medical' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Right', 'medical' ),
		'id' => 'footer-right',
		'description' => __( 'You can add one or multiple widgets here.', 'medical' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Middle', 'medical' ),
		'id' => 'footer-middle',
		'description' => __( 'You can add one or multiple widgets here.', 'medical' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Left', 'medical' ),
		'id' => 'footer-left',
		'description' => __( 'You can add one or multiple widgets here.', 'medical' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
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
		return 75; } 
	add_filter( 'excerpt_length', 'medical_excerpt_length', 999 ); 


// Theme Customizer (option to add logo)
	function medical_theme_customizer( $wp_customize ) { 
		$wp_customize->add_section( 'medical_logo_section' , array( 
			'title' => __( 'Logo', 'medical' ), 
			'priority' => 30, 
			'description' => __( 'Upload a logo to replace blogname and description in header.', 'medical' ),
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