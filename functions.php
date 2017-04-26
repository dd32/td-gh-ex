<?php
/**
 * Ecommerce Store functions and definitions
 *
 * @package Ecommerce Store
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'bb_ecommerce_store_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */

function bb_ecommerce_store_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			the_title();
		}
	}
}

/* Theme Setup */
function bb_ecommerce_store_setup() {

	$GLOBALS['content_width'] = apply_filters( 'bb_ecommerce_store_content_width', 640 );

	load_theme_textdomain( 'bb-ecommerce-store', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('bb-ecommerce-store-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bb-ecommerce-store' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );
}
endif; // bb_ecommerce_store_setup
add_action( 'after_setup_theme', 'bb_ecommerce_store_setup' );

/* Theme Widgets Setup */
function bb_ecommerce_store_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'bb-ecommerce-store' ),
		'description'   => __( 'Appears on blog page sidebar', 'bb-ecommerce-store' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'bb-ecommerce-store' ),
		'description'   => __( 'Appears on posts and pages', 'bb-ecommerce-store' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'bb_ecommerce_store_widgets_init' );

/* Theme Font URL */
function bb_ecommerce_store_font_url(){
	$font_url = '';
	
	/* Translators: If there are any character that are
	* not supported by PT Sans, translate this to off, do not
	* translate into your own language.
	*/
	$ptsans = _x('on', 'PT Sans font:on or off','bb-ecommerce-store');
	
	/* Translators: If there are any character that are
	* not supported by Roboto, translate this to off, do not
	* translate into your own language.
	*/
	$roboto = _x('on', 'Roboto font:on or off','bb-ecommerce-store');
	
	/* Translators: If there are any character that are
	* not supported by Roboto Condensed, translate this to off, do not
	* translate into your own language.
	*/
	$roboto_cond = _x('on', 'Roboto Condensed font:on or off','bb-ecommerce-store');
	
	if('off' !== $ptsans || 'off' !==  $roboto || 'off' !== $roboto_cond){
		$font_family = array();
		
		if('off' !== $ptsans){
			$font_family[] = 'PT Sans:300,400,600,700,800,900';
		}
		
		if('off' !== $roboto){
			$font_family[] = 'Roboto:400,700';
		}
		
		if('off' !== $roboto_cond){
			$font_family[] = 'Roboto Condensed:400,700';
		}
		
		$query_args = array(
			'family'	=> urlencode(implode('|',$font_family)),
		);
		
		$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	}
	return $font_url;
}
	
/* Theme enqueue scripts */
function bb_ecommerce_store_scripts() {
	wp_enqueue_style( 'bb-ecommerce-store-font', bb_ecommerce_store_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'bb-ecommerce-store-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'bb-ecommerce-store-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bb_ecommerce_store_scripts' );

function bb_ecommerce_store_ie_stylesheet(){
	
	/** Load our IE-only stylesheet for all versions of IE.
	*   <!--[if lt IE 9]> ... <![endif]-->
	*
	*  Note: It is also possible to just check and see if the $is_IE global in WordPress is set to true before
	*  calling the wp_enqueue_style() function. If you are trying to load a stylesheet for all browsers
	*  EXCEPT for IE, then you would HAVE to check the $is_IE global since WordPress doesn't have a way to
	*  properly handle non-IE conditional comments.
	*/
	wp_enqueue_style('bb-ecommerce-store-ie', get_template_directory_uri().'/css/ie.css', array('bb-ecommerce-store-ie-style'));
	wp_style_add_data( 'bb-ecommerce-store-ie', 'conditional', 'IE' );
}
add_action('wp_enqueue_scripts','bb_ecommerce_store_ie_stylesheet');


define('bb_ecommerce_store_CREDIT','https://www.themeshopy.com','bb-ecommerce-store');

if ( ! function_exists( 'bb_ecommerce_store_credit' ) ) {
	function bb_ecommerce_store_credit(){
			return "<a href=".esc_url(bb_ecommerce_store_CREDIT)." target='_blank' rel='nofollow'>Design By themeshopy</a>";
	}
}

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Load Jetpack compatibility file. */
require get_template_directory() . '/inc/customizer.php';

/* Load Jetpack compatibility file. */
require get_template_directory() . '/inc/jetpack.php';
?>