<?php
/**
 * Set the settings for options presets
*/

/* Check authorisation */
$authorised = true;

if (isset($_POST['graphene-preset'])){ 
	if (!wp_verify_nonce($_POST['graphene-preset'], 'graphene-preset')) {$authorised = false;} // Check nonce
	if (!current_user_can('edit_theme_options')){$authorised = false;} // Check permissions

} else {$authorised = false;}

if ($authorised) {
	global $graphene_settings, $graphene_defaults;
	
	/* Website preset (non-blog type) */
	$graphene_preset_website = array(
		'slider_display_style' => 'bgimage-excerpt',
		'show_post_type' => 'latest-posts',
		'homepage_panes_count' => 4,
		'comments_setting' => 'disabled_pages',
		'hide_feed_icon' => true,
		'hide_post_author' => true,
		'post_date_display' => 'icon_no_year',
		'print_css' => true,
	    'print_button' => true,
	);
	
		
	/* Apply the website preset */
	if ($_POST['graphene_options_preset'] == 'website') {
		$graphene_preset_website = array_merge($graphene_defaults, $graphene_preset_website);
		update_option('graphene_settings', $graphene_preset_website);
	
	/* Reset the options */	
	} elseif ($_POST['graphene_options_preset'] == 'reset') {
		update_option('graphene_settings', $graphene_defaults);
		
	}
	
	// Update the global settings variable
	$graphene_settings = get_option('graphene_settings');
	
	$_REQUEST['settings-updated'] = true;
} else {
	wp_die(__('ERROR: You are not authorised to perform that operation', 'graphene'));
}
?>