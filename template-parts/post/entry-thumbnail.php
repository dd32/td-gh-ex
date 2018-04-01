<?php
/**
 * The template part for displaying current post thumbnail
 *
 * @package Aamla
 * @since 1.0.0
 */

?>

<div<?php aamla_attr( 'entry-featured-media' ); ?>>

	<?php
	if ( is_singular() ) :
		the_post_thumbnail( 'aamla-image' );
	else :
	?>
	<a href="<?php the_permalink(); ?>"<?php aamla_attr( 'post-thumbnail' ); ?> aria-hidden="true">
		<?php the_post_thumbnail( 'post-thumbnail' ); ?>
	</a>
	<?php endif; ?>

</div><!-- .entry-featured-media -->
