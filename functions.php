<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that LeftSide supports
	function leftside_setup() { 

	// Set max content width for img, video, and more
		global $content_width; 
		if ( ! isset( $content_width ) )
		$content_width = 750;

	// Make theme available for translation
		load_theme_textdomain('leftside', get_template_directory() . '/languages');  

	// Register Menu
		register_nav_menus( 
		array( 'primary' => __( 'Primary Navigation', 'leftside' ), 
	 	) ); 

	// Add editor styles
		add_editor_style( array( 'custom-editor-style.css' ) );

	// Custom header	
		$args = array(		
		'width' => 800,
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
			'description' => __( 'Boats', 'leftside' )
			)
		) );

	// Post thumbnails
		add_theme_support( 'post-thumbnails' ); 

	// Resize mode thumbnails
		set_post_thumbnail_size( 300, 300 ); 


	// This feature adds RSS feed links to html head 
		add_theme_support( 'automatic-feed-links' );


	// Switches default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	// Background color
		$args = array( 'default-color' => 'eeeeee', 
		); 
		add_theme_support( 'custom-background', $args ); 

	}
	add_action( 'after_setup_theme', 'leftside_setup' ); 


// Add html5 support for older IE version 
	function leftside_html5() { 
		echo '<!--[if lt IE 9]>'. "\n"; 
		echo '<script src="' . esc_url( get_template_directory_uri() . '/js/ie.js' ) . '"></script>'. "\n"; 
		echo '<![endif]-->'. "\n"; 
		}
	add_action( 'wp_head', 'leftside_html5' ); 


// Add blogname to wp_title
	function leftside_wp_title( $title ) { 
		global $page, $paged; 
		if ( is_feed() ) 
		return $title; 
	
		$filtered_title = $title . get_bloginfo( 'name' ); 
			return $filtered_title; 
	}
	add_filter( 'wp_title', 'leftside_wp_title' ); 



// Enqueues scripts and styles for front-end
	function leftside_scripts() {
			wp_enqueue_style( 'leftside-style', get_stylesheet_uri() );
			wp_enqueue_script( 'leftside-nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
			wp_enqueue_style( 'leftside-googlefonts', '//fonts.googleapis.com/css?family=Open+Sans' ); 

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
	}
	add_action( 'wp_enqueue_scripts', 'leftside_scripts' );


// Sidebars
	function leftside_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'leftside' ),
		'id' => 'primary',
		'description' => __( 'Select widgets from the right-hand side.', 'leftside' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Right', 'leftside' ),
		'id' => 'footer-right',
		'description' => __( 'Select widgets from the right-hand side.', 'leftside' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Middle', 'leftside' ),
		'id' => 'footer-middle',
		'description' => __( 'Select widgets from the right-hand side.', 'leftside' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Left', 'leftside' ),
		'id' => 'footer-left',
		'description' => __( 'Select widgets from the right-hand side.', 'leftside' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	}
	add_action( 'widgets_init', 'leftside_widgets_init' );


// Custom excerpt lenght 
	function leftside_excerpt_length( $length ) { 
		return 75; } 
	add_filter( 'excerpt_length', 'leftside_excerpt_length', 999 ); 


// Add class to the excerpt 
	function leftside_excerpt( $excerpt ) {
    		return str_replace('<p', '<p class="excerpt"', $excerpt);
		}
	add_filter( "the_excerpt", "leftside_excerpt" );


// Theme Customizer (option to add logo)
	function leftside_theme_customizer( $wp_customize ) { 

		$wp_customize->add_section( 'leftside_logo_section' , array( 
		'title' => __( 'Logo', 'leftside' ), 
		'priority' => 30, 
		'description' => __( 'Upload a logo to replace blogname and description in header', 'leftside' ),
		) );
		$wp_customize->add_setting( 'leftside_logo' );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'leftside_logo', array( 
		'label' => __( 'Logo', 'leftside' ), 
		'section' => 'leftside_logo_section', 
		'settings' => 'leftside_logo', 
		) ) );

	} 
	add_action('customize_register', 'leftside_theme_customizer');

?>