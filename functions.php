<?php
// Register sidebar widgets
function quickpic_widgets_init() {
register_sidebar(array(
        'name' => 'Footer 1',
        'id' => 'footer-1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
register_sidebar(array(
        'name' => 'Footer 2',
        'id' => 'footer-2',
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
add_action( 'widgets_init', 'quickpic_widgets_init' );

// Add feeds 
add_theme_support('automatic-feed-links');

// Add Comment Reply Script
add_action( 'wp_enqueue_scripts', '_enqueue_scripts' );
function _enqueue_scripts(){
    // If single, threaded and open
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
        wp_enqueue_script( 'comment-reply' );
    }
} 

// Load Stylesheet 
function quickstyle() {
    wp_enqueue_style( 'style-name', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'quickstyle' );

// Custom Background 
$args = array(
	'default-color' => '444444',
	'default-image' => get_template_directory_uri() . '/images/background.jpg',
);
add_theme_support( 'custom-background', $args );

// Add Post thumbnails
add_theme_support('post-thumbnails');

// add editor style
function quickpic_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'quickpic_add_editor_styles' );

// add title tag
add_theme_support( 'title-tag' );

// Add Title filter 
function quick_title( $title ) {
    // Get the Site Name
    $site_name = get_bloginfo( 'name' );
    // Prepend it to the default output
    $filtered_title = $site_name . $title;
    // Return the modified title
    return $filtered_title;
}
add_filter( 'wp_title', 'quick_title');


// Set Content width 
if ( ! isset( $content_width ) )
	$content_width = 540;
?>