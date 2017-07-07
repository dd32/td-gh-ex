<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'template-parts/content' ); ?>


	<?php endwhile; ?>

	<?php arix_page_nav(); ?>

	<?php else : ?>
		<?php get_template_part( 'template-parts/content-none' ); ?>

	<?php endif; ?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
