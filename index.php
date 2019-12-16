<?php 

	get_header();

	do_action( 'alhena_lite_header_content' );

	if ( ( !alhena_lite_setting('wip_home')) || ( alhena_lite_setting('wip_home') == "masonry" ) ) {
				
		get_template_part('layouts/home-masonry'); 
		
	} else { 
		
		get_template_part('layouts/home-default'); 
			
	}

	get_template_part('pagination');
	
	do_action( 'alhena_lite_footer_content' ); 
	
	get_footer(); 

?>