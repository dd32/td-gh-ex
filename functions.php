<?php
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'sidebar1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
register_sidebar(array('name'=>'sidebar2',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
));  
add_theme_support('automatic-feed-links');
if ( ! isset( $content_width ) )
	$content_width = 470;
?>