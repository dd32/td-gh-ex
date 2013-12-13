<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that SimplyBlack supports
	function SimplyBlack_setup() { 

	// Set width without the padding
		if ( ! isset( $content_width ) )
		$content_width = 570;

	// Make theme available for translation
		load_theme_textdomain('SimplyBlack', get_template_directory() . '/languages');  

	// Register Menu
		register_nav_menus( 
		array( 'primary' => __( 'Primary Navigation', 'SimplyBlack' ), 
	 	) ); 

	// Custom header	
		$args = array(		
		'width' => 960,
		'height' => 220,
		'default-image' => get_template_directory_uri() . '/images/boats.jpg',
		'header-text' => false,
		'uploads' => true,
		);	
		add_theme_support( 'custom-header', $args );

	// Post thumbnails
		add_theme_support( 'post-thumbnails' ); 

	// Resize mode thumbnails
		set_post_thumbnail_size( 570, 430 ); 


	// This feature adds RSS feed links to html head 
		add_theme_support( 'automatic-feed-links' );


	// Switches default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	// Background color
		$args = array( 'default-color' => 'f2f2f2', 
		); 
		add_theme_support( 'custom-background', $args ); 

	}
	add_action( 'after_setup_theme', 'SimplyBlack_setup' ); 


// Theme Customizer (option to add logo)
	function SimplyBlack_theme_customizer( $wp_customize ) { 

		$wp_customize->add_section( 'SimplyBlack_logo_section' , array( 
		'title' => __( 'Logo', 'SimplyBlack' ), 
		'priority' => 30, 
		'description' => __( 'Upload a logo to replace blogname and description in header', 'SimplyBlack' ),
		) );
		$wp_customize->add_setting( 'SimplyBlack_logo' );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'SimplyBlack_logo', array( 
		'label' => __( 'Logo', 'SimplyBlack' ), 
		'section' => 'SimplyBlack_logo_section', 
		'settings' => 'SimplyBlack_logo', 
		) ) );

	} 
	add_action('customize_register', 'SimplyBlack_theme_customizer');


// Add blogname to wp_title
	function SimplyBlack_wp_title( $title ) { 
		global $page, $paged; 
		if ( is_feed() ) 
		return $title; 
	
		$filtered_title = $title . get_bloginfo( 'name' ); 
			return $filtered_title; 
	}
	add_filter( 'wp_title', 'SimplyBlack_wp_title' ); 


// Enqueues scripts and styles for front-end
	function SimplyBlack_scripts() {
		if (!is_admin()) { 
			wp_enqueue_style( 'style', get_stylesheet_uri() );
			wp_enqueue_script( 'nav', get_stylesheet_directory_uri() . '/js/nav.js', array( 'jquery' ) );
		}
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	}
	add_action( 'wp_enqueue_scripts', 'SimplyBlack_scripts' );


// Register Google Fonts
	function SimplyBlack_fonts() { 
		if (! is_admin() ) { 
			wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Open+Sans' ); 		
				wp_enqueue_style( 'googleFonts'); 	
		}
	}  	
	add_action('wp_enqueue_scripts', 'SimplyBlack_fonts');


// Sidebars
	function SimplyBlack_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'SimplyBlack' ),
		'id' => 'primary',
		'description' => __( 'Select widgets from the right-hand side.', 'SimplyBlack' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Right', 'SimplyBlack' ),
		'id' => 'footer-right',
		'description' => __( 'Select widgets from the right-hand side.', 'SimplyBlack' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Middle', 'SimplyBlack' ),
		'id' => 'footer-middle',
		'description' => __( 'Select widgets from the right-hand side.', 'SimplyBlack' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Left', 'SimplyBlack' ),
		'id' => 'footer-left',
		'description' => __( 'Select widgets from the right-hand side.', 'SimplyBlack' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	}
	add_action( 'widgets_init', 'SimplyBlack_widgets_init' );


// Replaces the excerpt "more" text by a link 
	function SimplyBlack_excerpt_more($more) { 
		global $post; 
		return '<a class="moretag" href="'. get_permalink($post->ID) . '">' . __( 'Read More &raquo;', 'SimplyBlack' ) . '</a>'; 
		} 
	add_filter('excerpt_more', 'SimplyBlack_excerpt_more'); 


// Add class to the excerpt 
	function SimplyBlack_excerpt( $excerpt ) {
    		return str_replace('<p', '<p class="excerpt"', $excerpt);
		}
	add_filter( "the_excerpt", "SimplyBlack_excerpt" );


// Default header
	register_default_headers( array(
	'boats' => array(
		'url' => '%s/images/boats.jpg',
		'thumbnail_url' => '%s/images/boats-thumbnail.jpg',
		'description' => __( 'Boats', 'SimplyBlack' )
		)
	) );

?>