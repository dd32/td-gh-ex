<?php get_header(); ?>

<!-- start content -->

<div class="container">

    <div class="row" >

        <div <?php post_class(); ?> >
            
            <?php 
			
				while ( have_posts() ) : the_post();
				
					do_action('suevafree_postformat');
				
				endwhile;
                        
			?>
    
            <div style="clear:both"></div>
                
        </div>
        
    </div>
    
</div>

<?php get_footer(); ?>