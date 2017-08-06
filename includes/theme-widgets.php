<?php
// global $wp_registered_sidebars;
#########################################
function avata_widgets_init() {
		register_sidebar(array(
			'name' => __('Default Sidebar', 'avata'),
			'id'   => 'default_sidebar',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h2 class="widget-title">', 
			'after_title' => '</h2>' 
			));
		register_sidebar(array(
			'name' => __('Displayed Everywhere', 'avata'),
			'id'   => 'displayed_everywhere',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h2 class="widget-title">', 
			'after_title' => '</h2>' 
			));
		
		register_sidebar(array(
			'name' => __('Blog Sidebar', 'avata'),
			'id'   => 'blog',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h3 class="widget-title">', 
			'after_title' => '</h3>' 
			));
		register_sidebar(array(
			'name' => __('Page Sidebar', 'avata'),
			'id'   => 'page',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h3 class="widget-title">', 
			'after_title' => '</h3>' 
			));
		
		register_sidebar(array(
			'name' => __('Footer Area One', 'avata'),
			'id'   => 'footer-1',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h3 class="widget-title">', 
			'after_title' => '</h3>' 
			));
		register_sidebar(array(
			'name' => __('Footer Area Two', 'avata'),
			'id'   => 'footer-2',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h3 class="widget-title">', 
			'after_title' => '</h3>' 
			));
		register_sidebar(array(
			'name' => __('Footer Area Three', 'avata'),
			'id'   => 'footer-3',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h3 class="widget-title">', 
			'after_title' => '</h3>' 
			));
		register_sidebar(array(
			'name' => __('Footer Area Four', 'avata'),
			'id'   => 'footer-4',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h3 class="widget-title">', 
			'after_title' => '</h3>' 
			));
			

}
add_action( 'widgets_init', 'avata_widgets_init' );

/**
 * widgets scripts

 */

add_action( 'load-widgets.php', 'singlepag_widgets_load' );

function singlepag_widgets_load() {    
	wp_enqueue_style( 'wp-color-picker' );        
	wp_enqueue_script( 'wp-color-picker' );    
}
