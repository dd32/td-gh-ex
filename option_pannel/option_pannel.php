<?php
add_action('admin_menu', 'spa_admin_menu_pannel');  

function spa_admin_menu_pannel() {

	
	wp_enqueue_script( 'dashboard');	
	wp_enqueue_script( 'wpb_option_pannel', get_template_directory_uri() . '/option_pannel/js/spa_option_pannel.js');
	
	wp_enqueue_style( 'wpb_option_pannel', get_template_directory_uri() . '/option_pannel/css/spa_option_pannel.css' );
	
	// color 
	wp_enqueue_script('my-upload',get_bloginfo('template_directory').'/option_pannel/js/media-upload-script.js',array('media-upload','thickbox','jquery'));
	wp_enqueue_style('thickbox');
	wp_enqueue_style('farbtasticss',get_bloginfo('template_directory').'/option_pannel/css/farbtasticss.css');
	$page=add_theme_page( 'spa', 'Option Panel', 'edit_theme_options', 'spa', 'spasalon_spa_option_panal_function' ); 
	wp_enqueue_style('spa-bootstrap',get_bloginfo('template_directory').'/option_pannel/css/assets/css/spa-bootstrap.css');
	//add_action('admin_print_styles-'.$page, 'spa_admin_enqueue_script');	
	
			    
}

 function spasalon_spa_option_panal_function()
 {
	require_once ( get_template_directory() . '/option_pannel/css/tooltip_css.php' );
	
	//require_once('spa_option.php');
	wp_enqueue_script('spa-optionpanal-jquery',get_template_directory_uri('template_directory').'/option_pannel/js/spa-optionpanal-jquery.js',array('farbtastic'));
	require_once('spa_options_pannel.php');
 }
?>