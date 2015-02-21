<?php
// Register sidebar widgets
function quickpress_widgets_init() {
register_sidebar(array(
        'name' => 'Sidebar 1',
        'id' => 'sidebar-1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
register_sidebar(array(
        'name' => 'Sidebar 2',
        'id' => 'sidebar-2',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
)); 
register_sidebar(array(
         'name' => 'Sidebar 3',
        'id' => 'sidebar-3',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
)); 
register_sidebar(array(
         'name' => 'Nav Menu',
        'id' => 'nav-menu',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
)); 
}
add_action( 'widgets_init', 'quickpress_widgets_init' );

// Add feeds
add_theme_support('automatic-feed-links');

// Comment Reply Script
add_action( 'wp_enqueue_scripts', '_enqueue_scripts' );
function _enqueue_scripts(){
    // If single, threaded and open
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
        wp_enqueue_script( 'comment-reply' );
    }
} 

// add editor style
function quickpress_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'quickpress_add_editor_styles' );

// Load Stylesheet
function quickstyle() {
    wp_enqueue_style( 'style-name', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'quickstyle' );

// Custom Background
$args = array(
	'default-color' => 'EDE8E2',
	'default-image' => get_template_directory_uri() . '/images/background.jpg',
);
add_theme_support( 'custom-background', $args );

// add title tag
add_theme_support( 'title-tag' );

// post thumbnails
add_theme_support('post-thumbnails');

// Title filter 
function quick_title( $title ) {
    // Get the Site Name
    $site_name = get_bloginfo( 'name' );
    // Prepend it to the default output
    $filtered_title = $site_name . $title;
    // Return the modified title
    return $filtered_title;
}
add_filter( 'wp_title', 'quick_title');
 
// Content width
if ( ! isset( $content_width ) )
	$content_width = 540;
?>