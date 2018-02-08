<?php
/**
 * agency-x functions and definitions
 *
 * @package agency-x
 */

if ( ! function_exists( 'agency_x_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function agency_x_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on agency-x, use a find and replace
		 * to change 'agency-x' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'agency-x', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(			
			'primary' => esc_html__( 'Primary Menu', 'agency-x' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'custom-logo', array(
	   'height'      => 90,
	   'width'       => 400,
	   'flex-width' => true,
		));

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'agency_x_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_theme_support( "custom-header", array(
			'default-color' => 'ffffff',		
		) );
		add_editor_style() ;

		// Define Image Sizes:
		add_image_size( 'banner', 717, 401, true );
	}	// agency_x_setup
endif; 
add_action( 'after_setup_theme', 'agency_x_setup' );




/**
 * Enqueue scripts and styles.
 */
function agency_x_scripts() {
	wp_enqueue_style( 'agency-x-googlefonts', 'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,700');
	wp_enqueue_style( 'hover', get_template_directory_uri().'/css/hover.css' );	
	wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/css/font-awesome.min.css' );
	wp_enqueue_style( 'slicknav', get_template_directory_uri().'/css/slicknav.min.css' );
	wp_enqueue_style( 'owl.theme.default', get_template_directory_uri().'/css/owl.theme.default.css' );
	wp_enqueue_style( 'owl', get_template_directory_uri().'/css/owl.carousel.min.css' );	
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri().'/css/magnific-popup.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri().'/css/animate.min.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css' );	
	wp_enqueue_style( 'agency-x-style', get_stylesheet_uri() );
	wp_enqueue_style( 'default', get_template_directory_uri().'/css/default.css' );	
	wp_enqueue_style( 'responsive', get_template_directory_uri().'/css/responsive.css' );
	wp_enqueue_style( 'orange', get_template_directory_uri().'/css/skin/orange.css' );	


	if ( is_rtl() ) {
		wp_enqueue_style( 'agency-x-style', get_stylesheet_uri() );
		wp_style_add_data( 'agency-x-style', 'rtl', 'replace' );
		wp_enqueue_style( 'agency-x-css-rtl', get_template_directory_uri().'/css/bootstrap-rtl.css' );
		wp_enqueue_script( 'agency-x-js-rtl', get_template_directory_uri() . '/js/bootstrap.rtl.js', array('jquery'), '1.0.0', true );
	}

	wp_enqueue_script( 'colors', get_template_directory_uri() . '/js/colors.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'scrollUp', get_template_directory_uri() . '/js/jquery.scrollUp.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'nav', get_template_directory_uri() . '/js/jquery.nav.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'typed', get_template_directory_uri() . '/js/typed.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'stellar', get_template_directory_uri() . '/js/jquery.stellar.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'particles', get_template_directory_uri() . '/js/particles.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'particles-code', get_template_directory_uri() . '/js/particle-code.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'counterup', get_template_directory_uri() . '/js/jquery.counterup.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'gmap', get_template_directory_uri() . '/js/gmap.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'agency-x-scripts', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'agency_x_scripts' );





/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! isset( $content_width ) ) $content_width = 900;
function agency_x_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'agency_x_content_width', 640 );

}
add_action( 'after_setup_theme', 'agency_x_content_width', 0 );


function agency_x_filter_front_page_template( $template ) {
    return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'agency_x_filter_front_page_template' );


/**
* Call Widget page
**/
require get_template_directory() . '/inc/widgets/widgets.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/class.php';

//require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Register Custom Navigation Walker
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';


/**
 * Add theme compatibility function for woocommerce if active
*/
if( class_exists( 'woocommerce' ) ) {
    require get_template_directory() . '/inc/woocommerce-functions.php';
}


// Remove default "Category or Tags" from title
add_filter( 'get_the_archive_title', 'remove_default_tax_title');
function remove_default_tax_title( $title ) {
	if ( is_category() ) {
	        $title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
	    $title = single_tag_title( '', false );
	}
	return $title;
}

function get_author_role() {
    global $authordata;

    $author_roles = $authordata->roles;
    $author_role = array_shift($author_roles);

    return $author_role;
}