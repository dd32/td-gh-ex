<?php 

	get_header();
	
	do_action('bazaarlite_header_sidebar', 'header_sidebar_area');

	if ( strstr ( bazaarlite_setting('wip_category_layout'), 'col-md' ) ) {
				
		get_template_part('layouts/archive-masonry'); 
		
	} else { 
		
		get_template_part('layouts/archive-blog'); 
			
	}

	do_action('bazaarlite_bottom_sidebar', 'bottom_sidebar_area' );
	
	get_footer(); 


?>