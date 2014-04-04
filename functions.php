<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that Shipyard supports
	function shipyard_setup() { 

	// Set max content width for img, video, and more
		global $content_width; 
		if ( ! isset( $content_width ) )
		$content_width = 580;

	// Make theme available for translation
		load_theme_textdomain('shipyard', get_template_directory() . '/languages');  

	// Register Menu
		register_nav_menus( 
		array( 'primary' => __( 'Primary Navigation', 'shipyard' ), 
	 	) ); 

	// Add editor styles
		add_editor_style( array( 'custom-editor-style.css' ) );

	// Custom header	
		$args = array(		
		'width' => 960,
		'height' => 350,
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
			'description' => __( 'Boats', 'shipyard' )
		)
		) );

	// Post thumbnails
		add_theme_support( 'post-thumbnails' ); 

	// Resize mode thumbnails
		set_post_thumbnail_size( 580, 450 ); 


	// This feature adds RSS feed links to html head 
		add_theme_support( 'automatic-feed-links' );


	// Switches default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	// Background color
		$args = array( 'default-color' => 'f8f8f8', 
		); 
		add_theme_support( 'custom-background', $args ); 

	}
	add_action( 'after_setup_theme', 'shipyard_setup' ); 


// Add html5 support for older IE version 
	function shipyard_html5() { 
		echo '<!--[if lt IE 9]>'. "\n"; 
		echo '<script src="' . esc_url( get_template_directory_uri() . '/js/ie.js' ) . '"></script>'. "\n"; 
		echo '<![endif]-->'. "\n"; 
		} 
	add_action( 'wp_head', 'shipyard_html5' ); 


// Add blogname to wp_title
	function shipyard_wp_title( $title ) { 
		global $page, $paged; 
		if ( is_feed() ) 
		return $title; 
	
		$filtered_title = $title . get_bloginfo( 'name' ); 
			return $filtered_title; 
	}
	add_filter( 'wp_title', 'shipyard_wp_title' ); 


// Enqueues scripts and styles for front-end
	function shipyard_scripts() {
			wp_enqueue_style( 'shipyard-style', get_stylesheet_uri() );
			wp_enqueue_script( 'shipyard-nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
			wp_enqueue_style( 'shipyard-googlefonts', '//fonts.googleapis.com/css?family=Open+Sans' ); 

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
	}
	add_action( 'wp_enqueue_scripts', 'shipyard_scripts' );


// Sidebars
	function shipyard_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'shipyard' ),
		'id' => 'primary',
		'description' => __( 'Select widgets from the right-hand side.', 'shipyard' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Right', 'shipyard' ),
		'id' => 'footer-right',
		'description' => __( 'Select widgets from the right-hand side.', 'shipyard' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Left', 'shipyard' ),
		'id' => 'footer-left',
		'description' => __( 'Select widgets from the right-hand side.', 'shipyard' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	}
	add_action( 'widgets_init', 'shipyard_widgets_init' );


// Add class to the excerpt 
	function shipyard_excerpt( $excerpt ) {
    		return str_replace('<p', '<p class="excerpt"', $excerpt);
		}
	add_filter( "the_excerpt", "shipyard_excerpt" );


// Theme Customizer (option to add logo)
	function shipyard_theme_customizer( $wp_customize ) { 

		$wp_customize->add_section( 'shipyard_logo_section' , array( 
		'title' => __( 'Logo', 'shipyard' ), 
		'priority' => 30, 
		'description' => __( 'Upload a logo to replace blogname and description in header', 'shipyard' ),
		) );
		$wp_customize->add_setting( 'shipyard_logo' );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'shipyard_logo', array( 
		'label' => __( 'Logo', 'shipyard' ), 
		'section' => 'shipyard_logo_section', 
		'settings' => 'shipyard_logo', 
		) ) );

	} 
	add_action('customize_register', 'shipyard_theme_customizer');

?>