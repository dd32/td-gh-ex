<?php get_header(); ?>

			<div id="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="post-head">
						<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
			</div>
			<div class="entry">
				<?php the_content(__('Read the rest of this entry &raquo;', 'kubrick')); ?>

				<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						<p class="postfooter"><?php the_tags(__('Tags:', 'kubrick') . ' ', ', ', '<br />'); ?>

						<?php edit_post_link(__('Edit this entry', 'kubrick'),'','.'); ?></p>

			</div>
		<?php endwhile; endif; ?>
			<?php comments_template(); ?>

		</div>
			</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
