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
}
add_action( 'init', 'quickpic_widgets_init' );

/* Add feeds */
add_theme_support('automatic-feed-links');
 

/* Content width */
if ( ! isset( $content_width ) )
	$content_width = 560;

?>