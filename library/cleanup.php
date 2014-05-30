<?php
/* 
 *
 */
	//	WordPress Head Clean up (remove rsd, uri links, junk css, ect)
	//	=================================================================
	//
	/**********************
	WP_HEAD GOODNESS
	The default wordpress head is
	a mess. Let's clean it up by
	removing all the junk we don't
	need.
	*********************/

	function bnw_head_cleanup() {
	
		// category feeds
		// remove_action( 'wp_head', 'feed_links_extra', 3 );
		
		// post and comment feeds
		// remove_action( 'wp_head', 'feed_links', 2 );
		
		// EditURI link
		remove_action( 'wp_head', 'rsd_link' );
		
		// windows live writer
		remove_action( 'wp_head', 'wlwmanifest_link' );
		
		// index link
		remove_action( 'wp_head', 'index_rel_link' );
		
		// previous link
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
		
		// start link
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
		
		// links for adjacent posts
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
		
		// WP version
		remove_action( 'wp_head', 'wp_generator' );
		
		// remove WP version from css
		add_filter( 'style_loader_src', 'bnw_remove_wp_ver_css_js', 9999 );
		
		// remove Wp version from scripts
		add_filter( 'script_loader_src', 'bnw_remove_wp_ver_css_js', 9999 );

	} /* end bnw head cleanup */
	
	//	Remove RSS Feed
	//	=================================================================
	//
	
	// remove WP version from RSS
	function bnw_rss_version() { return ''; }

	// remove WP version from scripts
	function bnw_remove_wp_ver_css_js( $src ) {
		if ( strpos( $src, 'ver=' ) )
			$src = remove_query_arg( 'ver', $src );
		return $src;
	}

	//	Remove injected CSS for recent comments widget
	//	=================================================================
	// 
	
	function bnw_remove_wp_widget_recent_comments_style() {
		if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
			remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
		}
	}
	
	//	Remove injected CSS from recent comments widget
	//	=================================================================
	//
	function bnw_remove_recent_comments_style() {
		global $wp_widget_factory;
		if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
			remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
		}
	}

	//	Remove injected CSS from gallery
	//	=================================================================
	//
	
	function bnw_gallery_style($css) {
		return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
	}
	
	//	RANDOM CLEANUP ITEMS
	//	=================================================================
	//

	// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
	function bnw_filter_ptags_on_images($content){
		return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
	}