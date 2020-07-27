<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
/**
 *   Woo Commerce Page Template
 */
/*! ** DO NOT EDIT THIS FILE! It will be overwritten when the theme is updated! ** */


$body_classes = get_body_class();
$archive = ! in_array( 'single-product', $body_classes );

$sb_layout = weaverx_page_lead( 'single', $archive );

// and next the content area.
weaverx_sb_precontent( 'page' );

// generate page content
echo "\n<!-- Weaver Woocommerce page -->\n";
if ( function_exists( 'woocommerce_content' ) ) {
	woocommerce_content();
} else {
	while ( have_posts() ) {
		weaverx_post_count_clear();
		the_post();

		get_template_part( 'templates/content', 'page' );

		comments_template( '', true );
	}
}

weaverx_sb_postcontent( 'page' );

weaverx_page_tail( 'page', $sb_layout );    // end of page wrap


