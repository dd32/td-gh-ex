<?php
/**
 * WP FanZone functions and definitions
 *
 * @package WP FanZone
 */
require get_template_directory() . '/inc/wpfanzoneNavMenuWalker.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/inc/widget.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Set the content width based on the theme's design and stylesheet.
 */
 
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'wp_fanzone_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wp_fanzone_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WP FanZone, use a find and replace
	 * to change 'wp-fanzone' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wp-fanzone', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_editor_style();
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'widget-post-thumb',  70, 70, true );
	add_image_size( 'post-thumb',  400, '200' , true );
	add_image_size( 'slide-small-thumb',  130, 135 , true );
	add_image_size( 'slide-medium-thumb',  265, 135 , true );
	add_image_size( 'slide-large-image',  849, 424, true );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'wp-fanzone' ),
		'top-menu'=>__('Top Menu', 'wp-fanzone')
	) );
	

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wp_fanzone_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // wp_fanzone_setup
add_action( 'after_setup_theme', 'wp_fanzone_setup' );


if ( !function_exists( 'wp_fanzone_menu' ) ){
	function wp_fanzone_menu() {	
		require get_template_directory() . '/inc/wpfanzoneMenu.php';	
	}
}
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wp_fanzone_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Homepage Sidebar', 'wp-fanzone' ),
		'id' => 'defaul-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4><div class="arrow-right"></div></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Post Sidebar', 'wp-fanzone' ),
		'id' => 'post-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4><div class="arrow-right"></div></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Page Sidebar', 'wp-fanzone' ),
		'id' => 'page-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h4>',

		'after_title' => '</h4><div class="arrow-right"></div></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Archives Sidebar', 'wp-fanzone' ),
		'id' => 'archives-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4><div class="arrow-right"></div></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Banner Widget', 'wp-fanzone' ),
		'description' => 'Enter your banner code into this text widget.',
		'id' => 'top-right-widget',
		'before_widget' => '<div id="top-widget">',
		'after_widget' => "</div>",
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 1', 'wp-fanzone' ),
		'id' => 'footer-one',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 2', 'wp-fanzone' ),
		'id' => 'footer-two',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 3', 'wp-fanzone' ),
		'id' => 'footer-three',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'wp_fanzone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wp_fanzone_scripts() {
	global $wp_scripts;
	global $wp_styles;
	$slider_speed = 6000;
	if ( get_theme_mod( 'wp_fanzone_slider_speed' ) ) {
		$slider_speed = wp_fanzone_sanitize_integer(get_theme_mod( 'wp_fanzone_slider_speed' )) ;
	}
	wp_enqueue_style( 'wp_fanzone_slider', get_template_directory_uri() .'/css/slider.css', array(), false ,'screen' );
	wp_enqueue_style( 'wp_fanzone_responsive', get_template_directory_uri() .'/css/responsive.css', array(), false ,'screen' );
	wp_enqueue_style( 'wp_fanzone_font_awesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css' );
	wp_enqueue_style('wp_fanzone_googleFonts', '//fonts.googleapis.com/css?family=Lato|Oswald');
	wp_enqueue_style( 'wp_fanzone-ie', get_stylesheet_directory_uri() . "/css/ie.css", array()  );
    $wp_styles->add_data( 'wp_fanzone-ie', 'conditional', 'IE' );
	wp_enqueue_style( 'wp-fanzone-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'wp_fanzone_responsive_js', get_template_directory_uri() . '/js/responsive.js', array('jquery') );
	wp_enqueue_script( 'wp_fanzone_slider_js', get_template_directory_uri() . '/js/slider.js', array('jquery') );
	wp_enqueue_script( 'wp_fanzone_navigation_js', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true  );
	wp_enqueue_script( 'wp_fanzone_load_images_js', get_template_directory_uri() . '/js/jquery.imagesloaded.min.js');
	wp_enqueue_script( 'wp-fanzone-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'wp_fanzone_ie', get_template_directory_uri() . "/js/html5shiv.js");
	$wp_scripts->add_data( 'wp_fanzone_ie', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'wp_fanzone_ie-responsive', get_template_directory_uri() . "/js/ie-responsive.min.js");
	$wp_scripts->add_data( 'wp_fanzone_ie-responsive', 'conditional', 'lt IE 9' );
	
	
	wp_register_script( "wp_fanzone_custom_js", get_template_directory_uri() . "/js/custom.js", array('jquery-masonry') );
	wp_enqueue_script( "wp_fanzone_custom_js" );
	wp_localize_script( "wp_fanzone_custom_js", "slider_speed", array('vars' => $slider_speed) );
		

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_fanzone_scripts' );

function wp_fanzone_excerpt_length( $length ) {
	return 70;
}
add_filter( 'excerpt_length', 'wp_fanzone_excerpt_length', 999 );

function wp_fanzone_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'wp_fanzone_excerpt_more');

//====================================Breadcrumbs=============================================================================================
function wp_fanzone_breadcrumb() {
    global $post;
    echo '<ul id="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo home_url();
        echo '">';
        echo 'Home';
        echo '</a></li><li class="separator"> / </li>';
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li class="separator"> / </li><li> ');
            if (is_single()) {
                echo '</li><li class="separator"> / </li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $fanzone_act = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $fanzone_act as $fanzone_inherit ) {
                    $output = '<li><a href="'.get_permalink($fanzone_inherit).'" title="'.get_the_title($fanzone_inherit).'">'.get_the_title($fanzone_inherit).'</a></li> <li class="separator">/</li>';
                }
                echo $output;
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } else {
                echo '<li><strong> '.get_the_title().'</strong></li>';
            }
        }
    }
    echo '</ul>';
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
