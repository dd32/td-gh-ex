<?php get_header(); ?>

<div id="content" class="twocolumns">
	<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'rcg-forest') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php edit_post_link(__('Edit this entry.', 'rcg-forest'), '<p>', '</p>'); ?>
			</div>
		</div>
		<?php comments_template(); ?>
	<?php endwhile; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
