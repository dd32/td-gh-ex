<?php
/**
 * Post Shortcodes
 */

/** Chip Life Post Date Shortcode */
add_shortcode( 'chip_life_post_date', 'chip_life_post_date_shortcode' );
function chip_life_post_date_shortcode( $atts ) {
	
	/** Attributes */	
	$defaults = array( 'format' => '', 'before' => '', 'after'  => '', 'label'  => '' );
	$atts = shortcode_atts( $defaults, $atts );
	
	/** Manipulation */	
	$chip_life_options = get_chip_life_options();
	$chip_life_dt_format = $chip_life_options['chip_life_dt_format'];
	
	if( $chip_life_options['chip_life_dt'] == 'none' ):
		return;
		
	elseif( ! empty( $atts['format'] ) ):	
		$post_date = get_the_time( $atts['format'] );	
	
	elseif( $chip_life_options['chip_life_dt'] == 'custom' && !empty( $chip_life_dt_format ) ): 
		$post_date = get_the_time( $chip_life_dt_format );
	
	else:
		$post_date = get_the_date() . " " . get_the_time();
	
	endif;
	
	/** Output */
	$output = sprintf( '<span class="post-date post-published post-time" title="%4$s"><a href="%5$s" title="%6$s" rel="bookmark">%1$s%3$s%4$s%2$s</a></span> ', $atts['before'], $atts['after'], $atts['label'], $post_date, get_permalink(), the_title_attribute( 'echo=0' ) );
	return apply_filters( 'chip_life_post_date_shortcode_output', $output, $atts );

}

/** Chip Life Post Edit Shortcode */
add_shortcode( 'chip_life_post_edit', 'chip_life_post_edit_shortcode' );
function chip_life_post_edit_shortcode( $atts ) {

	/** Attributes */	
	$defaults = array( 'link'   => '(Edit)', 'before' => '', 'after'  => ''	);
	$atts = shortcode_atts( $defaults, $atts );

	/** Manipulation */	
	ob_start();
	edit_post_link( $atts['link'], $atts['before'], $atts['after'] );
	$edit = ob_get_clean();

	/** Output */	
	$output = '';
	if ( ! empty( $edit ) ) {
	$output = '<span class="post-edit">' . $edit . '</span>';
	}
	return apply_filters( 'chip_life_post_edit_shortcode_output', $output, $atts );

}

/** Chip Life Post Categories Shortcode */
add_shortcode( 'chip_life_post_categories', 'chip_life_post_categories_shortcode' );
function chip_life_post_categories_shortcode( $atts ) {

	/** Attributes */	
	$defaults = array( 'sep' => ', ', 'before' => 'Filed Under: ', 'after' => '' );
	$defaults = apply_filters( 'chip_life_post_categories_shortcode_defaults', $defaults );
	$atts = shortcode_atts( $defaults, $atts );
	
	/** Manipulation */	
	$chip_life_options = get_chip_life_options( 'chip_life_options' );
	$cats = get_the_category_list( trim( $atts['sep'] ) . ' ' );
	if( ! $cats || $chip_life_options['chip_life_category_display'] != 1 ) {
		return;
	}

	/** Output */
	$cats = apply_filters( 'chip_life_post_categories_shortcode_output', $cats );		
	$output = sprintf( '<span class="post-categories">%2$s%1$s%3$s</span> ', $cats, $atts['before'], $atts['after'] );
	return $output;

}

/** Chip Life Post Tags Shortcode */
add_shortcode( 'chip_life_post_tags', 'chip_life_post_tags_shortcode' );
function chip_life_post_tags_shortcode( $atts ) {

	/** Attributes */	
	$defaults = array( 'sep' => ', ', 'before' => 'Tagged With: ', 'after'  => '' );
	$defaults = apply_filters( 'chip_life_post_tags_shortcode_defaults', $defaults );
	$atts = shortcode_atts( $defaults, $atts );

	/** Manipulation */	
	$chip_life_options = get_chip_life_options( 'chip_life_options' );
	$tags = get_the_tag_list( $atts['before'], trim( $atts['sep'] ) . ' ', $atts['after'] );
	
	if ( ! $tags || $chip_life_options['chip_life_tags_display'] != 1 ) {
		return;
	}

	/** Output */
	$tags = apply_filters( 'chip_life_post_tags_shortcode_output', $tags );
	$output = sprintf( '<span class="post-tags">%1$s</span> ', $tags );
	return $output;	

}

/**
 * Author Shortcodes
 */

/** Chip Life Post Autor Posts Link Shortcode */
add_shortcode( 'chip_life_post_author_posts_link', 'chip_life_post_author_posts_link_shortcode' );
function chip_life_post_author_posts_link_shortcode( $atts ) {

	/** Attributes */	
	$defaults = array( 'before' => '', 'after'  => '' );
	$atts = shortcode_atts( $defaults, $atts );

	/** Manipulation */	
	ob_start();
	the_author_posts_link();
	$author = ob_get_clean();

	/** Output */
	$output = sprintf( '<span class="post-author post-vcard">%2$s<span class="fn">%1$s</span>%3$s</span>', $author, $atts['before'], $atts['after'] );
	return apply_filters( 'chip_life_post_author_posts_link_shortcode_output', $output, $atts );

}

/**
 * Comments Shortcodes
*/

/** Chip Life Post Comments Shortcode */
add_shortcode( 'chip_life_post_comments', 'chip_life_post_comments_shortcode' );
function chip_life_post_comments_shortcode( $atts ) {

	
	/** Attributes */
	$defaults = array( 'zero' => 'Leave a Comment', 'one' => '1 Comment', 'more' => '% Comments', 'hide_if_off' => 'enabled', 'before' => '', 'after' => '' );
	$defaults = apply_filters( 'chip_life_post_comments_shortcode_defaults', $defaults );
	$atts = shortcode_atts( $defaults, $atts );

	/** Manipulation */
	$chip_life_options = get_chip_life_options();	
	
	if ( ( $chip_life_options['chip_life_comments_posts'] != 1 || ! comments_open() ) && 'enabled' === $atts['hide_if_off'] ) {
		return;
	}

	ob_start();
	comments_number( $atts['zero'], $atts['one'], $atts['more'] );
	$comments = ob_get_clean();
	
	/** Output */
	$comments = sprintf( '<a href="%s">%s</a>', get_comments_link(), $comments );
	$output = sprintf( '<span class="post-comments">%2$s%1$s%3$s</span>', $comments, $atts['before'], $atts['after'] );
	return apply_filters( 'chip_life_post_comments_shortcode_output', $output, $atts );
}
?>