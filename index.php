<?php
/*
 * The template for homepage.
 */
?>

<?php get_header(); ?>
<div id="content-full">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div class="post-home<?php if( $wp_query->current_post%4 == 0 ) echo ' left'; elseif ( $wp_query->current_post%4 == 3 ) echo ' right'; ?>">

		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<div class="sticky">
				<h5><?php _e( 'Featured post', 'gridbulletin' ); ?></h5>
			</div>
		<?php endif; ?>

		<h2 class="post-title">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permalink to %s', 'gridbulletin'), the_title_attribute('echo=0')); ?>"> <?php the_title(); ?></a> 
		</h2>

		<?php if ( has_post_thumbnail() ) { 
			the_post_thumbnail('list', array('class' => 'list-image'));
		} ?>

		<?php the_excerpt(); ?>

		<?php get_template_part( 'postmeta' ); ?>

	</div>

	<?php endwhile; ?>

		<div class="post-nav">
			<?php next_posts_link(); ?>
			<?php previous_posts_link(); ?>
		</div>

		<?php else: ?>
			<h1 class="page-title"><?php _e( 'Nothing Found', 'gridbulletin' ); ?></h1>
			<p><?php _e('Sorry, no posts matched your criteria.', 'gridbulletin'); ?></p>

	<?php endif; ?>

</div>
<?php get_footer(); ?>