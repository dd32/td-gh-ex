<?php 

	get_header();

?>

    <section id="slogan">
    
        <div class="container">
        
            <div class="row">
            
                <div class="col-md-12">
    
                    <p><?php echo alhena_lite_get_archive_title(); ?> </p>
                    
                </div>
                
            </div>
            
        </div>
        
    </section>
        
<?php

	do_action( 'alhena_lite_header_content' );

	if ( ( !alhena_lite_setting('wip_category_layout')) || ( alhena_lite_setting('wip_category_layout') == "masonry" ) ) {
				
		get_template_part('layouts/category-masonry'); 
		
	} else { 
		
		get_template_part('layouts/category-default'); 
			
	}

	get_template_part('pagination');
	
	do_action( 'alhena_lite_footer_content' ); 
	
	get_footer(); 

?>