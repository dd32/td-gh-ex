<?php get_header(); ?>



<div id="content">
	
		<div id="entry">	<div id="post-<?php the_ID(); ?>">
			
				<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

					<div class="title"><h2><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title(); ?></a></h2></div>
				
					<?php the_content(); ?>
					
						<p class="postmetadata">
						 Filed in <?php the_category(', ') ?> on <?php the_date('l, F j, Y', '', ''); ?> <?php the_tags('&#183; '); ?> &#183; <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?>
				</p>
			
	
				<?php endwhile; ?>
				
			<div style="text-align:left;">
<?php posts_nav_link(' &#183; ', '&#139; previous', 'next &#155;'); ?>
</div>
				
				
				<?php else: ?>
				
				
				
							<div class="entry">
							<h2><?php _e('Not Found'); ?></h2>
							</div>

				
							<?php endif; ?>
	
							</div>
			
		</div></div>
	
	
	
	
<?php get_sidebar(); ?>



<?php get_footer(); ?>


</div>

</div>
</body>










</html>