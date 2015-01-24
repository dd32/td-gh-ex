<?php

if (!function_exists('diarjolite_loadwidgets')) {

	function diarjolite_loadwidgets() {

		register_sidebar(array(
		
			'name' => 'Sidebar',
			'id'   => 'side-sidebar-area',
			'description'   => 'This sidebar will be shown after the content.',
			'before_widget' => '<div class="post-article">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>'
		
		));
	
		register_sidebar(array(
		
			'name' => 'Home Sidebar',
			'id'   => 'home-sidebar-area',
			'description'   => 'This sidebar will be shown in the homepage.',
			'before_widget' => '<div class="post-article">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>'
		
		));
	
		register_sidebar(array(
		
			'name' => 'Category Sidebar',
			'id'   => 'category-sidebar-area',
			'description'   => 'This sidebar will be shown at the side of content.',
			'before_widget' => '<div class="post-article">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>'
		
		));
	
		register_sidebar(array(
		
			'name' => 'Bottom Sidebar',
			'id'   => 'bottom-sidebar-area',
			'before_widget' => '<div class="'.diarjolite_setting('diarjolite_bottom_layout').' widget-box">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		
		));

	}

	add_action( 'widgets_init', 'diarjolite_loadwidgets' );

}

?>