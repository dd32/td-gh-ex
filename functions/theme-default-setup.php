<?php 
/*
 * thumbnail list
*/ 
function besty_thumbnail_image($content) {
    if( has_post_thumbnail() )
         return the_post_thumbnail( 'thumbnail' ); 
}
/*
 * besty Title
*/
function besty_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() ) {
		return $title;
	}
	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );
	// Add the site description for the home/front page.
	$besty_site_description = get_bloginfo( 'description', 'display' );
	if ( $besty_site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $besty_site_description";
	}
	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		/* translators: 1: page number */
		$title = "$title $sep " . sprintf( __( 'Page %s', 'besty' ), max( $paged, $page ) );
	}
	return $title;
}
add_filter( 'wp_title', 'besty_wp_title', 10, 2 );
/*
 * besty Set up post entry meta.
 *
 * Meta information for current post: categories, tags, permalink, author, and date.
 */
function besty_entry_meta() {
	
	$besty_year = get_the_time( 'Y');
	$besty_month = get_the_time( 'm');
	$besty_day = get_the_time( 'd');
	
	$besty_category_list = get_the_category_list() ?  '<li><i class="fa fa-folder-open"></i> '.get_the_category_list(', ').'</li>' : '';
	
	$besty_tag_list = get_the_tag_list() ? '<li><i class="fa fa-tags"></i> ' .get_the_tag_list('',', ').'</li>' : '';
	
	$besty_date = sprintf( '<li><i class="fa fa-calendar"></i> <a href="%1$s" title="%2$s"> <time datetime="%3$s">%4$s</time></a></li>',
		esc_url( get_day_link( $besty_year, $besty_month, $besty_day)),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date('d M, Y') )
	);
	$besty_author = sprintf( '<li><i class="fa fa-user"></i> <a href="%1$s" title="%2$s" >%3$s</a></li>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		/* translators: 1: author name */
		esc_attr( sprintf( __( 'View all posts by %s', 'besty' ), get_the_author() ) ),
		get_the_author()
	);
	if(comments_open()) { 
		if(get_comments_number()>=1)
			$besty_comments = '<li><i class="fa fa-comment"></i> '.get_comments_number().'</li>';
		else
			$besty_comments = '';
	} else {
		$besty_comments = '';
	}
	printf('%1$s %2$s %3$s %4$s %5$s',
		$besty_date,
		$besty_author,		
		$besty_comments,
		$besty_tag_list,
		$besty_category_list
	);
} ?>