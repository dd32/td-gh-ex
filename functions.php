<?php
/**
 * Academic Education functions and definitions
 * @package Academic Education
 */

if ( ! function_exists( 'academic_education_setup' ) ) :

/* Theme Setup */

function academic_education_setup() {

	$GLOBALS['content_width'] = apply_filters( 'academic_education_content_width', 640 );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('academic-education-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'academic-education' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	add_editor_style( array( 'assets/css/editor-style.css', academic_education_font_url() ) );

}
endif; // academic_education_setup
add_action( 'after_setup_theme', 'academic_education_setup' );

/*Site URL*/
define('ACADEMIC_EDUCATION_CREDIT','https://www.logicalthemes.com/','academic-education');
if ( ! function_exists( 'academic_education_credit' ) ) {
	function academic_education_credit(){
			echo "<a href=".esc_url(ACADEMIC_EDUCATION_CREDIT)." target='_blank'>".esc_html('Logical Themes','academic-education')."</a>";
	}
}

/*radio button sanitization*/
function academic_education_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Theme Widgets Setup */
function academic_education_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'academic-education' ),
		'description'   => __( 'Appears on blog page sidebar', 'academic-education' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'academic-education' ),
		'description'   => __( 'Appears on posts and pages', 'academic-education' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'academic-education' ),
		'description'   => __( 'Appears on posts and pages', 'academic-education' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'academic-education' ),
		'description'   => __( 'Appears in footer', 'academic-education' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'academic-education' ),
		'description'   => __( 'Appears in footer', 'academic-education' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'academic-education' ),
		'description'   => __( 'Appears in footer', 'academic-education' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'academic-education' ),
		'description'   => __( 'Appears in footer', 'academic-education' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'academic_education_widgets_init' );

function academic_education_font_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Montserrat:300,400,600,700,800,900';
	$font_family[] = 'Karla:400,400i,700';

	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}
	

/* Theme enqueue scripts */
function academic_education_scripts() {
	wp_enqueue_style( 'academic-education-font', academic_education_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');
	wp_enqueue_style( 'academic-education-style', get_stylesheet_uri() );
	wp_style_add_data( 'academic-education-style', 'rtl', 'replace' );
	wp_enqueue_style( 'academic-education-customcss', get_template_directory_uri() . '/assets/css/custom.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
	if ( is_home() || is_front_page() ) { 
		wp_enqueue_style( 'nivo-style', get_template_directory_uri().'/assets/css/nivo-slider.css' );
		wp_enqueue_script( 'nivo-slider', get_template_directory_uri() . '/assets/js/jquery.nivo.slider.js', array('jquery') );
	}
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'academic-education-customscripts', get_template_directory_uri() . '/assets/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'academic_education_scripts' );

function academic_education_ie_stylesheet(){
	wp_enqueue_style('academic-education-ie', get_template_directory_uri().'/assets/css/ie.css', array('academic-education-ie-style'));
	wp_style_add_data( 'academic-education-ie', 'conditional', 'IE' );
}
add_action('wp_enqueue_scripts','academic_education_ie_stylesheet');

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom-header.php';