<?php
/**
 * bellini functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bellini
 */

if ( ! function_exists( 'bellini_setup' ) ) :

function bellini_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bellini, use a find and replace
	 * to change 'bellini' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bellini', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'bellini' ),
	) );

	add_theme_support( 'html5', array('search-form','comment-form','comment-list','gallery','caption',) );


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bellini_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_editor_style();
}

endif; // bellini_setup

add_action( 'after_setup_theme', 'bellini_setup' );

function bellini_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bellini_content_width', 640 );
}
add_action( 'after_setup_theme', 'bellini_content_width', 0 );


function bellini_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Right', 'bellini' ),
		'id'            => 'sidebar-right',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="element-title widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Left', 'bellini' ),
		'id'            => 'sidebar-left',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="element-title widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'bellini' ),
		'id'            => 'sidebar-blog',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="element-title widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'bellini' ),
		'id'            => 'sidebar-footer',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget__footer col-md-3 col-sm-6 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="element-title widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bellini_widgets_init' );






if ( function_exists( 'add_theme_support' ) ) {
    add_image_size( 'bellini-thumb', 620, 300 ); //620 pixels wide (and unlimited height)
}


function bellini_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'bellini_excerpt_length', 999 );


function add_nav_menu_atts( $atts, $item, $args ) {
  $atts['itemprop'] = 'url';
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_nav_menu_atts', 10, 3 );


/**
 * Query WooCommerce activation
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}


/**
 * Google font stylesheet URL
 */
function bellini_fonts_url() {
	$fonts_url = '';

	$playfair_display  = esc_html_x( 'on', 'Playfair Display font: on or off',  'bellini' );
	$opensans  = esc_html_x( 'on', 'Montserrat font: on or off',  'bellini' );

	if ( 'off' !== $playfair_display || 'off' !== $noticia_text || 'off' !== $opensans ) {
		$font_families = array();

		if ( 'off' !== $playfair_display ) {
			$font_families[] = 'Playfair Display:400,400italic,700,700italic,900,900italic';
		}

		if ( 'off' !== $opensans ) {
			$font_families[] = 'Open Sans:400,300,300italic,400italic,600,600italic,700,700italic,800';
		}
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "https://fonts.googleapis.com/css" );
	}

	return $fonts_url;
}



/**
 * Enqueue scripts and styles.
 */
function bellini_scripts() {

	wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/inc/css/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap.min' );

	wp_enqueue_style( 'bellini-fonts', bellini_fonts_url(), array(), null );
	wp_enqueue_style( 'bellini-style', get_stylesheet_uri() );
	wp_enqueue_style('bellini-libraries',get_template_directory_uri(). '/inc/css/libraries.css');

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'bellini-navigation', get_template_directory_uri() . '/js/navigation.js',  array('jquery'), '20150206', true );
	wp_enqueue_script( 'bellini-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js',  array('jquery'), '20150115', true );
    wp_enqueue_script( 'bellini-scrollreveal', get_template_directory_uri() . '/js/library.js',  array('jquery'), '20160104', true );
    wp_enqueue_script( 'bellini-pangolin', get_template_directory_uri() . '/js/pangolin.js',  array('jquery'), '20160104', true );

    // Load the html5 shiv.
	wp_enqueue_script( 'bellini-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'bellini-html5', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_woocommerce_activated() ) {
		wp_register_style( 'woostyles', get_template_directory_uri() . '/inc/css/bellini-woocommerce.css' );
    	wp_enqueue_style( 'woostyles', '0.1' );
	}


}

add_action( 'wp_enqueue_scripts', 'bellini_scripts' );


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


/**
 * Display upgrade notice on customizer page
 */
function bellini_upsell_notice() {
 // Enqueue the script
	 wp_enqueue_script('bellini-customizer-upsell', get_template_directory_uri() . '/js/unlock.js', array(), '1.0.0', true);
	 // Localize the script
	 wp_localize_script(
	 'bellini-customizer-upsell',
	 'belliniL10n',
	 array(
	 'belliniURL'	=> esc_url( 'http://www.pangolinthemes.com' ),
	 'belliniLabel'	=> __( ' Unlock All Features!', 'bellini' ),
	 )
	 );
}
add_action( 'customize_controls_enqueue_scripts', 'bellini_upsell_notice' );


function bellini_sanitize_layout( $value ) {
    if ( ! in_array( $value, array( 'layout-1', 'layout-2' ) ) )
        $value = 'layout-1';
    return $value;
}

function bellini_sanitize_title( $value ) {
    if ( ! in_array( $value, array( 'left', 'right', 'center' ) ) )
        $value = 'left';
    return $value;
}

function bellini_sanitize_menu_position( $value ) {
    if ( ! in_array( $value, array( 'layout-1', 'layout-2' ) ) )
        $value = 'layout-1';
    return $value;
}

function bellini_sanitize_menu_layout( $value ) {
    if ( ! in_array( $value, array( 'general', 'hamburger' ) ) )
        $value = 'general';
    return $value;
}


require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/jetpack.php';
require get_template_directory() . '/inc/comments.php';


require get_template_directory() . '/inc/structure/hooks.php';
require get_template_directory() . '/inc/structure/bellini-front.php';
require get_template_directory() . '/inc/structure/bellini-header.php';
require get_template_directory() . '/inc/structure/template-tags.php';