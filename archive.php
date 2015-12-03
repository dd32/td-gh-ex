<?php 

	get_header();

?>

    <section id="slogan">
    
        <div class="container">
        
            <div class="row">
            
                <div class="col-md-12">
    
                    <p><?php echo alhenalite_get_archive_title(); ?> </p>
                    
                </div>
                
            </div>
            
        </div>
        
    </section>
        
<?php

	do_action( 'alhenalite_header_content' );

	if ( ( !alhenalite_setting('wip_category_layout')) || ( alhenalite_setting('wip_category_layout') == "masonry" ) ) {
				
		get_template_part('layouts/category-masonry'); 
		
	} else { 
		
		get_template_part('layouts/category-default'); 
			
	}

	get_template_part('pagination');
	
	do_action( 'alhenalite_footer_content' ); 
	
	get_footer(); 

?>