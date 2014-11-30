<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that MultiColors supports
	function multicolors_setup() { 

	// Set max content width for img, video, and more
		global $content_width; 
		if ( ! isset( $content_width ) )
		$content_width = 700;

	// Make theme available for translation
		load_theme_textdomain('multicolors', get_template_directory() . '/languages');  

	// Register Menu
		register_nav_menus( 
		array( 'primary' => __( 'Primary Navigation', 'multicolors' ), 
	 	) ); 

	// Add editor styles
		add_editor_style( array( 'custom-editor-style.css' ) );

	// Custom header	
		$args = array(		
		'width' => 650,
		'height' => 450,
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
			'description' => __( 'Boats', 'multicolors' )
		)
		));

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
	add_action( 'after_setup_theme', 'multicolors_setup' ); 


// Add html5 support for older IE version 
	function multicolors_html5() { 
		echo '<!--[if lt IE 9]>'. "\n"; 
		echo '<script src="' . esc_url( get_template_directory_uri() . '/js/ie.js' ) . '"></script>'. "\n"; 
		echo '<![endif]-->'. "\n"; 
		} 
	add_action( 'wp_head', 'multicolors_html5' ); 


// Add blogname to wp_title
	function multicolors_wp_title( $title ) { 
		global $page, $paged; 
		if ( is_feed() ) 
		return $title; 
	
		$filtered_title = $title . get_bloginfo( 'name' ); 
			return $filtered_title; 
	}
	add_filter( 'wp_title', 'multicolors_wp_title' ); 


// Enqueues scripts and styles for front-end
	function multicolors_scripts() {
			wp_enqueue_style( 'multicolors-style', get_stylesheet_uri() );
			wp_enqueue_script( 'multicolors-nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
			wp_enqueue_style( 'multicolors-googlefonts', '//fonts.googleapis.com/css?family=Open+Sans' ); 

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
	}
	add_action( 'wp_enqueue_scripts', 'multicolors_scripts' );


// Sidebars
	function multicolors_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'multicolors' ),
		'id' => 'primary',
		'description' => __( 'Select widgets from the right-hand side.', 'multicolors' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Header Sidebar', 'multicolors' ),
		'id' => 'header',
		'description' => __( 'Select widgets from the right-hand side.', 'multicolors' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Sidebar Right', 'multicolors' ),
		'id' => 'homepage-right',
		'description' => __( 'Select widgets from the right-hand side.', 'multicolors' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Sidebar Middle', 'multicolors' ),
		'id' => 'homepage-middle',
		'description' => __( 'Select widgets from the right-hand side.', 'multicolors' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );


	register_sidebar( array(
		'name' => __( 'Homepage Sidebar Left', 'multicolors' ),
		'id' => 'homepage-left',
		'description' => __( 'Select widgets from the right-hand side.', 'multicolors' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Right', 'multicolors' ),
		'id' => 'footer-right',
		'description' => __( 'Select widgets from the right-hand side.', 'multicolors' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Middle', 'multicolors' ),
		'id' => 'footer-middle',
		'description' => __( 'Select widgets from the right-hand side.', 'multicolors' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Left', 'multicolors' ),
		'id' => 'footer-left',
		'description' => __( 'Select widgets from the right-hand side.', 'multicolors' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	}
	add_action( 'widgets_init', 'multicolors_widgets_init' );


// Add class to the excerpt 
	function multicolors_excerpt( $excerpt ) {
    		return str_replace('<p', '<p class="excerpt"', $excerpt);
		}
	add_filter( "the_excerpt", "multicolors_excerpt" );


// Custom excerpt lenght (default length is 55 words)
	function multicolors_excerpt_length( $length ) { 
		return 55; } 
	add_filter( 'excerpt_length', 'multicolors_excerpt_length', 999 ); 


// Theme Customizer (option to add logo)
	function multicolors_theme_customizer( $wp_customize ) { 
		$wp_customize->add_section( 'multicolors_logo_section' , array( 
			'title' => __( 'Logo', 'multicolors' ), 
			'priority' => 30, 
			'description' => __( 'Upload a logo to replace blogname and description in header', 'multicolors' ),
		) );
		$wp_customize->add_setting( 'multicolors_logo', array( 
			'capability' => 'edit_theme_options', 
			'sanitize_callback' => 'esc_url_raw', 
		) ); 
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'multicolors_logo', array( 
			'label' => __( 'Logo', 'multicolors' ), 
			'section' => 'multicolors_logo_section', 
			'settings' => 'multicolors_logo', 
		) ) );
	} 
	add_action('customize_register', 'multicolors_theme_customizer');

?>