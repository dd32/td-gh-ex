<?php
/**
 * bhost functions and definitions
 *
 * @package bhost
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 770; /* pixels */
}

if ( ! function_exists( 'bhost_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bhost_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bhost, use a find and replace
	 * to change 'bhost' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bhost', get_template_directory() . '/languages' );
	
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
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bhost' ),
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
	add_theme_support( 'custom-background', apply_filters( 'bhost_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'post-thumb', 770,400, true );
}
endif; // bhost_setup
add_action( 'after_setup_theme', 'bhost_setup' );

//default menu
function bhost_default_menu(){
	echo '<ul class="nav">';
	echo '<li class="current-menu-item"><a href="'.esc_url(home_url()).'">'.__('Home' , 'bhost').'</a></li>';
	echo '</ul>';
}


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function bhost_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'bhost' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside class="single-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'bhost_widgets_init' );

/**
 * Google font For Bhost theme
 */
function bhost_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Raleway:400,500,600,700, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'bhost' ) ) {
		$query_args = array(
			'family' => urlencode( 'Raleway:400,500,600,700' ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$font_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $font_url;
}

/**
 * HTML5 Js file.
 */
 
function bhost_html5js(){ ?>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
<?php }

add_action('wp_head' , 'bhost_html5js');

/**
 * Enqueue scripts and styles.
 */
function bhost_scripts() {
	// Add Open sanse font, used in the main stylesheet.
	wp_enqueue_style( 'bhost-Raleway', bhost_font_url(), array(), null );
	wp_enqueue_style( 'bhost-bootstrap-css', get_template_directory_uri() .'/css/bootstrap.min.css' );
	wp_enqueue_style( 'bhost-meanmenu', get_template_directory_uri() .'/css/meanmenu.css' );
	wp_enqueue_style( 'bhost-style', get_stylesheet_uri() );
		
	wp_enqueue_script( 'bhost-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20120205', true );
	wp_enqueue_script( 'bhost-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'bhost-jquery.meanmenu.min-js', get_template_directory_uri() . '/js/jquery.meanmenu.min.js', array(), '20130116', true );
	wp_enqueue_script( 'bhost-jquery.easing.min-js', get_template_directory_uri() . '/js/jquery.easing.min.js', array(), '20130117', true );
	wp_enqueue_script( 'bhost-custom-js', get_template_directory_uri() . '/js/custom.js', array(), '20130118', true );
		
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bhost_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
