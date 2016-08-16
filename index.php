<?php 
//post page

get_header(); ?>  

	<div class="blog-content">
        <div class="wrap">
            <div class="main">
                <!--article-->
                <ul class="blog-article-list">
                	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                
                    <li id="post-1176">
                        <a href="<?php the_permalink(); ?>"  class="images newsflash">
						<?php 
							if(has_post_thumbnail())
							{
								the_post_thumbnail( array(185, 135) );
                             }
						?>
                        </a>
                        
                		<div class="info">
                    		<h3><a href="<?php the_permalink(); ?>"><?php esc_html(the_title()); ?></a></h3>
                            
							<?php ascreen_get_author_info();?>

                    		<div class="quote">
                            	<p><?php the_content(); ?></p>
							</div>
                		</div>
            		</li>
                    
                    <?php endwhile;endif; ?>                
                    
            	</ul><!--ul class="blog-article-list"-->
 
 
 				<?php ascreen_paging_nav(); ?>
 
            </div><!--div class="main"-->

            <!--siedbar-->
            <?php get_sidebar(); ?>
            
            
    	</div><!--div class="wrap"-->
	</div><!--div class="blog-content"-->



<?php get_footer(); ?>