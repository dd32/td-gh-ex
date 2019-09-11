<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bayn Lite
 */

get_header(); ?>

	<div class="page-header">
		<div class="page-header__text">
			<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
			if ( 'post' === get_post_type() ) {
				/* translators: used between list items, there is a space before/after the slash */
				$categories_list = get_the_category_list( esc_html__( ' / ', 'bayn-lite' ) );
				if ( $categories_list && bayn_lite_categorized_blog() ) {
					echo '<div class="cat-links">', $categories_list, '</div>'; // WPCS: XSS OK.
				}
			}
			?>
		</div>
	</div><!-- .page-header -->

	<div class="container clearfix">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'single' );

					the_post_navigation( array(
						'prev_text' => wp_kses_post( '&larr; %title' ),
						'next_text' => wp_kses_post( '%title &rarr;' ),
					) );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div>
<?php
get_footer();
