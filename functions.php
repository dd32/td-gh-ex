<?php
/**
 * Automobile Car Dealer functions and definitions
 * @package Automobile Car Dealer
 */


/* Theme Setup */
if ( ! function_exists( 'automobile_car_dealer_setup' ) ) :

function automobile_car_dealer_setup() {

	$GLOBALS['content_width'] = apply_filters( 'automobile_car_dealer_content_width', 640 );
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('automobile-car-dealer-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'automobile-car-dealer' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', automobile_car_dealer_font_url() ) );

}
endif; // automobile_car_dealer_setup
add_action( 'after_setup_theme', 'automobile_car_dealer_setup' );

/*radio button sanitization*/
 function automobile_car_dealer_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Theme Widgets Setup */
function automobile_car_dealer_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'automobile-car-dealer' ),
		'description'   => __( 'Appears on posts and pages', 'automobile-car-dealer' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'automobile-car-dealer' ),
		'description'   => __( 'Appears on posts and pages', 'automobile-car-dealer' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'automobile-car-dealer' ),
		'description'   => __( 'Appears on posts and pages', 'automobile-car-dealer' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'automobile-car-dealer' ),
		'description'   => __( 'Appears on posts and pages', 'automobile-car-dealer' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'automobile-car-dealer' ),
		'description'   => __( 'Appears on posts and pages', 'automobile-car-dealer' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'automobile-car-dealer' ),
		'description'   => __( 'Appears on posts and pages', 'automobile-car-dealer' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'automobile-car-dealer' ),
		'description'   => __( 'Appears on posts and pages', 'automobile-car-dealer' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'automobile_car_dealer_widgets_init' );


/* Theme Font URL */
function automobile_car_dealer_font_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Roboto Condensed:400,700';
	$font_family[] = 'Roboto Condensed:400,700';
	$font_family[] = 'Ubuntu:500,500i,700';
	$font_family[] = 'Poppins:100i,200,200i,300,300i';

	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}
	
/* Theme enqueue scripts */
function automobile_car_dealer_scripts() {
	wp_enqueue_style( 'automobile-car-dealer-font', automobile_car_dealer_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'automobile-car-dealer-style', get_stylesheet_uri() );
	wp_style_add_data( 'automobile-car-dealer-style', 'rtl', 'replace' );	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/fontawesome-all.css' );
	wp_enqueue_style( 'automobile-car-dealer-customcss', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'nivo-style', get_template_directory_uri().'/css/nivo-slider.css' );
	wp_enqueue_script( 'nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'tether', get_template_directory_uri() . '/js/tether.js', array('jquery') ,'',true);
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') ,'',true);	
	wp_enqueue_script( 'automobile-car-dealer-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'automobile_car_dealer_scripts' );

function automobile_car_dealer_ie_stylesheet(){

	wp_enqueue_style('automobile-car-dealer-ie', get_template_directory_uri().'/css/ie.css', array('automobile-car-dealer-style'));
	wp_style_add_data( 'automobile-car-dealer-ie', 'conditional', 'IE' );
}
add_action('wp_enqueue_scripts','automobile_car_dealer_ie_stylesheet');

/* Excerpt Limit Begin */
function automobile_car_dealer_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Load Jetpack compatibility file. */
require get_template_directory() . '/inc/customizer.php';