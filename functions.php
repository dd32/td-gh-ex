<?php
require_once(TEMPLATEPATH . '/dashboard.php'); 
if ( function_exists('register_sidebar') ) {
    register_sidebar( array('name' => 'sidebar_top', 'before_widget' => '', 'after_widget' => '', 'before_title' => '<h3>', 'after_title' => '</h3>') );
    register_sidebar( array('name' => 'sidebar_left', 'before_widget' => '', 'after_widget' => '', 'before_title' => '<h3>', 'after_title' => '</h3>') );
    register_sidebar( array('name' => 'sidebar_right', 'before_widget' => '', 'after_widget' => '', 'before_title' => '<h3>', 'after_title' => '</h3>') );
}






 
?>