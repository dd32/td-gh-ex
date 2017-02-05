<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/**
 *  Specific page output template
 */
/*! ** DO NOT EDIT THIS FILE! It will be overwritten when the theme is updated! ** */

	global $weaverx_cur_page_ID;
	$weaverx_cur_page_ID = 0;

	$sb_layout = weaverx_page_lead( 'search', true );

	// and next the content area.
	weaverx_sb_precontent('search');

	if ( have_posts() ) {
		$msg = apply_filters('weaverx_search_results', __( 'Search Results for: %s','weaver-xtreme'));
		$title = '<span class="title-search-label">' . sprintf( $msg, '</span><span class="archive-info">'
				. '"' . get_search_query() . '"</span>' );
		?>

	<header class="page-header">
		<?php weaverx_archive_title( $title, 'search'); ?>
	</header>

		<?php
		weaverx_content_nav( 'nav-above', true );
		/* Start the Loop */

		weaverx_post_count_clear();
		weaverx_masonry('begin-posts');

		while ( have_posts() ) {

			the_post();
			weaverx_post_count_bump();


			/* Include the Post-Format-specific template for the content.
			 * If you want to overload this in a child theme then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			weaverx_masonry('begin-post');
			get_template_part( 'templates/content', get_post_format() );
			weaverx_masonry('end-post');

		}
		weaverx_masonry('end-posts');
		weaverx_content_nav( 'nav-below', true );
	} else { ?>

	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h1 class="page-title content-title entry-title title-search"><?php echo __( 'Nothing Found','weaver-xtreme'); ?></h1>
		</header><!-- .entry-header -->

		<?php
		if (!weaverx_getopt('_hide_not_found_search')) { ?>

		<div class="entry-content clearfix">
			<p><?php echo __( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.','weaver-xtreme'); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
		<?php
		}
		?>
	</article><!-- #post-0 -->

	<?php }

	weaverx_sb_postcontent('search');

	weaverx_page_tail( 'search', $sb_layout );    // end of page wrap
?>
