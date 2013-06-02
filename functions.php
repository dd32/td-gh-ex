<?php
/**
 * Asteroid Theme Setup & Functions.
 *
 * @package Asteroid
 *
 */
$ast_version = "1.1.0";
/*-------------------------------------
	Theme Localization
--------------------------------------*/
load_theme_textdomain( 'asteroid', get_template_directory() . '/languages' );


/*-------------------------------------
	Setup Theme Options
--------------------------------------*/
require( get_template_directory() . '/includes/theme-options.php' );


/*-------------------------------------
	Register Main Stylesheet
--------------------------------------*/
function asteroid_enqueue_styles() {
	global $ast_version;
	if ( ! is_admin() ) {
		wp_register_style( 'asteroid-main-style', get_stylesheet_uri(), array(), $ast_version, 'screen' ); 
		wp_enqueue_style( 'asteroid-main-style' );
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'asteroid_enqueue_styles' );


/*----------------------------------------
	Custom Body Background
-----------------------------------------*/
$ast_cust_background = array(
	'default-color' => 'FFFFFF',
	'default-image' => get_template_directory_uri() . '/images/bg-grey.png',
);
add_theme_support( 'custom-background', $ast_cust_background );


/*----------------------------------------
	Custom Header
-----------------------------------------*/
$ast_cust_header = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => asteroid_option('ast_content_width') + asteroid_option('ast_sidebar_width'),
	'height'                 => asteroid_option('ast_header_height'),
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => 'FFA900',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-header', $ast_cust_header );


/*----------------------------------------
	Register Custom Menu
-----------------------------------------*/
register_nav_menu( 'ast-menu-primary', 'Primary' );


/*----------------------------------------
	Add Parent Menu Class
-----------------------------------------*/
function asteroid_add_parent_menu_class( $items ) {
	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) $parents[] = $item->menu_item_parent; 
	}
	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) $item->classes[] = 'parent-menu-item';
	}
	return $items;    
}
add_filter( 'wp_nav_menu_objects', 'asteroid_add_parent_menu_class' );

function asteroid_add_parent_menu_class_default( $css_class, $page, $depth, $args ) {
    if (!empty($args['has_children']))
        $css_class[] = 'parent-menu-item';
    return $css_class;
}
add_filter( 'page_css_class', 'asteroid_add_parent_menu_class_default', 10, 4 );


