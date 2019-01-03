<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Academic_Hub
 */
get_header();?>
<?php academic_hub_before_mainsec(); ?>
	<div class="blog-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 single-description">
					<?php if ( have_posts() ) : ?>
						<?php
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
							/**
							 * The Templates Parts Content
							 * 
							 * @since 1.0.0
							 */
							get_template_part( 'template-parts/content', 'none' );

						endif;
					?>
				</div><!--#academic Hub Single Description  -->
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
				</div><!--#academic Hub Sidebar  -->

			</div><!-- #main -->
		</div><!-- #primary -->
	</div>
<?php academic_hub_after_mainsec(); ?>
<?php
get_footer();