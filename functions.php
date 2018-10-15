<?php
/**
 * Greenr functions and definitions
 *
 * @package Greenr
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 870; /* pixels */
}
 
if ( ! function_exists( 'greenr_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function greenr_setup() {          

	// Makes theme translation ready
	load_theme_textdomain( 'greenr', GREENR_LANGUAGES_DIR );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_editor_style( 'css/editor-style.css' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 250, 250, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'greenr' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'greenr_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );


    add_theme_support( 'custom-background' );
	

	add_theme_support( 'custom-logo' );


	// Add title-tag support
	add_theme_support( 'title-tag' );

		/*
		 * Add Additional image sizes
		 *
		 */
	
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'greenr_recent-post-img', 380, 350, true);
	add_image_size( 'greenr_service-img', 100, 100, true);
	add_image_size( 'greenr-blog-full-width', 1200,350, true );
	add_image_size( 'greenr-small-featured-image-width', 450,300, true );
	add_image_size( 'greenr-blog-large-width', 800,300, true );
	add_image_size( 'greenr-thumbnail-large', 400,200, true );
	add_image_size( 'greenr-thumbnail-small', 130,90, true );
	

	//greenr_customizer_setup();

		// Define and register starter content to showcase the theme on new sites.
	$starter_content = array( 
		'widgets' => array(
		
			// Put two core-defined widgets in the footer 2 area.
			'header-top-right' => array(
				// Widget ID
			    'my_text' => array(
					// Widget $id -> set when creating a Widget Class
		        	'text' , 
		        	// Widget $instance -> settings 
					array(
					  'text'  => '<ul><li><a href="http://www.facebook.com/"><i class="fa fa-facebook"></i></a></li><li><a href="http://www.twitter.com/"><i class="fa fa-twitter"></i></a></li><li><a href="http://www.pinterest.com/"><i class="fa fa-pinterest"></i></a></li><li><a href="http://www.tumblr.com/"><i class="fa fa-tumblr"></i></a><a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li></ul>'
					)
				),
			),

			'footer-1' => array(
				// Widget ID
			    'my_text' => array(
					// Widget $id -> set when creating a Widget Class
		        	'text' , 
		        	// Widget $instance -> settings 
					array(
					  'title' => 'About Greenr',
					  'text'  => 'Lorem ipsum dolor sit, consectetur adipisicing elit, sed tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam'
					)
				)
			),
			'footer-2' => array(
				// Widget ID
			    'recent-posts'
			),
			'footer-3' => array(
				// Widget ID
			    'meta'
			),

			'footer-4' => array(
				// Widget ID
			    'my_text' => array(
					// Widget $id -> set when creating a Widget Class
		        	'text' , 
		        	// Widget $instance -> settings 
					array(
					  'title' => 'Contact Us',
					  'text'  => '<div class="footer-contact"><p><i class="fa fa-phone"></i> +123 456 7890</p><p><i class="fa fa-fax"></i> 03 5481 2221</p><p><i class="fa fa-envelope"></i> <a href="mailto:info@gmail.com">info@gmail.com</a></p></div>'
					)
				)
			),

		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home' => array(
				'post_type' => 'page',
			),
			'blog' => array(
				'post_type' => 'page',
			),
			/*'post-one' => array(
	            'post_type' => 'post',
	            'post_title' => __( 'Post One', 'greenr'),
	            'post_content' => sprintf( __('<h1> Slider Setting </h1><p>You haven\'t created any slider yet. Create a post, set your slider image as Post\'s featured image ( Recommended image size 1280*450 ) ). Go to Customizer and click greenr Options => Home and select Slider Post Category and No.of Sliders.<p><a href="%1$s"target="_blank"> Customizer </a></p>', 'greenr'),  admin_url('customize.php') ),
	            'thumbnail' => '{{post-featured-image}}',
	        ),
	        'post-two' => array(
	            'post_type' => 'post',
	            'post_title' => __( 'Post Two', 'greenr'),
	            'post_content' => sprintf( __('<h1> Slider Setting </h1><p>You haven\'t created any slider yet. Create a post, set your slider image as Post\'s featured image ( Recommended image size 1280*450 ) ). Go to Customizer and click greenr Options => Home and select Slider Post Category and No.of Sliders.<p><a href="%1$s"target="_blank"> Customizer </a></p>', 'greenr'),  admin_url('customize.php') ),
	            'thumbnail' => '{{post-featured-image}}',
	        ),  
			'service-one' => array(  
				'post_type' => 'page',
				'post_title' => __( 'Responsive Layout', 'greenr'),
	            'post_content' => sprintf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s"target="_blank"> Customizer </a> and click greenr Options => Home => Service Section #1 and select page from  dropdown page list.','greenr'), admin_url('customize.php') ),
				'thumbnail' => '{{page-images}}',
			),
			'service-two' => array(
				'post_type' => 'page',
				'post_title' => __( 'Awesome Slider', 'greenr'),
	            'post_content' => sprintf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s"target="_blank"> Customizer </a> and click greenr Options => Home => Service Section #1 and select page from  dropdown page list.','greenr'), admin_url('customize.php') ),
				'thumbnail' => '{{page-images}}',
			),
			'service-three' => array(
				'post_type' => 'page',
				'post_title' => __( 'Fully Customizable', 'greenr'),
	            'post_content' => sprintf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s"target="_blank"> Customizer </a> and click greenr Options => Home => Service Section #1 and select page from  dropdown page list.','greenr'), admin_url('customize.php') ),
				'thumbnail' => '{{page-images}}',
			),	*/		
		),

		// Create the custom image attachments used as post thumbnails for pages.
		/*'attachments' => array(
			'post-featured-image' => array( 
				'post_title' => __( 'slider one', 'greenr' ),
				'file' => 'images/slider.png', // URL relative to the template directory.
			),
			'page-images' => array(
				'post_title' => __( 'Page Images', 'greenr' ),
				'file' => 'images/page.png', // URL relative to the template directory.
			),
		), */

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
			
		),  

		// Set the front page section theme mods to the IDs of the core-registered pages.
		/*'theme_mods' => array( 
			'slider_cat' => '1',
			'service_1' => '{{service-one}}',
			'service_2' => '{{service-two}}',
			'service_3' => '{{service-three}}', 
		),*/

	);

	$starter_content = apply_filters( 'greenr_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
endif; // greenr_setup
add_action( 'after_setup_theme', 'greenr_setup' );
add_action( 'after_setup_theme', 'greenr_customizer_setup',11 );

if( ! function_exists( 'greenr_customizer_setup' ) ) {
		//echo '<pre>', print_r($greenr), '</pre>';
	function greenr_customizer_setup() {
		$ver = get_theme_mod( 'version', false );
		if ( version_compare( $ver, '1.1.0' , '<=' ) && !empty($ver) ) {   
			if(  count( get_theme_mods() ) <= 1 ) {
				global $options;
				$greenr = get_option('greenr');
				foreach($options['panels']['theme_options']['sections'] as $section) {
					foreach( $section['fields'] as $name => $settings ) {
						//echo 'Name: ' . $name . '<br>' . 'Value: ' . $greenr[$name] . '<br>';
						if( ! get_theme_mod( $name ) && isset( $greenr[$name] ) ) {
							if( is_array( $greenr[$name] ) ) {
								set_theme_mod( $name, $greenr[$name]['url'] );
							} else {
								set_theme_mod( $name, $greenr[$name] );
							}
						}
					}		
				}

			 	foreach($options['panels']['home']['sections'] as $section) {
					foreach( $section['fields'] as $name => $settings ) {
						if( ! get_theme_mod( $name ) && isset( $greenr[$name] ) ) {
									if( is_array($greenr[$name]) ) {
										set_theme_mod( $name, $greenr[$name]['url'] );
									} 
									else {
										set_theme_mod( $name, $greenr[$name] );
									}
						}
				
						if ( isset ( $greenr['slides'] ) ) {		
							$slide_count = 1;
							foreach($greenr['slides'] as $slide) {
								if( ! get_theme_mod( 'image_upload-' . $slide_count ) && isset( $slide['image'] ) ) {
									set_theme_mod( 'image_upload-' . $slide_count, $slide['image']);
								}
								if( ! get_theme_mod( 'flexcaption-' . $slide_count ) && isset( $slide['description'] ) ) {
									set_theme_mod( 'flexcaption-' . $slide_count, $slide['description']);
								}
								$slide_count++;
							}
							
						}
					}
				}	
			}
	    }
	}
}


	/* Defining directory PATH Constants */
	define( 'GREENR_PARENT_DIR', get_template_directory() );
	define( 'GREENR_CHILD_DIR', get_stylesheet_directory() );
	define( 'GREENR_INCLUDES_DIR', GREENR_PARENT_DIR. '/includes' );

	/** Defining URL Constants */
	define( 'GREENR_PARENT_URL', get_template_directory_uri() );
	define( 'GREENR_CHILD_URL', get_stylesheet_directory_uri() );
	define( 'GREENR_INCLUDES_URL', GREENR_PARENT_URL . '/includes' );

	/* 
	Check for language directory setup in Child Theme
	If not present, use parent theme's languages dir
	*/
	if ( ! defined( 'GREENR_LANGUAGES_URL' ) ) /** So we can predefine to child theme */
		define( 'GREENR_LANGUAGES_URL', GREENR_PARENT_URL . '/languages' );

	if ( ! defined( 'GREENR_LANGUAGES_DIR' ) ) /** So we can predefine to child theme */
		define( 'GREENR_LANGUAGES_DIR', GREENR_PARENT_DIR . '/languages' );


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function greenr_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'greenr' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidebar Left', 'greenr' ),
		'id'            => 'sidebar-left',
		'description'   => __( 'Left Sidebar', 'greenr' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Right', 'greenr' ),
		'id'            => 'header-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'greenr' ),
		'id'            => 'footer-1', 
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'greenr' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'greenr' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 4', 'greenr' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
   register_sidebar( array(
		'name'          => __( 'Footer Nav', 'greenr' ),
		'id'            => 'footer-nav',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'greenr_widgets_init' );

/**
 * Load Theme Options Panel
 */

/**
 * Enqueue Scripts and Styles
 */
require_once GREENR_INCLUDES_DIR . '/enqueue.php';

/**
 * Implement the Custom Header feature.
 */
require GREENR_INCLUDES_DIR . '/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require GREENR_INCLUDES_DIR . '/template-tags.php';

/**
 * Free Theme upgrade page 
 */
require get_template_directory() . '/includes/theme_upgrade.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Custom functions that act independently of the theme templates.
 */

require GREENR_INCLUDES_DIR . '/extras.php';

/**
 * Customizer
 */
require GREENR_INCLUDES_DIR . '/customizer.php';


/**
 * Inline style ( Theme Options )
 */
require get_template_directory() . '/includes/styles.php';

/**
 * JigoShop Support
 */
require_once( GREENR_INCLUDES_DIR . '/jigoshop.php' );

/**
 * Load Filter and Hook functions
 */

require get_template_directory() . '/includes/hooks-filters.php';


function greenr_slide_exists() {
	
	for ( $slide = 1; $slide < 6; $slide++) {
		$url = get_theme_mod( 'image_upload-' .$slide );   
		$caption = get_theme_mod( 'flexcaption-' .$slide );  
		if ( $url || $caption ) {
			return true;
		} 
	}
	
	return false;	
}

/* Woocommerce support */

add_theme_support('woocommerce');
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
add_action('woocommerce_before_main_content', 'greenr_output_content_wrapper');


function greenr_output_content_wrapper() {
	$woocommerce_sidebar = get_theme_mod('woocommerce_sidebar',true ) ;
	if( $woocommerce_sidebar ) {
        $woocommerce_sidebar_column = 'eleven';
    }else {
        $woocommerce_sidebar_column = 'sixteen';
        remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar');
    }
	echo '<div class="site-content container" id="content"><div id="primary" class="content-area '. $woocommerce_sidebar_column .' columns">';	
}

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );
add_action( 'woocommerce_after_main_content', 'greenr_output_content_wrapper_end' );

function greenr_output_content_wrapper_end () {
	echo "</div>";
}

add_action( 'init', 'greenr_remove_wc_breadcrumbs' );  
function greenr_remove_wc_breadcrumbs() {
   	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

include_once( get_template_directory() . '/admin/theme-options.php' );