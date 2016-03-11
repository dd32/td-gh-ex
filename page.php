<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @since 1.0.0
 */
get_header();
?>

	<div class="container">
		<div class="row">
			<div id="primary" class="cols">
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'content', 'page' );

					comments_template( '', true );
				endwhile;
				?>
			</div><!-- #primary -->

			<?php get_sidebar(); ?>
		</div>
	</div>

<?php get_footer(); ?>