<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Academic_Hub
 */

get_header(); ?>
<?php academic_hub_before_mainsec(); ?>

	<div class="blog-section">
		<div class="container">
			<div class="row">
				<?php
				if ( have_posts() ) :
					academic_hub_content_top();

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					/**
					 * The Post Pagination
					 * 
					 * @since 1.0.0
					 */
					academic_hub_pagination();

					academic_hub_content_bottom();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div><!-- #main -->
		</div><!-- #primary -->
	</div>

<?php academic_hub_after_mainsec(); ?>
<?php
get_footer();
