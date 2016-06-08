<?php
/**
* The template for displaying Archive pages.
*
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @package beam
*/

get_header(); ?>

	<div id="content" class="site-content">
		<div class="site-content-inner">

		<section id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
				<?php
				if ( is_category() ) :
				single_cat_title();

				elseif ( is_tag() ) :
				single_tag_title();

				elseif ( is_author() ) :
				/* Queue the first post, that way we know
				 * what author we're dealing with (if that is the case).
				*/

				the_post();

				printf( __( 'Author Archive: %s', 'beam' ), '<span class="vcard">' . get_the_author() . '</span>' );
				/* Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();

				elseif ( is_day() ) :
				printf( __( 'Daily Archive: %s', 'beam' ), '<span>' . get_the_date() . '</span>' );

				elseif ( is_month() ) :
				printf( __( 'Monthly Archive: %s', 'beam' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

				elseif ( is_year() ) :
				printf( __( 'Yearly Archive: %s', 'beam' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

				elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
				_e( 'Asides', 'beam' );

				elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
				_e( 'Images', 'beam' );

				elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
				_e( 'Videos', 'beam' );

				elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
				_e( 'Quotes', 'beam' );

				elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
				_e( 'Links', 'beam' );

				else :
				_e( 'Archives', 'beam' );

				endif;
				?>
				</h1>

				<?php
				// Show an optional term description.
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
				printf( '<div class="taxonomy-description">%s</div>', $term_description );
				endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ 
				while ( have_posts() ) : the_post(); 
			// check if the post has a Post Thumbnail assigned to it.
					if ( has_post_thumbnail( 'category-thumb' ) ) {
			?>
				
					<div class="featured-image">
					<?php
						the_post_thumbnail( 'category-thumb' );
					?>
					</div>
					<?php
					} 
					/* Include the Post-Format-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
					get_template_part( 'content', get_post_format() );

					//content endwhile -->

				endwhile; 

			beam_content_nav( 'nav-below' );

			else : 

			get_template_part( 'template-parts/content', 'none' ); 

			endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->
 
<?php 
get_sidebar();
get_footer(); 