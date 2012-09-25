<?php
/* Register sidebar widgets */
function quickchic_widgets_init() {
register_sidebar(array(
        'name' => __( 'Sidebar 1', 'quickchic' ),
        'id' => 'sidebar-1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
register_sidebar(array(
        'name' => __( 'Sidebar 2', 'quickchic' ),
        'id' => 'sidebar-2',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));  
}
add_action( 'init', 'quickchic_widgets_init' );

/* Add feeds */
add_theme_support('automatic-feed-links'); 
 
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