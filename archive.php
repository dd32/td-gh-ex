<?php 

	get_header();
	
	if ( !suevafree_setting('suevafree_category_layout') || suevafree_setting('suevafree_category_layout') == "masonry" ) {
				
		get_template_part('layouts/category-masonry'); 
		
	} else { 
		
		get_template_part('layouts/category-default'); 
			
	}

	get_template_part('pagination');
	get_footer(); 

?>