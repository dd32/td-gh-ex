<?php
/**
 * @package mwsmall
 */

get_header(); ?>
 
<section id="primary" class="container content-area col-lg-9 col-md-9 col-sm-8">
	<div id="content" class="site-content" role="main">
		
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h2 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'mw-small' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'mw-small' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'mw-small' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'mw-small' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'mw-small' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'mw-small' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'mw-small');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'mw-small');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'mw-small' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'mw-small' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'mw-small' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'mw-small' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'mw-small' );

						else :
							_e( 'Archives', 'mw-small' );

						endif;
					?>
				</h2>
			</header><!-- .page-header -->
			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php get_template_part( 'content', get_post_format() ); ?>
				
			<?php endwhile; ?>
			
			<?php mwsmall_pagination_nav(); ?>
			
		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>
				
		<?php endif; ?>
  
    </div><!--/#content -->

</section><!--/.primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>