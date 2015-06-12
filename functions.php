<?php
/**
 * bakery functions and definitions
 *
 * @package Bakery

 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 670; /* pixels */
}

if ( ! function_exists( 'bakery_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bakery_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bakery, use a find and replace
	 * to change 'bakery' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bakery', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => __( 'Primary Menu', 'bakery' ),
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
	add_theme_support( 'custom-background', apply_filters( 'bakery_custom_background_args', array(
		'default-image' => get_template_directory_uri().'/images/bg.jpg',
		'default-repeat' => 'repeat'
	) ) );
	
	add_theme_support( 'post-thumbnails' );
	
	add_editor_style();
}
endif; // bakery_setup
add_action( 'after_setup_theme', 'bakery_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function bakery_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'bakery' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><i class="fa fa-cutlery"></i>',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'bakery_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bakery_theme_scripts() {
	wp_enqueue_style( 'bakery-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'bakery-font-awesome',get_template_directory_uri().'/font-awesome/css/font-awesome.min.css',array() );
	
	wp_enqueue_style( 'bakery-google-fonts','//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700',array() );

	wp_enqueue_script( 'bakery-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'bakery-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_script( 'bakery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), '' );
	wp_enqueue_script( 'bakery-fitvids-doc-ready', get_template_directory_uri() . '/js/fitvids-doc-ready.js', array('jquery'), '' );
		
	wp_enqueue_script( 'bakery-basejs',get_template_directory_uri().'/js/base.js',array('jquery'),'' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	/**
	 * Register JQuery cycle js file for slider.
	 */
	wp_register_script( 'jquery-cycle', get_template_directory_uri() . '/js/jquery.cycle.all.min.js', array( 'jquery' ), '2.9999.5', true );

	/**
	 * Enqueue Slider setup js file.
	 */	
	if( get_theme_mod( 'enable_slider' ) && ( is_home() || is_front_page() ) ) { 
		wp_enqueue_script( 'bakery_slider', get_template_directory_uri() . '/js/slider-setting.js', array( 'jquery-cycle' ), false, true );
	}
	
	/**
    * Browser specific queuing i.e
	* https://gist.github.com/grappler/05568f05633484499acc
    */
	global $wp_scripts;
	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js', array(), '3.7.2', false );
	$wp_scripts->add_data( 'html5shiv', 'conditional', 'lt IE 9' );

}
add_action( 'wp_enqueue_scripts', 'bakery_theme_scripts' );

/**
 * Fav icon for the site
 */
function bakery_favicon() {
	if ( get_theme_mod( 'favicon', false ) ) {
		$bakery_favicon = get_theme_mod( 'favicon', "" );
		$bakery_favicon_output = '';
		if ( !empty( $bakery_favicon ) ) {
			$bakery_favicon_output .= '<link rel="shortcut icon" href="'.esc_url( $bakery_favicon ).'" type="image/x-icon" />';
		}
		echo $bakery_favicon_output;
	}
}
add_action( 'admin_head', 'bakery_favicon' );
add_action( 'wp_head', 'bakery_favicon' );

/**
 * Hooks the Custom Internal CSS to head section
 */
function bakery_custom_css() {

	$bakery_internal_css = '';

	$primary_color = esc_attr( get_theme_mod( 'primary_color', '#ff8800' ) );	
	if( $primary_color != '#ff8800' ) {
		$bakery_internal_css .= '
		blockquote{border-left:2px solid '.$primary_color.';}
		pre{border-left:2px solid '.$primary_color.';}
		button,input[type="button"],input[type="reset"],input[type="submit"]{background:'.$primary_color.';}
		a:hover,a:focus,a:active{color:'.$primary_color.';}
		.pagination .nav-links a:hover{color:'.$primary_color.';}
		.pagination .current{color:'.$primary_color.';}
		.entry-content a{color:'.$primary_color.';}
		.wp-pagenavi span.current{color:'.$primary_color.';}
		.entry-title, .entry-title a, .widget-area .widget-title{color:'.$primary_color.';}
		#controllers a:hover, #controllers a.active{color:'.$primary_color.';}
		#controllers a:hover, #controllers a.active{background-color:'.$primary_color.';}
		#slider-title a{background:'.$primary_color.';}';
	}

	if( !empty( $bakery_internal_css ) ) {
		?>
		<style type="text/css"><?php echo $bakery_internal_css; ?></style>
		<?php
	}
}
add_action('wp_head', 'bakery_custom_css');

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

/**
 * Load Theme Options Panel
 */
require get_template_directory() . '/inc/theme-options.php';

/**
 * Slider
 */
require_once( get_template_directory() . '/inc/header-functions.php' );
?>