<?php
/**
 * miranda functions and definitions
 *
 * @package miranda
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'miranda_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function miranda_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on miranda, use a find and replace
	 * to change 'miranda' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'miranda', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_editor_style();
	
	add_theme_support( "title-tag" );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'header' => __( 'Primary Menu', 'miranda' ),
		'social' => __( 'Social Menu', 'miranda' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

}
endif; // miranda_setup
add_action( 'after_setup_theme', 'miranda_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function miranda_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'miranda' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'miranda_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function miranda_scripts() {
	wp_enqueue_style( 'miranda-style', get_stylesheet_uri(), array('dashicons') );

	wp_enqueue_script( 'miranda-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'miranda-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'miranda_scripts' );


/**
 * Custom header for this theme.
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


/* Add a title to posts that are missing title */
add_filter( 'the_title', 'miranda_post_title' );
function miranda_post_title( $title ) {
	if ( $title == '' ) {
		return __( 'Untitled', 'miranda' );
	}else{
		return $title;
	}
}


/* Add support for changing the accent color */
function miranda_customize_css() {
echo '<style type="text/css">
		.site-title,
		.site-description {
			color: #' . esc_attr( get_header_textcolor() ) . ';}';
		
		echo '#header{
			background:url("' . get_header_image() . '");
			height:' .  get_custom_header()->height . 'px;
			}';
		
		echo '.widget-title{border-bottom:3px solid ' . esc_attr( get_theme_mod('miranda_color', '#861a50') ) . ';}
			.social-navigation li a:before,	.plus:before, .more-link:after, .nav-next:after,.nav-previous:before, 
			.entry-title, .entry-title a{color:' . esc_attr( get_theme_mod('miranda_color', '#861a50') ) . ';}';
			
		echo '#header-menu ul ul a:hover, #header-menu ul ul a:focus,#header-menu ul li ul :hover > a{border-left:3px solid ' 
		. esc_attr( get_theme_mod('miranda_color', '#861a50') ) . ';	border-right:3px solid ' . esc_attr( get_theme_mod('miranda_color', '#861a50') ) . ';}';
		
		echo '#header-menu a:hover,#header-menu a:focus{border-bottom:3px solid ' . esc_attr( get_theme_mod('miranda_color', '#861a50') ) . ';}';
	
	echo '</style>';
}
add_action( 'wp_head', 'miranda_customize_css');