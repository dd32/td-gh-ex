<?php
/**
 * The Template for displaying all single projects.
 *
 * @package Star
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'content', 'portfolio-single' );
			the_post_navigation();
			comments_template();
		endwhile; // end of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
