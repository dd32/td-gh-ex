<?php 

	get_header();

	if ( !suevafree_setting('suevafree_search_layout') || suevafree_setting('suevafree_search_layout') == "masonry" ) {
				
		get_template_part('layouts/search-masonry'); 
		
	} else { 
		
		get_template_part('layouts/search-default'); 
			
	}

	get_template_part('pagination');
	get_footer(); 

?>