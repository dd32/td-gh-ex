<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Template Name: Raw
 *
 */
/*! ** DO NOT EDIT THIS FILE! It will be overwritten when the theme is updated! ** */
	$GLOBALS['weaverx_page_who'] = 'raw';
	$GLOBALS['weaverx_page_is_archive'] = false;

	get_header( 'raw' );
	// no #container or #content wrappers, and no sidebars or injection
?>
<!-- This page formatted using Weaver Xtreme Raw Page Template -->
<div id="page-raw" class="page-raw-<?php the_ID(); ?> page-id-<?php the_ID();?>">
<?php
	do_action('weaverx_per_page');

	// generate page content

	while ( have_posts() ) {
		weaverx_post_count_clear();

		the_post();
		if ( weaverx_is_checked_page_opt('_pp_raw_html') || weaverx_is_checked_post_opt('_pp_raw_html') ) {
			echo do_shortcode(get_the_content());
		} else {
			the_content();
		}
	}
	edit_post_link( __( 'Edit','weaver-xtreme'), '<br /><span class="edit-link">', '</span>' );
?>

</div> <!-- #page-raw -->
<?php
	weaverx_get_footer( 'raw' );
?>
