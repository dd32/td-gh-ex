<?php
/**
 * The template part for displaying link to edit current post
 *
 * @package Aamla
 * @since 1.0.0
 */

edit_post_link(
	sprintf(
		/* translators: %s: Name of current post */
		__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'aamla' ),
		get_the_title()
	),
	'<span' . aamla_get_attr( 'meta-edit-link' ) . '>',
	'</span>'
);
