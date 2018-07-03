<?php
/**
 * The template part for displaying image attachment meta information
 *
 * @package Aamla
 * @since 1.0.0
 */

if ( ! is_attachment() || ! wp_attachment_is_image() ) {
	return;
}

// Retrieve attachment metadata.
$aamla_metadata = wp_get_attachment_metadata();
printf( '<span%1$s"><a href="%2$s" title="%3$s">%4$s (%5$s &times; %6$s)</a></span>',
	aamla_get_attr( 'attachment-meta', [ 'class' => 'full-size-link' ] ),
	esc_url( wp_get_attachment_url() ),
	esc_attr__( 'Link to full-size image', 'aamla' ),
	esc_html__( 'Full resolution', 'aamla' ),
	absint( $aamla_metadata['width'] ),
	absint( $aamla_metadata['height'] )
); // WPCS xss ok. 'aamla_get_attr' returns escaped value.
