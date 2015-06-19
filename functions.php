<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that SimplyBlack supports
	function simplyblack_setup() { 

	// Set max content width for img, video, and more
		global $content_width; 
		if ( ! isset( $content_width ) )
		$content_width = 720;

	// Make theme available for translation
		load_theme_textdomain('simplyblack', get_template_directory() . '/languages');  

	// Register Menu
		register_nav_menus( 
		array( 'primary' => __( 'Primary Navigation', 'simplyblack' ), 
	 	) ); 

	// Add document title
		add_theme_support( 'title-tag' );

	// Add editor styles
		add_editor_style( array( 'custom-editor-style.css' ) );

	// Custom header	
		$args = array(		
		'width' => 1160,
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
			'description' => __( 'Boats', 'simplyblack' )
		)
		) );

	// Post thumbnails
		add_theme_support( 'post-thumbnails' ); 

	// Resize mode thumbnails
		set_post_thumbnail_size( 300, 300 ); 

	// Resize single page thumbnail
		add_image_size( 'single', 300, 300 ); 

	// This feature adds RSS feed links to html head 
		add_theme_support( 'automatic-feed-links' );

	// Switches default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	// Background color
		$args = array( 'default-color' => '333333', 
		); 
		add_theme_support( 'custom-background', $args ); 

	}
	add_action( 'after_setup_theme', 'simplyblack_setup' ); 


// Add html5 support for IE 8 an older 
	function simplyblack_html5() { 
		echo '<!--[if lt IE 9]>'. "\n"; 
		echo '<script src="' . esc_url( get_template_directory_uri() . '/js/ie.js' ) . '"></script>'. "\n"; 
		echo '<![endif]-->'. "\n"; 
		}
	add_action( 'wp_head', 'simplyblack_html5' ); 


// Enqueues scripts and styles for front-end
	function simplyblack_scripts() {
			wp_enqueue_style( 'simplyblack-style', get_stylesheet_uri() );
			wp_enqueue_script( 'simplyblack-nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
			wp_enqueue_style( 'simplyblack-googlefonts', '//fonts.googleapis.com/css?family=Open+Sans' ); 

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
	}
	add_action( 'wp_enqueue_scripts', 'simplyblack_scripts' );


// Sidebars
	function simplyblack_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'simplyblack' ),
		'id' => 'primary',
		'description' => __( 'Select widgets from the right-hand side.', 'simplyblack' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Right', 'simplyblack' ),
		'id' => 'footer-right',
		'description' => __( 'Select widgets from the right-hand side.', 'simplyblack' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Middle', 'simplyblack' ),
		'id' => 'footer-middle',
		'description' => __( 'Select widgets from the right-hand side.', 'simplyblack' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Left', 'simplyblack' ),
		'id' => 'footer-left',
		'description' => __( 'Select widgets from the right-hand side.', 'simplyblack' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	}
	add_action( 'widgets_init', 'simplyblack_widgets_init' );


// Add class to post nav 
	function simplyblack_post_next() { 
		return 'class="nav-next"'; 
	}
	add_filter('next_posts_link_attributes', 'simplyblack_post_next'); 

	function simplyblack_post_prev() { 
		return 'class="nav-prev"'; 
	}
	add_filter('previous_posts_link_attributes', 'simplyblack_post_prev'); 


// Add class to comment nav 
	function simplyblack_comment_next() { 
		return 'class="comment-next"'; 
	}
	add_filter('next_comments_link_attributes', 'simplyblack_comment_next'); 

	function simplyblack_comment_prev() { 
		return 'class="comment-prev"'; 
	}
	add_filter('previous_comments_link_attributes', 'simplyblack_comment_prev'); 


// Custom excerpt lenght (default length is 55 words)
	function simplyblack_excerpt_length( $length ) { 
		return 55; } 
	add_filter( 'excerpt_length', 'simplyblack_excerpt_length', 999 ); 


// Theme Customizer (option to add logo)
	function simplyblack_theme_customizer( $wp_customize ) { 
		$wp_customize->add_section( 'simplyblack_logo_section' , array( 
			'title' => __( 'Logo', 'simplyblack' ), 
			'priority' => 30, 
			'description' => __( 'Upload a logo to replace blogname and description in header', 'simplyblack' ),
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