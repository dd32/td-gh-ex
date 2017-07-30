<?php
/**
 * The front page template file
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ariel
 */
get_header();
	/**
	 * Banner / Slider section
	 */
	get_template_part( 'parts/frontpage', 'banner' );
	/**
	 * Featured Posts / Pages section
	 */
	get_template_part( 'parts/frontpage', 'featured' );

	/**
	 * Frontpage set to Static page
	 */
	if ( get_option( 'show_on_front' ) == 'page' ) :
		/**
		 * Get page content and frontpage sidebar
		 */
		get_template_part( 'parts/entry', 'frontpage' );
	/**
	 * Frontpage set to Latest posts
	 */
	elseif ( get_option( 'show_on_front' ) == 'posts' ) :
		/**
		 * Blog feed
		 */
		get_template_part( 'parts/feed' );
	endif; //get_option( 'show_on_front' )

get_footer();