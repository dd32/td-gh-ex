<?php
/* Register sidebar widgets */
function quickpic_widgets_init() {
register_sidebar(array(
        'name' => __( 'Sidebar 1', 'quickpic' ),
        'id' => 'sidebar-1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
register_sidebar(array(
        'name' => __( 'Sidebar 2', 'quickpic' ),
        'id' => 'sidebar-2',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
)); 
register_sidebar(array(
        'name' => __( 'Sidebar 3', 'quickpic' ),
        'id' => 'sidebar-3',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
)); 
register_sidebar(array(
        'name' => __( 'Nav Menu', 'quickpic' ),
        'id' => 'nav-menu',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
));
}
add_action( 'init', 'quickpic_widgets_init' );
/* Add feeds */
add_theme_support('automatic-feed-links');
/* Add Comment Reply Script */
add_action( 'wp_enqueue_scripts', '_enqueue_scripts' );
function _enqueue_scripts(){
    // If single, threaded and open
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
        wp_enqueue_script( 'comment-reply' );
    }
} 
/* Load Stylesheet */
function quickstyle() {
    wp_enqueue_style( 'style-name', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'quickstyle' );
/* Custom Background */
$args = array(
	'default-color' => '444444',
	'default-image' => get_template_directory_uri() . '/images/background.jpg',
);
add_theme_support( 'custom-background', $args );
/* Add Post thumbnails */
add_theme_support('post-thumbnails');
/* Add Title filter */
function quick_title( $title ) {
    // Get the Site Name
    $site_name = get_bloginfo( 'name' );
    // Prepend it to the default output
    $filtered_title = $site_name . $title;
    // Return the modified title
    return $filtered_title;
}
add_filter( 'wp_title', 'quick_title');
/* Set Content width */
if ( ! isset( $content_width ) )
	$content_width = 540;
?>