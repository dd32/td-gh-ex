<?php
/**
 * Template Name: One Column Template
 * Description: A Page Template that removes the sidebar
 *
 * @since admired 1.0
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php the_post(); ?>

				<?php get_template_part( 'loop', 'page' ); ?>

				<?php comments_template( '', true ); ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>