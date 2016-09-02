<?php
/**
 * Bakes And Cakes functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bakes_And_Cakes
 */

if (!function_exists('bakes_and_cakes_setup')):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
	function bakes_and_cakes_setup() {
		/*
			 * Make theme available for translation.
			 * Translations can be filed in the /languages/ directory.
			 * If you're building a theme based on Bakes And Cakes, use a find and replace
			 * to change 'bakes-and-cakes' to the name of your theme in all the template files.
		*/
		load_theme_textdomain('bakes-and-cakes', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
			 * Let WordPress manage the document title.
			 * By adding theme support, we declare that this theme does not use a
			 * hard-coded <title> tag in the document head, and expect WordPress to
			 * provide it for us.
		*/
		add_theme_support('title-tag');
        
        /* Enable support for Excerpt on pages. */
		add_post_type_support( 'page', 'excerpt' );

		/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support('post-thumbnails');


	    /* Custom Logo */
	    add_theme_support( 'custom-logo', array(
	    	'header-text' => array( 'site-title', 'site-description' ),
	    ) );
    

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'primary' => esc_html__('Primary', 'bakes-and-cakes'),
		));

		/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
		*/
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		/*
			 * Enable support for Post Formats.
			 * See https://developer.wordpress.org/themes/functionality/post-formats/
		*/
		add_theme_support('post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('bakes_and_cakes_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		//Custom Image Sizes
		add_image_size('bakes-and-cakes-post-thumb', 60, 60, true);
		add_image_size('bakes-and-cakes-about-thumb', 600, 400, true);
		add_image_size('bakes-and-cakes-product-thumb', 235, 235, true);
		add_image_size('bakes-and-cakes-feature-thumb', 300, 220, true);
		add_image_size('bakes-and-cakes-slider', 1920, 500, true);
		add_image_size('bakes-and-cakes-slider-thumb', 63, 46, true);
		add_image_size('bakes-and-cakes-image-full', 1139, 498, true);
		add_image_size('bakes-and-cakes-image', 750, 400, true);
		add_image_size('bakes-and-cakes-staff-thumb', 487, 527, true);
		add_image_size('bakes-and-cakes-popular-post', 80, 70, true);
		add_image_size('bakes-and-cakes-blog-thumb', 280, 255, true);
		add_image_size('bakes-and-cakes-events-thumb', 255, 255, true);
	}

endif;
add_action('after_setup_theme', 'bakes_and_cakes_setup');

