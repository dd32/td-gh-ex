<?php
/**
 * The template part for displaying image gallery in current post (if any) or featured image
 * (if any).
 *
 * @package Aamla
 * @since 1.0.0
 */

if ( get_post_gallery() ) :
	printf( '<div%1$s>%2$s</div>', aamla_get_attr( 'entry-featured-media' ), get_post_gallery() );
elseif ( has_post_thumbnail() ) :
	aamla_get_template_partial( 'template-parts/post', 'entry-thumbnail' );
endif;
