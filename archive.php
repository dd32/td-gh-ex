<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package blogghiamo
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							printf( __( 'Category: %s', 'blogghiamo' ), '<span>' . single_cat_title( '', false ) . '</span>' );

						elseif ( is_tag() ) :
							printf( __( 'Tag: %s', 'blogghiamo' ), '<span>' . single_tag_title( '', false ) . '</span>' );

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'blogghiamo' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'blogghiamo' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'blogghiamo' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'blogghiamo' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'blogghiamo' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'blogghiamo' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'blogghiamo' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'blogghiamo' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'blogghiamo' );

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'blogghiamo' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'blogghiamo' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'blogghiamo' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'blogghiamo' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'blogghiamo' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'blogghiamo' );

						else :
							_e( 'Archives', 'blogghiamo' );

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
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) {
				the_posts_navigation();
			} else {
				the_posts_pagination( array(
					'prev_text'          => '<i class="fa fa-angle-double-left spaceRight"></i>' . esc_html__( 'Previous', 'drento' ),
					'next_text'          => esc_html__( 'Next', 'drento' ) . '<i class="fa fa-angle-double-right spaceLeft"></i>',
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'drento' ) . ' </span>',
				) );
			} ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
