<?php 

	get_header();

	do_action( 'alhenalite_header_content' );

	if ( ( !alhenalite_setting('wip_home')) || ( alhenalite_setting('wip_home') == "masonry" ) ) {
				
		get_template_part('layouts/home-masonry'); 
		
	} else { 
		
		get_template_part('layouts/home-default'); 
			
	}

	get_template_part('pagination');
	
	do_action( 'alhenalite_footer_content' ); 
	
	get_footer(); 

?>