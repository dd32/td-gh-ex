<?php if(!defined('ABSPATH')) exit; //Exit if accessed directly
/* ------------------------------------------------------- */
/* WP ENQUEUE SCRIPTS ------------------------------------ */
if (!is_admin())
	add_action('wp_enqueue_scripts', 'theme_js');
if (!function_exists('theme_js')) {
	function theme_js() {
		wp_enqueue_script('theme-modernizr', get_template_directory_uri() . '/include/js/theme-modernizr.js', array('jquery'), '2.6.2', false);
		wp_enqueue_script('theme-plugins', get_template_directory_uri() . '/include/js/theme-plugins.js', array('jquery'), '1.1.1', false);
		wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/include/js/theme-scripts.js', array('jquery'), '1.1.1', false);
	}
}
/* ------------------------------------------------------- */
/* CONTENT WIDTH ----------------------------------------- */
if (!isset($content_width)) :
	$content_width = 900;
endif;
/* ------------------------------------------------------- */
/* CUSTOM BACKGROUND ------------------------------------- */
add_theme_support('custom-background', array(
	'default-color'	=> 'E9EDED'
));
/* ------------------------------------------------------- */
/* CUSTOM HEADER ----------------------------------------- */
add_theme_support('custom-header',array(
	'default-image'				=> get_template_directory_uri() . '/include/images/default-logo.png',
	'random-default'        	=> false,
	'width'                 	=> 300,
	'height'                	=> 100,
	'flex-height'           	=> true,
	'flex-width'            	=> true,
	'default-text-color'   		=> '',
	'header-text'          		=> false,
	'uploads'              	 	=> true,
	'wp-head-callback'      	=> '',
	'admin-head-callback'   	=> '',
	'admin-preview-callback'	=> '',
));
/* ------------------------------------------------------- */
/* GET BREADCRUMBS --------------------------------------- */
function get_breadcrumbs() {
	if(function_exists(breadcrumbs)) :
		breadcrumbs();
	endif;
}
/* ------------------------------------------------------- */
/* GET DISCLAIMER ---------------------------------------- */
function get_disclaimer() {
	if(function_exists(disclaimer)) :
		disclaimer();
	endif;
}
/* ------------------------------------------------------- */
/* GET FAVICON ------------------------------------------- */
function get_favicon() {
	if(function_exists(favicon)) :
		favicon();
	endif;
}
/* ------------------------------------------------------- */
/* GET PAGINATION ---------------------------------------- */
function pagination_custom_is_support() {
	$supported = current_theme_supports( 'infinite-scroll' );
	return $supported;
}
add_filter('infinite_scroll_archive_supported', 'pagination_custom_is_support');
function get_pagination() {
	if(class_exists('Jetpack') && Jetpack::is_module_active('infinite-scroll')) :
		//Infinite scroll is active
	else :
		global $wp_query;
		$big = 999999999;
		echo "<div class='pagination'>";
		echo paginate_links(array(
			'base' => str_replace($big, '%#%', esc_url( get_pagenum_link($big))),
			'format' => '?paged=%#%',
			'current' => max(1, get_query_var('paged')),
			'total' => $wp_query->max_num_pages
		));	
		echo "</div>";
	endif;
}
/* ------------------------------------------------------- */
/* GET SLIDER -------------------------------------------- */
function get_slider() {
	if(function_exists(slider)) :
		slider();
	endif;
}
/* ------------------------------------------------------- */
/* JETPACK - INFINITE SCROLL SUPPORT --------------------- */
add_theme_support('infinite-scroll', array(
    'type'				=> 'scroll',
    'container'			=> 'content',
	'footer'			=> false,
    'wrapper'			=> true,
    'render'			=> false,
    'posts_per_page'	=> false
));
/* ------------------------------------------------------- */
/* AUTOMATIC FEED LINKS SUPPORT -------------------------- */
add_theme_support('automatic-feed-links');
/* ------------------------------------------------------- */
/* POST THUMBNAILS SUPPORT ------------------------------- */
add_theme_support('post-thumbnails');

/* ------------------------------------------------------- */
/* REGISTER NAV MENUS ------------------------------------ */
register_nav_menus(array(
	'top_menu'		=> 'Top Menu',
	'main_menu'		=> 'Main Menu'
));
/* ------------------------------------------------------- */
/* REGISTER SIDEBAR - MAIN SIDEBAR AREA ------------------ */
register_sidebar(array(
	'name'          => ('Main Sidebar Area'),
	'id'            => 'sidebar',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h1 class="title">',
	'after_title'   => '</h1>'
));
/* REGISTER SIDEBAR - SECONDARY SIDEBAR AREA ------------- */
register_sidebar(array(
	'name'          => ('Secondary Sidebar Area'),
	'id'            => 'sidebar_2',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h1 class="title">',
	'after_title'   => '</h1>'
));
/* REGISTER SIDEBAR - HEADER WIDGET AREA ----------------- */
register_sidebar(array(
	'name'          => ('Header Widget Area'),
	'id'            => 'header_1',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h1 class="title">',
	'after_title'   => '</h1>'
));
/* REGISTER SIDEBAR - FOOTER WIDGET AREA 1 --------------- */
register_sidebar(array(
	'name'          => ('Footer Widget Area 1'),
	'id'            => 'footer_1',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h1 class="title">',
	'after_title'   => '</h1>'
));
/* REGISTER SIDEBAR - FOOTER WIDGET AREA 2 --------------- */
register_sidebar(array(
	'name'          => ('Footer Widget Area 2'),
	'id'            => 'footer_2',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h1 class="title">',
	'after_title'   => '</h1>'
));
/* REGISTER SIDEBAR - FOOTER WIDGET AREA 3 --------------- */
register_sidebar(array(
	'name'          => ('Footer Widget Area 3'),
	'id'            => 'footer_3',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h1 class="title">',
	'after_title'   => '</h1>'
));
/* REGISTER SIDEBAR - FOOTER WIDGET AREA 4 --------------- */
register_sidebar(array(
	'name'          => ('Footer Widget Area 4'),
	'id'            => 'footer_4',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h1 class="title">',
	'after_title'   => '</h1>'
));
/* REGISTER SIDEBAR - HOMEPAGE WIDGET AREA 1 ------------- */
register_sidebar(array(
	'name'          => ('Homepage Widget Area 1'),
	'id'            => 'home_1',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h1 class="title">',
	'after_title'   => '</h1>'
));
/* REGISTER SIDEBAR - HOMEPAGE WIDGET AREA 2 ------------- */
register_sidebar(array(
	'name'          => ('Homepage Widget Area 2'),
	'id'            => 'home_2',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h1 class="title">',
	'after_title'   => '</h1>'
));
/* REGISTER SIDEBAR - HOMEPAGE WIDGET AREA 3 ------------- */
register_sidebar(array(
	'name'          => ('Homepage Widget Area 3'),
	'id'            => 'home_3',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h1 class="title">',
	'after_title'   => '</h1>'
));
/* ------------------------------------------------------- */
/* STYLE EDITOR SUPPORT ---------------------------------- */
function add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'add_editor_styles' );
/* ------------------------------------------------------- */
/* THEME OPTIONS ----------------------------------------- */
if(is_admin()){	
	require_once('include/options.php');
}
require_once('include/options-functions.php');

?>