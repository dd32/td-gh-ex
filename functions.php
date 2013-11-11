<?php
/**
 * Asteroid Theme Setup & Functions.
 * @package Asteroid
 *
 */
$ast_version = "1.1.4";
/*-------------------------------------
	Setup Theme Options
--------------------------------------*/
require( get_template_directory() . '/includes/theme-options.php' );


/*-------------------------------------
	Register Styles & Scripts
--------------------------------------*/
function asteroid_enqueue_styles() {
	global $ast_version;
	wp_enqueue_style( 'asteroid-main', get_stylesheet_uri(), array(), $ast_version ); 

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'asteroid_enqueue_styles' );


/*-------------------------------------
	Asteroid Theme Setup
--------------------------------------*/
function asteroid_theme_setup() {

	load_theme_textdomain( 'asteroid', get_template_directory() . '/languages' );
	register_nav_menu( 'ast-menu-primary', 'Primary' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'FFFFFF',
		'default-image' => get_template_directory_uri() . '/images/bg-grey.png',
	) );

	add_theme_support( 'custom-header', array(
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
	) );

	add_filter( 'widget_text', 'do_shortcode' );

	if ( !isset( $content_width ) ) $content_width = asteroid_option('ast_content_width') - 20;
	
	add_action( 'wp_head', 'asteroid_print_head_codes' );
	add_action( 'wp_head', 'asteroid_print_layout' );

	add_action( 'wp_head', 'asteroid_header_image' );
	add_action( 'wp_head', 'asteroid_header_text_color' );

	if ( asteroid_option('ast_custom_css') ) add_action( 'wp_head', 'asteroid_print_custom_css', 990 );
	if ( asteroid_option('ast_post_editor_style') == 0 ) asteroid_wp_editor_style();

}
add_action( 'after_setup_theme', 'asteroid_theme_setup' );


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


/*-------------------------------------
	Print Head Codes - Theme Setup
--------------------------------------*/
function asteroid_print_head_codes() {
	global $ast_version;
echo '
<!-- Asteroid Head -->
<meta property="Asteroid Theme" content="' . $ast_version . '" />' . "\n";

if ( asteroid_option('ast_favicon') ) {
	echo '<link rel="icon" href="' . esc_url( asteroid_option('ast_favicon') ) . '" type="image/x-icon" />' . "\n";
}
echo asteroid_option('ast_head_codes') . "\n";
echo '<!-- Asteroid Head End -->' . "\n";
}

/*-------------------------------------
	Print Layout CSS - Theme Setup
--------------------------------------*/
function asteroid_print_layout() {
	$content_x = asteroid_option('ast_content_width');
	$sidebar_x = asteroid_option('ast_sidebar_width');
	
echo '
<style type="text/css" media="screen">
	#container {width: ' . ( $content_x + $sidebar_x + 16 ) . 'px;}
	#header {
		min-height: ' . asteroid_option('ast_header_height') . 'px;
		background-color: #' . asteroid_option('ast_header_bgcolor') . ';
	}
	#content {
		width: ' . $content_x . 'px;
		max-width: ' . $content_x . 'px;
		background-color: #' . asteroid_option('ast_content_bgcolor') . ';
	}
	#sidebar {
		width: ' . $sidebar_x . 'px;
		max-width: ' . $sidebar_x . 'px;
		background-color: #' . asteroid_option('ast_sidebar_bgcolor') . ';
	}
</style>' . "\n\n";
}

/*-------------------------------------
	Header Background - Theme Setup
--------------------------------------*/
function asteroid_header_image() {
	if ( get_header_image() == '' ) return;
echo '
<style type="text/css" media="screen">
	#header {
		background-image: url(\'' . get_header_image() . '\');
		background-size: ' . get_custom_header()->width . 'px ' . get_custom_header()->height . 'px;
	}
</style>' . "\n\n";
}

/*-------------------------------------
	Header Text Color - Theme Setup
--------------------------------------*/
function asteroid_header_text_color() {
	if ( get_header_textcolor() == 'FFA900' ) return;
echo '
<style type="text/css" media="screen">
	#site-title a, #site-description {color:#' . get_header_textcolor() . ';}
</style>' . "\n\n";
}

/*-------------------------------------
	Custom CSS - Theme Setup
--------------------------------------*/
function asteroid_print_custom_css() {
echo '
<!-- Asteroid Custom CSS -->
<style type="text/css" media="screen">
' . asteroid_option('ast_custom_css') . '
</style>
<!-- Asteroid Custom CSS End -->' . "\n\n";
}

/*----------------------------------------
	Add Custom CSS to Post Editor
-----------------------------------------*/
function asteroid_wp_editor_style() {
	add_filter( 'mce_css', 'asteroid_wp_editor_width' );
	add_editor_style( array( 'includes/editor-style.css', 'includes/content-width.php' ) );
}

function asteroid_wp_editor_width( $mce_css ) {
	global $content_width;
	$mce_css = str_replace( 'includes/content-width.php', add_query_arg( 'content_width', $content_width, 'includes/content-width.php' ), $mce_css );
	return $mce_css;
}

/*----------------------------------------
	Remove extra width on wp-caption
-----------------------------------------*/
function asteroid_img_caption_filter($val, $attr, $content = null) {
	extract(shortcode_atts(array(
		'id'   	  => '',
		'align'	  => 'alignnone',
		'width'	  => '',
		'caption' => ''
	), $attr));
	 
	if ( 1 > (int) $width || empty($caption) )
		return $val;

	if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

	return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . ((int) $width + 10) . 'px">' . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}
add_filter( 'img_caption_shortcode', 'asteroid_img_caption_filter', 10, 3 );


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