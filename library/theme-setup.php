<?php
function asteroid_option( $option ) {
	$options = get_option( 'asteroid_options' );
	if ( isset( $options[$option] ) )
		return $options[$option];
	else
		return false;
}

// enables post and comment RSS feed links to head
if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'automatic-feed-links' );


//Custom Background
$ast_cust_background = array(
	'default-color' => 'FFFFFF',
	'default-image' => get_template_directory_uri() . '/images/bg.png',
);
add_theme_support( 'custom-background', $ast_cust_background );


//Custom Header
$ast_cust_header = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => asteroid_option('ast_main_width') + asteroid_option('ast_sidebar_width') + 30,
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


// Register custom menu "Primary"
if ( function_exists( 'register_nav_menu' ) ) register_nav_menu( 'ast-menu-primary', 'Primary' );


// Check for submenus and add a class to parent menu items
function ast_check_for_submenu($classes, $item) {
    global $wpdb;
    $has_children = $wpdb->get_var("SELECT COUNT(meta_id) FROM wp_postmeta WHERE meta_key='_menu_item_menu_item_parent' AND meta_value='".$item->ID."'");
    if ($has_children > 0) array_push($classes,'parent-menu-item');
    return $classes;
}
add_filter( 'nav_menu_css_class', 'ast_check_for_submenu', 10, 2);


// Register Sidebars
if (function_exists( 'register_sidebar' ) ) {
	// sidebar widgets
	register_sidebar(array(
		'name' 			=> 'Sidebar',
		'id' 			=> 'widgets_sidebar',
		'before_widget' => '<div id="%1$s" class="widget-sidebar %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h4>',
		'after_title' 	=> '</h4>',) );
	
	// footer widgets
	register_sidebar(array(
		'name' 			=> 'Footer',
		'id' 			=> 'widgets_footer',
		'before_widget' => '<div id="%1$s" class="widget-footer %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h4>',
		'after_title' 	=> '</h4>',) );

// Custom Widget Hooks
	
	// Body Widget
	if ( asteroid_option('ast_widget_body') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'Body',
			'id' 			=> 'widgets_body',
			'before_widget' => '<div id="%1$s" class="widget-body %2$s">',
			'after_widget' 	=> '</div>',) );
	}
	// Header Widget
	if ( asteroid_option('ast_widget_header') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'Header',
			'id' 			=> 'widgets_header',
			'before_widget' => '<div id="%1$s" class="widget-header %2$s">',
			'after_widget' 	=> '</div>',) );
	}
	// Below Menu
	if ( asteroid_option('ast_widget_below_menu') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'Below Menu',
			'id' 			=> 'widgets_below_menu',
			'before_widget' => '<div id="%1$s" class="widget-below-menu %2$s">',
			'after_widget' 	=> '</div>',) );
	}
	// Before Post
	if ( asteroid_option('ast_widget_before_post') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'Before Post',
			'id' 			=> 'widgets_before_post',
			'before_widget' => '<div id="%1$s" class="widget-before-post %2$s">',
			'after_widget' 	=> '</div>',) );
	}
	// Before Post Content
	if ( asteroid_option('ast_widget_before_post_content') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'Before Post - Content',
			'id' 			=> 'widgets_before_post_content',
			'before_widget' => '<div id="%1$s" class="widget-before-post-content %2$s">',
			'after_widget' 	=> '</div>',) );
	}
	// After Post Content
	if ( asteroid_option('ast_widget_after_post_content') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'After Post - Content',
			'id' 			=> 'widgets_after_post_content',
			'before_widget' => '<div id="%1$s" class="widget-after-post-content %2$s">',
			'after_widget' 	=> '</div>',) );
	}
	// After Post
	if ( asteroid_option('ast_widget_after_post') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'After Post',
			'id' 			=> 'widgets_after_post',
			'before_widget' => '<div id="%1$s" class="widget-after-post %2$s">',
			'after_widget' 	=> '</div>',) );
	}
		
	// Before Page
	if ( asteroid_option('ast_widget_before_page') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'Before Page',
			'id' 			=> 'widgets_before_page',
			'before_widget' => '<div id="%1$s" class="widget-before-page %2$s">',
			'after_widget' 	=> '</div>',) );
	}
	// Before Page Content
	if ( asteroid_option('ast_widget_before_page_content') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'Before Page - Content',
			'id' 			=> 'widgets_before_page_content',
			'before_widget' => '<div id="%1$s" class="widget-before-page-content %2$s">',
			'after_widget' 	=> '</div>',) );
	}
	// After Page Content
	if ( asteroid_option('ast_widget_after_page_content') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'After Page - Content',
			'id' 			=> 'widgets_after_page_content',
			'before_widget' => '<div id="%1$s" class="widget-after-page-content %2$s">',
			'after_widget' 	=> '</div>',) );
	}
	// After Page
	if ( asteroid_option('ast_widget_after_page') == 1 ) {
		register_sidebar(array(
			'name' 			=> 'After Page',
			'id' 			=> 'widgets_after_page',
			'before_widget' => '<div id="%1$s" class="widget-after-page %2$s">',
			'after_widget' 	=> '</div>',) );
	}
}


// Add support for thumbnails, featured image
add_theme_support( 'post-thumbnails' );


// Add Custom CSS to Post Editor
add_editor_style('library/editor-style.css');