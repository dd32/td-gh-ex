<?php

/*
	Functions
	
	Establishes the core iFeature functions.
	
	Copyright (C) 2011 CyberChimps
*/

add_theme_support('automatic-feed-links');
	if ( ! isset( $content_width ) )
	$content_width = 600;
	
add_theme_support( 'post-thumbnails' ); 
set_post_thumbnail_size( 100, 100, true );


// This theme allows users to set a custom background
	add_custom_background();
	
// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	
// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}

	// Coin Slider 

function cs_head(){
	 
	$path =  get_template_directory_uri() ."/library/cs/";

	$script = "
		
		<script type=\"text/javascript\" src=\"".$path."scripts/coin-slider.min.js\"></script>
		";
	
	echo $script;
}

add_action('wp_head', 'cs_head');


	// Register superfish scripts
	
function ifeature_add_scripts() {
 
    if (!is_admin()) { // Add the scripts, but not to the wp-admin section.
    // Adjust the below path to where scripts dir is, if you must.
    $scriptdir = get_template_directory_uri() ."/library/sf/";
 
    // Register the Superfish javascript file
    wp_register_script( 'superfish', $scriptdir.'sf.js', false, '1.4.8');
    // Now the superfish CSS
   
    //load the scripts and style.
	wp_enqueue_style('superfish-css');
    wp_enqueue_script('superfish');
    } // end the !is_admin function
} //end add_our_scripts function
 
//Add our function to the wp_head. You can also use wp_print_scripts.
add_action( 'wp_head', 'ifeature_add_scripts',0);
	
	// Register menu names
	
	function register_ifeature_menus() {
	register_nav_menus(
	array( 'header-menu' => __( 'Header Menu' ), 'extra-menu' => __( 'Extra Menu' ))
  );
}
	add_action( 'init', 'register_ifeature_menus' );
	
	// Menu fallback
	
	function menu_fallback() {
	global $post; ?>
	
	<ul id="menu-nav" class="sf-menu">
		<?php wp_list_pages( 'title_li=&sort_column=menu_order&depth=3'); ?>
	</ul><?php
}

	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="sidebar-widget-style">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2 class="sidebar-widget-title">',
    		'after_title'   => '</h2>'
    	));
	if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'Footer',
	'before_widget' => '<div class="footer-widgets">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="footer-widget-title">',
	'after_title' => '</h3>',
	));
    }

	//iFeature theme options file
	
require_once ( get_template_directory() . '/library/options/options.php' );
?>