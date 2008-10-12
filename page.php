<?php get_header(); ?>



<div id="content">
	
			<div class="entry" id="post-<?php the_ID(); ?>">
			
				<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

				<div class="title"><h2><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title(); ?></a></h2></div>
		
					<?php the_content(); ?>
					
					<?php link_pages('<p><strong>Pages:</strong>','</p>','number'); ?>
					<?php edit_post_link('Edit','<p>','</p>'); ?>
					
					
					
			
	
				<?php endwhile; ?>
				
			
				
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