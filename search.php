<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Bayn Lite
 */

get_header(); ?>

	<div class="page-header">
		<h1 class="page-title">
			<?php
				/* translators: Search query */
				printf( esc_html__( 'Search Results for: %s', 'bayn-lite' ), '<span>' . get_search_query() . '</span>' );
			?>
		</h1>
	</div><!-- .page-header -->

	<div class="container">
		<div id="primary" class="content-area">
			<main id="main" class="site-main grid grid--3" role="main">

				<?php
				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content' );

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</main><!-- #main -->
			<?php the_posts_pagination(); ?>
		</div><!-- #primary -->
	</div>
<?php

get_footer();