/**
 * Return sidebar layouts for pages
*/
function bakes_and_cakes_sidebar_layout(){
    global $post;
    
    if( get_post_meta( $post->ID, 'bakes_and_cakes_sidebar_layout', true ) ){
        return get_post_meta( $post->ID, 'bakes_and_cakes_sidebar_layout', true );    
    }else{
        return 'right-sidebar';
    }
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bakes_and_cakes_content_width() {
	$GLOBALS['content_width'] = apply_filters('bakes_and_cakes_content_width', 750);

}
add_action('after_setup_theme', 'bakes_and_cakes_content_width', 0);


/**
* Adjust content_width value according to template.
*
* @return void
*/
function bakes_and_cakes_template_redirect_content_width() {
     
	// Full Width in the absence of sidebar.
	if( is_page() ){
	   $sidebar_layout = bakes_and_cakes_sidebar_layout();
       if( ( $sidebar_layout == 'no-sidebar' ) || ! ( is_active_sidebar( 'right-sidebar' ) ) ) $GLOBALS['content_width'] = 1170;
        
	}elseif ( ! ( is_active_sidebar( 'right-sidebar' ) ) ) {
		$GLOBALS['content_width'] = 1170;
	}

}

add_action( 'template_redirect', 'bakes_and_cakes_template_redirect_content_width' );

/**
 * Custom CSS
*/
function bakes_and_cakes_custom_css(){
    $custom_css = get_theme_mod( 'bakes_and_cakes_custom_css' );
    if( !empty( $custom_css ) ){
		echo '<style type="text/css">';
		echo wp_strip_all_tags( $custom_css );
		echo '</style>';
	}
}
add_action( 'wp_head', 'bakes_and_cakes_custom_css', 100 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bakes_and_cakes_widgets_init() {
	register_sidebar(array(
		'name' => esc_html__('Right Sidebar', 'bakes-and-cakes'),
		'id' => 'right-sidebar',
		'description' => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

	register_sidebar(array(
		'name' => esc_html__('Footer First', 'bakes-and-cakes'),
		'id' => 'footer-first',
		'description' => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

	register_sidebar(array(
		'name' => esc_html__('Footer Second', 'bakes-and-cakes'),
		'id' => 'footer-second',
		'description' => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

	register_sidebar(array(
		'name' => esc_html__('Footer Third', 'bakes-and-cakes'),
		'id' => 'footer-third',
		'description' => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

}
add_action('widgets_init', 'bakes_and_cakes_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function bakes_and_cakes_scripts() {
	$query_args = array(
		'family' => 'Open+Sans:400,400italic,700|Niconne',
	);
	$my_theme = wp_get_theme();
    $version = $my_theme['Version'];

	wp_enqueue_style('bakes-and-cakes-font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
	wp_enqueue_style('bakes-and-cakes-flexslider-style', get_template_directory_uri() . '/css/flexslider.css');
	wp_enqueue_style('bakes-and-cakes-jquery-sidr-light-style', get_template_directory_uri() . '/css/jquery.sidr.light.css');
	wp_enqueue_style('bakes-and-cakes-lightslider-style', get_template_directory_uri() . '/css/lightslider.css');
	wp_enqueue_style('bakes-and-cakes-google-fonts', add_query_arg($query_args, "//fonts.googleapis.com/css"));
	wp_enqueue_style('bakes-and-cakes-style', get_stylesheet_uri());
	
	if( is_woocommerce_activated() )
    wp_enqueue_style( 'bakes-and-cakes-woocommerce-style', get_template_directory_uri(). '/css/woocommerce.css', array('bakes-and-cakes-style'), $version );
    
	
	wp_enqueue_script('bakes-and-cakes-light-slider', get_template_directory_uri() . '/js/lightslider.js', array(), '20120206', true);
	wp_enqueue_script('bakes-and-cakes-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), '2.6.0', true);
	wp_enqueue_script('bakes-and-cakes-tab', get_template_directory_uri() . '/js/tab.js', array(), '20120206', true);
	wp_enqueue_script('bakes-and-cakes-same-height', get_template_directory_uri() . '/js/sameheight.js', array(), '20120206', true);
	wp_enqueue_script('bakes-and-cakes-slider-setting', get_template_directory_uri() . '/js/slider-setting.js', array('jquery'), '2.0.8', true);
	wp_enqueue_script('bakes-and-cakes-sidr', get_template_directory_uri() . '/js/jquery.sidr.js', array('jquery'), '2.0.8', true);
	wp_register_script('bakes-and-cakes-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20151228', true);
	
    $slider_auto      = get_theme_mod( 'bakes_and_cakes_slider_auto', '1' );
    $slider_loop      = get_theme_mod( 'bakes_and_cakes_slider_loop', '1' );
    $slider_pager     = get_theme_mod( 'bakes_and_cakes_slider_control', '1' );    
    $slider_animation = get_theme_mod( 'bakes_and_cakes_slider_animation', 'slide' );
    $slider_speed     = get_theme_mod( 'bakes_and_cakes_slider_speed', '7000' );
    $animation_speed  = get_theme_mod( 'bakes_and_cakes_animation_speed', '600' );
    
    $array = array(
        'auto'      => esc_attr( $slider_auto ),
        'loop'      => esc_attr( $slider_loop ),
        'pager'     => esc_attr( $slider_pager ),
        'animation' => esc_attr( $slider_animation ),
        'speed'     => absint( $slider_speed ),
        'a_speed'   => absint( $animation_speed )
    );
    
    wp_localize_script( 'bakes-and-cakes-custom', 'bakes_and_cakes_data', $array );
    wp_enqueue_script( 'bakes-and-cakes-custom' );

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'bakes_and_cakes_scripts');


if ( ! function_exists( 'bakes_and_cakes_excerpt_more' ) && ! is_admin() ) :
	/**
	* Replaces "[...]" (appended to automatically generated excerpts) with ... * 
	*/
	function bakes_and_cakes_excerpt_more() {
		return ' &hellip; ';
	}

endif;

add_filter( 'excerpt_more', 'bakes_and_cakes_excerpt_more' );

if ( ! function_exists( 'bakes_and_cakes_excerpt_length' ) ) :
	/**
	* Changes the default 55 character in excerpt 
	*/
	function bakes_and_cakes_excerpt_length( $length ) {
		return 400;
	}

endif;

add_filter( 'excerpt_length', 'bakes_and_cakes_excerpt_length', 999 );

/**
 * Query WooCommerce activation
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}

/**
 * Query contact form 7 activation
 */
if ( ! function_exists( 'is_contact_form_activated' ) ) {
	
	function is_contact_form_activated() {
		if ( class_exists( 'wpcf7' ) ) { return true; } else { return false; }
	}
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Custom functions for meta box.
 */
require get_template_directory() . '/inc/metabox.php';

/**
 *Rara Recent Post Widget.
 *
 */
require get_template_directory() . '/inc/widget-recent-post.php';

/**
 *Rara Popular Post Widget.
 *
 */
require get_template_directory() . '/inc/widget-popular-post.php';

/**
 *Social Media Widget.
 *
 */
require get_template_directory() . '/inc/widget-social-links.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Add theme compatibility function for woocommerce if active
*/
if( is_woocommerce_activated() ){
    require get_template_directory() . '/inc/woocommerce-functions.php';    
}

?>