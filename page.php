<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'template-parts/content-page' ); ?>


	<?php
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
	?>


	<?php endwhile; else : ?>
		<?php get_template_part( 'template-parts/content-none' ); ?>

	<?php endif; ?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
