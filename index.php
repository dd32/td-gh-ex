<?php
/*
 * The template for homepage.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<div class="sticky">
				<h4><?php _e( 'Featured post', 'myknowledgebase' ); ?></h4>
			</div>
		<?php endif; ?>

		<h4 class="post-title">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permalink to %s', 'myknowledgebase'), the_title_attribute('echo=0')); ?>"> <?php the_title(); ?></a> 
		</h4>

		<?php get_template_part( 'postmeta' ); ?>

		<?php if ( has_post_thumbnail() ) { 
			the_post_thumbnail(); 
		} ?>

		<?php the_excerpt(); ?>

		<div class="more">
			<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark"><?php _e( 'Read More &raquo;', 'myknowledgebase' ); ?></a>
		</div>

	<?php endwhile; ?>

		<div class="post-nav">
			<?php next_posts_link(); ?>
			<?php previous_posts_link(); ?>
		</div>

		<?php else: ?>
			<h4 class="page-title"><?php _e( 'Nothing Found', 'myknowledgebase' ); ?></h4>
			<p><?php _e('Sorry, no posts matched your criteria.', 'myknowledgebase'); ?></p>

	<?php endif; ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>