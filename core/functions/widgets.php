<?php

if (!function_exists('alhenalite_loadwidgets')) {

	function alhenalite_loadwidgets() {

		register_sidebar(array(
		
			'name' => 'Side Sidebar',
			'id'   => 'side_sidebar_area',
			'description'   => esc_html__( "This sidebar will be shown at the side of content","alhena-lite"),
			'before_widget' => '<div id="%1$s" class="post-article widget-box %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<header class="title"><div class="line"><h3>',
			'after_title'   => '</h3></div></header>'
		
		));
	
		register_sidebar(array(
		
			'name' => 'Home Sidebar',
			'id'   => 'home_sidebar_area',
			'description'   => esc_html__( "This sidebar will be shown for the homepage","alhena-lite"),
			'before_widget' => '<div id="%1$s" class="post-article widget-box %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<header class="title"><div class="line"><h3>',
			'after_title'   => '</h3></div></header>'
		
		));
	
		register_sidebar(array(
		
			'name' => 'Top Sidebar',
			'id'   => 'top_sidebar_area',
			'description'   => esc_html__( "This sidebar will be shown before the content","alhena-lite"),
			'before_widget' => '<div id="%1$s" class="col-md-4"><div class="widget-box %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<header class="title"><div class="line"><h3>',
			'after_title'   => '</h3></div></header>'
		
		));
		
		register_sidebar(array(
		
			'name' => 'Category Sidebar',
			'id'   => 'category_sidebar_area',
			'description'   => esc_html__( "This sidebar will be shown at the side of archive","alhena-lite"),
			'before_widget' => '<div id="%1$s" class="post-article widget-box %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<header class="title"><div class="line"><h3>',
			'after_title'   => '</h3></div></header>'
		
		));
	
		register_sidebar(array(
		
			'name' => 'Footer Sidebar',
			'id'   => 'footer_sidebar_area',
			'description'   => esc_html__( "This sidebar will be shown after the content","alhena-lite"),
			'before_widget' => '<div id="%1$s" class="post-container col-md-4 %2$s"><article class="post-article">',
			'after_widget'  => '</article></div>',
			'before_title'  => '<header class="title"><div class="line"><h4>',
			'after_title'   => '</h4></div></header>'
	
		));
	
	}

	add_action( 'widgets_init', 'alhenalite_loadwidgets' );

}

?>