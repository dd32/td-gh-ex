<?php
/**
 * Arrival functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package arrival
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function arrival_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on arrival, use a find and replace
		* to change 'arrival' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'arrival', get_template_directory() . '/languages' );

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
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'responsive-embeds' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' 	=> esc_html__( 'Primary', 'arrival' ),
			'top'		=> esc_html__( 'Top', 'arrival' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background', apply_filters(
			'arrival_custom_background_args', array(
				'default-color' => 'f1f1f1',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => false,
			'flex-height' => false,
		)
	);

	/**
	 * Add support for default block styles.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#default-block-styles
	 */
	add_theme_support( 'wp-block-styles' );
	/**
	 * Add support for wide aligments.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#wide-alignment
	 */
	add_theme_support( 'align-wide' );

	/**
	 * Add support for block color palettes.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#block-color-palettes
	 */
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Dusty orange', 'arrival' ),
			'slug'  => 'dusty-orange',
			'color' => '#ed8f5b',
		),
		array(
			'name'  => __( 'Dusty red', 'arrival' ),
			'slug'  => 'dusty-red',
			'color' => '#e36d60',
		),
		array(
			'name'  => __( 'Dusty wine', 'arrival' ),
			'slug'  => 'dusty-wine',
			'color' => '#9c4368',
		),
		array(
			'name'  => __( 'Dark sunset', 'arrival' ),
			'slug'  => 'dark-sunset',
			'color' => '#33223b',
		),
		array(
			'name'  => __( 'Almost black', 'arrival' ),
			'slug'  => 'almost-black',
			'color' => '#0a1c28',
		),
		array(
			'name'  => __( 'Dusty water', 'arrival' ),
			'slug'  => 'dusty-water',
			'color' => '#41848f',
		),
		array(
			'name'  => __( 'Dusty sky', 'arrival' ),
			'slug'  => 'dusty-sky',
			'color' => '#72a7a3',
		),
		array(
			'name'  => __( 'Dusty daylight', 'arrival' ),
			'slug'  => 'dusty-daylight',
			'color' => '#97c0b7',
		),
		array(
			'name'  => __( 'Dusty sun', 'arrival' ),
			'slug'  => 'dusty-sun',
			'color' => '#eee9d1',
		),
	) );

	/**
	 * Optional: Disable custom colors in block color palettes.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
	 *
	 * add_theme_support( 'disable-custom-colors' );
	 */

	/**
	 * Add support for font sizes.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#block-font-sizes
	 */
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name'      => __( 'small', 'arrival' ),
			'shortName' => __( 'S', 'arrival' ),
			'size'      => 16,
			'slug'      => 'small',
		),
		array(
			'name'      => __( 'regular', 'arrival' ),
			'shortName' => __( 'M', 'arrival' ),
			'size'      => 20,
			'slug'      => 'regular',
		),
		array(
			'name'      => __( 'large', 'arrival' ),
			'shortName' => __( 'L', 'arrival' ),
			'size'      => 36,
			'slug'      => 'large',
		),
		array(
			'name'      => __( 'larger', 'arrival' ),
			'shortName' => __( 'XL', 'arrival' ),
			'size'      => 48,
			'slug'      => 'larger',
		),
	) );

	

}
add_action( 'after_setup_theme', 'arrival_setup' );

/**
 * Set the embed width in pixels, based on the theme's design and stylesheet.
 *
 * @param array $dimensions An array of embed width and height values in pixels (in that order).
 * @return array
 */
function arrival_embed_dimensions( array $dimensions ) {
	$dimensions['width'] = 720;
	return $dimensions;
}
add_filter( 'embed_defaults', 'arrival_embed_dimensions' );

/**
 * Register Google Fonts
 */
function arrival_fonts_url() {
	$fonts_url = '';

	/**
	 * Translator: If Roboto Sans does not support characters in your language, translate this to 'off'.
	 */
	$roboto_cond = esc_html_x( 'on', 'Roboto Condensed font: on or off', 'arrival' );

	/**
	 * Translator: If Crimson Text does not support characters in your language, translate this to 'off'.
	 */
	$roboto = esc_html_x( 'on', 'Roboto font: on or off', 'arrival' );

	$font_families = array();

	if ( 'off' !== $roboto_cond ) {
		$font_families[] = 'Roboto Condensed:400,400i,700,700i';
	}

	if ( 'off' !== $roboto ) {
		$font_families[] = 'Roboto:400,500,700';
	}

	if ( in_array( 'on', array( $roboto_cond, $roboto ) ) ) {
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );

}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function arrival_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'arrival-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'arrival_resource_hints', 10, 2 );

