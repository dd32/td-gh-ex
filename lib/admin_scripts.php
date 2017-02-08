<?php

/**
 * Enqueue CSS & JS
 */
function ascend_admin_scripts($hook) {
	if( $hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php' && $hook != 'widgets.php' && $hook != 'appearance_page_kad_options' ) {
		return;
	}
	wp_register_style('ascend_admin_styles', get_template_directory_uri() . '/assets/css/ascend_admin.css', false, ASCEND_VERSION);
	wp_enqueue_style('ascend_admin_styles');

	wp_register_script('select2', get_template_directory_uri() . '/assets/js/min/select2-min.js', false, ASCEND_VERSION, false);
    wp_enqueue_script('select2');


	if( $hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php' && $hook != 'widgets.php' ) {
		return;
	}
	wp_enqueue_media();
	wp_register_script('ascend_admin_scripts', get_template_directory_uri() . '/assets/js/min/kad_adminscripts-min.js', array( 'wp-color-picker', 'jquery' ), ASCEND_VERSION, false);
	wp_enqueue_script('ascend_admin_scripts');

}

add_action('admin_enqueue_scripts', 'ascend_admin_scripts');
