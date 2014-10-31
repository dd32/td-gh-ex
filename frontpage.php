<?php
/**
Template Name: Custom Front Page
*/
		get_header();
		//****** Get Feature Image ********//
		get_template_part('index', 'static-banner');

		//****** get index service  ********
		get_template_part('index', 'service');
		
		//****** get index portfolio  ********
		get_template_part('index', 'portfolio');

	get_footer(); 

?>