<?php
add_action('admin_menu', 'appointment_admin_menu_pannel');  
function appointment_admin_menu_pannel()
 {	add_theme_page( __('theme','appointment'), __('Option Panel','appointment'), 'edit_theme_options', 'webriti', 'appointment_option_panal_function' );
 	add_action('admin_enqueue_scripts', 'appointment_admin_enqueue_script');
	
	add_theme_page( __('webriti_themes','appointment'), __('Webriti Themes','appointment'), 'edit_theme_options', 'webriti_themes', 'appointment_themes_function' );
}
 
 function appointment_admin_enqueue_script($hook)
{
	if('appearance_page_webriti' == $hook){		
	wp_enqueue_script('tab',get_template_directory_uri().'/functions/theme_options/js/option-panel-js.js',array('media-upload','jquery-ui-sortable'));	
	wp_enqueue_style('thickbox');	
	wp_enqueue_style('appointment-comp-chart',get_template_directory_uri().'/functions/theme_options/css/comp-chart.css');
	wp_enqueue_style('appointment-optionpanal-dragdrop',get_template_directory_uri().'/functions/theme_options/css/optionpanal-dragdrop.css');
	wp_enqueue_style('appointment-upgrade', get_template_directory_uri(). '/functions/theme_options/css/upgrade-pro.css');
	
	//Custom plugin
	wp_enqueue_script('appointment_admin_js',get_template_directory_uri().'/functions/theme_options/js/my-custom.js');
	wp_enqueue_script ('wff_custom_wp_admin_js');
	wp_enqueue_script('eif_custom_wp_admin_js',get_template_directory_uri().'/functions/theme_options/js/my-custom.js',array('jquery','jquery-ui-tabs'));
	//css
	wp_register_style ('wff_custom_wp_admin_css',get_template_directory_uri(). '/functions/theme_options/css/wff-admin.css');
        wp_enqueue_style( 'wff_custom_wp_admin_css' );	
		
	
	}	
}
function appointment_option_panal_function()
{	load_template( dirname( __FILE__ ) . '/appointment_option_pannel.php' ); }

function appointment_themes_function()
{	load_template( dirname( __FILE__ ) . '/webriti_theme.php' ); }
?>