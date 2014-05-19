<?php

/* Variables */
$ig_shortcodes_name = "IG Shortcodes";

/* Add shortcodes scripts file */
function ig_shortcodes_add_scripts() {

	if(!is_admin()) {
		
		/* Includes */
		wp_enqueue_style('ig_shortcodes',  get_template_directory_uri().'/extra/ig-shortcodes/includes/shortcodes.css');
		wp_enqueue_script('jquery');
		wp_register_script('ig_shortcodes_js', get_template_directory_uri().'/extra/ig-shortcodes/includes/shortcodes.js');
		wp_enqueue_script('ig_shortcodes_js');
		
	} else {
		
		wp_enqueue_style( 'wp-color-picker' );
	    wp_enqueue_script( 'wp-color-picker' );
	    		
	}
	
/* Font Awesome */
		wp_enqueue_style('ig_shortcodes_fontawesome', get_template_directory_uri().'/extra/ig-shortcodes/fonts/fontawesome/css/font-awesome.min.css');
		wp_enqueue_style('ig_shortcodes_fontello',  get_template_directory_uri().'/extra/ig-shortcodes/fonts/fontello/css/fontello.css');
}
add_filter('init', 'ig_shortcodes_add_scripts');

/* Add button to TinyMCE */
function ig_shortcodes_addbuttons() {
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
     return;
   if ( get_user_option('rich_editing') == 'true') {
     add_filter("mce_external_plugins", "add_ig_shortcodes_tinymce_plugin");
     add_filter('mce_buttons', 'register_ig_shortcodes_button');
   }
}
function register_ig_shortcodes_button($buttons) {
   array_push($buttons, "|", "ig_shortcodes_button");
   return $buttons;
}
 function add_ig_shortcodes_tinymce_plugin($plugin_array) {
	$plugin_array['ig_shortcodes'] = get_template_directory_uri().'/extra/ig-shortcodes/includes/tinymce_button.js';

	return $plugin_array;
}
add_action('init', 'ig_shortcodes_addbuttons');