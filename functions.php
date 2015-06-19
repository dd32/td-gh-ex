<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that privatebusiness supports
	function privatebusiness_setup() { 

	// Set max content width for img, video, and more
		global $content_width; 
		if ( ! isset( $content_width ) )
		$content_width = 700;

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
		add_editor_style( array( 'custom-editor-style.css' ) );

	// Custom header	
		$args = array(		
		'width' => 1200,
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
			'description' => __( 'Boats', 'privatebusiness' )
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
		$args = array( 'default-color' => 'eeeeee', 
		); 
		add_theme_support( 'custom-background', $args ); 

	}
	add_action( 'after_setup_theme', 'privatebusiness_setup' ); 


// Add html5 support for IE 8 and older 
	function privatebusiness_html5() { 
		echo '<!--[if lt IE 9]>'. "\n"; 
		echo '<script src="' . esc_url( get_template_directory_uri() . '/js/ie.js' ) . '"></script>'. "\n"; 
		echo '<![endif]-->'. "\n"; 
		}
	add_action( 'wp_head', 'privatebusiness_html5' ); 


// Enqueues scripts and styles for front-end
	function privatebusiness_scripts() {
			wp_enqueue_style( 'privatebusiness-style', get_stylesheet_uri() );
			wp_enqueue_script( 'privatebusiness-nav-primary', get_template_directory_uri() . '/js/nav-primary.js', array( 'jquery' ) );
			wp_enqueue_script( 'privatebusiness-nav-secondary', get_template_directory_uri() . '/js/nav-secondary.js', array( 'jquery' ) );
			wp_enqueue_style( 'privatebusiness-googlefonts', '//fonts.googleapis.com/css?family=Open+Sans' ); 

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
	}
	add_action( 'wp_enqueue_scripts', 'privatebusiness_scripts' );


// Sidebars
	function privatebusiness_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'privatebusiness' ),
		'id' => 'primary',
		'description' => __( 'Select widgets from the right-hand side.', 'privatebusiness' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Sidebar Right', 'privatebusiness' ),
		'id' => 'homepage-right',
		'description' => __( 'Select widgets from the right-hand side.', 'privatebusiness' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Sidebar Left', 'privatebusiness' ),
		'id' => 'homepage-left',
		'description' => __( 'Select widgets from the right-hand side.', 'privatebusiness' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Right', 'privatebusiness' ),
		'id' => 'footer-right',
		'description' => __( 'Select widgets from the right-hand side.', 'privatebusiness' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Left', 'privatebusiness' ),
		'id' => 'footer-left',
		'description' => __( 'Select widgets from the right-hand side.', 'privatebusiness' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	}
	add_action( 'widgets_init', 'privatebusiness_widgets_init' );


// Add class to post nav 
	function privatebusiness_post_next() { 
		return 'class="nav-next"'; 
	}
	add_filter('next_posts_link_attributes', 'privatebusiness_post_next'); 

	function privatebusiness_post_prev() { 
		return 'class="nav-prev"'; 
	}
	add_filter('previous_posts_link_attributes', 'privatebusiness_post_prev'); 


// Add class to comment nav 
	function privatebusiness_comment_next() { 
		return 'class="comment-next"'; 
	}
	add_filter('next_comments_link_attributes', 'privatebusiness_comment_next'); 

	function privatebusiness_comment_prev() { 
		return 'class="comment-prev"'; 
	}
	add_filter('previous_comments_link_attributes', 'privatebusiness_comment_prev'); 


// Custom excerpt lenght (default length is 55 words)
	function privatebusiness_excerpt_length( $length ) { 
		return 75; } 
	add_filter( 'excerpt_length', 'privatebusiness_excerpt_length', 999 ); 


// Theme Customizer (option to add logo)
	function privatebusiness_theme_customizer( $wp_customize ) { 
		$wp_customize->add_section( 'privatebusiness_logo_section' , array( 
			'title' => __( 'Logo', 'privatebusiness' ), 
			'priority' => 30, 
			'description' => __( 'Upload a logo to replace blogname and description in header', 'privatebusiness' ),
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