<?php get_header(); ?>

		<!-- start of Archive list -->
		<div id="content" class="grid_8">

			<div class="box single">
<?php if (have_posts()) : ?>

		<h2><?php _e('Search Results:', '5years'); ?> <span><?php the_search_query(); ?></span></h2>

<?php while (have_posts()) : the_post(); ?>
		<!-- start of Archive post -->
		<div class="box seearch-result" id="post-<?php the_ID(); ?>">
			<div class="da-com">
				<div class="levo"><?php the_time('j. F Y.'); ?></div>
				<div class="desno"><a href="<?php the_permalink(); ?>#comments"><?php comments_number(__('No comments', '5years'), __('1 comment', '5years'), __('% comments', '5years') );?></a></div>
			</div>
			<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e("Permanent link to ", "5years"); the_title();?>"><?php the_title(); $br;?></a></h2>
			<div class="entry">
				<?php the_excerpt(); ?>
			</div>
			<div class="more"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e("Permanent link to ", "5years"); the_title();?>"><?php _e("Continue reading...", "5years"); ?></a></div>
		</div>
		<!-- end of Archive post -->
<?php endwhile; ?>
		
		<!-- start of Pagination -->
		<div class="pagination">
			<div class="levo" title="<?php _e("List recent posts", "5years"); ?>"><?php previous_posts_link('&larr; ' . __('Newer posts', '5years')) ?></div><div class="desno" title="<?php _e("List older posts", "5years"); ?>"><?php next_posts_link(__('Older posts', '5years') . ' &rarr;') ?></div>
		</div>
		<!-- end of Pagination -->

<?php else : ?>

		<h2><?php _e('No posts found. Try a different search?', '5years'); ?></h2>

<?php endif; ?>
		</div>
	</div>

<?php get_footer(); ?>
