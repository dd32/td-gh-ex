<?php
/* Register sidebar widgets */
function quickpress_widgets_init() {
register_sidebar(array(
        'name' => __( 'Sidebar 1', 'quickpress' ),
        'id' => 'sidebar-1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
register_sidebar(array(
        'name' => __( 'Sidebar 2', 'quickpress' ),
        'id' => 'sidebar-2',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
)); 
register_sidebar(array(
        'name' => __( 'Sidebar 3', 'quickpress' ),
        'id' => 'sidebar-3',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
)); 
register_sidebar(array(
        'name' => __( 'Nav Menu', 'quickpress' ),
        'id' => 'nav-menu',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
)); 
}
add_action( 'init', 'quickpress_widgets_init' );

/* Add feeds */
add_theme_support('automatic-feed-links');
  
/* Custom Background */
$args = array(
	'default-color' => 'EDE8E2',
	'default-image' => get_template_directory_uri() . '/images/background.jpg',
);
add_theme_support( 'custom-background', $args );

// post thumbnails
add_theme_support('post-thumbnails');


/* Title filter */
function quick_title( $title ) {
    // Get the Site Name
    $site_name = get_bloginfo( 'name' );
    // Prepend it to the default output
    $filtered_title = $site_name . $title;
    // Return the modified title
    return $filtered_title;
}
add_filter( 'wp_title', 'quick_title');

/* Content width */
if ( ! isset( $content_width ) )
	$content_width = 540;
?>