<?php

if (!function_exists('alhenalite_loadwidgets')) {

	function alhenalite_loadwidgets() {

		register_sidebar(array(
		
			'name' => 'Side Sidebar',
			'id'   => 'side_sidebar_area',
			'description'   => __( "This sidebar will be shown at the side of content","alhenalite"),
			'before_widget' => '<div id="%1$s" class="widget-box %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<header class="title"><div class="line"><h3>',
			'after_title'   => '</h3></div></header>'
		
		));
	
		register_sidebar(array(
		
			'name' => 'Home Sidebar',
			'id'   => 'home_sidebar_area',
			'description'   => __( "This sidebar will be shown for the homepage","alhenalite"),
			'before_widget' => '<div id="%1$s" class="widget-box %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<header class="title"><div class="line"><h3>',
			'after_title'   => '</h3></div></header>'
		
		));
	
		register_sidebar(array(
		
			'name' => 'Top Sidebar',
			'id'   => 'top_sidebar_area',
			'description'   => __( "This sidebar will be shown before the content","alhenalite"),
			'before_widget' => '<div id="%1$s" class="span4"><div class="widget-box %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<header class="title"><div class="line"><h3>',
			'after_title'   => '</h3></div></header>'
		
		));
		
		register_sidebar(array(
		
			'name' => 'Category Sidebar',
			'id'   => 'category_sidebar_area',
			'description'   => __( "This sidebar will be shown at the side of archive","alhenalite"),
			'before_widget' => '<div id="%1$s" class="widget-box %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<header class="title"><div class="line"><h3>',
			'after_title'   => '</h3></div></header>'
		
		));
	
		register_sidebar(array(
		
			'name' => 'Footer Sidebar',
			'id'   => 'footer_sidebar_area',
			'description'   => __( "This sidebar will be shown after the content","alhenalite"),
			'before_widget' => '<div id="%1$s" class="pin-article span4"><article class="article %2$s">',
			'after_widget'  => '</article></div>',
			'before_title'  => '<header class="title"><div class="line"><h3>',
			'after_title'   => '</h3></div></header>'
	
		));
	
	}

	add_action( 'widgets_init', 'alhenalite_loadwidgets' );

}

?>