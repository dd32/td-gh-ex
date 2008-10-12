<?php get_header(); ?>



<div id="content">
	
			<div class="entry" id="post-<?php the_ID(); ?>">
			
				<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

					<div class="title"><h2><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title(); ?></a></h2></div>
		
					<?php the_excerpt(); ?>
					
					<p class="postmetadata">
						 Filed in <?php the_category(', ') ?> on <?php the_date('l, F j, Y', '', ''); ?> &#183; <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?>
			
	
				<?php endwhile; ?>
				
				<div class="navigation">
				<?php posts_nav_link('','',''); ?>
				</div>
				
				
				<?php else: ?>
				
				
				
							<div class="entry">
							<h2><?php_e('Not Found'); ?></h2>
							</div>

				
							<?php endif; ?>
	
							</div>
			
		</div>
	
	
	
	
<?php get_sidebar(); ?>


<?php get_footer(); ?>




</div>

</body>










</html>