		<?php get_header(); ?>

		<div id="posts">

			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

				<div class="post" id="post-<?php the_ID(); ?>">
					
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					
					<div class="date">
						
						<?php the_time('F j, Y'); ?>
						<?php edit_post_link('Edit', ' &#124; ', ''); ?>
					
					</div>
					
					<div class="tags">
						<?php the_tags('Tags: ', ', ', ''); ?>
					</div>

					<div class="entry">

						<?php the_excerpt(); ?>

						<div class="commentbubble">
							<?php comments_popup_link('0','1','%') ?>
						</div>
						
						<div class="postmetadata">
						<?php _e('Filed under&#58;'); ?><br />
						<?php the_category(', ') ?> <?php _e('by'); ?> <?php  the_author(); ?><br />
						</div>

					</div>

				</div>

			<?php endwhile; ?>

				<div class="navigation">
					<?php posts_nav_link(' | ','&laquo; Previous Page','Next Page &raquo;'); ?>
				</div>

			<?php else : ?>

				<div class="post" id="post-<?php the_ID(); ?>">
					<h2><?php _e('Not Found'); ?></h2>
				</div>

			<?php endif; ?>

		</div>

		<?php get_sidebar(); ?>

		<?php get_footer(); ?>

		<?php wp_footer(); ?>

	</div>

</body>
</html>