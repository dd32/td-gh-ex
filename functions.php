<?php
/**
 * All zeeDynamic functions and definitions
 *
 * @package zeeDynamic
 */

/**
 * zeeDynamic only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}


if ( ! function_exists( 'zeedynamic_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function zeedynamic_setup() {

		// Make theme available for translation. Translations can be filed in the /languages/ directory.
		load_theme_textdomain( 'zeedynamic', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Set detfault Post Thumbnail size.
		set_post_thumbnail_size( 820, 360, true );

		// Register Navigation Menu.
		register_nav_menu( 'primary', esc_html__( 'Main Navigation', 'zeedynamic' ) );

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'zeedynamic_custom_background_args', array( 'default-color' => 'e5e5e5' ) ) );

		// Set up the WordPress core custom logo feature.
		add_theme_support( 'custom-logo', apply_filters( 'zeedynamic_custom_logo_args', array(
			'height'      => 40,
			'width'       => 250,
			'flex-height' => true,
			'flex-width'  => true,
		) ) );

		// Set up the WordPress core custom header feature.
		add_theme_support( 'custom-header', apply_filters( 'zeedynamic_custom_header_args', array(
			'header-text' => false,
			'width'       => 1230,
			'height'      => 410,
			'flex-height' => true,
		) ) );

		// Add Theme Support for wooCommerce.
		add_theme_support( 'woocommerce' );

		// Add extra theme styling to the visual editor.
		add_editor_style( array( 'assets/css/editor-style.css', get_template_directory_uri() . '/assets/css/custom-fonts.css' ) );

		// Add Theme Support for Selective Refresh in Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add custom color palette for Gutenberg.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => esc_html_x( 'Primary', 'Gutenberg Color Palette', 'zeedynamic' ),
				'slug'  => 'primary',
				'color' => apply_filters( 'zeedynamic_primary_color', '#e84747' ),
			),
			array(
				'name'  => esc_html_x( 'White', 'Gutenberg Color Palette', 'zeedynamic' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			),
			array(
				'name'  => esc_html_x( 'Light Gray', 'Gutenberg Color Palette', 'zeedynamic' ),
				'slug'  => 'light-gray',
				'color' => '#f0f0f0',
			),
			array(
				'name'  => esc_html_x( 'Dark Gray', 'Gutenberg Color Palette', 'zeedynamic' ),
				'slug'  => 'dark-gray',
				'color' => '#777777',
			),
			array(
				'name'  => esc_html_x( 'Black', 'Gutenberg Color Palette', 'zeedynamic' ),
				'slug'  => 'black',
				'color' => '#333333',
			),
		) );

		// Add support for responsive embed blocks.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'zeedynamic_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function zeedynamic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'zeedynamic_content_width', 810 );
}
add_action( 'after_setup_theme', 'zeedynamic_content_width', 0 );


/**
 * Register widget areas and custom widgets.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function zeedynamic_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'zeedynamic' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Appears on posts and pages except the full width template.', 'zeedynamic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-header"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header', 'zeedynamic' ),
		'id'            => 'header',
		'description'   => esc_html__( 'Appears on header area. You can use a search or ad widget here.', 'zeedynamic' ),
		'before_widget' => '<aside id="%1$s" class="header-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="header-widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Magazine Homepage', 'zeedynamic' ),
		'id'            => 'magazine-homepage',
		'description'   => esc_html__( 'Appears on blog index and Magazine Homepage template. You can use the Magazine widgets here.', 'zeedynamic' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-header"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'zeedynamic_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function zeedynamic_scripts() {

	// Get Theme Version.
	$theme_version = wp_get_theme()->get( 'Version' );

	// Register and Enqueue Stylesheet.
	wp_enqueue_style( 'zeedynamic-stylesheet', get_stylesheet_uri(), array(), $theme_version );

	// Register Genericons.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/assets/genericons/genericons.css', array(), '3.4.1' );

	// Register and Enqueue HTML5shiv to support HTML5 elements in older IE versions.
	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/assets/js/html5shiv.min.js', array(), '3.7.3' );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	// Register and enqueue navigation.js.
	wp_enqueue_script( 'zeedynamic-jquery-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array( 'jquery' ), '20160719' );

	// Passing Parameters to Navigation.js Javascript.
	wp_localize_script( 'zeedynamic-jquery-navigation', 'zeedynamic_menu_title', esc_html__( 'Menu', 'zeedynamic' ) );

	// Register Comment Reply Script for Threaded Comments.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'zeedynamic_scripts' );


/**
 * Enqueue custom fonts.
 */
function zeedynamic_custom_fonts() {
	wp_enqueue_style( 'zeedynamic-custom-fonts', get_template_directory_uri() . '/assets/css/custom-fonts.css', array(), '20180413' );
}
add_action( 'wp_enqueue_scripts', 'zeedynamic_custom_fonts', 1 );
add_action( 'enqueue_block_editor_assets', 'zeedynamic_custom_fonts', 1 );


/**
 * Enqueue editor styles for the new Gutenberg Editor.
 */
function zeedynamic_block_editor_assets() {
	wp_enqueue_style( 'zeedynamic-editor-styles', get_theme_file_uri( '/assets/css/gutenberg-styles.css' ), array(), '20191118', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'zeedynamic_block_editor_assets' );


/**
 * Add custom sizes for featured images
 */
function zeedynamic_add_image_sizes() {

	// Add Custom Header Image Size.
	add_image_size( 'zeedynamic-header-image', 1230, 410, true );

	// Add Image Size for Archives.
	add_image_size( 'zeedynamic-thumbnail-archive', 350, 280, true );

	// Add different thumbnail sizes for widgets and post layouts.
	add_image_size( 'zeedynamic-thumbnail-small', 100, 80, true );
	add_image_size( 'zeedynamic-thumbnail-medium', 350, 230, true );
	add_image_size( 'zeedynamic-thumbnail-large', 420, 280, true );
}
add_action( 'after_setup_theme', 'zeedynamic_add_image_sizes' );


/**
 * Make custom image sizes available in Gutenberg.
 */
function zeedynamic_add_image_size_names( $sizes ) {
	return array_merge( $sizes, array(
		'post-thumbnail'             => esc_html__( 'zeeDynamic Single Post', 'zeedynamic' ),
		'zeedynamic-thumbnail-large' => esc_html__( 'zeeDynamic Magazine Post', 'zeedynamic' ),
		'zeedynamic-thumbnail-small' => esc_html__( 'zeeDynamic Thumbnail', 'zeedynamic' ),
	) );
}
add_filter( 'image_size_names_choose', 'zeedynamic_add_image_size_names' );


/**
 * Include Files
 */

// Include Theme Info page.
require get_template_directory() . '/inc/theme-info.php';

// Include Theme Customizer Options.
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/default-options.php';

// Include Extra Functions.
require get_template_directory() . '/inc/extras.php';

// Include Template Functions.
require get_template_directory() . '/inc/template-tags.php';

// Include support functions for Theme Addons.
require get_template_directory() . '/inc/addons.php';

// Include Post Slider Setup.
require get_template_directory() . '/inc/slider.php';

// Include Magazine Functions.
require get_template_directory() . '/inc/magazine.php';

// Include Widget Files.
require get_template_directory() . '/inc/widgets/widget-magazine-posts-columns.php';
require get_template_directory() . '/inc/widgets/widget-magazine-posts-grid.php';