/**
 * Enqueue WordPress theme styles within Gutenberg.
 */
function arrival_gutenberg_styles() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'arrival-fonts', arrival_fonts_url(), array(), null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion

	// Enqueue main stylesheet.
	wp_enqueue_style( 'arrival-base-style', get_theme_file_uri( '/css/editor-styles.css' ), array(), '20180514' );
}
add_action( 'enqueue_block_editor_assets', 'arrival_gutenberg_styles' );

/** Adding Editor Styles **/
function arrival_add_editor_styles() {
    add_editor_style( get_template_directory_uri().'/css/editor-style.css' );
}
add_action( 'admin_init', 'arrival_add_editor_styles' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function arrival_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'arrival' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'arrival' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'arrival' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'arrival' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'arrival' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'arrival' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'arrival' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'arrival' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'arrival' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'arrival' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'arrival_widgets_init' );

/**
 * Enqueue styles.
 */
function arrival_styles() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'arrival-fonts', arrival_fonts_url(), array(), null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion

	//jarallax
	wp_enqueue_style( 'jquery-jarallax', get_theme_file_uri( '/lib/jarallax/jarallax.css' ), array(), '20180514' );
	//fontawesome
	wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/lib/font-awesome/css/font-awesome.min.css' ), array(), '20180514' );

	// Enqueue main stylesheet.
	wp_enqueue_style( 'arrival-base-style', get_stylesheet_uri(), array(), '20180514' );

	// Register component styles that are printed as needed.
	wp_register_style( 'arrival-comments', get_theme_file_uri( '/css/comments.css' ), array(), '20180514' );
	wp_register_style( 'arrival-content', get_theme_file_uri( '/css/content.css' ), array(), '20180514' );
	wp_register_style( 'arrival-sidebar', get_theme_file_uri( '/css/sidebar.css' ), array(), '20180514' );
	wp_register_style( 'arrival-widgets', get_theme_file_uri( '/css/widgets.css' ), array(), '20180514' );
	wp_register_style( 'arrival-front-page', get_theme_file_uri( '/css/front-page.css' ), array(), '20180514' );
}
add_action( 'wp_enqueue_scripts', 'arrival_styles' );

/**
 * Enqueue scripts.
 */
function arrival_scripts() {
	
	$default = arrival_get_default_theme_options();
	$arrival_one_page_menus = get_theme_mod('arrival_one_page_menus',$default['arrival_one_page_menus']);

	// If the AMP plugin is active, return early.
	if ( arrival_is_amp() ) {
		return;
	}
	//enqueue onepage nav
	if( 'yes' == $arrival_one_page_menus ):
	wp_enqueue_script( 'jquery-onepagenav', get_theme_file_uri( '/lib/onepagenav/jquery.nav.js' ), array('jquery'), '20180514', false );
	wp_script_add_data( 'jquery-onepagenav', 'async', true );
	endif;

	//enqueue jarallax script
	wp_enqueue_script( 'jquery-jarallax', get_theme_file_uri( '/lib/jarallax/jarallax.min.js' ), array('jquery'), '20180514', false );
	wp_script_add_data( 'jquery-jarallax', 'async', true );
	// Enqueue the navigation script.
	wp_enqueue_script( 'arrival-navigation', get_theme_file_uri( '/js/navigation.js' ), array('jquery'), '20180514', false );
	wp_script_add_data( 'arrival-navigation', 'async', true );
	wp_localize_script( 'arrival-navigation', 'arrivalScreenReaderText', array(
		'expand'   => __( 'Expand child menu', 'arrival' ),
		'collapse' => __( 'Collapse child menu', 'arrival' ),
	));

	// Enqueue skip-link-focus script.
	wp_enqueue_script( 'arrival-skip-link-focus-fix', get_theme_file_uri( '/js/skip-link-focus-fix.js' ), array('jquery'), '20180514', false );
	wp_script_add_data( 'arrival-skip-link-focus-fix', 'defer', true );

	wp_enqueue_script( 'arrival-scripts', get_theme_file_uri( '/js/custom-scripts.js' ), array('jquery'), '20180514', false );

	// Enqueue comment script on singular post/page views only.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'arrival_scripts' );

/**
 * Custom responsive image sizes.
 */
require get_template_directory() . '/inc/image-sizes.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/pluggable/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

require get_template_directory() . '/inc/hooks/header-hooks.php';
require get_template_directory() . '/inc/hooks/footer-hooks.php';

/**
 * Optional: Add theme support for lazyloading images.
 *
 * @link https://developers.google.com/web/fundamentals/performance/lazy-loading-guidance/images-and-video/
 */
require get_template_directory() . '/pluggable/lazyload/lazyload.php';
