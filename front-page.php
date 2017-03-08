<?php
/**
 * The front page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Arouse Pro
 */

if ( 'page' == get_option( 'show_on_front' ) ) {

    include( get_page_template() );
    
} else {

	get_header();

	if ( get_theme_mod( 'display_slider', true ) && ! is_paged() ) {
		get_template_part('template-parts/slider');
	}

	if ( get_theme_mod( 'display_featured_section', true ) && ! is_paged() ) {
		get_template_part('template-parts/featured', 'content');
	}

	?>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-8">
				<div id="primary" class="content-area">

					<main id="main" class="site-main" role="main">

						<?php
							if ( have_posts() ) :

								if ( ! is_paged() && is_front_page() && is_home() ) {
									echo '<div class="arouse-listing-title"><p>';
										_e( 'Latest Articles', 'arouse' );
									echo "</p></div>";
								} ?>				

								<div class="grid-wrapper">
								
									<?php

									/* Start the Loop */
									while ( have_posts() ) : the_post();

										if ( is_front_page() && is_home() ) {

											get_template_part( 'template-parts/content', '' );

										} elseif ( is_front_page() ) {

											get_template_part( 'template-parts/content', 'page' );

										}
	                     
									endwhile;

									?>

								</div><!-- .grid-wrapper -->
								
							<?php

								the_posts_pagination();

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif; ?>

					</main><!-- #main -->				         

				</div><!-- #primary -->
			</div><!-- .cols-->
			
			<div class="col-xs-12 col-sm-6 col-md-4">
				<?php get_sidebar(); ?>
			</div><!-- .cols-->

		</div><!-- .row -->

		<?php get_sidebar('content-bottom'); ?>

	</div><!-- .container -->

	<?php get_footer();

}