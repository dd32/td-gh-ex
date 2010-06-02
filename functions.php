<?php
if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name'=>'Left Sidebar',
        'before_widget' => '<div class="widg">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title"><h1>',
        'after_title' => '</h1></div>',
    ));
?>