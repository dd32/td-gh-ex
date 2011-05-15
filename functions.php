<?php 

$content_width =500;  

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

 ?>
