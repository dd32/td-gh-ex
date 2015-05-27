<?php
add_action('admin_menu', 'webriti_admin_menu_pannel');  
function webriti_admin_menu_pannel()
 {	add_theme_page( __('Wallstreet Option Panel','wallstreet'), __('Option Panel','wallstreet'), 'edit_theme_options', 'webriti', 'webriti_option_panal_function' ); 
 	add_action('admin_enqueue_scripts', 'webriti_admin_enqueue_script');
 }
function webriti_admin_enqueue_script($hook)
{
	if('appearance_page_webriti' == $hook){
	wp_enqueue_script('wallstreet-tab',get_template_directory_uri().'/functions/theme_options/js/option-panel-js.js',array('media-upload','jquery-ui-sortable'));
	wp_enqueue_style('thickbox');
	wp_enqueue_style('wallstreet-option',get_template_directory_uri().'/functions/theme_options/css/style-option.css');
	wp_enqueue_style('wallstreet-comp-chart',get_template_directory_uri().'/functions/theme_options/css/comp-chart.css');
	wp_enqueue_style('wallstreet-upgrade', get_template_directory_uri(). '/functions/theme_options/css/upgrade-pro.css');	
	wp_enqueue_style('wallstreet-optionpanal-dragdrop',get_template_directory_uri().'/functions/theme_options/css/optionpanal-dragdrop.css');
	}
}
function webriti_option_panal_function()
{	require_once('webriti_option_pannel.php'); }
?>