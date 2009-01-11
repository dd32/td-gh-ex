<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h2><span>',
        'after_title' => '</span></h2>',
    ));

add_filter('comments_template', 'legacy_comments');
function legacy_comments($file) {
	if(!function_exists('wp_list_comments')) : // WP 2.7-only check
		$file = TEMPLATEPATH . '/legacy.comments.php';
	endif;
	return $file;
}
?>