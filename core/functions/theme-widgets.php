<?php

function suevafree_widgets_init() {

	register_sidebar(array(
	
		'name' => __('Sidebar','suevafree'),
		'id'   => 'sidebar-area',
		'description'   => __('This sidebar will be shown at the side of posts and pages.','suevafree'),
		'before_widget' => '<div id="%1$s" class="widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>'
	
	));
	
	register_sidebar(array(
	
		'name' => __('Home Sidebar','suevafree'),
		'id'   => 'home_sidebar_area',
		'description'   => __( "This sidebar will be shown at the side of the homepage","suevafree"),
		'before_widget' => '<div id="%1$s" class="widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>'
	
	));

	register_sidebar(array(
	
		'name' => __('Category Sidebar','suevafree'),
		'id'   => 'category-sidebar-area',
		'description'   => __('This sidebar will be shown at the side of category page.','suevafree'),
		'before_widget' => '<div id="%1$s" class="widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>'
	
	));

	register_sidebar(array(
	
		'name' => __('Search Sidebar','suevafree'),
		'id'   => 'search-sidebar-area',
		'description'   => __('This sidebar will be shown at the side of search page.','suevafree'),
		'before_widget' => '<div id="%1$s" class="widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>'
	
	));

	register_sidebar(array(
	
		'name' => __('Bottom Sidebar','suevafree'),
		'id'   => 'bottom-sidebar-area',
		'description'   => __('This sidebar will be shown after the content.','suevafree'),
		'before_widget' => '<div id="%1$s" class="col-md-3 %2$s"><div class="widget-box">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>'
	
	));

}

add_action( 'widgets_init', 'suevafree_widgets_init' );

?>