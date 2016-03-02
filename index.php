<?php
/*
 * The template for homepage.
 */
?>

<?php get_header(); ?>
<div id="content-full">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="post-home<?php if( $wp_query->current_post%2 == 0 ) echo ' left'; ?>">

		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<div class="sticky">
				<h4><?php _e( 'Featured post', 'darkorange' ); ?></h4>
			</div>
		<?php endif; ?>

		<h4 class="post-title">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permalink to %s', 'darkorange'), the_title_attribute('echo=0')); ?>"> <?php the_title(); ?></a> 
		</h4>

		<?php get_template_part( 'postmeta' ); ?>

		<?php if ( has_post_thumbnail() ) { 
			the_post_thumbnail('homepage'); 
		} ?>

		<?php the_excerpt(); ?>

		<div class="more">
			<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark"><?php _e( 'Read More &raquo;', 'darkorange' ); ?></a>
		</div>
		
	</div>

	<?php endwhile; ?>

		<div class="post-nav">
			<?php next_posts_link(); ?>
			<?php previous_posts_link(); ?>
		</div>

		<?php else: ?>
			<h4 class="page-title"><?php _e( 'Nothing Found', 'darkorange' ); ?></h4>
			<p><?php _e('Sorry, no posts matched your criteria.', 'darkorange'); ?></p>

	<?php endif; ?>

</div>
<?php get_footer(); ?>