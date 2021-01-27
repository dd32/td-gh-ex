<?php
/*
	Template Name: Front Page
	Design Theme's Front Page to Display the Home Page if Selected
	
*/
get_header(); ?>


<section class="bannerArea">
			<h1><?php 
					if ( get_theme_mod( 'header_text_main_heading' ) <> '' ) {
						echo '' . esc_html( get_theme_mod( 'header_text_main_heading' ) ) . '';
					} else
					{
						echo __('LOREMPM IPSUMKL', 'aribiz');
					}?>
					</h1>
					<?php 
					if ( get_theme_mod( 'header_text_sub_heading' ) <> '' ) {
						echo '' . esc_html( get_theme_mod( 'header_text_sub_heading' ) ) . '';
					} else
					{
						echo __('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.', 'aribiz');
					}?>
			
		</section>

 

    <!-- Page Content -->
        <div class="section   services">
        <div class="container">
                        <div class="row">
						
						<?php
				aribiz_social_links();
				?>
						
						
						
						
                         
                              
                              
                      
                             
                        </div>
                        <!-- /.row -->
                    </div></div>
        
     
        
    
        
        
                
        
        
        
        

 
 
<?php get_footer(); ?>
