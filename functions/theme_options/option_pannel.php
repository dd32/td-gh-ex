<?php
add_action('admin_menu', 'rambo_admin_menu_pannel');  
function rambo_admin_menu_pannel()
 {	add_theme_page( __('theme','rambo'), __('Option Panel','rambo'), 'edit_theme_options', 'rambo', 'rambo_option_panal_function' ); 
	add_action('admin_enqueue_scripts', 'webriti_admin_enqueue_script');
 	add_theme_page( __('Webriti Themes','rambo'), __('Webriti Themes','rambo'), 'edit_theme_options', 'webriti_themes', 'webriti_themes_function' );
	}
function webriti_admin_enqueue_script($hook)
{    
if ('appearance_page_rambo' == $hook)
    {
	wp_enqueue_script('tab',get_template_directory_uri().'/functions/theme_options/js/option-panel-js.js',array('media-upload','jquery-ui-sortable'));
	wp_enqueue_style('thickbox');
	wp_enqueue_style('option',get_template_directory_uri().'/functions/theme_options/css/style-option.css');
	wp_enqueue_style('comp-chart',get_template_directory_uri().'/functions/theme_options/css/comp-chart.css');
	wp_enqueue_style('upgrade', get_template_directory_uri(). '/functions/theme_options/css/upgrade-pro.css');	
	wp_enqueue_style('optionpanal-dragdrop',get_template_directory_uri().'/functions/theme_options/css/optionpanal-dragdrop.css');
    }	
}
function rambo_option_panal_function()
{	
	// option panel
	require_once('webriti_option_pannel.php');
}

function webriti_themes_function ()
	{	
		require_once('webriti_theme.php');
	}
//Theme pages css and js

?>