<?php
/*
 * The template for homepage.
 */
?>

<?php get_header(); ?>
<div id="content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php get_template_part( 'content-list' ); ?>

	<?php endwhile; ?>

		<div class="post-nav">
			<?php next_posts_link(); ?>
			<?php previous_posts_link(); ?>
		</div>

	<?php else: ?>
		<h1 class="page-title"><?php _e( 'Nothing Found', 'darkelements' ); ?></h1>
		<p><?php _e('Sorry, no posts matched your criteria.', 'darkelements'); ?></p>

	<?php endif; ?>
</div>
<?php get_footer(); ?>