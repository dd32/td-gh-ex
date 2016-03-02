<?php
/*
 * The template for displaying search results.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php if ( have_posts() ) : ?>

		<h3 class="page-title"><?php printf( __( 'Search Results for: %s', 'onecolumn' ), get_search_query() ); ?></h3>
			
		<?php while ( have_posts() ) : the_post(); ?>

			<h3 class="post-title">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permalink to %s', 'onecolumn'), the_title_attribute('echo=0')); ?>"> <?php the_title(); ?></a> 
			</h3>

			<?php get_template_part( 'postmeta' ); ?>

			<?php if ( has_post_thumbnail() ) { 
				the_post_thumbnail(); 
			} ?>

			<?php the_excerpt(); ?>

			<div class="more">
				<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark"><?php _e( 'Read More &raquo;', 'onecolumn' ); ?></a>
			</div>

		<?php endwhile; ?>

		<div class="post-nav">
			<?php next_posts_link(); ?>
			<?php previous_posts_link(); ?>
		</div>

		<?php else: ?>
			<h3 class="page-title"><?php _e( 'Nothing Found', 'onecolumn' ); ?></h3>
			<p><?php _e('Sorry, no posts matched your criteria.', 'onecolumn'); ?></p>
			<?php get_search_form(); ?>

	<?php endif; ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>