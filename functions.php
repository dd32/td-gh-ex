<?php
/*
 * Theme functions and definitions.
 */

// Set width without the padding
if ( ! isset( $content_width ) )
	$content_width = 570;


// Sets up theme defaults and registers various WordPress features that Shipyard supports
	function shipyard_setup() { 

	// Make theme available for translation
		load_theme_textdomain('shipyard', get_template_directory() . '/languages');  

	// Register Menu
		register_nav_menus( 
		array( 'primary' => __( 'Primary Navigation', 'shipyard' ), 
	 	) ); 

	// Custom header	
		$args = array(		
		'width' => 960,
		'height' => 350,
		'default-image' => get_template_directory_uri() . '/images/boats.jpg',
		'header-text' => false,
		'uploads' => true,
		);	
		add_theme_support( 'custom-header', $args );

	// Post thumbnails
		add_theme_support( 'post-thumbnails' ); 

	// Resize mode thumbnails
		set_post_thumbnail_size( 350, 200 ); 


	// This feature adds RSS feed links to html head 
		add_theme_support( 'automatic-feed-links' );


	// Switches default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	}
	add_action( 'after_setup_theme', 'shipyard_setup' ); 


// Enqueues scripts and styles for front-end
	function shipyard_scripts() {
		wp_enqueue_style( 'style', get_stylesheet_uri() );
		wp_enqueue_script( 'nav', get_stylesheet_directory_uri() . '/js/nav.js', array( 'jquery' ) );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	}
	add_action( 'wp_enqueue_scripts', 'shipyard_scripts' );


// Register Google Fonts
	function shipyard_fonts() { 		
		wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Anaheim' ); 		
		wp_enqueue_style( 'googleFonts'); 	
	}  	
	add_action('wp_enqueue_scripts', 'shipyard_fonts');



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


// Replaces the excerpt "more" text by a link 
	function shipyard_excerpt_more($more) { 
		global $post; 
		return '<a class="moretag" href="'. get_permalink($post->ID) . '">' . __( 'Read More &raquo;', 'shipyard' ) . '</a>'; 
		} 
	add_filter('excerpt_more', 'shipyard_excerpt_more'); 


// Add class to the excerpt 
	function shipyard_excerpt( $excerpt ) {
    		return str_replace('<p', '<p class="excerpt"', $excerpt);
		}
	add_filter( "the_excerpt", "shipyard_excerpt" );


// Default header
	register_default_headers( array(
	'boats' => array(
		'url' => '%s/images/boats.jpg',
		'thumbnail_url' => '%s/images/boats-thumbnail.jpg',
		'description' => __( 'Boats', 'shipyard' )
		)
	) );

?>