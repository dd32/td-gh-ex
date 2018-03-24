<?php

/**
 * bb wedding bliss functions and definitions
 *
 * @package bb wedding bliss
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'bb_wedding_bliss_setup' ) ) :

/* Theme Setup */
function bb_wedding_bliss_setup() {

	$GLOBALS['content_width'] = apply_filters( 'bb_wedding_bliss_content_width', 640 );

	load_theme_textdomain( 'bb-wedding-bliss', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('bb-wedding-bliss-homepage-thumb',240,145,true);
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bb-wedding-bliss' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

/*
 * This theme styles the visual editor to resemble the theme style,
 * specifically font, colors, icons, and column width.
 */
	add_editor_style( array( 'css/editor-style.css', bb_wedding_bliss_font_url() ) );
}
endif;
add_action( 'after_setup_theme', 'bb_wedding_bliss_setup' );

/* Theme Widgets Setup */
function bb_wedding_bliss_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'bb-wedding-bliss' ),
		'description'   => __( 'Appears on blog page sidebar', 'bb-wedding-bliss' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'bb-wedding-bliss' ),
		'description'   => __( 'Appears on page sidebar', 'bb-wedding-bliss' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'bb-wedding-bliss' ),
		'description'   => __( 'Appears on page sidebar', 'bb-wedding-bliss' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 1', 'bb-wedding-bliss' ),
		'description'   => __( 'Appears on footer', 'bb-wedding-bliss' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 2', 'bb-wedding-bliss' ),
		'description'   => __( 'Appears on footer', 'bb-wedding-bliss' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 3', 'bb-wedding-bliss' ),
		'description'   => __( 'Appears on footer', 'bb-wedding-bliss' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 4', 'bb-wedding-bliss' ),
		'description'   => __( 'Appears on footer', 'bb-wedding-bliss' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'bb_wedding_bliss_widgets_init' );

/* Theme Font URL */
function bb_wedding_bliss_font_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Roboto Condensed:400,700';
	$font_family[] = 'Vollkorn';
	$font_family[] = 'Unica One';
	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

/* Theme enqueue scripts */
function bb_wedding_bliss_scripts() {
	wp_enqueue_style( 'bb-wedding-bliss-font', bb_wedding_bliss_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'bb-wedding-bliss-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bb-wedding-bliss-effect', get_template_directory_uri().'/css/effect.css' );
	wp_enqueue_style( 'bb-wedding-bliss-customcss', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/fontawesome-all.css' );
	wp_enqueue_style( 'jquery-nivo-slider', get_template_directory_uri().'/css/nivo-slider.css' );
	wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'bb-wedding-bliss-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style('bb-wedding-bliss-ie', get_template_directory_uri().'/css/ie.css', array('bb-wedding-bliss-basic-style'));
	wp_style_add_data( 'bb-wedding-bliss-ie', 'conditional', 'IE' );
}
add_action( 'wp_enqueue_scripts', 'bb_wedding_bliss_scripts' );

define('BB_WEDDING_BLISS_BUY_NOW','https://www.themeshopy.com/premium/bb-wedding-bliss-wordpress-theme/','bb-ecommerce-store');
define('BB_WEDDING_BLISS_LIVE_DEMO','https://themeshopy.com/bb-wedding-bliss-theme/','bb-ecommerce-store');
define('BB_WEDDING_BLISS_PRO_DOC','https://themeshopy.com/docs/bb-wedding-bliss/','bb-ecommerce-store');
define('BB_WEDDING_BLISS_FREE_DOC','https://www.themeshopy.com/docs/free-bb-wedding-bliss/','bb-ecommerce-store');
define('BB_WEDDING_BLISS_CONTACT','https://www.themeshopy.com/free-theme-support//','bb-ecommerce-store');
define('BB_WEDDING_BLISS_CREDIT','https://www.themeshopy.com/premium/bb-wedding-bliss-wordpress-theme/','bb-wedding-bliss');
if ( ! function_exists( 'bb_wedding_bliss_credit' ) ) {
	function bb_wedding_bliss_credit(){
		echo "<a href=".esc_url(BB_WEDDING_BLISS_CREDIT)." target='_blank'>Wedding WorPress Theme</a>";
	}
}

/*radio button sanitization*/
 function bb_wedding_bliss_sanitize_choices( $input, $setting ) {
	global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Custom header additions. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Custom template for about theme. */
require get_template_directory() . '/inc/admin/admin.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';