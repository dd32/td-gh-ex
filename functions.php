<?php
/**
 * BOXY functions and definitions
 *
 * @package BOXY
 * @subpackage boxy
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 870; /* pixels */
}

if ( ! function_exists( 'boxy_setup' ) ) :   
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function boxy_setup() {         

		// Makes theme translation ready 
		load_theme_textdomain( 'boxy', BOXY_LANGUAGES_DIR );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_editor_style( 'css/editor-style.css' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
				'primary' => __( 'Primary Menu', 'boxy' ),
			) );

		// Setup the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'boxy_custom_background_args', array(
					'default-color' => 'ffffff',
					'default-image' => '',
				) ) );

			// Enable support for Post Formats.
			add_theme_support( 'post-formats', array(
			'aside', 'image', 'video', 'quote', 'link',
		) );

		add_theme_support( 'custom-background' );
		

		add_theme_support( 'custom-logo' );

		// Add theme support for Semantic Markup
		$markup = array( 'search-form', 'comment-form', 'comment-list', );
		add_theme_support( 'html5', $markup );

		// Add theme support for title tag
		add_theme_support( 'title-tag' );

        /*
		 * Add Additional image sizes
		 *
		 */        

		if( get_theme_mod('image_crop_mode') == 'soft' ) {
			add_image_size( 'boxy_recent-post-img', 380, 350);
			add_image_size( 'boxy_service-img', 100, 100);
			add_image_size( 'boxy-blog-full-width', 1200,350);
			add_image_size( 'boxy-small-featured-image-width', 450,300);
			add_image_size( 'boxy-blog-large-width', 800,300);
			add_image_size( 'boxy-rpgallery', 250, 200);		
		}else {
			add_image_size( 'boxy_recent-post-img', 380, 350, true);
			add_image_size( 'boxy_service-img', 100, 100, true);
			add_image_size( 'boxy-blog-full-width', 1200,350, true );
			add_image_size( 'boxy-small-featured-image-width', 450,300, true );
			add_image_size( 'boxy-blog-large-width', 800,300, true );
			add_image_size( 'boxy-rpgallery', 250, 200, true );
		}


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
					  'title' => 'About Boxy',
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
					  'text'  => '<ul><li><i class="fa fa-envelope-o"></i>  <a href="mailto:information@Gmail.com">information@gmail.com</a></li><li><i class="fa fa-phone"></i> Call Us:(1)118 234 678</li><li><i class="fa fa-phone"></i>Mobile:125(3) 5566 555</li><li><i class="fa fa-map-marker"></i>Street N1, 12345, Washington D.C</li></ul>'
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
	            'post_title' => __( 'Post One', 'boxy'),
	            'post_content' => sprintf( __('<h1> Slider Setting </h1><p>You haven\'t created any slider yet. Create a post, set your slider image as Post\'s featured image ( Recommended image size 1280*450 ) ). Go to Customizer and click boxy Options => Home and select Slider Post Category and No.of Sliders.<p><a href="%1$s"target="_blank"> Customizer </a></p>', 'boxy'),  admin_url('customize.php') ),
	            'thumbnail' => '{{post-featured-image}}',
	        ),
	        'post-two' => array(
	            'post_type' => 'post',
	            'post_title' => __( 'Post Two', 'boxy'),
	            'post_content' => sprintf( __('<h1> Slider Setting </h1><p>You haven\'t created any slider yet. Create a post, set your slider image as Post\'s featured image ( Recommended image size 1280*450 ) ). Go to Customizer and click boxy Options => Home and select Slider Post Category and No.of Sliders.<p><a href="%1$s"target="_blank"> Customizer </a></p>', 'boxy'),  admin_url('customize.php') ),
	            'thumbnail' => '{{post-featured-image}}',
	        ),  
			'service-one' => array(  
				'post_type' => 'page',
				'post_title' => __( 'Responsive Layout', 'boxy'),
	            'post_content' => sprintf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s"target="_blank"> Customizer </a> and click boxy Options => Home => Service Section #1 and select page from  dropdown page list.','boxy'), admin_url('customize.php') ),
				'thumbnail' => '{{page-images}}',
			),
			'service-two' => array(
				'post_type' => 'page',
				'post_title' => __( 'Awesome Slider', 'boxy'),
	            'post_content' => sprintf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s"target="_blank"> Customizer </a> and click boxy Options => Home => Service Section #1 and select page from  dropdown page list.','boxy'), admin_url('customize.php') ),
				'thumbnail' => '{{page-images}}',
			),
			'service-three' => array(
				'post_type' => 'page',
				'post_title' => __( 'Fully Customizable', 'boxy'),
	            'post_content' => sprintf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s"target="_blank"> Customizer </a> and click boxy Options => Home => Service Section #1 and select page from  dropdown page list.','boxy'), admin_url('customize.php') ),
				'thumbnail' => '{{page-images}}',
			),	*/		
		),

		// Create the custom image attachments used as post thumbnails for pages.
		/*'attachments' => array(
			'post-featured-image' => array( 
				'post_title' => __( 'slider one', 'boxy' ),
				'file' => 'images/slider.png', // URL relative to the template directory.
			),
			'page-images' => array(
				'post_title' => __( 'Page Images', 'boxy' ),
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
		'theme_mods' => array( 
			'client_image-1' => BOXY_PARENT_URL .'/images/logo.png',
			/*'slider_cat' => '1',
			'service_1' => '{{service-one}}',
			'service_2' => '{{service-two}}',
			'service_3' => '{{service-three}}', */
		),

	);

	$starter_content = apply_filters( 'boxy_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
	  
	}
