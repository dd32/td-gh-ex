<?php

if (!function_exists('novalite_admin_init')) {

	function novalite_admin_init() {
		
		$file_dir = get_template_directory_uri()."/core/admin/assets/";
		
		wp_enqueue_style ( 'novalite_style', $file_dir.'css/theme.css' ); 
		wp_enqueue_script( 'novalite_script', $file_dir.'js/theme.js',array('jquery'),'',TRUE ); 
	
		wp_enqueue_script( "jquery-ui-core", array('jquery'));
		wp_enqueue_script( "jquery-ui-tabs", array('jquery'));
		
	}
	
	add_action('admin_init', 'novalite_admin_init');

}

?>