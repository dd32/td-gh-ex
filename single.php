<?php get_header(); ?>

<!-- start content -->

<div class="container">
	
    <div class="row">

        <div class="<?php echo suevafree_template('span') . " " . suevafree_template('sidebar'); ?>">

            <div class="row">

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

		<?php get_sidebar(); ?>
        	   
    </div>

</div>

<?php get_footer(); ?>