endif; // boxy_setup
add_action( 'after_setup_theme', 'boxy_setup' );
add_action( 'after_setup_theme', 'boxy_customizer_setup',11 );

if( ! function_exists( 'boxy_customizer_setup' ) ) {
		//echo '<pre>', print_r($boxy), '</pre>';
	function boxy_customizer_setup() {
		$ver = get_theme_mod( 'version', false );
		// Return if update has already been run
		if ( version_compare( $ver, '1.1.6' , '<=' ) && !empty($ver) ) {
			if(  count( get_theme_mods() ) <= 1 ) {
				global $options;
				$boxy = get_option('boxy');
				foreach($options['panels']['theme_options']['sections'] as $section) {
					foreach( $section['fields'] as $name => $settings ) {
						//echo 'Name: ' . $name . '<br>' . 'Value: ' . $boxy[$name] . '<br>';
						if( ! get_theme_mod( $name ) && isset( $boxy[$name] ) ) {
							if( is_array( $boxy[$name] ) ) {
								set_theme_mod( $name, $boxy[$name]['url'] );
							} else {
								set_theme_mod( $name, $boxy[$name] );
							}
						}
					}		
				}

			 	foreach($options['panels']['home']['sections'] as $section) {
					foreach( $section['fields'] as $name => $settings ) {
						if( ! get_theme_mod( $name ) && isset( $boxy[$name] ) ) {
									if( is_array($boxy[$name]) ) {
										set_theme_mod( $name, $boxy[$name]['url'] );
									} 
									else {
										set_theme_mod( $name, $boxy[$name] );
									}
						}
				
						if ( isset ( $boxy['slides'] ) ) {		
							$slide_count = 1;
							foreach($boxy['slides'] as $slide) {
								if( ! get_theme_mod( 'image_upload-' . $slide_count ) && isset( $slide['image'] ) ) {
									set_theme_mod( 'image_upload-' . $slide_count, $slide['image']);
								}
								if( ! get_theme_mod( 'flexcaption-' . $slide_count ) && isset( $slide['description'] ) ) {
									set_theme_mod( 'flexcaption-' . $slide_count, $slide['description']);
								}
								$slide_count++;
							}
						}
						if ( isset ( $boxy['clients'] ) ) {
							$slide_count = 1;
							foreach($boxy['clients'] as $slide) {
								if( ! get_theme_mod( 'client_image-' . $slide_count ) && isset( $slide['image'] ) ) {
									set_theme_mod( 'client_image-' . $slide_count, $slide['image']);  
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

// constant //

/* Defining directory PATH Constants */
define( 'BOXY_PARENT_DIR', get_template_directory() );
define( 'BOXY_CHILD_DIR', get_stylesheet_directory() );
define( 'BOXY_INCLUDES_DIR', BOXY_PARENT_DIR. '/includes' );

/** Defining URL Constants */
define( 'BOXY_PARENT_URL', get_template_directory_uri() );
define( 'BOXY_CHILD_URL', get_stylesheet_directory_uri() );
define( 'BOXY_INCLUDES_URL', BOXY_PARENT_URL . '/includes' );

/*
	Check for language directory setup in Child Theme
	If not present, use parent theme's languages dir
	*/
if ( ! defined( 'BOXY_LANGUAGES_URL' ) ) /** So we can predefine to child theme */
	define( 'BOXY_LANGUAGES_URL', BOXY_PARENT_URL . '/languages' );

if ( ! defined( 'BOXY_LANGUAGES_DIR' ) ) /** So we can predefine to child theme */
	define( 'BOXY_LANGUAGES_DIR', BOXY_PARENT_DIR . '/languages' );


/**
 * Register widgetized area and update sidebar with default widgets.
 */
function boxy_widgets_init() {
	register_sidebar( array(
			'name'          => __( 'Sidebar', 'boxy' ),
			'id'            => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	register_sidebar( array(
		'name'          => __( 'Sidebar Left', 'boxy' ),
		'id'            => 'sidebar-left',
		'description'   => __( 'Left Sidebar', 'boxy' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Header Top Right', 'boxy' ),
		'id'            => 'header-top-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );


	register_sidebar( array(
			'name'          => __( 'Footer 1', 'boxy' ),
			'id'            => 'footer-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

	register_sidebar( array(
			'name'          => __( 'Footer 2', 'boxy' ),
			'id'            => 'footer-2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

	register_sidebar( array(
			'name'          => __( 'Footer 3', 'boxy' ),
			'id'            => 'footer-3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

	register_sidebar( array(
			'name'          => __( 'Footer 4', 'boxy' ),
			'id'            => 'footer-4',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

   register_sidebar( array(
		'name'          => __( 'Footer Nav', 'boxy' ),
		'id'            => 'footer-nav',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'boxy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/includes/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';
/**
 * Free Theme upgrade page 
 */
require get_template_directory() . '/includes/theme_upgrade.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';
/**
 * Implement the Custom Header feature.
 */
require  get_template_directory()  . '/includes/custom-header.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load Theme Options Panel
 */
require get_template_directory() . '/admin/theme-options.php';

/**  
 * Load TGM plugin 
 */
require get_template_directory() . '/admin/class-tgm-plugin-activation.php';

/**
 * Inline style ( Theme Options )
 */
require get_template_directory() . '/includes/styles.php';

/**
 * hooks-filter
 */
require get_template_directory() . '/includes/hooks-filters.php';




function boxy_slide_exists() {
	
	for ( $slide = 1; $slide < 6; $slide++) {
		$url = get_theme_mod( 'image_upload-' .$slide );
		if ( $url ) {
			return true;
		} 
	}    
	
	return false;	
}

function boxy_client_exists() {
	
	for ( $slide = 1; $slide < 7; $slide++) {
		$url = get_theme_mod( 'client_image-' .$slide );
		if ( $url ) {
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
add_action('woocommerce_before_main_content', 'boxy_output_content_wrapper');

function boxy_output_content_wrapper() {
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
add_action( 'woocommerce_after_main_content', 'boxy_output_content_wrapper_end' );

function boxy_output_content_wrapper_end () {
	echo "</div>";
}    

add_action( 'init', 'boxy_remove_wc_breadcrumbs' );
function boxy_remove_wc_breadcrumbs() {
   	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}



// Blog image size cropping ( Select Crop or Hard ) 

if( !function_exists('boxy_image_size_crop_option') ) { 
	function boxy_image_size_crop_option() {
		$ver = get_theme_mod( 'version', false );
		 // Return if update has already been run
		if ( version_compare( $ver, '1.2.6' ) >= 0 ) {
	   		if( ! get_theme_mod('image_crop_mode') ) {
	           set_theme_mod('image_crop_mode','soft');
			}
		    return;
		} 

		if( ! get_theme_mod('image_crop_mode') ) {
           set_theme_mod('image_crop_mode','hard');   
		}       
 
		// Update to match your current theme version
		set_theme_mod( 'version', '1.2.6' );
	}
}     
add_action( 'after_setup_theme', 'boxy_image_size_crop_option' );


/* Recommended plugin using TGM */
add_action( 'tgmpa_register', 'boxy_register_plugins');
if( !function_exists('boxy_register_plugins') ) {
	function boxy_register_plugins() {
       /**
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = array(
			array(
				'name'               => 'WPForms Lite', // The plugin name.
				'slug'               => 'wpforms-lite', // The plugin slug (typically the folder name).
				'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			),
		);
		/*
		 * Array of configuration settings. Amend each line as needed.
		 *
		 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
		 * strings available, please help us make TGMPA even better by giving us access to these translations or by
		 * sending in a pull-request with .po file(s) with the translations.
		 *
		 * Only uncomment the strings in the config array if you want to customize the strings.
		 */
		$config = array(
			'id'           => 'tgmpa',
			// Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',
			// Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins',
			// Menu slug.
			'parent_slug'  => 'themes.php',
			// Parent menu slug.
			'capability'   => 'edit_theme_options',
			// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,
			// Show admin notices or not.
			'dismissable'  => true,
			// If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',
			// If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,
			// Automatically activate plugins after installation or not.
			'message'      => '',
			// Message to output right before the plugins table.
		);
		tgmpa( $plugins, $config );
	}
}