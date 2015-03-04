<?php
/**
 * fmi functions and definitions
 *
 * @package fmi
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660; /* pixels */
}

if ( ! function_exists( 'fmi_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fmi_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on fmi, use a find and replace
	 * to change 'fmi' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'fmi', get_template_directory() . '/languages' );

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
		'menu-1' => __( 'Menu', 'fmi' ),
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
	
	add_theme_support( 'post-thumbnails' );
	
	add_editor_style();
}
endif; // fmi_setup
add_action( 'after_setup_theme', 'fmi_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function fmi_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'fmi' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'fmi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fmi_theme_scripts() {
	wp_enqueue_style( 'fmi-style', get_stylesheet_uri() );
	
	wp_enqueue_style('fmi-font-awesome',get_template_directory_uri().'/font-awesome/css/font-awesome.min.css',array() );
	
	if(fmi_theme_option( 'vs-body-google-font-url' ) ) {
        wp_enqueue_style( 'fmi-google-fonts-body', esc_url(fmi_theme_option( 'vs-body-google-font-url' )),array() );
    } else {
        wp_enqueue_style( 'fmi-google-body-fonts-default', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic',array() );
    }
	
	if( fmi_theme_option( 'vs-heading-google-font-url' ) ) {
        wp_enqueue_style( 'fmi-google-fonts-heading', esc_url(fmi_theme_option('vs-heading-google-font-url')), array() );
    } else {
        wp_enqueue_style( 'fmi-google-heading-fonts-default', '//fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic', array() );
    }

	wp_enqueue_script( 'fmi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'fmi-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_script( 'fmi-fitvids', get_template_directory_uri().'/js/jquery.fitvids.js', array('jquery'), '' );
	wp_enqueue_script( 'fmi_fitvids_doc_ready', get_template_directory_uri() . '/js/fitvids-doc-ready.js', array('jquery'), '' );
	
	wp_enqueue_script( 'fmi-basejs', get_template_directory_uri().'/js/base.js', array('jquery'), '' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fmi_theme_scripts' );

function fmi_theme_title($title,$sep) {
	global $paged, $page;
	if ( is_feed() )
		return $title;
	$title .= get_bloginfo( 'name', 'display' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title";
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'fmi' ), max( $paged, $page ) );
	return $title;
}
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	add_filter('wp_title','fmi_theme_title',10,2);
}

function fmi_theme_styles(){
    $custom_css = '';
    if (fmi_theme_option( 'vs-custom-css' ) ) {
        $custom_css = wp_kses_post(fmi_theme_option( 'vs-custom-css' ));
    }
	echo '<style type="text/css" media="screen">';
	if(fmi_theme_option('vs-body-google-font-name') <> ""){echo "body{".esc_attr(fmi_theme_option('vs-body-google-font-name'))."}";}
	if( fmi_theme_option('vs-heading-google-font-name') <> ""){echo "#title a{".esc_attr(fmi_theme_option('vs-heading-google-font-name'))."}";}
	echo htmlspecialchars_decode( $custom_css );
	echo '</style>';
}
add_action('wp_head', 'fmi_theme_styles', 11);

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
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Theme settings file.
 */
require get_template_directory() . '/settings/fmi-theme-settings.php';
?>