<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Academic_Hub
 */

get_header();?>
<?php academic_hub_after_header(); ?>
<?php academic_hub_before_mainsec(); ?>
	<div class="single-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 single-description">
					<?php academic_hub_content_top(); ?>
						<?php
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content', 'page' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
						?>
					<?php academic_hub_content_bottom(); ?>
			</div>
			<!-- sidebar -->
			<div class="sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="sidebar-padder right_sidebars">
					<?php
						/**
						 * Academic Hub Sidebar
						 * 
						 * @since 1.0.0
						 */
						get_sidebar();
					?>
				</div>
			</div>
			</div><!-- #main -->
		</div><!-- #primary -->
	</div>
	
<?php academic_hub_after_mainsec(); ?>
<?php
get_footer();
