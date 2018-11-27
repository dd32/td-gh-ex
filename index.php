<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Beam
 */
get_header(); ?>
	<div id="content" class="container site-content">
		<div class="columns site-content-inner">
			<div id="primary" class="column is-9 content-area">
				<main id="main" class="site-main">

				<?php
				if ( have_posts() ) :

					/* Start the Loop */
					 while ( have_posts() ) : the_post();

							get_template_part( 'content', get_post_format() );

					endwhile;

					beam_content_nav( 'nav-below' );

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

				</main><!-- #main -->
			</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
