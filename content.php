 <?php while ( have_posts() ) : the_post(); ?>
                            <div class="blog-box">
                             
                                  <?php if ( has_post_thumbnail() ) : ?>
						 <div class="blog-box-img">
						 <?php the_post_thumbnail( 'avocation-latest-post', array( 'alt' => get_the_title(), 'class' => 'img-responsive') ); ?>
					</div>
				<?php endif; ?>
                                
                              <a href="<?php echo get_permalink(); ?>" class="blog-title"><?php echo esc_attr(the_title()); ?></a>  
                                <?php avocation_entry_meta(); ?> 
                                <div class="our-blog-details">
                                    <?php the_excerpt(); ?>
                                    
                                </div>
                            </div> 
                              <?php endwhile;  ?>   
