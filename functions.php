<?php
/*
 * Theme functions and definitions.
 */


// Sets up theme defaults and registers various WordPress features that OneColumn supports
	function onecolumn_setup() { 

	// Set width without the padding
		if ( ! isset( $content_width ) )
			$content_width = 920;


	// Make theme available for translation
		load_theme_textdomain('onecolumn', get_template_directory() . '/languages');  


	// Register Menu
		register_nav_menus( 
		array( 'primary' => __( 'Primary Navigation', 'onecolumn' ), 
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


	// Default header
		register_default_headers( array(
		'boats' => array(
			'url' => '%s/images/boats.jpg',
			'thumbnail_url' => '%s/images/boats-thumbnail.jpg',
			'description' => __( 'Boats', 'onecolumn' )
			)
		) );


	// Post thumbnails
		add_theme_support( 'post-thumbnails' ); 

	// Resize mode thumbnails
		set_post_thumbnail_size( 640, 480 ); 


	// This feature adds RSS feed links to html head 
		add_theme_support( 'automatic-feed-links' );


	// Switches default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	}
	add_action( 'after_setup_theme', 'onecolumn_setup' ); 


// Add blogname to wp_title
	function onecolumn_wp_title( $title ) { 
		global $page, $paged; 
	if ( is_feed() ) 
		return $title; 
	
	$filtered_title = $title . get_bloginfo( 'name' ); 
		return $filtered_title; 
	}
	add_filter( 'wp_title', 'onecolumn_wp_title' ); 


// Enqueues scripts and styles for front-end
	function onecolumn_scripts() {
		if (!is_admin()) { 
			wp_dequeue_style('style'); 
		}
		wp_enqueue_style( 'style', get_stylesheet_uri() );
		wp_enqueue_script( 'nav', get_stylesheet_directory_uri() . '/js/nav.js', array( 'jquery' ) );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	}
	add_action( 'wp_enqueue_scripts', 'onecolumn_scripts' );


// Register Google Fonts
	function onecolumn_fonts() { 
		if (!is_admin()) { 
			wp_dequeue_style('googleFonts'); 
		}
		wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Anaheim' ); 		
		wp_enqueue_style( 'googleFonts'); 	
	}  	
	add_action('wp_enqueue_scripts', 'onecolumn_fonts');



// Sidebars
function onecolumn_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Homepage Sidebar Right', 'onecolumn' ),
		'id' => 'homepage-right',
		'description' => __( 'Select widgets from the right-hand side.', 'onecolumn' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle-home">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Sidebar Left', 'onecolumn' ),
		'id' => 'homepage-left',
		'description' => __( 'Select widgets from the right-hand side.', 'onecolumn' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle-home">',
		'after_title' => '</h4>',
	) );


	register_sidebar( array(
		'name' => __( 'Footer Sidebar Right', 'onecolumn' ),
		'id' => 'footer-right',
		'description' => __( 'Select widgets from the right-hand side.', 'onecolumn' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle-foot">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Left', 'onecolumn' ),
		'id' => 'footer-left',
		'description' => __( 'Select widgets from the right-hand side.', 'onecolumn' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle-foot">',
		'after_title' => '</h4>',
	) );

	}
	add_action( 'widgets_init', 'onecolumn_widgets_init' );


// Replaces the excerpt "more" text by a link 
	function onecolumn_excerpt_more($more) { 
		global $post; 
		return '<a class="moretag" href="'. get_permalink($post->ID) . '">' . __( 'Read More &raquo;', 'onecolumn' ) . '</a>'; 
		} 
	add_filter('excerpt_more', 'onecolumn_excerpt_more'); 



// Add class to the excerpt 
	function onecolumn_excerpt( $excerpt ) {
    		return str_replace('<p', '<p class="excerpt"', $excerpt);
		}
	add_filter( "the_excerpt", "onecolumn_excerpt" );

?>