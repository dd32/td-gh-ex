		<?php get_header(); ?>

		<div id="posts">

			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

				<div class="post" id="post-<?php the_ID(); ?>">

					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><?php edit_post_link('Edit', ' &#124; ', ''); ?></h2>
					
					<div class="tags">
						<?php the_tags('Tags: ', ', ', ''); ?>
					</div>
					
					<div class="entry">

						<?php the_content(); ?>

						<?php link_pages('<p><strong>Pages:</strong>','</p>','number'); ?>

					</div>

				</div>

			<?php endwhile; ?>

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