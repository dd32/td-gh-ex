<?php

if (!function_exists('bazaarlite_admin_init')) {

	function bazaarlite_admin_init() {
		
		global $wp_version;

		$file_dir = get_template_directory_uri()."/core/admin/assets/";
	
		wp_enqueue_style ( 'bazaarlite_style', $file_dir.'css/theme.css' ); 
		wp_enqueue_script( 'bazaarlite_script', $file_dir.'js/theme.js',array('jquery'),'',TRUE ); 
		
		wp_enqueue_script( "jquery-ui-core");
		wp_enqueue_script( "jquery-ui-tabs");
	
	
	}
	
	add_action('admin_enqueue_scripts', 'bazaarlite_admin_init');

}

?>