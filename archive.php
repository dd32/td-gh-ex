<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Athenea
 */

get_header();
get_template_part( 'parts/content', 'headmenu' ); ?>
<div class="container">
   <div class="row transbody">      
    <div id="primary" class="col-md-8">
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h3 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'athenea' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'athenea' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'athenea' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'athenea' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'athenea' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'athenea' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'athenea' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'athenea');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'athenea');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'athenea' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'athenea' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'athenea' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'athenea' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'athenea' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'athenea' );

						else :
							_e( 'Archives', 'athenea' );

						endif;
					?>
				</h3>
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

			<?php athenea_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
	</div><!-- #primary col-md-8 -->
    <div class="col-md-4">
	  <div class="well_sidebar">
       <?php get_sidebar(); ?>
      </div>
    </div><!-- col-md-4 -->
   </div><!-- /row -->
</div><!--/container-->
<?php
get_template_part( 'parts/content', 'footmenu' );
get_footer(); ?>