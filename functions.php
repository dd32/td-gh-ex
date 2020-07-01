<?php
/**
 * Altitude-lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package altitude-lite
 */

if ( file_exists( get_stylesheet_directory() . '/premium/functions.php' ) ) {
	require_once get_stylesheet_directory() . '/premium/functions.php';
}

if ( ! function_exists( 'altitude_lite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function altitude_lite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on altitude-lite, use a find and replace
		 * to change 'altitude-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'altitude-lite', get_stylesheet_directory_uri() . '/languages' );

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

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'altitude_lite_custom_background_args',
				array(
					'default-color' => 'ffffff',
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
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
				'header-text' => array(
					'site-title', 'site-description'
				),
			)
		);
		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		/*
		 * Adds starter content to highlight the theme on fresh sites.
		 * This is done conditionally to avoid loading the starter content on every
		 * page load, as it is a one-off operation only needed once in the customizer.
		 */
		if ( is_customize_preview() ) {
			require_once __DIR__ . '/inc/starter-content.php';
			add_theme_support( 'starter-content', altitude_lite_get_starter_content() );
		}
	}
endif;
add_action( 'after_setup_theme', 'altitude_lite_setup', 99 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function altitude_lite_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'altitude_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'altitude_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function altitude_lite_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Area', 'altitude-lite' ),
			'id'            => 'footer-widget',
			'description'   => esc_html__( 'Add widgets to show in footer', 'altitude-lite' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s ">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'altitude_lite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function altitude_lite_scripts() {

	$parent_style = 'responsive-style';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/core/css/style.css' );

	wp_enqueue_style(
		'altitude-lite-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_script( 'altitude-lite-navigation', get_stylesheet_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'altitude-lite-skip-link-focus-fix', get_stylesheet_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'altitude_lite_scripts', 99 );

/**
 * Custom template tags for this theme.
 */
require 'inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require 'inc/template-functions.php';


/**
 * Functions which get included in head.
 */
require 'inc/wp-head-hooks.php';



if ( file_exists( get_stylesheet_directory() . '/premium/functions.php' ) ) {
	/**
	 * Autoimport functionality included
	 */
	require_once get_stylesheet_directory() . '/assets/autoimport/options-init.php';
}


/**
 * Require file to define tgmpa related class and functions
 */
require 'inc/functions-tgmpa.php';


/**
 * Customizer additions.
 */
require 'inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require_once get_stylesheet_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require_once get_stylesheet_directory() . '/inc/woocommerce.php';
}

/**
 * This function overrides customizer defaults of Responsive theme
 *
 * @param $theme_options
 *
 * @return mixed
 */
function altitude_override_theme_defaults( $theme_options ) {
	$theme_options['blog_entry_title_alignment']  = 'center';
	$theme_options['blog_entry_meta_alignment']   = 'center';
	$theme_options['read_more_text']              = 'Continue Reading';
	$theme_options['entry_columns']               = 3;
	$theme_options['responsive_header_layout']    = 'vertical';
	$theme_options['responsive_header_alignment'] = 'left';
	$theme_options['blog_sidebar_position']       = 'no';

	$theme_options['responsive_style'] = 'flat';
	$theme_options['background_color'] = '#ffffff';

	$theme_options['header_border']                 = '#8C2849';
	$theme_options['header_site_title']             = '#555555';
	$theme_options['header_site_title_hover']       = '#8C2849';
	$theme_options['header_text']                   = '#555555';
	$theme_options['header_menu_background']        = '#8C2849';
	$theme_options['header_active_menu_background'] = '#8C2849';
	$theme_options['header_menu_link']              = '#ffffff';
	$theme_options['header_menu_link_hover']        = '#ffffff';
	$theme_options['header_sub_menu_background']    = '#8C2849';
	$theme_options['header_sub_menu_link']          = '#ffffff';
	$theme_options['header_sub_menu_link_hover']    = '#ffffff';

	$theme_options['body_text']           = '#555555';
	$theme_options['h1_text']             = '#555555';
	$theme_options['button']              = '#8C2849';
	$theme_options['button_hover']        = '#8C2849';
	$theme_options['button_border']       = '#8C2849';
	$theme_options['button_hover_border'] = '#8C2849';

	$theme_options['link']       = '#8C2849';
	$theme_options['link_hover'] = '#8C2849';
	$theme_options['meta_text']  = '#8C2849';

	$theme_options['responsive_h4_text_color']        = '#555555';
	$theme_options['responsive_box_background_color'] = '#ffffff';
	$theme_options['responsive_link_color']           = '#8C2849';
	$theme_options['responsive_link_hover_color']     = '#8C2849';

	$theme_options['footer_text']        = '#555555';
	$theme_options['footer_background']  = '#ffffff';
	$theme_options['footer_links']       = '#8C2849';
	$theme_options['footer_links_hover'] = '#8C2849';

	return $theme_options;
}

add_filter( 'responsive_theme_defaults', 'altitude_override_theme_defaults', 10, 1 );

/**
 * Outputs the custom styles for the theme.
 *
 * @return void
 */
function altitude_customizer_styles() {
	$custom_css = '';

	// Sidebar Color.
	$sidebar_headings_color   = esc_html( get_theme_mod( 'responsive_sidebar_headings_color', '#555555' ) );
	$sidebar_background_color = esc_html( get_theme_mod( 'responsive_sidebar_background_color', '#ffffff' ) );
	$sidebar_link_color       = esc_html( get_theme_mod( 'responsive_sidebar_link_color', '#8C2849' ) );
	$sidebar_link_hover_color = esc_html( get_theme_mod( 'responsive_sidebar_link_hover_color', '#8C2849' ) );

	$header_menu_link_color       = esc_html( get_theme_mod( 'responsive_header_menu_link_color', '#ffffff' ) );
	$header_menu_link_hover_color = esc_html( get_theme_mod( 'responsive_header_menu_link_hover_color', '#ffffff' ) );

	$heading1_text_color = esc_html( get_theme_mod( 'responsive_h1_text_color', '#555555' ) );
	$heading2_text_color = esc_html( get_theme_mod( 'responsive_h2_text_color', '#555555' ) );
	$heading3_text_color = esc_html( get_theme_mod( 'responsive_h3_text_color', '#555555' ) );

	$body_text_color       = esc_html( get_theme_mod( 'responsive_body_text_color', '#555555' ) );
	$body_background_color = esc_html( get_theme_mod( 'responsive_background_color', '#ffffff' ) );

	$link_color       = esc_html( get_theme_mod( 'responsive_link_color', '#8C2849' ) );
	$link_hover_color = esc_html( get_theme_mod( 'responsive_link_hover_color', '#8C2849' ) );

	$button_color              = esc_html( get_theme_mod( 'responsive_button_color', '#8C2849' ) );
	$button_hover_color        = esc_html( get_theme_mod( 'responsive_button_hover_color', '#8C2849' ) );
	$button_text_color         = esc_html( get_theme_mod( 'responsive_button_text_color', '#FFFFFF' ) );
	$button_hover_text_color   = esc_html( get_theme_mod( 'responsive_button_hover_text_color', '#FFFFFF' ) );
	$button_border_color       = esc_html( get_theme_mod( 'responsive_button_border_color', '#8C2849' ) );
	$button_hover_border_color = esc_html( get_theme_mod( 'responsive_button_hover_border_color', '#8C2849' ) );

	$header_site_title_color       = esc_html( get_theme_mod( 'responsive_header_site_title_color', '#555555' ) );
	$header_site_title_hover_color = esc_html( get_theme_mod( 'responsive_header_site_title_hover_color', '#8C2849' ) );
	$header_site_tagline_color     = esc_html( get_theme_mod( 'responsive_header_text_color', '#555555' ) );


	// Sub Menu Color.
	$header_menu_background_color        = esc_html( get_theme_mod( 'responsive_header_menu_background_color', '#8C2849' ) );
	$header_menu_active_background_color = esc_html( get_theme_mod( 'responsive_header_active_menu_background_color', '#8C2849' ) );
	$header_menu_link_color              = esc_html( get_theme_mod( 'responsive_header_menu_link_color', '#ffffff' ) );
	$header_menu_link_hover_color        = esc_html( get_theme_mod( 'responsive_header_menu_link_hover_color', '#ffffff' ) );
	$header_sub_menu_background_color    = esc_html( get_theme_mod( 'responsive_header_sub_menu_background_color', '#8C2849' ) );
	$header_sub_menu_link_color          = esc_html( get_theme_mod( 'responsive_header_sub_menu_link_color', '#FFFFFF' ) );
	$header_sub_menu_link_hover_color    = esc_html( get_theme_mod( 'responsive_header_sub_menu_link_hover_color', '#ffffff' ) );

	// Footer Colors.
	$footer_text_color       = esc_html( get_theme_mod( 'responsive_footer_text_color', '#555555' ) );
	$footer_background_color = esc_html( get_theme_mod( 'responsive_footer_background_color', '#FFFFFF' ) );
	$footer_link_color       = esc_html( get_theme_mod( 'responsive_footer_links_color', '#8C2849' ) );
	$footer_link_hover_color = esc_html( get_theme_mod( 'responsive_footer_links_hover_color', '#8C2849' ) );

	$blog_sidebar_position = esc_html( get_theme_mod( 'responsive_blog_sidebar_position', 'no' ) );

	$custom_css .= "

	body {
		background-color: {$body_background_color};
		color: {$body_text_color};
	}

	.header-menu {
		background-color: {$header_menu_background_color};
	}

	.main-navigation .sub-menu {
		background-color: {$header_sub_menu_background_color};
	}

	.main-navigation .sub-menu a {
		color: {$header_sub_menu_link_color};
	}

	.main-navigation .sub-menu a:hover {
		color: {$header_sub_menu_link_hover_color};
	}

	.main-navigation .menu a {
		color: {$header_menu_link_color};
	}

	.main-navigation .menu a:hover, .main-navigation .menu a:focus {
		color: {$header_menu_link_hover_color};
	}

	.site-footer, .footer-widget .widget .widget-title, .footer-widget .widget {
		color: {$footer_text_color};
		background: {$footer_background_color};
	}
	.site-footer a, .footer-widget .widget a {
		color: {$footer_link_color};
	}

	.site-footer a:hover, .footer-widget .widget a:hover {
		color: {$footer_link_hover_color};
	}
	";

	wp_add_inline_style( 'altitude-lite-style', apply_filters( 'responsive_head_css', $custom_css ) );

}
add_action( 'wp_enqueue_scripts', 'altitude_customizer_styles', 99 );


/**
 * This function overrides typography selectors of Responsive theme
 *
 * @param array $selector_array Selector Array.
 * @return mixed
 */
function altitude_override_typography_selectors( $selector_array ) {
	$selector_array['header_site_title']   = '.site-branding .site-title';
	$selector_array['header_site_tagline'] = '.site-branding .site-description';
	$selector_array['header_menu']         = '#main_navigation_container #site_navigation .menu li.current-menu-item a, #main_navigation_container #site_navigation .menu li.current_page_item a';
	$selector_array['footer']              = '.site-footer, .site-footer *, .footer-widget .widget .widget-title, .footer-widget .widget';
	return $selector_array;
}

add_filter( 'responsive_typography_selectors', 'altitude_override_typography_selectors', 10, 1 );
