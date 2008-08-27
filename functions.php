<?php
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'sidebar-left',
'before_widget' => '<div class="block">',
'after_widget' => '</div>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));
register_sidebar(array('name'=>'sidebar-right',
'before_widget' => '<div class="block">',
'after_widget' => '</div>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));
?>
