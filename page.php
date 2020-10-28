<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
/**
 * Standard page output (Default template)
 */
/*! ** DO NOT EDIT THIS FILE! It will be overwritten when the theme is updated! ** */

$sb_layout = weaverx_page_lead( 'page' );    // emit header, container, setup sidebars

// and next the content area.

weaverx_sb_precontent( 'page' );

while ( have_posts() ) {
	weaverx_post_count_clear();

	the_post();

	get_template_part( 'templates/content', 'page' );

	comments_template( '', true );
}

weaverx_sb_postcontent( 'page' );

weaverx_page_tail( 'page', $sb_layout );    // end of page wrap

