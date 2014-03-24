<?php get_header(); ?>

<div class="container content">
	
    <div class="row">
       
        <article <?php post_class(array('post-container','col-md-12')); ?> >
            
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            
                do_action('lookilite_postformat');
    
            ?>
                
            <div style="clear:both"></div>
            
        </article>
    
		<?php if (lookilite_setting('wip_view_comments') == "on" ) : comments_template(); endif; ?>
        
        <?php endwhile; get_template_part('pagination'); endif;?>
           
    </div>
    
</div>

<?php get_footer(); ?>