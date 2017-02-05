<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/**
 *  Category page template
 */
/*! ** DO NOT EDIT THIS FILE! It will be overwritten when the theme is updated! ** */


	global $weaverx_cur_page_ID;
	$weaverx_cur_page_ID = 0;

	$sb_layout = weaverx_page_lead( 'category', true );

	// and next the content area.
   weaverx_sb_precontent('category');

				if ( have_posts() ) {
					$msg = apply_filters('weaverx_category_archives', __( 'Category Archives: %s','weaver-xtreme'));
					$title = '<span class="category-title-label">' .
						sprintf( $msg, '</span><span class="archive-info">' . single_cat_title( '', false ) . '</span>' );
					?>

				<header class="page-header">
					<?php
						weaverx_archive_title( $title, 'category'  );
						$category_description = category_description();
						if ( ! empty( $category_description ) )
							echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
					?>
				</header>

				<?php
					weaverx_content_nav( 'nav-above' );

					/* The Loop */
					weaverx_archive_loop( 'category' );

					weaverx_content_nav( 'nav-below' );

				} else {
					weaverx_not_found_search(__FILE__);
				}

				weaverx_sb_postcontent('category');

	weaverx_page_tail( 'category', $sb_layout );    // end of page wrap
?>
