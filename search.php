<?php
/*
 * The template for displaying search results.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php if ( have_posts() ) : ?>

		<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'darkelements' ), get_search_query() ); ?></h1>
			
		<?php while ( have_posts() ) : the_post(); ?>

			<h2 class="post-title">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permalink to %s', 'darkelements'), the_title_attribute('echo=0')); ?>"> <?php the_title(); ?></a> 
			</h2>

			<?php get_template_part( 'postmeta' ); ?>

			<?php if ( has_post_thumbnail() ) { 
				the_post_thumbnail(); 
			} ?>

			<?php the_excerpt(); ?>

			<div class="more">
				<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark"><?php _e( 'Read More &raquo;', 'darkelements' ); ?></a>
			</div>

		<?php endwhile; ?>

		<div class="post-nav">
			<?php next_posts_link(); ?>
			<?php previous_posts_link(); ?>
		</div>

		<?php else: ?>
			<h1 class="page-title"><?php _e( 'Nothing Found', 'darkelements' ); ?></h1>
			<p><?php _e('Sorry, no posts matched your criteria.', 'darkelements'); ?></p>
			<?php get_search_form(); ?>

	<?php endif; ?>

</div>
<?php get_footer(); ?>