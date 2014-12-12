<?php
/**
 * Puro functions and definitions.
 *
 * @package puro
 * @since puro 1.0
 * @license GPL 2.0
 */

define( 'SITEORIGIN_THEME_VERSION' , '1.0.5' );
define( 'SITEORIGIN_THEME_ENDPOINT' , 'http://updates.purothemes.com' ); 

if( file_exists( get_template_directory() . '/premium/functions.php' ) ){
	include get_template_directory() . '/premium/functions.php';
}
else {
	include get_template_directory() . '/upgrade/upgrade.php';
}

// Include all the SiteOrigin extras
include get_template_directory() . '/extras/plugin-activation/plugin-activation.php';
include get_template_directory() . '/extras/premium/premium.php';
include get_template_directory() . '/extras/settings/settings.php';
include get_template_directory() . '/extras/update/update.php';
include get_template_directory() . '/extras/adminbar/adminbar.php';

// Load the theme specific files
include get_template_directory() . '/inc/extras.php';
include get_template_directory() . '/inc/jetpack.php';
include get_template_directory() . '/inc/metaslider.php';
include get_template_directory() . '/inc/settings.php';
include get_template_directory() . '/inc/template-tags.php';
include get_template_directory() . '/inc/formats.php';
include get_template_directory() . '/tour/tour.php';

if ( ! function_exists( 'puro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function puro_setup() {

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
    global $content_width;
    if ( ! isset( $content_width ) ) {
		$content_width = 771; /* pixels */
    }		

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'puro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'puro' ),
		'social' => __( 'Social Network Icon Menu', 'puro' )
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );

	/**
	 * Support the Page Builder plugin.
	 */
	add_theme_support( 'siteorigin-panels', array(
		'margin-sides' => 41,
		'margin-bottom' => 41,
		'home-page' => true,
		'home-page-default' => false,
		'home-template' => 'page-templates/full-width-unconstrained-content-no-title.php',
	) );

	// Only include the bundled version of panels if the plugin does not exist.
	if( !defined('SITEORIGIN_PANELS_VERSION') && !siteorigin_plugin_activation_is_activating('siteorigin-panels') ) {
		include get_template_directory().'/extras/panels-lite/panels-lite.php';
	}	

	add_theme_support('siteorigin-premium-teaser', array(
		'customizer' => true,
		'settings' => true,
	));	

}
endif; // puro_setup
add_action( 'after_setup_theme', 'puro_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function puro_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'puro' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer', 'puro' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );	
}
add_action( 'widgets_init', 'puro_widgets_init' );

/**
 * Count the footer widgets and add the count to the widget class.
 */
function puro_footer_widgets_params($params) {

    $sidebar_id = $params[0]['id'];

    if ( $sidebar_id == 'sidebar-2' ) {

        $total_widgets = wp_get_sidebars_widgets();
        $sidebar_widgets = count($total_widgets[$sidebar_id]);

        $params[0]['before_widget'] = str_replace('class="', 'class="widget-count-' . floor($sidebar_widgets) . ' ', $params[0]['before_widget']);
    }

    return $params;
}
add_filter('dynamic_sidebar_params','puro_footer_widgets_params');

/**
 * Register bundled scripts.
 */
function puro_register_scripts(){
	wp_register_script( 'puro-fitvids' , get_template_directory_uri().'/js/jquery.fitvids.min.js' , array('jquery'), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'puro_register_scripts' , 5);

/**
 * Enqueue scripts and styles.
 */
function puro_scripts() {
	wp_enqueue_style( 'puro-style', get_stylesheet_uri(), array(), SITEORIGIN_THEME_VERSION );

	wp_enqueue_script( 'puro-main' , get_template_directory_uri().'/js/jquery.theme-main.min.js' , array('jquery', 'puro-fitvids'), SITEORIGIN_THEME_VERSION );

	wp_enqueue_script( 'puro-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), SITEORIGIN_THEME_VERSION, true );

	wp_enqueue_style( 'puro-font-awesome', get_template_directory_uri().'/font-awesome/css/font-awesome.min.css', array(), '4.2.0' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'puro_scripts' );

/**
 * Render the home page slider.
 */
function puro_render_slider(){
	if( is_front_page() && $GLOBALS['wp_query']->get('paged') == 0 ) {

		if(substr(siteorigin_setting('home_slider'), 0, 5) == 'meta:' && class_exists('MetaSliderPlugin')){
			$slider_id = intval(substr(siteorigin_setting('home_slider'), 5));
			echo do_shortcode("[metaslider id='".$slider_id."']");
		}
	}
}

/**
 * Filter the comment form.
 * Remove comment form allowed tags if theme option is de-activated. 
 *
 * @param $defaults
 * @return mixed
 */
function puro_comment_form_defaults($defaults){
	if(!siteorigin_setting('comments_comment_form_tags')){
		$defaults['comment_notes_after'] = null;
	}
	
	return $defaults;
}
add_filter('comment_form_defaults', 'puro_comment_form_defaults', 5);

/**
* Handles the site title and year string replace for the Footer Copyright theme option.
*/
function puro_footer_copyright_text_sub($copyright){
	return str_replace(
		array('{site-title}', '{year}'),
		array(get_bloginfo('name'), date('Y')),
		$copyright
	);
}
add_filter('puro_copyright_text', 'puro_footer_copyright_text_sub');