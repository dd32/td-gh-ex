<?php
/*
 * Theme functions and definitions.
 */


// Make theme available for translation
	add_action('after_setup_theme', 'my_theme_setup'); 
		function my_theme_setup(){ 
		load_theme_textdomain('guido', get_template_directory() . '/languages'); } 


// Enqueues scripts and styles for front-end.
	function shipyard_scripts() {
		wp_enqueue_style( 'style', get_stylesheet_uri() );
		wp_enqueue_script( 'nav', get_template_directory_uri() . '/js/nav.js', array(), '1.0', true );
		wp_enqueue_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js' ); 
	
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	}

	add_action( 'wp_enqueue_scripts', 'shipyard_scripts' );

	function load_fonts() {
		wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Anaheim' );
		wp_enqueue_style( 'googleFonts');
	}

	add_action('wp_print_styles', 'load_fonts');


// Set width without the padding
if ( ! isset( $content_width ) )
	$content_width = 920;


// Register Menu
	function register_my_menus() {
		register_nav_menus(
			array(
      		'head-menu' => __( 'Header Menu', 'guido' ),
      		'foot-menu' => __( 'Footer Menu', 'guido' )
    			)
  		);
	}
	add_action( 'init', 'register_my_menus' );


// Sidebar
register_sidebar(array(
	'name'          => __( 'Primary Sidebar', 'guido' ),
	'id'            => 'primary',
	'description'   => __( 'Select widgets from the right-hand side.', 'guido' ),
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">', 
	'after_widget' => '</div>', 
	'before_title'  => '<h4 class="widgettitle">',
	'after_title'   => '</h4>'
));


// Replaces the excerpt "more" text by a link 
	function new_excerpt_more($more) { 
		global $post; 
		return '<a class="moretag" href="'. get_permalink($post->ID) . '">' . __( 'Read More &raquo;', 'guido' ) . '</a>'; 
		} 
	add_filter('excerpt_more', 'new_excerpt_more'); 


// Add class to the excerpt 
	function add_class_to_excerpt( $excerpt ) {
    		return str_replace('<p', '<p class="excerpt"', $excerpt);
		}
	add_filter( "the_excerpt", "add_class_to_excerpt" );



// This feature adds RSS feed links to html head 
	add_theme_support( 'automatic-feed-links' );


// Post thumbnails
	add_theme_support( 'post-thumbnails' ); 


// Resize mode thumbnails
	set_post_thumbnail_size( 350, 200 ); 


// Custom header
	$args = array(
		'width'         => 960,
		'height'        => 350,
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
		'description' => __( 'Boats', 'guido' )
		)
	) );


// Switches default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

?>