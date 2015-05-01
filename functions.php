<?php
/**
 * atomic functions and definitions
 *
 * @package Atomic
 */

if ( ! function_exists( 'atomic_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function atomic_setup() {

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	if ( ! isset( $content_width ) ) {
		$content_width = 736; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'atomic', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'atomic' ),
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
	add_theme_support( 'custom-background', apply_filters( 'atomic_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	add_editor_style( 'atomic-editor-style.css' );
}
endif; // atomic_setup
add_action( 'after_setup_theme', 'atomic_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function atomic_widgets_init() {	
	/**
	 * Footer widgets
	 */
	register_sidebar( array(
		'name' => __( 'Footer Widget One', 'atomic' ),
		'id' => 'sidebar-5',
		'description' => __( 'Found at the bottom of every page.', 'atomic' ),
		'before_widget' => '<aside id="%1$s" class="widget footer-widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Two', 'atomic' ),
		'id' => 'sidebar-6',
		'description' => __( 'Found at the bottom of every page.', 'atomic' ),
		'before_widget' => '<aside id="%1$s" class="widget footer-widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Three', 'atomic' ),
		'id' => 'sidebar-7',
		'description' => __( 'Found at the bottom of every page.', 'atomic' ),
		'before_widget' => '<aside id="%1$s" class="widget footer-widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'atomic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function atomic_scripts() {

	wp_enqueue_style( 'atomic-style', get_stylesheet_uri() );
	
	// Google Fonts
	if ( atomic_google_fonts_url() ) {
		wp_register_style( 'atomic-fonts', atomic_google_fonts_url() );
		wp_enqueue_style( 'atomic-fonts' );
	}
	
	wp_enqueue_style( 'atomic-font-awesome', get_template_directory_uri() . '/inc/fontawesome/font-awesome.min.css', array(), '4.3.0' );
	
	wp_enqueue_script( 'atomic-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20120206', true );

	wp_enqueue_script( 'atomic-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'atomic_scripts' );
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

add_filter( 'the_content', 'atomic_aside_hyperlink', 9 ); 

function atomic_aside_hyperlink( $content ) {

	if ( has_post_format( 'aside' ) && !is_singular() )
		$content .= ' <a class="permalink-icon" href="' . get_permalink() . '"><i class="fa fa-link"></i></a>';

	return $content;
}


/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

// Loads theme-options.php from child or parent theme
$optionsfile = locate_template( 'theme-options.php' );
load_template( $optionsfile );

require_once('theme-options.php');
function of_get_default( $option ) {
     $defaults = optionsframework_options();
     if ( isset( $defaults[$option]['std'] ) ) {
          return $defaults[$option]['std'];
     }
     return false; // default if no std is set
}


/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 */
 
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});
	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}
});
</script>

<?php
}

/*
 * This is an example of filtering menu parameters
 */

/*
function prefix_options_menu_filter( $menu ) {
	$menu['mode'] = 'menu';
	$menu['page_title'] = __( 'Hello Options', 'textdomain');
	$menu['menu_title'] = __( 'Hello Options', 'textdomain');
	$menu['menu_slug'] = 'hello-options';
	return $menu;
}

add_filter( 'optionsframework_menu', 'prefix_options_menu_filter' );
*/