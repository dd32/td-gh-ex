<?php
if ( ! isset( $content_width ) )
	$content_width = 700;

    register_sidebar(array(
		'name' => __( 'Sidebar Widget Area' ),
		'id' => 'sidebar-widget-area',
		'description' => __( 'The sidebar widget area' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3><span>',
		'after_title' => '</span></h3>',        
    ));	

function baza_noclegowa_init_method() {
    if (!is_admin()) {
   wp_enqueue_script( 'jquery' );  
   wp_register_script('custom_script_1',
   get_template_directory_uri() . '/js/jquery.ddmenu.js');       
   wp_enqueue_script('custom_script_1');
   }       
}
       
register_nav_menus(
	array(
	  'primary' => 'Header Menu',
	  'footer-menu' => 'Footer Menu'
	)
);


add_action('init', 'baza_noclegowa_init_method');

add_editor_style();
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');

set_post_thumbnail_size( 110, 110, true ); // Default size

?>