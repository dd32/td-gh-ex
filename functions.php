<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<ul class="widget"><li>',
        'after_widget' => '</li></ul>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
?>