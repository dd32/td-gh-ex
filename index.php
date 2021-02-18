<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AzonBooster
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			
				get_template_part( 'template-parts/loop');

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->

	</div><!-- #primary -->

<?php
do_action( 'azonbooster_sidebar' );
get_footer();
