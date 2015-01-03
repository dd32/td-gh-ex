<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * The template for displaying posts in the Aside Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package WordPress
 * @subpackage Weaver X
 * @since Weaver Xtreme 1.0
 */

global $weaverx_cur_post_ID;
$weaverx_cur_post_ID = get_the_ID();
weaverx_per_post_style();
$do_excerpt = weaverx_do_excerpt();
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('content-aside post-format ' . weaverx_post_class()); ?>>
<?php
	if (!weaverx_compact_post()) {
?>
	<header class="entry-header">
<?php
		weaverx_entry_header( 'aside', $do_excerpt );
?>
	</header><!-- .entry-header -->

<?php
	if (weaverx_show_only_title()) {
		return;
	}
	}
	if ( $do_excerpt && !weaverx_compact_post() ) { // Only display Excerpts for Search ?>
	<div class="entry-summary clearfix">
<?php
		weaverx_the_post_excerpt(); ?>
		<br />
	</div><!-- .entry-summary -->

<?php
	} else { ?>
		<div class="entry-content clearfix">
<?php 	weaverx_the_post_full();
		weaverx_link_pages();
?>
		</div><!-- .entry-content -->
<?php
	};
?>
	<div class="atw-aside-margin" style="margin-bottom:20px;"></div>
<?php
	if (! weaverx_compact_post()) {
		weaverx_format_posted_on_footer('aside');
		weaverx_compact_link('check');
	} else {
		weaverx_compact_link();
		weaverx_edit_link();
	}
?>

<?php weaverx_inject_area('postpostcontent');	// inject post comment body ?>
	<div style="clear:both;"></div></article><!-- /#post-<?php the_ID(); ?> -->
