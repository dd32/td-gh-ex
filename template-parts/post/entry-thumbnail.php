<?php
/**
 * The template part for displaying current post thumbnail on index pages.
 *
 * @package Aamla
 * @since 1.0.0
 */

if ( has_post_thumbnail() ) :
	$size = is_singular() ? is_singular( 'page' ) ? 'aamla-page-featured-image' : 'aamla-large' : 'aamla-medium';
?>
	<div<?php aamla_attr( 'entry-thumbnail' ); ?>>
		<?php the_post_thumbnail( $size ); ?>
	</div><!-- .entry-thumbnail -->
<?php
endif;
