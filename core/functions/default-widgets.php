<?php

if (function_exists('register_sidebar')) {
	
	register_sidebar(array(
	
		'name' => 'Top Sidebar',
		'id'   => 'top_sidebar_area',
		'description'   => 'This sidebar will be shown after the content.',
		'before_widget' => '<div class="' . wip_layout('wip_top_sidebar_area') . '"><div class="widget-box">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<header class="title"><div class="line"><h3>',
		'after_title'   => '</h3></div></header>'
	
	));
	
	register_sidebar(array(
	
		'name' => 'Side Sidebar',
		'id'   => 'side_sidebar_area',
		'description'   => 'This sidebar will be shown after the content.',
		'before_widget' => '<div class="widget-box">',
		'after_widget'  => '</div>',
		'before_title'  => '<header class="title"><div class="line"><h3>',
		'after_title'   => '</h3></div></header>'
	
	));

	register_sidebar(array(
	
		'name' => 'Category Sidebar',
		'id'   => 'category_sidebar_area',
		'description'   => 'This sidebar will be shown after the content.',
		'before_widget' => '<div class="widget-box">',
		'after_widget'  => '</div>',
		'before_title'  => '<header class="title"><div class="line"><h3>',
		'after_title'   => '</h3></div></header>'
	
	));

	register_sidebar(array(
	
		'name' => 'Footer Sidebar',
		'id'   => 'footer_sidebar_area',
		'description'   => 'This sidebar will be shown after the content.',
		'before_widget' => '<div class="pin-article ' . wip_layout('wip_footer_sidebar_area') . '"><article class="article">',
		'after_widget'  => '</article></div>',
		'before_title'  => '<header class="title"><div class="line"><h3>',
		'after_title'   => '</h3></div></header>'

	));

}

function unregister_default_wp_widgets() {
	unregister_widget('WP_Widget_Search');
}

add_action('widgets_init', 'unregister_default_wp_widgets', 1);


?>