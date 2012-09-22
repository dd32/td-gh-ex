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

// adds a "Primary" in wp-admin/nav-menus.php
if ( function_exists( 'register_nav_menu' ) ) register_nav_menu( 'nav-one', 'Primary' );

//Custom Background
$custbackground = array(
	'default-color' => 'FFFFFF',
	'default-image' => get_template_directory_uri() . '/library/images/bg.png'
);
add_theme_support( 'custom-background', $custbackground );

//Custom Header
$headerdefaults = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => asteroid_option('main_width') + asteroid_option('sidebar_width') + 30,
	'height'                 => asteroid_option( 'header_height' ),
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => 'FFA900',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-header', $headerdefaults );


add_theme_support( 'post-thumbnails' );
add_image_size( 'thumb-excerpt', 128, 128, true ); //(cropped)


// Add dropdown class to parent menu items
function check_for_submenu($classes, $item) {
    global $wpdb;
    $has_children = $wpdb->get_var("SELECT COUNT(meta_id) FROM wp_postmeta WHERE meta_key='_menu_item_menu_item_parent' AND meta_value='".$item->ID."'");
    if ($has_children > 0) array_push($classes,'dropdown'); // add the class dropdown to the current list
    return $classes;
}
add_filter( 'nav_menu_css_class', 'check_for_submenu', 10, 2);


// Add Custom CSS to Post Editor
add_editor_style('library/editor-style.css');


if (function_exists( 'register_sidebar' ) ) {
// sidebar widgets
	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar_widgets',
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',) );
	
// footer widgets
	register_sidebar(array(
		'name' => 'Footer',
		'id' => 'footer_widgets',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',) );

// Custom Widget Hooks
		
	// Header Widget
	if ( asteroid_option('widget_hook_body') == 1 ) {
		register_sidebar(array(
			'name' => 'Body',
			'id' => 'body_widgets',
			'before_widget' => '<div id="%1$s" class="body-widget %2$s">',
			'after_widget' => '</div>',) );
	}
	// Header Widget
	if ( asteroid_option('widget_hook_header') == 1 ) {
		register_sidebar(array(
			'name' => 'Header',
			'id' => 'header_widgets',
			'before_widget' => '<div id="%1$s" class="header-widget %2$s">',
			'after_widget' => '</div>',) );
	}
	// After Menu
	if ( asteroid_option('widget_hook_after_menu') == 1 ) {
		register_sidebar(array(
			'name' => 'After Menu',
			'id' => 'after_menu_widgets',
			'before_widget' => '<div id="%1$s" class="after-menu-widget %2$s">',
			'after_widget' => '</div>',) );
	}
	// Before Post
	if ( asteroid_option('widget_hook_before_post') == 1 ) {
		register_sidebar(array(
			'name' => 'Before Post',
			'id' => 'before_post_widgets',
			'before_widget' => '<div id="%1$s" class="before-post-widget %2$s">',
			'after_widget' => '</div>',) );
	}
	// Before Post Content
	if ( asteroid_option('widget_hook_before_post_content') == 1 ) {
		register_sidebar(array(
			'name' => 'Before Post - Content',
			'id' => 'before_post_content_widgets',
			'before_widget' => '<div id="%1$s" class="before-post-content-widget %2$s">',
			'after_widget' => '</div>',) );
	}
	// After Post Content
	if ( asteroid_option('widget_hook_after_post_content') == 1 ) {
		register_sidebar(array(
			'name' => 'After Post - Content',
			'id' => 'after_post_content_widgets',
			'before_widget' => '<div id="%1$s" class="after-post-content-widget %2$s">',
			'after_widget' => '</div>',) );
	}
	// After Post
	if ( asteroid_option('widget_hook_after_post') == 1 ) {
		register_sidebar(array(
			'name' => 'After Post',
			'id' => 'after_post_widgets',
			'before_widget' => '<div id="%1$s" class="after-post-widget %2$s">',
			'after_widget' => '</div>',) );
	}
}