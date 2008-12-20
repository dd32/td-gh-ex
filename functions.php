<?php

add_filter('comments_template', 'legacy_comments');
function legacy_comments($file) {
	if(!function_exists('wp_list_comments')) : // WP 2.7-only check
		$file = TEMPLATEPATH . '/comments-old.php';
	endif;
	return $file;
}


if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Sidebar 1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Sidebar 2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

?>