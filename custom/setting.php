<?php

	$template_directory = get_template_directory();

	//require_once( $template_directory . '/custom/setup.php');
	get_template_part('/custom/setup');
	get_template_part('/custom/inc');		
	get_template_part('/custom/akaka-config');
	
	if ( !class_exists( 'Kirki' ) ) {	
		get_template_part('/inc/tgm-plugin');
	}