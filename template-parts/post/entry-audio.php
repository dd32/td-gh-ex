<?php
/**
 * The template part for displaying audio in current post (if any) or featured image
 * (if any).
 *
 * @package Aamla
 * @since 1.0.0
 */

$aamla_content = apply_filters( 'the_content', get_the_content() );
$aamla_audio   = get_media_embedded_in_content( $aamla_content, array( 'audio' ) );

if ( ! empty( $aamla_audio ) ) :
	echo '<div' . aamla_get_attr( 'entry-featured-media' ) . '>'; // WPCS xss ok.
	foreach ( $aamla_audio as $aamla_html ) {
		printf( '<div%1$s">%2$s</div>', aamla_get_attr( 'entry-audio' ), $aamla_html );
	}
	echo '</div>';
elseif ( has_post_thumbnail() ) :
	aamla_get_template_partial( 'template-parts/post', 'entry-thumbnail' );
endif;
