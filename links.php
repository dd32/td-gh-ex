<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>

			<div id="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="post-head">
						<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'auroral'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
			</div>
			<div class="entry">
				<?php the_content(__('Read the rest of this entry &raquo;', 'auroral')); ?>
				<h3><?php _e('Links:'); ?></h3>
				<ul class="bookmarks">
				<?php wp_list_bookmarks('between=<br />&title_before=<h4>&title_after=</h4>&show_description=1&show_images=0&orderby=id&show_rating=0&show_updated=1'); ?>
				</ul>

				<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						<p class="postfooter"><?php the_tags(__('Tags:', 'auroral') . ' ', ', ', '<br />'); ?>

						<?php edit_post_link(__('Edit this entry', 'auroral'),'','.'); ?></p>

			</div>
		<?php endwhile; endif; ?>
			<?php comments_template(); ?>

		</div>
			</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
