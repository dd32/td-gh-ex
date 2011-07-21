<?php 

$content_width =400;  

add_theme_support('automatic-feed-links');

add_theme_support('post-thumbnails');

add_filter( 'use_default_gallery_style', '__return_false' );

register_nav_menu( 'primary', 'Primary Navigation Menu' ); 

register_sidebar(array('name'=>'Footer-Sidebar 1',
'before_widget' => '<li>',
'after_widget' => '</li>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));

register_sidebar(array('name'=>'Footer-Sidebar 2',
'before_widget' => '<li>',
'after_widget' => '</li>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));

register_sidebar(array('name'=>'Footer-Sidebar 3',
'before_widget' => '<li>',
'after_widget' => '</li>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));

register_sidebar(array('name'=>'Footer-Sidebar 4',
'before_widget' => '<li>',
'after_widget' => '</li>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));

// remove invalid links in the <head>
function remove_head_links() {
remove_action( 'wp_head', 'start_post_rel_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
}
add_action('init', 'remove_head_links');
// remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist){
return str_replace('rel="category"', 'rel="tag"', $thelist);
}
add_filter('the_category', 'remove_category_rel_from_category_list');
?>
