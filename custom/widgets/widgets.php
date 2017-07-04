<?php

if ( function_exists('ascreen_themes_pro') ){
	get_template_part('/custom/widgets/custom-widgets');	

	function ascreen_widgets_scripts()
	{
		$theme_info = wp_get_theme();
		wp_enqueue_style('ascreen-widgets',  get_template_directory_uri() .'/custom/widgets/widgets.css', false,"3.3.7", false);			
		
	}
	
	add_action( 'wp_enqueue_scripts', 'ascreen_widgets_scripts' );
	
}

/*
add widgets to wp-admin
*/
function ascreen_widgets_init() {
	register_sidebar( array(
		'name' => __('Sidebar','ascreen'),
		'id' => 'sidebar',
		'before_widget' => '<div class="sidebar-section"><ul class="blog-category">
',
		'after_widget' => '</ul></div> <!-- end .sidebar-section -->',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );

	
	register_sidebar( array(
		'name' => __('Footer Area #1','ascreen'),		
		'id' => 'sidebar-1',
		'before_widget' => '<dl id="%1$s" class="%2$s col-md-4">',
		'after_widget' => '</dl>',
		'before_title' => '<dt class="title">',
		'after_title' => '</dt>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area #2','ascreen'),			
		'id' => 'sidebar-2',
		'before_widget' => '<dl id="%1$s" class="%2$s col-md-4">',
		'after_widget' => '</dl>',
		'before_title' => '<dt class="title">',
		'after_title' => '</dt>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area #3','ascreen'),	
		'id' => 'sidebar-3',
		'before_widget' => '<dl id="%1$s" class=" %2$s col-md-4">',
		'after_widget' => '</dl>',
		'before_title' => '<dt class="title">',
		'after_title' => '</dt>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area #4','ascreen'),	
		'id' => 'sidebar-4',
		'before_widget' => '<dl id="%1$s" class=" %2$s col-md-4">',
		'after_widget' => '</dl>',
		'before_title' => '<dt class="title">',
		'after_title' => '</dt>',
	) );

	if( function_exists('ascreen_themes_pro') ){ 
		register_sidebar( array(
			'name' => 'Content Header',
			'id' => 'sidebar-6',//content-header
			'before_widget' => '<div id="content-header" class="content-header-ad"><div id="%1$s" class="%2$s">',
			'after_widget' => '</div></div> <!-- end .content-header -->',
			'before_title' => '<span class="title">',
			'after_title' => '</span>',
		) );
		
		register_sidebar( array(
			'name' => 'After Content',
			'id' => 'sidebar-7',//after-content
			'before_widget' => '<div id="after-content" class="after-content-au"><div id="%1$s" class="%2$s">',
			'after_widget' => '</div></div> <!-- end .after Content -->',
			'before_title' => '<span class="title">',
			'after_title' => '</span>',
		) );
		
		register_sidebar( array(
			'name' => 'Visit statistics Code',
			'id' => 'sidebar-8',//google  statistics Code
		) );			
		
	}
}
add_action( 'widgets_init', 'ascreen_widgets_init' );


