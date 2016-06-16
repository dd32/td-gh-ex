<?php
/**
 * Animals functions and definitions
 *
 * @package Animals
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'animals_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function animals_setup() {

	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'animals', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 150,
		'width'       => 150,
		'flex-height' => true,
	) );
	add_image_size('animals-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'animals' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f8f8f8'
	) );
	add_editor_style( array( 'editor-style.css', animals_font_url() ) );
}
endif; // animals_setup
add_action( 'after_setup_theme', 'animals_setup' );


function animals_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'animals' ),
		'description'   => __( 'Appears on blog page sidebar', 'animals' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'animals' ),
		'description'   => __( 'Appears on page sidebar', 'animals' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'animals_widgets_init' );

function animals_font_url(){
		$font_url = '';
		
		/* Translators: If there are any character that are
		* not supported by Oswald, translate this to off, do not
		* translate into your own language.
		*/
		$oswald = _x('on', 'Oswald font:on or off','animals');
		
		/* Translators: If there are any character that are
		* not supported by Arimo, translate this to off, do not
		* translate into your own language.
		*/
		$arimo = _x('on', 'Tangerine font:on or off','animals');
		
		if('off' !== $oswald || 'off' !==  $tang){
			$font_family = array();
			
			if('off' !== $oswald){
				$font_family[] = 'Oswald:300,400,600,700,800,900';
			}
			
			if('off' !== $arimo){
				$font_family[] = 'Arimo:400,700';
			}
			
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}

function animals_scripts() {
	wp_enqueue_style( 'animals-font', animals_font_url(), array() );
	wp_enqueue_style( 'animals-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'animals-responsive-style', get_template_directory_uri().'/css/theme-responsive.css' );
	wp_enqueue_style( 'animals-nivo-style', get_template_directory_uri().'/css/nivo-slider.css' );
	if ( is_home() || is_front_page() ) { 
		wp_enqueue_script( 'animals-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	}
	wp_enqueue_script( 'animals-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_style( 'animals-font-awesome-style', get_template_directory_uri().'/css/font-awesome.css' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'animals_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

define('animals_pro_theme_url','https://flythemes.net/wordpress-themes/animals-wordpress-theme/');
define('animals_site_url','https://flythemes.net/');

function animals_credit_link(){
		return sprintf( esc_html__( 'Animals theme by %1$s.', 'animals' ), '<a href="' .esc_url(animals_site_url) . '" rel="designer">Flythemes</a>' );
	}