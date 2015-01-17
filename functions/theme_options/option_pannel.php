<?php
add_action('admin_menu', 'elitepress_admin_menu_pannel');  
function elitepress_admin_menu_pannel()
 {	add_theme_page( __('theme','elitepress'), __('Option Panel','elitepress'), 'edit_theme_options', 'webriti', 'elitepress_option_panal_function' );
 	add_action('admin_enqueue_scripts', 'elitepress_admin_enqueue_script');
	
	add_theme_page( __('webriti_themes','elitepress'), __('Webriti Themes','elitepress'), 'edit_theme_options', 'webriti_themes', 'elitepress_themes_function' );
}
 
 function elitepress_admin_enqueue_script($hook)
{
	if('appearance_page_webriti' == $hook){		
	wp_enqueue_script('tab',get_template_directory_uri().'/functions/theme_options/js/option-panel-js.js',array('media-upload','jquery-ui-sortable'));	
	wp_enqueue_style('thickbox');	
	wp_enqueue_style('elitepress-comp-chart',get_template_directory_uri().'/functions/theme_options/css/comp-chart.css');
	wp_enqueue_style('elitepress-option',get_template_directory_uri().'/functions/theme_options/css/style-option.css');
	wp_enqueue_style('elitepress-optionpanal-dragdrop',get_template_directory_uri().'/functions/theme_options/css/optionpanal-dragdrop.css');
	wp_enqueue_style('elitepress-upgrade', get_template_directory_uri(). '/functions/theme_options/css/upgrade-pro.css');
	}	
}
function elitepress_option_panal_function()
{	require_once('elitepress_option_pannel.php'); }

function elitepress_themes_function ()
{	
	require_once('webriti_theme.php');
}
?>