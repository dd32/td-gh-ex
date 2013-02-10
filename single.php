<?php get_header(); ?>

<?php get_template_part( 'template-part', 'wrap-before' ); ?>

	<?php while ( have_posts() ) : the_post(); // the loop ?>

		<?php get_template_part( 'content', 'single' ); ?>

		<?php
		if ( comments_open() || get_comments_number() != '0' ) { // load up the comment template if comments are open or we have at least 1 comment
			comments_template( '', true );
		}
		?>

	<?php endwhile; // end of the loop ?>

<?php get_template_part( 'template-part', 'wrap-after' ); ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>