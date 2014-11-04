<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Quote
 *
 */

global $weaverx_cur_post_ID;
$weaverx_cur_post_ID = get_the_ID();
weaverx_per_post_style();
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('content-quote post-content ' . weaverx_post_class()); ?>>
<?php
	if (!weaverx_compact_post()) {
?>
		<header class="entry-header">
        <?php
            weaverx_entry_header( 'quote' );
            weaverx_post_top_meta(); ?>
		</header><!-- .entry-header -->

		<?php
		if (weaverx_show_only_title()) {
			return;
		}
	}
		if ( weaverx_do_excerpt() && !weaverx_compact_post()) : // Only display Excerpts for Search ?>
		<div class="entry-summary clearfix">
			<?php weaverx_the_post_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content clearfix">
<?php
		weaverx_the_post_full();
		weaverx_link_pages();
?>
		</div><!-- .entry-content -->
<?php 		endif;
	if (!weaverx_compact_post()) {
?>

		<footer class="entry-utility">
<?php
		weaverx_post_bottom_info();
		weaverx_compact_link('check');
?>
		</footer><!--  -->
<?php
	} else {
        weaverx_compact_link();
        weaverx_edit_link();
	}
	weaverx_inject_area('postpostcontent');	// inject post comment body ?>
	<div style="clear:both;"></div></article><!-- /#post-<?php the_ID(); ?> -->
