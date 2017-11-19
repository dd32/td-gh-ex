<?php
/**
 * Ariel functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ariel
 */

/**
 * Customizer
 *
 * This theme recommends the Kirki customizer
 * @link https://aristath.github.io/kirki/
 */
if ( ! class_exists( 'Kirki' ) ) {
    include_once( dirname( __FILE__ ) . '/inc/ariel_kirki.php' ); //fallback
    include_once( dirname( __FILE__ ) . '/inc/ariel_kirki_installer.php' ); //installer
}
require get_template_directory() . '/customize/theme-defaults.php';
require get_template_directory() . '/customize/customizer.php';


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Tunction is attached to 'after_setup_theme' action hook.
 */
function ariel_setup() {
	global $ariel_defaults;

	// Make theme available for translation.
	load_theme_textdomain( 'ariel', get_template_directory() . '/lang' ); 

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Let WordPress manage the document title.
	 * @link https://codex.wordpress.org/Title_Tag
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Customize Selective Refresh Widgets
	 * @link https://make.wordpress.org/core/2016/03/22/implementing-selective-refresh-support-for-widgets/
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 870, 490, true );
	add_image_size( 'ariel-slider-fw', 1170, 550, true ); // Default slider
	add_image_size( 'ariel-slider-sm', 870, 550, true ); // Slider with thumbnails
	add_image_size( 'ariel-recent', 110, 110, true ); // Thumbnails for frontpage slider
	add_image_size( 'ariel-featured', 540, 540, true ); // Featured Posts 
	add_image_size( 'ariel-grid', 840, 500, true ); // Grid blog feed

	/**
	 * Register menus
	 * @link https://developer.wordpress.org/themes/functionality/navigation-menus/
	 */
	register_nav_menus( array(
		'header' => esc_html__( 'Main Menu', 'ariel' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'gallery',
		'caption',
        'comment-list',
	) );

	/**
	 * Add theme support for Custom Logo.
	 * @link https://developer.wordpress.org/themes/functionality/custom-logo/
	 */
	add_theme_support( 'custom-logo', array(
		'width'       => 300,
		'height'      => 150,
		'flex-width'  => true,
		'flex-height' => true
	) );

	/**
	 * Add theme support for Custom Background.
	 * @link https://codex.wordpress.org/Custom_Backgrounds
	 */
	$default_background_color = array(
		'default-color' => 'ffffff',
	);
	add_theme_support( 'custom-background', $default_background_color );

	/**
	 * Add theme support for Custom Header.
	 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
	 */
	$args = array(
		'width'         => 1200,
		'height'        => 550,
		'flex-height'   => true,
		'flex-width'    => true,
		'default-image' => $ariel_defaults['ariel_custom_header'],
	);
	add_theme_support( 'custom-header', $args );
    
	/**
	 * Add support for page excerpts
	 * @link https://developer.wordpress.org/reference/functions/add_post_type_support/
	 */
	add_post_type_support( 'page', 'excerpt' );

	// Set and filter the default content width
	$GLOBALS['content_width'] = apply_filters( 'ariel_content_width', 1200 );

}
add_action( 'after_setup_theme', 'ariel_setup' );


/**
 * Register Google fonts.
 *
 * @return string Returns url for Google fonts
 */
function ariel_fonts_url() {
	$fonts_url = '';

	$font_families = array();

	$font_families[] = 'Merriweather:400,400i,700,700i,900';
	$font_families[] = 'Source Sans Pro:400,400i,600,600i,700,700i,900,900i';

	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	return esc_url_raw( $fonts_url );
}


/**
 * Add preconnect for Google Fonts.
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function ariel_resource_hints( $urls, $relation_type ) {
	/**
	 * Preconnect Google fonts
	 */
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'ariel_resource_hints', 10, 2 );


/**
 * Enqueue scripts and styles.
 *
 * This function is attached to 'wp_enqueue_scripts'
 * action hook. Avoid loading files which
 * are already in WordPress core.
 * @see wp-includes/script-loader.php
 */
function ariel_scripts() {
	/**
	 * Styles
	 */
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'ariel-fonts', ariel_fonts_url(), array(), null );

	// Third party styles
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_register_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
	wp_register_style( 'slick', get_template_directory_uri() . '/assets/css/slick.min.css' );
	wp_register_style( 'slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.min.css' );

	// Default stylesheet
	$deps = array( 'bootstrap', 'font-awesome', 'slick', 'slick-theme' );
	wp_enqueue_style( 'ariel-style', get_stylesheet_uri(), $deps );
	wp_style_add_data( 'ariel-style', 'rtl', 'replace' );
	

	/**
	 * Scripts
	 */
	// Third party scripts
	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/assets/js/html5shiv.min.js', array(), '3.7.0' );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'respondjs', get_template_directory_uri() . '/assets/js/respond.min.js', array(), '1.3.0' );
	wp_script_add_data( 'respondjs', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array(), '', true );
	wp_enqueue_script( 'tinynav', get_template_directory_uri() . '/assets/js/tinynav.min.js', array(), '', true );
	// Custom theme script
	wp_enqueue_script( 'ariel-js', get_template_directory_uri() . '/assets/js/ariel.min.js', array( 'jquery' ), '', true );

	// Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'ariel_scripts' );


/**
 * Include the TGM_Plugin_Activation class to recommend Kirki
 */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'ariel_register_required_plugins' );

/**
 * Register the recommended plugins for this theme.
 *
*/
function ariel_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'Kirki',
			'slug'      => 'kirki',
			'required'  => false,
		),
	);

	$config = array(
		'id'           => 'ariel',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '' ,                     // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}


/**
 * Helper functions
 */
require_once get_template_directory() . '/inc/helper-functions.php';

/**
 * Additional features for Ariel theme
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Register sidebars and widgets
 */
require_once get_template_directory() . '/widgets/widgets.php';

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );
