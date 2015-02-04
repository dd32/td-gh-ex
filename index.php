<?php 
/*
 * Main Template File.
 */
get_header(); ?>

<section>
 
    <div class="deserve-container">       
        <div class="col-md-9 col-sm-8  dblog">        
            
                  <?php while ( have_posts() ) : the_post(); ?>
            
            
            <div class="blog-box">
            	
            	<?php $deserve_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()),'large'); ?>

            	 <?php if($deserve_image[0] != "") { ?>

					<a href="<?php echo get_permalink(); ?>">
					
					<img src="<?php echo esc_url($deserve_image[0]); ?>" width="<?php echo $deserve_image[1]; ?>" height="<?php echo $deserve_image[2]; ?>"  alt="<?php the_title(); ?>" class="img-responsive" />
		
					</a>
                <?php } else { the_post_thumbnail(); } ?>
                
                
                
                <div class="post-data">
					
					<a href="<?php echo get_permalink(); ?>" class="blog-title"><?php the_title(); ?></a>   
					
					 <div class="post-meta">
						<ul>
							<?php deserve_entry_meta(); ?>
												
						</ul>
                    
                    </div>
                                          
                   
                     <?php the_excerpt(); ?>
                   
                </div>             
            </div>
       
         <?php endwhile;  ?>     
   
           
           
            
            <div class="gallery-pagination blog-pagination">
                <ul>
						
						<?php if (function_exists('the_posts_pagination')) 
						{ ?>
								

						<li class="link_pagination" >
								<?php deserve_pagination(); ?>
						</li>
					
					<?php } else { ?>
							<li class="link_pagination"><?php previous_posts_link( '<<' ); ?> </li>

							<li class="link_pagination"><?php next_posts_link( '>>' ); ?> </li>		
					 
					
					<?php } ?>
					 
				
                </ul>
            </div>
         
        </div>
       
    <?php get_sidebar(); ?> 
    
    
    </div>

</section>


<?php get_footer(); ?>
