<?php

if (!function_exists('lookilite_add_widgets')) {

	function lookilite_add_widgets() {
	
		register_sidebar(array(
		
			'name' => __('Sidebar','lookilite') ,
			'id'   => 'side-sidebar-area',
			'description' => __('This sidebar will be shown after the content','lookilite') ,
			'before_widget' => '<div class="post-article">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>'
		
		));
	
		register_sidebar(array(
	
			'name' => __('Home Sidebar','lookilite') ,
			'id'   => 'home-sidebar-area',
			'description' => __('This sidebar will be shown in the homepage','lookilite') ,
			'before_widget' => '<div class="post-article">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>'
		
		));
	
		register_sidebar(array(
	
			'name' => __('Category Sidebar','lookilite') ,
			'id'   => 'category-sidebar-area',
			'description' => __('This sidebar will be shown at the side of content','lookilite') ,
			'before_widget' => '<div class="post-article">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>'
		
		));
	
		register_sidebar(array(
	
			'name' => __('Search Sidebar','lookilite') ,
			'id'   => 'search-sidebar-area',
			'description' => __('This sidebar will be shown in the search page.','lookilite') ,
			'before_widget' => '<div class="post-article">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>'
		
		));
	
	}
	
	add_action( 'widgets_init', 'lookilite_add_widgets' );

}

?>