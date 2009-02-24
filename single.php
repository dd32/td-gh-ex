<?php get_header(); ?>

			<div id="content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php if (function_exists('post_class')){post_class();}else{echo 'class="post" ';} ?> id="post-<?php the_ID(); ?>">
					<div class="post-head">
						<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'auroral'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
						<div class="post-title-meta"> <span class="author"><?php _e('Posted by', 'auroral'); ?> <?php the_author() ?></span>
							<div class="meta-date">
							<span class="month"><?php the_time(__('M', 'auroral')) ?></span>
							<span class="date"><?php the_time(__('d', 'auroral')) ?></span>
							<span class="year"><?php the_time(__('Y', 'auroral')) ?></span>
							</div>
						</div>
					</div>
					<div class="entry">
					<?php the_content(__('Read the rest of this entry &raquo;', 'auroral')); ?>
							<p class="postfooter"><?php the_tags(__('Tags:', 'auroral') . ' ', ', ', '<br />'); ?>
														<?php if (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							<?php printf(__('Comments Off', 'auroral'), trackback_url(false)); ?>

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							<?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.', 'auroral'); ?>

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							<?php _e('Comments Off , Pings Off.', 'auroral'); ?>

						<?php } edit_post_link(__('Edit this entry', 'auroral'),'','.'); ?></p>
					</div>
		<?php if(get_next_post() || get_previous_post()) : ?>
					<div id="new-old-navigation">
						<?php if(next_post_link('<p class="newer">'.__('Newer :', 'auroral').' %link </p>')) : ?><?php endif ; ?>
						<?php if(previous_post_link('<p class="older">'.__('Older :', 'auroral').' %link </p>')) : ?><?php endif ; ?>
					</div>
		<?php endif; ?>
	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.', 'auroral'); ?></p>

	<?php endif; ?>

				</div>
			</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
