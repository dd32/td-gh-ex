<?php 
		/**
		Template Name: Home Page
		*/
		get_header();
		//***** get Slider *****
		get_template_part('index', 'slider');
		
		//****** get index service  ********
		get_template_part('index', 'site-info');
		
		//****** get index service  ********
		get_template_part('index', 'service');
		
		//****** get index project  ********
		get_template_part('index', 'portfolio');
		
		//****** get index project  ********
		get_template_part('index', 'blog');
		
		get_footer();
?>