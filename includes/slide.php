	<marquee><div id="movingpost">
<?php 
/*
*Show latest post with thumbnail it can be customize from style css
*since @ 1.0 
*/
							$the_query = new WP_Query('showposts=15&orderby=post_date&order=desc');
							while ($the_query->have_posts()) : $the_query->the_post(); ?>
								 <span class="movtit" > <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></span>
															
							<?php endwhile; ?>
									</div>		</marquee>				
					
		
		
	<div style="clear:both;"></div>