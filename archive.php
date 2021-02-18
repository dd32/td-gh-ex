<?php
/*
 * The template for displaying archive pages.
 */
?>

<?php get_header(); ?>
<div id="content">
	<?php if ( have_posts() ) : ?>
		<?php
			the_archive_title( '<h4 class="page-title">', '</h4>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
		?>

		<?php while ( have_posts() ) : the_post(); ?>
			<h4 class="post-title">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permalink to %s', 'medical'), the_title_attribute('echo=0')); ?>"> <?php the_title(); ?></a> 
			</h4>

			<?php get_template_part( 'postmeta' ); ?>

			<?php if ( has_post_thumbnail() ) { 
				the_post_thumbnail(); 
			} ?>

			<?php the_excerpt(); ?>

			<div class="more">
				<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark"><?php _e( 'Read More &raquo;', 'medical' ); ?></a>
			</div>

		<?php endwhile; ?>

		<div class="post-nav">
			<?php next_posts_link(); ?>
			<?php previous_posts_link(); ?>
		</div>

		<?php else: ?>
			<h4 class="page-title"><?php _e( 'Nothing Found', 'medical' ); ?></h4>
			<p><?php _e('Sorry, no posts matched your criteria.', 'medical'); ?></p>
	<?php endif; ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>