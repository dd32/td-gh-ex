<?php
/**
 * The home template file.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Arouse
 */

get_header();

if ( get_theme_mod( 'display_slider', true )  && ! is_paged() ) {
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
						if ( is_front_page() && ! is_paged() ) {
							echo '<div class="arouse-listing-title"><p>';
								_e( 'Latest Articles', 'arouse' );
							echo "</p></div>";
						}
					?>


					<?php
						if ( have_posts() ) :

							if ( is_home() && ! is_front_page() ) : ?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>
							<?php endif; ?>

							<div class="grid-wrapper">
							
								<?php

								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', get_post_format() );

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
</div><!-- .container -->
<?php
get_footer();