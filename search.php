<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Academic_Hub
 */

get_header();
?>
<?php academic_hub_after_header(); ?>
<?php academic_hub_before_mainsec(); ?>
<div class="single-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 single-description">

						<?php if ( have_posts() ) : ?>

							<header class="page-header">
								<h1 class="page-title">
									<?php
										/* translators: %s: search query. */
										printf( esc_html__( 'Search Results for: %s', 'academic-hub' ), '<span>' . get_search_query() . '</span>' );
									?>
								</h1>
							</header><!-- .page-header -->

							<?php
								/* Start the Loop */
								academic_hub_content_top();

								while ( have_posts() ) :
									the_post();

									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'search' );

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
