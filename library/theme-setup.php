<?php
function asteroid_option( $option ) {
	$options = get_option( 'asteroid_options' );
	if ( isset( $options[$option] ) )
		return $options[$option];
	else
		return false;
}

/*-------------------------------------
	Register & Print the stylesheet
--------------------------------------*/
function ast_enqueue_styles(){
	if ( ! is_admin() ) {
		wp_register_style('asteroid-main-style', get_stylesheet_uri(), array(), '1.0.5', 'screen'); 
		wp_enqueue_style( 'asteroid-main-style' );
	}
}
add_action( 'wp_enqueue_scripts', 'ast_enqueue_styles' );


/*----------------------------------------
	Enables RSS feed links to the head
-----------------------------------------*/
if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'automatic-feed-links' );


/*----------------------------------------
	Custom Body Background
-----------------------------------------*/
$ast_cust_background = array(
	'default-color' => 'FFFFFF',
	'default-image' => get_template_directory_uri() . '/images/bg.png',
);
add_theme_support( 'custom-background', $ast_cust_background );


/*----------------------------------------
	Custom Header
-----------------------------------------*/
$ast_cust_header = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => asteroid_option('ast_content_width') + asteroid_option('ast_sidebar_width') + 30,
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
if ( function_exists( 'register_nav_menu' ) ) register_nav_menu( 'ast-menu-primary', 'Primary' );


/*----------------------------------------
	Add class to Menu item with child
-----------------------------------------*/
function ast_add_parent_menu_class($classes, $item) {
    global $wpdb;
    $has_children = $wpdb->get_var("SELECT COUNT(meta_id) FROM wp_postmeta WHERE meta_key='_menu_item_menu_item_parent' AND meta_value='".$item->ID."'");
    if ($has_children > 0) array_push($classes,'parent-menu-item');
    return $classes;
}
add_filter( 'nav_menu_css_class', 'ast_add_parent_menu_class', 10, 2);


/*----------------------------------------
	Register Sidebars
-----------------------------------------*/
if (function_exists( 'register_sidebar' ) ) {
	// sidebar widgets
	register_sidebar(array(
		'name' 			=> 'Sidebar',
		'id' 			=> 'widgets_sidebar',
		'before_widget' => '<div id="%1$s" class="widget-sidebar %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h4 class="widget-title">',
		'after_title' 	=> '</h4>',) );
	// footer widget full
	register_sidebar(array(
		'name' 			=> 'Footer: Full Width',
		'id' 			=> 'widgets_footer_full',
		'description'	=> 'Widget spans the entire width of the footer. Ideal for horizontal banners & 728x90 ads.',
		'before_widget' => '<div id="%1$s" class="widget-footer-full %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h4 class="widget-title">',
		'after_title' 	=> '</h4>',) );
	// footer widgets
	register_sidebar(array(
		'name' 			=> 'Footer: 3 Column',
		'id' 			=> 'widgets_footer_3',
		'description'	=> 'Widgets are arranged into 3 columns.',
		'before_widget' => '<div id="%1$s" class="widget-footer-3 %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h4 class="widget-title">',
		'after_title' 	=> '</h4>',) );

	// Body Widget
	if ( asteroid_option('ast_widget_body') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'Body',
			'id' 			=> 'widgets_body',
			'before_widget' => '<div id="%1$s" class="widget-body %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',) );
	}
	// Header Widget
	if ( asteroid_option('ast_widget_header') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'Header',
			'id' 			=> 'widgets_header',
			'before_widget' => '<div id="%1$s" class="widget-header %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',) );
	}
	// Below Menu
	if ( asteroid_option('ast_widget_below_menu') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'Below Menu',
			'id' 			=> 'widgets_below_menu',
			'description'	=> 'Widget spans the entire width of the container. Ideal for horizontal banners & 728x90 ads.',
			'before_widget' => '<div id="%1$s" class="widget-below-menu %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',) );
	}
	// Before Content
	if ( asteroid_option('ast_widget_before_content') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'Before Content',
			'id' 			=> 'widgets_before_content',
			'before_widget' => '<div id="%1$s" class="widget-before-content %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',) );
	}
	// Below Excerpts
	if ( asteroid_option('ast_widget_below_excerpts') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'Below Excerpts',
			'id' 			=> 'widgets_below_excerpts',
			'before_widget' => '<div id="%1$s" class="widget-below-excerpts %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',) );
	}
	
	// Before Post
	if ( asteroid_option('ast_widget_before_post') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'Before Post',
			'id' 			=> 'widgets_before_post',
			'before_widget' => '<div id="%1$s" class="widget-before-post %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',) );
	}
	// Before Post Content
	if ( asteroid_option('ast_widget_before_post_content') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'Before Post - Content',
			'id' 			=> 'widgets_before_post_content',
			'before_widget' => '<div id="%1$s" class="widget-before-post-content %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',) );
	}
	// After Post Content
	if ( asteroid_option('ast_widget_after_post_content') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'After Post - Content',
			'id' 			=> 'widgets_after_post_content',
			'before_widget' => '<div id="%1$s" class="widget-after-post-content %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',) );
	}
	// After Post
	if ( asteroid_option('ast_widget_after_post') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'After Post',
			'id' 			=> 'widgets_after_post',
			'before_widget' => '<div id="%1$s" class="widget-after-post %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',) );
	}
		
	// Before Page
	if ( asteroid_option('ast_widget_before_page') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'Before Page',
			'id' 			=> 'widgets_before_page',
			'before_widget' => '<div id="%1$s" class="widget-before-page %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',) );
	}
	// Before Page Content
	if ( asteroid_option('ast_widget_before_page_content') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'Before Page - Content',
			'id' 			=> 'widgets_before_page_content',
			'before_widget' => '<div id="%1$s" class="widget-before-page-content %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',) );
	}
	// After Page Content
	if ( asteroid_option('ast_widget_after_page_content') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'After Page - Content',
			'id' 			=> 'widgets_after_page_content',
			'before_widget' => '<div id="%1$s" class="widget-after-page-content %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',) );
	}
	// After Page
	if ( asteroid_option('ast_widget_after_page') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'After Page',
			'id' 			=> 'widgets_after_page',
			'before_widget' => '<div id="%1$s" class="widget-after-page %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',) );
	}
}


/*----------------------------------------
	Add support for thumbnails
-----------------------------------------*/
add_theme_support( 'post-thumbnails' );


/*----------------------------------------
	Add Custom CSS to Post Editor
-----------------------------------------*/
add_editor_style('library/editor-style.css');