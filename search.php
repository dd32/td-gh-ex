<?php get_header(); ?>

	<h2 class="title"><?php _e( 'Search:', 'arix' ); ?> <?php echo esc_attr( get_search_query() ); ?></h2>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'template-parts/content-search' ); ?>


	<?php endwhile; ?>

	<?php arix_page_nav(); ?>

	<?php else : ?>
		<?php get_template_part( 'template-parts/content-none' ); ?>

	<?php endif; ?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
