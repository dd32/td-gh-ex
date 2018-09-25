<?php
/**
 * Prints HTML with meta information for the current author.
 *
 * @package BA Tours
 */


printf(
	'<span class="posted_by"> ' . esc_html_x( 'by %1$s', 'post_author', 'ba-tours-light' ). '</span>',
	'<span class="author vcard"><a class="" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
);

