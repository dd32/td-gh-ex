<?php 

	get_header();

	if ( !suevafree_setting('suevafree_home') || suevafree_setting('suevafree_home') == "masonry" ) {
				
		get_template_part('layouts/home-masonry'); 
		
	} else { 
		
		get_template_part('layouts/home-default'); 
			
	}

	get_template_part('pagination');
	get_footer(); 

?>