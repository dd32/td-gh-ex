<?php
		get_header();
		
		//****** get index static banner  ********
		get_template_part('index', 'slider');
		
		//****** get index contact call out section  ********
		get_template_part('index', 'contact-callout');
				
		//****** get index service  ********				
		get_template_part('index', 'service');
		
		//****** get Home call out
		get_template_part('index','home-callout'); 	

		//****** get index News  ********
		get_template_part('index', 'news');
				
		get_footer(); 
?>






