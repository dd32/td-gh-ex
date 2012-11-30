<?php get_header(); ?>
			
			<div id="content">
		
				<div id="left-col">
        
<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
          
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <p><?php _e('&#8249; Return to', 'application'); ?> <a href="<?php echo get_permalink($post->post_parent); ?>" rel="gallery"><?php echo get_the_title($post->post_parent); ?></a></p>

			<div class="meta-data">
			
			<?php application_posted_on(); ?> in <?php the_category(', '); ?> | <?php comments_popup_link( __( 'Leave a comment', 'application' ), __( '1 Comment', 'application' ), __( '% Comments', 'application' ) ); ?>
			
			</div><!--meta data end-->
			<div class="clear"></div>
                                
                <div class="attachment-entry">
                    <a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'large' ); ?></a>
					<?php if ( !empty($post->post_excerpt) ) the_excerpt(); ?>
                    <?php the_content(__('Read more &#8250;;', 'application')); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'application'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->

          <nav id="nav-single">
				<span class="nav-previous"><?php previous_image_link( false, __('&larr; Previous Image', 'application' )); ?></span>
				<span class="nav-next"><?php next_image_link( false, __('Next Image &rarr;', 'application' )); ?></span>
            </span> </nav>
                        
                <?php if ( comments_open() ) : ?>
                <div class="post-data">
				    <?php the_tags(__('Tagged with:', 'application') . ' ', ', ', '<br />'); ?> 
                    <?php the_category(__('Posted in %s', 'application') . ', '); ?> 
                </div><!-- end of .post-data -->
                <?php endif; ?>             

            <div class="post-edit"><?php edit_post_link(__('Edit', 'application')); ?></div>             
            </div><!-- end of #post-<?php the_ID(); ?> -->
            
			<?php comments_template( '', true ); ?>
            
        <?php endwhile; ?>  

<?php endif; ?>  
      
  </div> <!--left-col end-->

<?php get_sidebar(); ?>


</div>
<!--content end-->
	
</div>
<!--wrapper end-->

<?php get_footer(); ?>