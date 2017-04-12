<?php
/**
 * Astra Theme Strings
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0.0
 */

/**
 * Default Strings
 */
if ( ! function_exists( 'ast_default_strings' ) ) {

	/**
	 * Default Strings
	 *
	 * @since 1.0
	 * @param  string  $key  String key.
	 * @param  boolean $echo Print string.
	 * @return mixed        Return string or nothing.
	 */
	function ast_default_strings( $key, $echo = true ) {

		$defaults = apply_filters( 'ast_default_strings', array(

			// Header.
			'string-header-skip-link' 				 => esc_html( __( 'Skip to content', 'astra-theme' ) ),

			// 404 Page Strings.
			'string-404-sub-title'                   => esc_html( __( 'It looks like the link pointing here was faulty. May be try searching?', 'astra-theme' ) ),

			// Search Page Strings.
			'string-search-nothing-found'            => esc_html( __( 'Nothing Found', 'astra-theme' ) ),
			'string-search-nothing-found-message'    => esc_html( __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'astra-theme' ) ),
			'string-full-width-search-message'       => __( 'Start typing and press enter to search', 'astra-theme' ),
			'string-full-width-search-placeholder'   => __( 'Start Typing...', 'astra-theme' ),
			'string-header-cover-search-placeholder' => __( 'Start Typing...', 'astra-theme' ),
			'string-search-input-placeholder'        => __( 'Search ...', 'astra-theme' ),

			// Comment Template Strings.
			'string-comment-reply-link'              => __( 'Reply', 'astra-theme' ),
			'string-comment-edit-link'               => __( 'Edit', 'astra-theme' ),
			'string-comment-awaiting-moderation'     => __( 'Your comment is awaiting moderation.', 'astra-theme' ),
			'string-comment-title-reply'             => __( 'Leave a Comment', 'astra-theme' ),
			'string-comment-cancel-reply-link'       => __( 'Cancel Reply', 'astra-theme' ),
			'string-comment-label-submit'            => __( 'Post Comment &raquo;', 'astra-theme' ),
			'string-comment-label-message'           => __( 'Type here..', 'astra-theme' ),
			'string-comment-label-name'              => __( 'Name*', 'astra-theme' ),
			'string-comment-label-email'             => __( 'Email*', 'astra-theme' ),
			'string-comment-label-website'           => __( 'Website', 'astra-theme' ),
			'string-comment-closed'                  => esc_html( __( 'Comments are closed.', 'astra-theme' ) ),
			'string-comment-navigation-title'        => __( 'Comment navigation', 'astra-theme' ),
			'string-comment-navigation-next'         => esc_html( __( 'Newer Comments', 'astra-theme' ) ),
			'string-comment-navigation-previous'     => esc_html( __( 'Older Comments', 'astra-theme' ) ),

			// Blog Default Strings.
			'string-blog-page-links-before'          => esc_html( __( 'Pages:', 'astra-theme' ) ),
			'string-blog-meta-author-by'             => __( 'By ', 'astra-theme' ),
			'string-blog-meta-leave-a-comment'       => esc_html( __( 'Leave a Comment', 'astra-theme' ) ),
			'string-blog-meta-one-comment'           => esc_html( __( '1 Comment', 'astra-theme' ) ),
			'string-blog-meta-multiple-comment'      => esc_html( __( '% Comments', 'astra-theme' ) ),
			'string-blog-navigation-next'            => __( 'Next Page', 'astra-theme' ) . ' <span class="ast-right-arrow">&rarr;</span>',
			'string-blog-navigation-previous'        => '<span class="ast-left-arrow">&larr;</span> ' . __( 'Previous Page', 'astra-theme' ),

			// Single Post Default Strings.
			'string-single-page-links-before'        => esc_html( __( 'Pages:', 'astra-theme' ) ),
			'string-single-navigation-next'          => __( 'Next Post', 'astra-theme' ) . ' <span class="ast-right-arrow">&rarr;</span>',
			'string-single-navigation-previous'      => '<span class="ast-left-arrow">&larr;</span> ' . __( 'Previous Post', 'astra-theme' ),

			// Content None.
			'string-content-nothing-found-message'   => esc_html( __( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'astra-theme' ) ),

		), 1 );

		$output = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';

		/**
		 * Print or return
		 */
		if ( $echo ) {
			echo $output;
		} else {
			return $output;
		}
	}
}// End if().
