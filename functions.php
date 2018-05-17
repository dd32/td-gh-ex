<?php
/**
 * BB Mobile Application functions and definitions
 *
 * @package BB Mobile Application
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

/* Theme Setup */
if ( ! function_exists( 'bb_mobile_application_setup' ) ) :

function bb_mobile_application_setup() {

	$GLOBALS['content_width'] = apply_filters( 'bb_mobile_application_content_width', 640 );

	load_theme_textdomain( 'bb-mobile-application', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('bb-mobile-application-homepage-thumb',240,145,true);
	
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bb-mobile-application' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	/*
	* Enable support for Post Formats.
	*
	* See: https://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */

	add_editor_style( array( 'css/editor-style.css', bb_mobile_application_font_url() ) );
}
endif;
add_action( 'after_setup_theme', 'bb_mobile_application_setup' );

/* Theme Widgets Setup */
function bb_mobile_application_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'bb-mobile-application' ),
		'description'   => __( 'Appears on blog page sidebar', 'bb-mobile-application' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'bb-mobile-application' ),
		'description'   => __( 'Appears on page sidebar', 'bb-mobile-application' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'bb-mobile-application' ),
		'description'   => __( 'Appears on page sidebar', 'bb-mobile-application' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Nav 1', 'bb-mobile-application' ),
		'description'   => __( 'footer-1', 'bb-mobile-application' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Nav 2', 'bb-mobile-application' ),
		'description'   => __( 'footer-2', 'bb-mobile-application' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Nav 3', 'bb-mobile-application' ),
		'description'   => __( 'footer-3', 'bb-mobile-application' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Nav 4', 'bb-mobile-application' ),
		'description'   => __( 'footer-4', 'bb-mobile-application' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'bb_mobile_application_widgets_init' );

/* Theme Font URL */
function bb_mobile_application_font_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Montserrat';
	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

/* Theme enqueue scripts */
function bb_mobile_application_scripts() {
	wp_enqueue_style( 'bb-mobile-application-font', bb_mobile_application_font_url(), array() );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'bb-mobile-application-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'bb-mobile-application-style', 'rtl', 'replace' );
	wp_enqueue_style( 'effect', get_template_directory_uri().'/css/effect.css' );
	wp_enqueue_style( 'fontawesome-all', get_template_directory_uri().'/css/fontawesome-all.css' );
	wp_enqueue_style( 'bb-mobile-application-customcss', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'jquery-nivo-slider', get_template_directory_uri().'/css/nivo-slider.css' );
	wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'bb-mobile-application-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style('bb-mobile-application-ie', get_template_directory_uri().'/css/ie.css', array('bb-mobile-application-basic-style'));
	wp_style_add_data( 'bb-mobile-application-ie', 'conditional', 'IE' );
}
add_action( 'wp_enqueue_scripts', 'bb_mobile_application_scripts' );

define('BB_MOBILE_APPLICATION_BUY_NOW','https://www.themeshopy.com/premium/bb-mobile-application-theme/','bb-mobile-application');
define('BB_MOBILE_APPLICATION_LIVE_DEMO','https://www.themeshopy.com/bb-mobile-application-theme/','bb-mobile-application');
define('BB_MOBILE_APPLICATION_PRO_DOC','https://themeshopy.com/docs/bb-app/','bb-mobile-application');
define('BB_MOBILE_APPLICATION_FREE_DOC','https://themeshopy.com/docs/free-bb-app/','bb-mobile-application');
define('BB_MOBILE_APPLICATION_CONTACT','https://wordpress.org/support/theme/bb-mobile-application/','bb-mobile-application');
define('BB_MOBILE_APPLICATION_CREDIT','https://themeshopy.com','bb-mobile-application');

if ( ! function_exists( 'bb_mobile_application_credit' ) ) {
	function bb_mobile_application_credit(){
		echo "<a href=".esc_url(BB_MOBILE_APPLICATION_CREDIT)." target='_blank'>". esc_html__('ThemeShopy','bb-mobile-application')."</a>";
	}
}

/*radio button sanitization*/

 function bb_mobile_application_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';
/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';
/* Custom header additions. */
require get_template_directory() . '/inc/custom-header.php';
/* Admin about theme */
require get_template_directory() . '/inc/admin/admin.php';