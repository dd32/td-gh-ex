<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aileron
 */

get_header(); ?>

<div id="content" class="site-content">

	<div class="container">
		<div class="row">

			<section id="primary" class="content-area col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<main id="main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title">
							<?php
								if ( is_category() ) :
									single_cat_title();

								elseif ( is_tag() ) :
									single_tag_title();

								elseif ( is_author() ) :
									printf( __( 'Author: %s', 'aileron' ), '<span class="vcard">' . get_the_author() . '</span>' );

								elseif ( is_day() ) :
									printf( __( 'Day: %s', 'aileron' ), '<span>' . get_the_date() . '</span>' );

								elseif ( is_month() ) :
									printf( __( 'Month: %s', 'aileron' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'aileron' ) ) . '</span>' );

								elseif ( is_year() ) :
									printf( __( 'Year: %s', 'aileron' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'aileron' ) ) . '</span>' );

								elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
									_e( 'Asides', 'aileron' );

								elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
									_e( 'Galleries', 'aileron' );

								elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
									_e( 'Images', 'aileron' );

								elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
									_e( 'Videos', 'aileron' );

								elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
									_e( 'Quotes', 'aileron' );

								elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
									_e( 'Links', 'aileron' );

								elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
									_e( 'Statuses', 'aileron' );

								elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
									_e( 'Audios', 'aileron' );

								elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
									_e( 'Chats', 'aileron' );

								else :
									_e( 'Archives', 'aileron' );

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

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
						?>

					<?php endwhile; ?>

					<?php aileron_paging_nav(); ?>

				<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

				</main><!-- #main -->
			</section><!-- #primary -->

			<?php get_sidebar(); ?>

		</div><!-- .row -->
	</div><!-- .container -->

</div><!-- #content -->

<?php get_footer(); ?>