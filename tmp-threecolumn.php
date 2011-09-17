<?php
/**
 * Template Name: Three Column Template
 * Description: A Page Template That Has Two Sidebars
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

<?php get_sidebar(); ?>		
<?php get_footer(); ?>