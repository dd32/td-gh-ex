<?php
/**
 * conica functions and definitions
 *
 * @package Conica
 */

define( 'CONICA_THEME_VERSION' , '1.2.4' );

// Is ONLY USED IF the user prompts for the premium update
// define( 'CONICA_UPDATE_URL', 'https://updates.kairaweb.com/' );
// Upgrade / Order Premium page
// require get_template_directory() . '/upgrade/upgrade.php';
// require get_template_directory() . '/upgrade/update.php';

// Load WP included scripts
require get_template_directory() . '/includes/inc/template-tags.php';
require get_template_directory() . '/includes/inc/extras.php';
// require get_template_directory() . '/includes/inc/jetpack.php';
require get_template_directory() . '/includes/inc/customizer.php';

// Load Customizer Library scripts
require get_template_directory() . '/customizer/customizer-options.php';
require get_template_directory() . '/customizer/customizer-library/customizer-library.php';
require get_template_directory() . '/customizer/styles.php';
require get_template_directory() . '/customizer/mods.php';

if ( ! function_exists( 'kaira_setup_theme' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function kaira_setup_theme() {
    
    /**
     * Set the content width based on the theme's design and stylesheet.
     */
    global $content_width;
    if ( ! isset( $content_width ) )
        $content_width = 870; /* pixels */

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Conica, use a find and replace
	 * to change 'conica' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'conica', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );
    
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'main-menu' => __( 'Main Menu', 'conica' )
	) );

	add_theme_support('post-thumbnails');
    add_image_size('blog_standard_img', 580, 380, true );
	
	// The custom header is used for the logo
	add_theme_support('custom-header', array(
        'default-image' => '',
		'width'         => 300,
		'height'        => 110,
		'flex-width' => false,
		'flex-height' => false,
		'header-text' => false,
	));
	
	add_editor_style();

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
    add_theme_support( 'custom-background', array( 'default-color' => '#F5F5F5', ) );
    
    add_theme_support( 'woocommerce' );
}
endif; // kaira_setup
add_action( 'after_setup_theme', 'kaira_setup_theme' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function kaira_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'conica' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar(array(
		'name' => __('conica Footer', 'conica'),
		'id' => 'site-footer',
	));
	
}
add_action( 'widgets_init', 'kaira_widgets_init' );

if(!function_exists('kaira_footer_widget_params')):
/**
 * Set the widths of the footer widgets
 *
 * @param $params
 * @return mixed
 * 
 * @filter dynamic_sidebar_params
 */
function kaira_footer_widget_params($params){
	// Check that this is the footer
	if($params[0]['id'] != 'site-footer') return $params;

	$sidebars_widgets = wp_get_sidebars_widgets();
	$count = count($sidebars_widgets[$params[0]['id']]);
	$params[0]['before_widget'] = preg_replace('/\>$/', ' style="width:'.round(100/$count,4).'%" >', $params[0]['before_widget']);

	return $params;
}
endif;
add_filter('dynamic_sidebar_params', 'kaira_footer_widget_params');

/**
 * Enqueue scripts and styles
 */
function kaira_scripts() {
    wp_enqueue_style( 'conica-body-font-default', '//fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic|Droid+Sans:400,700', array(), CONICA_THEME_VERSION );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/includes/font-awesome/css/font-awesome.css', array(), '4.3.0' );
	wp_enqueue_style( 'conica-style', get_stylesheet_uri(), array(), CONICA_THEME_VERSION );

	wp_enqueue_script( 'conica-navigation', get_template_directory_uri() . '/js/navigation.js', array(), CONICA_THEME_VERSION, true );
	wp_enqueue_script( 'conica-caroufredSel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), CONICA_THEME_VERSION, true );
    
    wp_enqueue_script( 'conica-waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array('jquery'), CONICA_THEME_VERSION, true );
    wp_enqueue_script( 'conica-waypoints-sticky', get_template_directory_uri() . '/js/waypoints-sticky.min.js', array('jquery'), CONICA_THEME_VERSION, true );
    
	wp_enqueue_script( 'conica-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), CONICA_THEME_VERSION, true );
    
    if ( is_home() ) {
        wp_enqueue_script( 'jquery-masonry' );
        wp_enqueue_script( 'conica-masonry-custom', get_template_directory_uri() . '/js/blog-layout.js', array('jquery'), CONICA_THEME_VERSION, true );
    }
    
	wp_enqueue_script( 'conica-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), CONICA_THEME_VERSION, true );
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'kaira-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), CONICA_THEME_VERSION );
	}
}
add_action( 'wp_enqueue_scripts', 'kaira_scripts' );

/**
 * Enqueue admin styling.
 */
function conica_load_admin_script() {
    wp_enqueue_style( 'conica-admin-css', get_template_directory_uri() . '/upgrade/css/admin-css.css' );
}
add_action( 'admin_enqueue_scripts', 'conica_load_admin_script' );

/**
 * Enqueue conica custom customizer styling.
 */
function conica_load_customizer_script() {
    wp_enqueue_script( 'conica-customizer-js', get_template_directory_uri() . '/customizer/customizer-library/js/customizer-custom.js', array('jquery'), CONICA_THEME_VERSION, true );
    wp_enqueue_style( 'conica-customizer-css', get_template_directory_uri() . '/customizer/customizer-library/css/customizer.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'conica_load_customizer_script' );

/**
 * Check if WooCommerce exists.
 */
if ( ! function_exists( 'conica_is_woocommerce_activated' ) ) :
    function conica_is_woocommerce_activated() {
        if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
    }
endif; // conica_is_woocommerce_activated

// If WooCommerce exists include ajax cart
if ( conica_is_woocommerce_activated() ) {
    require get_template_directory() . '/includes/inc/woocommerce-header-inc.php';
}

/**
 * Add classed to the body tag from settings
 */
function conica_add_body_class( $classes ) {
    if ( get_theme_mod( 'conica-woocommerce-shop-fullwidth' ) ) {
        $classes[] = 'conica-shop-full-width';
    }
    
    return $classes;
}
add_filter( 'body_class', 'conica_add_body_class' );

/**
 * Adjust is_home query if conica-blog-cats is set
 */
function conica_set_blog_queries( $query ) {
    $blog_query_set = '';
    if ( get_theme_mod( 'conica-blog-cats', false ) ) {
        $blog_query_set = get_theme_mod( 'conica-blog-cats' );
    }
    
    if ( $blog_query_set ) {
        // do not alter the query on wp-admin pages and only alter it if it's the main query
        if ( !is_admin() && $query->is_main_query() ){
            if ( is_home() ){
                $query->set( 'cat', $blog_query_set );
            }
        }
    }
}
add_action( 'pre_get_posts', 'conica_set_blog_queries' );
