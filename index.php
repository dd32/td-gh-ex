<?php

	   $current_options = get_option('corpbiz_options',theme_data_setup());
	
		get_header();
		get_template_part('index', 'slider');
		
		//****** get index service  ********
		get_template_part('index', 'site-info');
		
		//****** get index service  ********
		get_template_part('index', 'service');
		
		//****** get index project  ********
		get_template_part('index', 'portfolio');
		
		get_footer(); 
	
?>