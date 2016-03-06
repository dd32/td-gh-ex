<?php
/*
 * The template for homepage.
 */
?>

<?php get_header(); ?>
<div id="main-content-container">
<div id="main-content">
<div id="content-full">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="post-home<?php if( $wp_query->current_post%2 == 0 ) echo ' left'; ?>">

		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<div class="sticky">
				<h4><?php _e( 'Featured post', 'multicolors' ); ?></h4>
			</div>
		<?php endif; ?>

		<h2 class="post-title">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permalink to %s', 'multicolors'), the_title_attribute('echo=0')); ?>"> <?php the_title(); ?></a> 
		</h2>

		<?php get_template_part( 'postmeta' ); ?>

		<?php if ( has_post_thumbnail() ) { 
			the_post_thumbnail(); 
		} ?>

		<?php the_excerpt(); ?>

		<div class="more">
			<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark"><?php _e( 'Read More &raquo;', 'multicolors' ); ?></a>
		</div>
		
	</div>

	<?php endwhile; ?>

		<div class="post-nav">
			<?php next_posts_link(); ?>
			<?php previous_posts_link(); ?>
		</div>

		<?php else: ?>
			<h1 class="page-title"><?php _e( 'Nothing Found', 'multicolors' ); ?></h1>
			<p><?php _e('Sorry, no posts matched your criteria.', 'multicolors'); ?></p>

	<?php endif; ?>
				
</div>
</div>
</div>
<?php get_footer(); ?>