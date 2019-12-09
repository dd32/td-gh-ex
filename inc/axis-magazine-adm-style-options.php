<?php

//admin style

if (!function_exists('axis_magazine_admin_style')) {
	function axis_magazine_admin_style($hook) {
		
		if ('appearance_page_axis_magazine_theme_info_options' === $hook) {
			wp_enqueue_style('axis-magazine-admin-script-style', get_template_directory_uri() . '/css/axis-magazine-admin.css');
		}
	}
}
add_action('admin_enqueue_scripts', 'axis_magazine_admin_style');
