<?php
/*
 * The template for displaying search results.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php if ( have_posts() ) : ?>

		<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'gridbulletin' ), get_search_query() ); ?></h1>
			
		<?php while ( have_posts() ) : the_post(); ?>

			<div class="post-archive<?php if( $wp_query->current_post%3 == 0 ) echo ' left'; elseif ( $wp_query->current_post%3 == 2 ) echo ' right'; ?>">

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
			<?php get_search_form(); ?>

	<?php endif; ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>