<?php
/**
 * Abacus functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Abacus
 * @since Abacus 1.0
 *
 * Namespace prefix abc_ = Alphabet Themes
 */

// Defining constants
$abc_theme_data = wp_get_theme( 'abacus' );
define( 'ABC_THEME_URL', get_template_directory_uri() );
define( 'ABC_THEME_TEMPLATE', get_template_directory() );
define( 'ABC_THEME_VERSION', trim( $abc_theme_data->Version ) );
define( 'ABC_THEME_NAME', $abc_theme_data->Name );
define( 'ABC_FEATURED_CONTENT', false );

if ( ! isset( $content_width ) ) {
	$content_width = 860;
}

function is_abc_theme() {
	return true;
}

foreach ( glob( ABC_THEME_TEMPLATE . '/inc/*' ) as $filename ) {
	include $filename;
}

add_action( 'after_setup_theme', 'abc_setup' );
if ( ! function_exists( 'abc_setup' ) ) {
	function abc_setup() {
		load_theme_textdomain( 'abacus', ABC_THEME_TEMPLATE . '/languages' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'html5', array(
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption'
		) );
		add_theme_support( 'custom-header', apply_filters( 'abc_custom_header_args', array(
			//'header-text' => false,
			'flex-height' => true,
			'flex-width' => true,
			'random-default' => true,
			'width' => apply_filters( 'abc_header_image_width', 1400 ),
			'height' => apply_filters( 'abc_header_image_height', 600 ),
			'wp-head-callback' => 'abc_header_style',
		) ) );
		if ( function_exists( 'abc_premium_features' ) ) {
			add_theme_support( 'custom-background', apply_filters( 'abc_custom_background_args', array(
				'default-color' => '2E3739',
			) ) );
		}
		add_theme_support( 'jetpack-testimonial' );

		add_editor_style( array( 'css/admin/editor-style.css', '/css/font-awesome.css', abc_fonts_url() ) );

		register_nav_menu( 'top', __( 'Top Menu', 'abacus' ) );
		register_nav_menu( 'primary', __( 'Primary Menu', 'abacus' ) );

		add_image_size( 'abacus-testimonial-thumbnail', 60, 60, true );

		add_filter( 'use_default_gallery_style', '__return_false' );
	}
}

if ( ! function_exists( 'abc_header_style' ) ) {
	function abc_header_style() {
		$header_text_color = get_header_textcolor();

		// If no custom options for text are set, let's bail
		// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
		if ( HEADER_TEXTCOLOR == $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
			// Has the text been hidden?
			if ( 'blank' == $header_text_color ) :
		?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php endif; ?>
		</style>
		<?php
	}
}

add_action( 'wp_enqueue_scripts', 'abc_enqueue' );
if ( ! function_exists( 'abc_enqueue' ) ) {
	function abc_enqueue() {
		wp_enqueue_script( 'theme', ABC_THEME_URL .'/js/theme.js', array( 'jquery' ), '', true );

		wp_enqueue_style( 'theme-stylesheet', get_stylesheet_uri() );
		wp_enqueue_style( 'abc-google-fonts', abc_fonts_url(), array(), null );
		wp_enqueue_style( 'font-awesome', ABC_THEME_URL .'/css/font-awesome.css', false, '4.4.0', 'all' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}

if ( ! function_exists( 'abc_fonts_url' ) ) {
	function abc_fonts_url() {
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Roboto, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'abacus' ) ) {
			$fonts[] = 'Roboto:300,400italic,700italic,400,700';
		}

		/*
		 * Translators: To add an additional character subset specific to your language,
		 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'abacus' );

		if ( 'cyrillic' == $subset ) {
			$subsets .= ',cyrillic,cyrillic-ext';
		} elseif ( 'greek' == $subset ) {
			$subsets .= ',greek,greek-ext';
		} elseif ( 'devanagari' == $subset ) {
			$subsets .= ',devanagari';
		} elseif ( 'vietnamese' == $subset ) {
			$subsets .= ',vietnamese';
		}

		return ( $fonts ) ? add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' ) : '';
	}
}

add_action( 'widgets_init', 'abc_widgets_init' );
if ( ! function_exists( 'abc_widgets_init' ) ) {
	function abc_widgets_init() {
		register_sidebar( array(
			'name' => __( 'Sidebar', 'abacus' ),
			'id' => 'sidebar',
			'description' => __( 'This section appears on the right of the main content on every page.', 'abacus' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Jumbo Headline', 'abacus' ),
			'id' => 'jumbo-headline',
			'description' => __( 'This section appears on the front page in the centre of the header image. Designed specifically for one Text widget. ', 'abacus' ),
			'before_widget' => '<aside id="%1$s" class="jumbo-headline %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );

		if ( function_exists( 'abc_premium_features' ) ) {
			register_sidebar( array(
				'name' => __( 'Shop Categories', 'abacus' ),
				'id' => 'shop-categories',
				'description' => __( 'This section appears on the Front Page template below the featured section. Designed specifically for three widgets. ', 'abacus' ),
				'before_widget' => '<aside id="%1$s" class="cols cols-3 %2$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h3>',
				'after_title' => '</h3>',
			) );

			register_sidebar( array(
				'name' => __( 'Shop Banner', 'abacus' ),
				'id' => 'shop-banner',
				'description' => __( 'This section appears on the Front Page template above the trending section. Designed specifically for one widget. ', 'abacus' ),
				'before_widget' => '<aside id="%1$s" class="%2$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h3>',
				'after_title' => '</h3>',
			) );
		}
	}
}