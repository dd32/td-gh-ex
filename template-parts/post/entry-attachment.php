<?php
/**
 * The template part for displaying current image attachment.
 *
 * @package Aamla
 * @since 1.0.0
 */

?>

<div<?php aamla_attr( 'entry-attachment' ); ?>>

	<?php echo wp_get_attachment_image( get_the_ID(), 'large' ); ?>

	<?php if ( has_excerpt() ) : ?>
		<div<?php aamla_attr( 'entry-caption' ); ?>><?php the_excerpt(); ?></div>
	<?php endif; ?>

</div><!-- .entry-attachment -->