/*----------------------------------------
	Register Sidebars
-----------------------------------------*/
function asteroid_register_sidebars() {
	register_sidebar(array(
		'name' 			=> __('Sidebar', 'asteroid'),
		'id' 			=> 'widgets_sidebar',
		'before_widget' => '<div id="%1$s" class="widget-sidebar asteroid-widget %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h4 class="widget-title">',
		'after_title' 	=> '</h4>') );

	register_sidebar(array(
		'name' 			=> __('Footer: Full Width', 'asteroid'),
		'id' 			=> 'widgets_footer_full',
		'description'	=> __('Widget spans the entire width of the footer. Ideal for horizontal banners & 728x90 ads.', 'asteroid'),
		'before_widget' => '<div id="%1$s" class="widget-footer-full asteroid-widget %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h4 class="widget-title">',
		'after_title' 	=> '</h4>') );

	register_sidebar(array(
		'name' 			=> __('Footer: 3 Column', 'asteroid'),
		'id' 			=> 'widgets_footer_3',
		'description'	=> __('Widgets are arranged into 3 columns.', 'asteroid'),
		'before_widget' => '<div id="%1$s" class="widget-footer-3 asteroid-widget %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h4 class="widget-title">',
		'after_title' 	=> '</h4>') );

	if ( asteroid_option('ast_widget_body') == 1 ) {
		register_sidebar(array(
			'name' 			=> __('Body', 'asteroid'),
			'id' 			=> 'widgets_body',
			'before_widget' => '<div id="%1$s" class="widget-body asteroid-widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>') );
	}
	if ( asteroid_option('ast_widget_header') == 1 ) {
		register_sidebar(array(
			'name' 			=> __('Header', 'asteroid'),
			'id' 			=> 'widgets_header',
			'before_widget' => '<div id="%1$s" class="widget-header asteroid-widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>') );
	}
	if ( asteroid_option('ast_widget_below_menu') == 1 ) {
		register_sidebar(array(
			'name' 			=> __('Below Menu', 'asteroid'),
			'id' 			=> 'widgets_below_menu',
			'description'	=> __('Widget spans the entire width of the container. Ideal for horizontal banners & 728x90 ads.', 'asteroid'),
			'before_widget' => '<div id="%1$s" class="widget-below-menu asteroid-widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>') );
	}
	if ( asteroid_option('ast_widget_before_content') == 1 ) {
		register_sidebar(array(
			'name' 			=> __('Before Content', 'asteroid'),
			'id' 			=> 'widgets_before_content',
			'before_widget' => '<div id="%1$s" class="widget-before-content asteroid-widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>') );
	}
	if ( asteroid_option('ast_widget_below_excerpts') == 1 ) {
		register_sidebar(array(
			'name' 			=> __('Below Excerpts', 'asteroid'),
			'id' 			=> 'widgets_below_excerpts',
			'before_widget' => '<div id="%1$s" class="widget-below-excerpts asteroid-widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>') );
	}
	if ( asteroid_option('ast_widget_before_post') == 1 ) {
		register_sidebar(array(
			'name' 			=> __('Before Post', 'asteroid'),
			'id' 			=> 'widgets_before_post',
			'before_widget' => '<div id="%1$s" class="widget-before-post asteroid-widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>') );
	}
	if ( asteroid_option('ast_widget_before_post_content') == 1 ) {
		register_sidebar(array(
			'name' 			=> __('Before Post - Content', 'asteroid'),
			'id' 			=> 'widgets_before_post_content',
			'before_widget' => '<div id="%1$s" class="widget-before-post-content asteroid-widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>') );
	}
	if ( asteroid_option('ast_widget_after_post_content') == 1 ) {
		register_sidebar(array(
			'name' 			=> __('After Post - Content', 'asteroid'),
			'id' 			=> 'widgets_after_post_content',
			'before_widget' => '<div id="%1$s" class="widget-after-post-content asteroid-widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>') );
	}
	if ( asteroid_option('ast_widget_after_post') == 1 ) {
		register_sidebar(array(
			'name' 			=> __('After Post', 'asteroid'),
			'id' 			=> 'widgets_after_post',
			'before_widget' => '<div id="%1$s" class="widget-after-post asteroid-widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>') );
	}
}
add_action( 'widgets_init', 'asteroid_register_sidebars' );


/*----------------------------------------
	Set $content_width
-----------------------------------------*/
if ( ! isset( $content_width ) ) {
	$content_width = asteroid_option('ast_content_width') - 20;
}


/*-------------------------------------
	Site Title
--------------------------------------*/
function asteroid_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'asteroid' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'asteroid_wp_title', 10, 2 );


/*-------------------------------------
	Head Codes
--------------------------------------*/
function asteroid_print_head_codes() {
	global $ast_version;
	echo "\n\n" . '<!-- Asteroid Head -->' . "\n" . '<meta property="Asteroid Theme" content="' . $ast_version . '" />' . "\n";
	
	if (! ( asteroid_option('ast_favicon') == '' ) ) {
		echo '<link rel="icon" href="' . asteroid_option('ast_favicon') . '" type="image/x-icon" />' . "\n";
	}
		echo asteroid_option('ast_head_codes') . "\n";
	
	echo '<!-- Asteroid Head End -->' . "\n\n";
}
add_action( 'wp_head', 'asteroid_print_head_codes' );


/*-------------------------------------
	Header Background
--------------------------------------*/
function asteroid_header_image() {
	if (!( get_header_image() == '' )) {
		echo '<style type="text/css" media="screen">' . "\n";
		echo '#header {' . "\n";
		echo 'background-image: url(' . get_header_image() . ');' . "\n"; 
		echo 'background-size: ' . get_custom_header()->width . 'px ' . get_custom_header()->height . 'px;' . "\n";
		echo '}' . "\n";
		echo '</style>' . "\n\n";
	}
}
add_action( 'wp_head', 'asteroid_header_image' );


