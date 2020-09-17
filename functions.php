<?php
/**
 * AccessPress Root functions and definitions
 *
 * @package AccessPress Root
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'accesspress_root_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function accesspress_root_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on AccessPress Root, use a find and replace
	 * to change 'accesspress-root' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'accesspress-root', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style('css/editor-style.css');	

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'accesspress_root_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	add_theme_support( 'custom-header' );

	/** Woocommerce Compatibility **/
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('accesspress-root-service-thumbnail', 380, 252, true);
	add_image_size('accesspress-root-blog-thumbnail', 558, 237, true);
	add_image_size('accesspress-root-project-thumbnail', 264, 200, true);
	add_image_size('accesspress-root-project-big-thumbnail', 558, 160, true);
	add_image_size('accesspress-root-blog-big-thumbnail', 760, 300, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'accesspress-root' ),
		'footer' => __( 'Footer Menu', 'accesspress-root' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

}
endif; // accesspress_root_setup
add_action( 'after_setup_theme', 'accesspress_root_setup' );


	/**
	 * Enqueue Admin Scripts and Styles
	 */
	function accesspress_root_admin_scripts() {
	    wp_enqueue_style( 'accesspress-root-admin', get_template_directory_uri() . '/inc/css/ap-admin.css');
	    wp_register_script('accesspress-root-admin', get_template_directory_uri() . '/inc/js/ap-admin.js', array('jquery','jquery-ui-sortable' ));
	    wp_enqueue_script('accesspress-root-admin');

    	$default_sections = array(
			'text_slider' => '1', 
			'service_block' => '2',
			'call_to_action' => '3',
			'feature_block' => '4',
			'latest_post_block' => '5',
			'project_block' => '6',
	    	'testimonial_slider' => '7'
	    );
		$accesspress_root_customizer = array();
		$accesspress_root_customizer['ajax_url'] = admin_url( 'admin-ajax.php' );
		$accesspress_root_option = get_option( 'accesspress-root', $default_sections );
		$accesspress_root_customizer['sections'] = isset($accesspress_root_option['home_order']) ? $accesspress_root_option['home_order'] : $default_sections;
		wp_localize_script( 'accesspress-root-admin', 'ApAdminObj', $accesspress_root_customizer );
	}

	add_action('admin_enqueue_scripts', 'accesspress_root_admin_scripts');
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function accesspress_root_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'accesspress-root' ),
		'id'            => 'sidebar-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'accesspress-root' ),
		'id'            => 'sidebar-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'accesspress-root' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="footer-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'accesspress-root' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="footer-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'accesspress-root' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="footer-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'accesspress-root' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="footer-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'accesspress_root_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function accesspress_root_scripts() {
	$query_args = array(
        'family' => 'Oswald:400,300,700|Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic',
    ); 
	wp_enqueue_style('accesspress-root-google-fonts-css', add_query_arg($query_args, "//fonts.googleapis.com/css"));
	wp_enqueue_style('accesspress-root-step3-css', get_template_directory_uri() . '/css/off-canvas-menu.css');
    wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/css/fontawesome/css/font-awesome.min.css');
    wp_enqueue_style('bxslider', get_template_directory_uri() . '/css/jquery.bxslider.css');
    wp_enqueue_style('nivo-lightbox', get_template_directory_uri() . '/css/nivo-lightbox.css');
    wp_enqueue_style('accesspress-root-woocommerce-style',get_template_directory_uri().'/woocommerce/woocommerce-style.css');
    wp_enqueue_style('accesspress-root-style', get_stylesheet_uri() );
    wp_enqueue_style('ap-root-keyboard', get_template_directory_uri() . '/css/keyboard.css');
    
    if( of_get_option('responsive', true ) == true ) :
		wp_enqueue_style( 'accesspress-root-responsive', get_template_directory_uri() . '/css/responsive.css' );
	endif;

	wp_enqueue_script( 'bxslider-js', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '4.2.1', true );
	wp_enqueue_script( 'actual', get_template_directory_uri() . '/js/jquery.actual.min.js', array('jquery'), '1.0.16', true );
	wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/js/nivo-lightbox.min.js', array('jquery'), '1.2.0', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array('jquery'), '1.2.0', false );
    wp_register_script( 'accesspress-root-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);

    $accesspress_show_pager = (of_get_option('show_pager') ) ? "true" : "false";
	$accesspress_show_controls = (of_get_option('show_controls') ) ? "true" : "false";
	$accesspress_auto_transition = (of_get_option('auto_transition') ) ? "true" : "false";
	$accesspress_slider_transition = (!of_get_option('slider_transition')) ? "fade" : of_get_option('slider_transition');
	$accesspress_slider_speed = (!of_get_option('slider_speed')) ? "5000" : of_get_option('slider_speed');
	$accesspress_slider_pause = (!of_get_option('slider_pause')) ? "5000" : of_get_option('slider_pause');

    $script_vals = array(
		'pager' 		=> $accesspress_show_pager,
		'controls' 		=> $accesspress_show_controls,
		'mode' 			=> $accesspress_slider_transition,
		'auto' 			=> $accesspress_auto_transition,
		'pause' 		=> $accesspress_slider_pause,
		'speed' 		=> $accesspress_slider_speed

	);
	wp_localize_script('accesspress-root-custom-js','accesspress_root_script',$script_vals );
	wp_enqueue_script('accesspress-root-custom-js');


    wp_enqueue_script( 'off-canvas-menu', get_template_directory_uri() . '/js/off-canvas-menu.js', array(), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'accesspress_root_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/accesspress-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Option Framework.
 */
require get_template_directory() . '/inc/panel/options-framework.php';

/**
 * Woocommerce Functions
 */
require get_template_directory() .'/woocommerce/woocommerce-function.php';

/**
 *
 * Add Welcome Page
 */
require get_template_directory() .'/inc/welcome/welcome-config.php';

/**
 *
 * Add Dynamic Styles
 */
require get_template_directory() .'/css/style.php';
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';