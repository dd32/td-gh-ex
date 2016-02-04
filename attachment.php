<?php get_header(); ?>

<!-- start content -->

<div class="container">
	
    <div class="row" >
    
        <div class="post-container col-md-12">
            
            <div class="post-article attachment">
            
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <h1 class="title"><a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></h1>
                    
                    <div class="line"> 
                
                        <div class="entry-info">
                       
                            <span class="entry-date"><?php echo get_the_date(); ?></span>
                
                        </div>
                    
                    </div>

                    <p> 
                    
                    <?php if (wp_attachment_is_image($post->id)) {
                   
				    	$att_image = wp_get_attachment_image_src( $post->id, "blog");
                    
					?>
                        <a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>">
                      
                        	<img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  class="attachment-medium" alt="<?php $post->post_excerpt; ?>" />
                      
                        </a>
                    
					<?php } else { ?>
                    
                        <a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>">
                        
							<?php the_title(); ?>
                       
                        </a>
    
                    <?php } ?>
                    
                    </p>
                    
				</div>
				
                <div style="clear:both"></div>
			
            </div>
		
		<?php endwhile; endif;?>

    </div>
    
</div>

<?php get_footer(); ?>