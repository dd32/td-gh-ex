<?php get_header(); ?>

<div class="container content">
	
    <div class="row">
       
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
            
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            
                do_action('lookilite_postformat');
    
            ?>
                
            <div style="clear:both"></div>
            
        </article>
    
		<?php if (lookilite_setting('lookilite_view_comments') == "on" ) : comments_template(); endif; ?>
        
        <?php endwhile; get_template_part('pagination'); endif;?>
           
    </div>
    
</div>

<?php get_footer(); ?>