<?php
/**
 * functions and definitions
 *
 * @package fmi
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function fmi_theme_setup(){
	global $content_width;
	if(!isset($content_width)){$content_width = 660;}
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	
	add_editor_style();
	
	load_theme_textdomain('fmi',get_template_directory().'/languages');
}
add_action('after_setup_theme','fmi_theme_setup');

/**
 * Enqueue scripts and styles
 */
function fmi_theme_scripts(){
	wp_enqueue_style('fmi-style',get_stylesheet_uri(),array() );

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
	
	wp_enqueue_script('fmi-fitvids',get_template_directory_uri().'/js/jquery.fitvids.js',array('jquery'), '' );
	wp_enqueue_script( 'fmi_fitvids_doc_ready', get_template_directory_uri() . '/js/fitvids-doc-ready.js', array('jquery'), '' );
	
	wp_enqueue_script('fmi-basejs',get_template_directory_uri().'/js/base.js',array('jquery'), '' );
	if(is_singular()&&comments_open()&&get_option('thread_comments')){wp_enqueue_script('comment-reply');}
}
add_action('wp_enqueue_scripts','fmi_theme_scripts');

/**
 * This theme uses wp_nav_menu() in one location.
 */
function fmi_register_menus(){
	register_nav_menus(array('menu-1' => 'Menu'));
}
add_action( 'init', 'fmi_register_menus' );

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

function fmi_theme_widgets() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'fmi' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'fmi_theme_widgets' );

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
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Theme settings file.
 */
require get_template_directory() . '/settings/fmi-theme-settings.php';
?>