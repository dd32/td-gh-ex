<?php
/**
 * Bellini functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bellini
 * @author  Towhid, Atlantis Themes
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 */


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

add_action( 'after_setup_theme', 'bellini_setup' );

if ( ! function_exists( 'bellini_setup' ) ) :

function bellini_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Bellini, use a find and replace
	 * to change 'bellini' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bellini', get_template_directory() . '/languages' );

	/*
     * Add default posts and comments RSS feed links to head.
     */
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
	add_image_size( 'bellini-thumb', 820, 400 );

	/*
     * This theme uses wp_nav_menu() in the following locations.
     */
	register_nav_menus( array(
		'primary' 	=> esc_html__( 'Primary Menu', 'bellini' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo');

	/*
	 * Switch default core yorkup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array('search-form','comment-form','comment-list','gallery','caption',) );

	add_theme_support('widget-customizer');

    /*
     * Enable support for Customizer Selective Refresh.
     * See: https://make.wordpress.org/core/2016/02/16/selective-refresh-in-the-customizer/
     */
	add_theme_support( 'customize-selective-refresh-widgets' );

	// WooCommerce Integration
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	add_theme_support( 'custom-background', apply_filters( 'bellini_custom_background_args', array(
		'default-color' => '#eceef1',
		'default-image' => '',
	) ) );


	add_theme_support( 'gutenberg', array(
	     'wide-images' 	=> true,
		 'colors' 		=> array(
					        '#a156b4',
					        '#d0a5db',
					        '#eee',
					        '#444',
		),
	) );

	// Set the default content width.
	$GLOBALS['content_width'] = apply_filters( 'bellini_content_width', 640 );

	add_editor_style();
}

endif;

require_once( get_template_directory() . '/core-functions/core-defaults.php');
require_once( get_template_directory() . '/core-functions/core-seo.php');
require_once( get_template_directory() . '/core-functions/core-sidebar.php');

/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'bellini_scripts' );

if ( ! function_exists( 'bellini_scripts' ) ) {
	function bellini_scripts() {

		// Bellini Stylesheets
		wp_enqueue_style('bellini-libraries',get_template_directory_uri(). '/inc/css/libraries.min.css');
		wp_enqueue_style( 'bellini-style', get_stylesheet_uri(), array(), '20181031', 'all' );

		// Load only if WooCommerce is active
		if ( is_woocommerce_activated() ) {
			wp_register_style( 'woostyles', get_template_directory_uri() . '/inc/css/bellini-woocommerce.css' );
			wp_enqueue_style( 'woostyles', '20181031' );
		}

	  	wp_enqueue_script( 'bellini-js-libraries', get_template_directory_uri() . '/inc/js/library.min.js',  array('jquery'), '20181031', true );
	  	wp_enqueue_script( 'bellini-pangolin', get_template_directory_uri() . '/inc/js/pangolin.js',  array('jquery'), '20181031', true );

	  // Load the html5 shiv.
		wp_enqueue_script( 'bellini-html5', get_template_directory_uri() . '/inc/js/html5.js', array(), '3.7.3' );
		wp_script_add_data( 'bellini-html5', 'conditional', 'lt IE 9' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}

/**
 * Gutenberg Editor Styles
 */
if ( ! function_exists( 'bellini_editor_styles' ) ) {
	function bellini_editor_styles() {
		wp_enqueue_style( 'bellini-blog-editor-style', get_template_directory_uri() . '/inc/css/editor-style.css');
	}
}

add_action( 'enqueue_block_editor_assets', 'bellini_editor_styles' );


require_once( trailingslashit( get_template_directory() ) . '/inc/structure/extras.php' );
/**
 * Implement the Custom Header feature.
 */
require_once( trailingslashit( get_template_directory() ) . '/inc/custom-header.php' );

/**
 * Customizer additions.
 */
require_once( trailingslashit( get_template_directory() ) . '/inc/customizer.php' );
require_once( trailingslashit( get_template_directory() ) . '/inc/customize/bellini-customizer-choices.php' );
require_once( trailingslashit( get_template_directory() ) . '/inc/customize/customizer-sanitization.php' );
require_once( trailingslashit( get_template_directory() ) . '/inc/comments.php' );
require_once( trailingslashit( get_template_directory() ) . '/inc/structure/hooks.php' );
require_once( trailingslashit( get_template_directory() ) . '/inc/structure/bellini-front.php' );
require_once( trailingslashit( get_template_directory() ) . '/inc/structure/bellini-header.php' );
require_once( trailingslashit( get_template_directory() ) . '/inc/structure/bellini-footer.php' );
require_once( trailingslashit( get_template_directory() ) . '/inc/widget-native-customize.php' );
require_once( trailingslashit( get_template_directory() ) . '/inc/persist-admin-notices-dismissal/persist-admin-notices-dismissal.php' );

/**
 * Support for Jetpack
 * https://wordpress.org/plugins/jetpack/
 */
if ( class_exists( 'Jetpack' ) ) {
	require_once( trailingslashit( get_template_directory() ) . '/inc/integration/jetpack.php' );
}

/**
 * Support for WooCommerce
 * https://wordpress.org/plugins/woocommerce/
 */
if ( is_woocommerce_activated() ) {
	require_once(  get_template_directory()  . '/inc/integration/bellini-woocommerce-functions.php' );
	require_once(  get_template_directory()  . '/inc/integration/bellini-woocommerce-hooks.php' );
}


add_action( 'widgets_init', 'pangolin_register_bellini_widgets');

if ( ! function_exists( 'pangolin_register_bellini_widgets' ) ) {
	function pangolin_register_bellini_widgets(){
	    unregister_widget( 'WP_Widget_Recent_Posts' );
	    unregister_widget( 'WP_Widget_Recent_Comments' );
	    register_widget( 'Bellini_Recent_Posts_Widget' );
	    register_widget( 'Bellini_Recent_Comments_Widget' );
	}
}

/**
 * Admin Support and Upgrade Link
 */
add_action( 'admin_menu', 'bellini_lite_support_link' );
add_action( 'admin_menu', 'bellini_lite_upgrade_link' );

function bellini_lite_support_link() {
	global $submenu;
	$menu_link = esc_url( 'https://atlantisthemes.com/contact/' );
	$submenu['themes.php'][] = array( __( 'Theme Support', 'bellini' ), 'manage_options', $menu_link, '', 1 );
}

function bellini_lite_upgrade_link() {
	global $submenu;
	$upgrade_link = esc_url( 'https://atlantisthemes.com/bellini-woocommerce-theme/?utm_source=lite_upgrade' );
	$submenu['themes.php'][] = array( __( 'Theme Upgrade', 'bellini' ), 'manage_options', $upgrade_link );
}

/**
 * Admin Notice
 */
add_action( 'admin_init', array( 'PAnD', 'init' ) );
add_action( 'admin_notices', 'bellini_lite_admin_notice_sale', 10 );

/** Function bellini_lite_admin_notice_sale */
function bellini_lite_admin_notice_sale() {
	if ( ! PAnD::is_admin_notice_active( 'notice-bellini-lite-sale-forever' ) ) {
		return;
	}
	?>

	<div data-dismissible="notice-bellini-lite-sale-forever" class="notice updated is-dismissible">

		<h2 style="margin-bottom:0px;"><?php esc_html_e( 'More options available with Bellini PRO', 'bellini' ); ?></h2>
		<p><?php printf( wp_kses_post( 'Take advantage of this opportunity to <a href="%1$s" target="_blank">upgrade your theme</a>, and launch a online shop with exciting product layouts.', 'bellini' ), 'https://atlantisthemes.com/bellini-woocommerce-theme/'); ?></p>
		<p><a class="button button-primary" href="https://atlantisthemes.com/bellini-woocommerce-theme/" target="_blank"><?php esc_html_e( 'Buy Pro', 'bellini' ); ?></a></p>

	</div>

	<?php
}