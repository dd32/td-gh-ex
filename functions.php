<?php

if ( ! isset( $content_width ) ) $content_width = 460;

//CUSTOM HEADER
$defaults = array(
	'random-default'         => false,
	'width'                  => 960,
	'height'                 => 200,
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => '',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
);
add_theme_support( 'custom-header', $defaults );


//CUSTOM BACKGROUND
$defaults = array(
	'default-color'          => 'DDDDDD',
	'default-image'          => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );


//WP COMMENT LIST
$args = array(
	'walker'            => null,
	'max_depth'         => '',
	'style'             => 'ul',
	'callback'          => null,
	'end-callback'      => null,
	'type'              => 'all',
	'reply_text'        => 'Reply',
	'page'              => '',
	'per_page'          => '',
	'avatar_size'       => 64,
	'reverse_top_level' => null,
	'reverse_children'  => ''
);



//MENU NAVIGATION
function register_my_menus() {
  register_nav_menus(
    array(
      'top-menu' => __( 'Top Menu' ),
      'primary-menu' => __( 'Primary Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


//POST THUMBNAILS
add_theme_support('post-thumbnails');
set_post_thumbnail_size(520, 250, true);


//WIDGET ENABLED SIDEBAR
if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Sidebar 1',
	'before_widget' => '<li id="widget1" class="widgetclass">',
	'after_widget' => '</li>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	));
	register_sidebar(array('name'=>'Sidebar 2',
	'before_widget' => '<li id="widget2" class="widgetclass">',
	'after_widget' => '</li>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	));
	register_sidebar(array('name'=>'Header widget',
	'before_widget' => '<li id="widget3" class="widgetclass">',
	'after_widget' => '</li>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	));
	register_sidebar(array('name'=>'Footer widget',
	'before_widget' => '<li id="widget4" class="widgetclass">',
	'after_widget' => '</li>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	));


//POST AND COMMENTS RSS FEED LINKS
add_theme_support( 'automatic-feed-links' );

?>