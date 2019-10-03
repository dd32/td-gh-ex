<?php
/**
 * Prints HTML with meta information for the current post-date/time.
 *
 */


$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
	
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
}

//// already escaped
$time_string = sprintf(
	$time_string,
	esc_attr( get_the_date( DATE_W3C ) ),
	esc_html( get_the_date() ),
	esc_attr( get_the_modified_date( DATE_W3C ) ),
	esc_html( get_the_modified_date() )
);

echo '<span class="posted-on">' . esc_html__( 'Posted on', 'ba-tours-light' ) . ' <a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
           //// already escaped
echo $time_string; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
echo '</a></span>';

