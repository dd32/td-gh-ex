<div class="container main-content">

	<div class="row">
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div <?php post_class(array('pin-article','span12')); ?>>
    
				<?php do_action('wip_postformat'); ?>
        
                <div style="clear:both"></div>
            
            </div>
		
		<?php endwhile; else: endif; ?>
           
    </div>

</div>