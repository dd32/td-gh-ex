<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Academic_Hub
 */

get_header(); ?>
<?php academic_hub_before_mainsec(); ?>
	<div class="single-section">
		<div class="container">
			<div class="row">
				<?php academic_hub_content_top(); ?>
				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content-single', get_post_type() );

					endwhile; // End of the loop.
				?>
				<?php academic_hub_content_bottom(); ?>
			</div><!-- #main -->
		</div><!-- #primary -->
	</div>
<?php academic_hub_after_mainsec(); ?>

<?php
get_footer();
