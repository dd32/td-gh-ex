<?php
add_action('admin_menu', 'webriti_admin_menu_pannel');  
function webriti_admin_menu_pannel()
 {	add_theme_page( __('theme','corpbiz'), __('Option Panel','corpbiz'), 'edit_theme_options', 'webriti', 'webriti_option_panal_function' ); 
 	add_action('admin_enqueue_scripts', 'webriti_admin_enqueue_script');
 }
function webriti_admin_enqueue_script($hook)
{	
	if('appearance_page_webriti' == $hook){
	wp_enqueue_script('corpbiz-tab',get_template_directory_uri().'/functions/theme_options/js/option-panel-js.js',array('media-upload','jquery-ui-sortable'));	
	wp_enqueue_script('corpbiz-upgrade-to-pro',get_template_directory_uri().'/functions/theme_options/js/bootstrap-modal.js');
	wp_enqueue_style('thickbox');	
	wp_enqueue_style('corpbiz-option',get_template_directory_uri().'/functions/theme_options/css/style-option.css');
	wp_enqueue_style('corpbiz-option-panel',get_template_directory_uri().'/functions/theme_options/css/corpbizoption_pannel.css');
	wp_enqueue_style('corpbiz-optionpanal-dragdrop',get_template_directory_uri().'/functions/theme_options/css/optionpanal-dragdrop.css');
	wp_enqueue_style('corpbiz-option-panel3',get_template_directory_uri().'/functions/theme_options/css/corpbiz-bootstrap.css');
}
}
function webriti_option_panal_function()
{	require_once('webriti_option_pannel.php'); }
?>