/*-------------------------------------
	Header Text Color
--------------------------------------*/
function asteroid_header_text_color() {
	if (!( get_header_textcolor() == 'FFA900' )){
		echo '<style type="text/css" media="screen">' . "\n";
		echo '#site-title a, #site-description {color:#' . get_header_textcolor() . ';}' . "\n";
		echo '</style>' . "\n";
	}
}
add_action( 'wp_head', 'asteroid_header_text_color' );


/*-------------------------------------
	Container Layout
--------------------------------------*/
function asteroid_print_layout() {
	$content_x = asteroid_option('ast_content_width');
	$sidebar_x = asteroid_option('ast_sidebar_width');
	
	echo "\n" . '<style type="text/css" media="screen">' . "\n";
	echo '#container {width:' . ( $content_x + $sidebar_x + 16 ) . 'px;}' . "\n";
	echo '#header {min-height:' . asteroid_option('ast_header_height') . 'px; background-color: #' . asteroid_option('ast_header_bgcolor') . ';}' . "\n";
	echo '#content {width:' . $content_x . 'px; max-width:' . $content_x . 'px; background-color: #' . asteroid_option('ast_content_bgcolor') . ';}' . "\n";
	echo '#sidebar {width:' . $sidebar_x . 'px; max-width:' . $sidebar_x . 'px; background-color: #' . asteroid_option('ast_sidebar_bgcolor') . ';}' . "\n";
	echo '</style>';
}
add_action( 'wp_head', 'asteroid_print_layout', 600 );


/*-------------------------------------
	Custom CSS
--------------------------------------*/
function asteroid_print_custom_css() {
	echo "\n\n" . '<!-- Asteroid Custom CSS -->' . "\n";
	echo '<style type="text/css" media="screen">' . "\n" . asteroid_option('ast_custom_css') . "\n" . '</style>' . "\n";
	echo '<!-- Asteroid Custom CSS End -->' . "\n\n";
}
add_action( 'wp_head', 'asteroid_print_custom_css', 990 );


/*-------------------------------------
	Footer Codes
--------------------------------------*/
function asteroid_do_hook_footer_links() {
	if (!( asteroid_option('ast_hook_footer_links') == '' )) echo asteroid_option('ast_hook_footer_links');
}
add_action( 'ast_hook_footer_links', 'asteroid_do_hook_footer_links' );


/*----------------------------------------
	RSS feed links on Head
-----------------------------------------*/
add_theme_support( 'automatic-feed-links' );


/*----------------------------------------
	Add support for Thumbnails
-----------------------------------------*/
add_theme_support( 'post-thumbnails' );


/*----------------------------------------
	Add Custom CSS to Post Editor
-----------------------------------------*/
function asteroid_wp_editor_width( $mce_css ) {
	global $content_width;
	$mce_css = str_replace( 'includes/content-width.php', add_query_arg( 'content_width', $content_width, 'includes/content-width.php' ), $mce_css );
	return $mce_css;
}
add_filter( 'mce_css', 'asteroid_wp_editor_width' );

if ( asteroid_option('ast_post_editor_style') == 0 ) {
	add_editor_style( array( 'includes/editor-style.css', 'includes/content-width.php' ) );
}


/*----------------------------------------
	Shortcodes on Text Widget
-----------------------------------------*/
add_filter( 'widget_text', 'do_shortcode');


/*-------------------------------------
	Remove WordPress Generator
--------------------------------------*/
if ( asteroid_option('ast_remove_wp_version') == 1 ) remove_action( 'wp_head', 'wp_generator' );


/*-------------------------------------
	Remove rel from Categories
	HTML5 Validation
--------------------------------------*/
function asteroid_remove_category_rel($output) {
	$output = str_replace(' rel="category tag"', '', $output);
	return $output;
}
add_filter('wp_list_categories', 'asteroid_remove_category_rel');
add_filter('the_category', 'asteroid_remove_category_rel');