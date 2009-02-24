<?php get_header(); ?>

			<div id="content">

	<?php if (have_posts()) : ?>

		<h2 class="archivetitle"><?php _e('Search Results', 'auroral'); ?></h2>



		<?php while (have_posts()) : the_post(); ?>

			<div <?php if (function_exists('post_class')){post_class();}else{echo 'class="post" ';} ?>>
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'auroral'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, F jS, Y') ?></small>
				
				
				<?php the_excerpt(); ?>

				<p class="postfooter"><?php the_tags(__('Tags:', 'auroral') . ' ', ', ', '<br />'); ?>
					<?php edit_post_link(__('Edit', 'auroral'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;', 'auroral'), __('1 Comment &#187;', 'auroral'), __('% Comments &#187;', 'auroral'), '', __('Comments Closed', 'auroral') ); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'auroral')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'auroral')) ?></div>
		</div>

	<?php else : ?>

		<h2 class="center"><?php _e('No posts found. Try a different search?', 'auroral'); ?></h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
