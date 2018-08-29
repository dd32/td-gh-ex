<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package  Az_Authority
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="page-content">
					<div class="col-full">

						<?php
						while ( have_posts() ) : the_post();

							do_action( 'azauthority_page_before' );

							get_template_part( 'template-parts/content', 'page' );

							/**
							 * Functions hooked in to azauthority_page_after action
							 *
							 * @hooked azauthority_display_comments - 10
							 */
							do_action( 'azauthority_page_after' );

						endwhile; // End of the loop.
						?>
					</div>

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'azauthority_sidebar' );
get_footer();