<?php
add_action('admin_menu', 'elegance_admin_menu_pannel');  
function elegance_admin_menu_pannel()
 {	add_theme_page( __('theme','elegance'), __('Option Panel','elegance'), 'edit_theme_options', 'webriti', 'elegance_option_panal_function' );
 	add_action('admin_enqueue_scripts', 'elegance_admin_enqueue_script');
	
	add_theme_page( __('webriti_themes','elegance'), __('Webriti Themes','elegance'), 'edit_theme_options', 'webriti_themes', 'elegance_themes_function' );
}
 
 function elegance_admin_enqueue_script($hook)
{
	if('appearance_page_webriti' == $hook){		
	wp_enqueue_script('tab',get_template_directory_uri().'/functions/theme_options/js/option-panel-js.js',array('media-upload','jquery-ui-sortable'));	
	wp_enqueue_style('thickbox');	
	wp_enqueue_style('elegance-comp-chart',get_template_directory_uri().'/functions/theme_options/css/comp-chart.css');
	wp_enqueue_style('elegance-option',get_template_directory_uri().'/functions/theme_options/css/style-option.css');
	wp_enqueue_style('elegance-optionpanal-dragdrop',get_template_directory_uri().'/functions/theme_options/css/optionpanal-dragdrop.css');
	wp_enqueue_style('elegance-upgrade', get_template_directory_uri(). '/functions/theme_options/css/upgrade-pro.css');
	}	
}
function elegance_option_panal_function()
{	require_once('elegance_option_pannel.php'); }

function elegance_themes_function ()
{	
	require_once('webriti_theme.php');
}
?>