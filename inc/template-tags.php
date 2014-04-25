<?php 
// PRINT OPENING MARKUP FOR ENTRY HEADER.
function ThemingStrap_entry_header_markup_open() {
	echo '<ul class="post-meta list-unstyled list-inline">';
}
add_action( 'ThemingStrap_entry_header', 'ThemingStrap_entry_header_markup_open', 5 );

if ( ! function_exists( 'ThemingStrap_do_posted_on' ) ) :
/**
 * Prints HTML with date posted information for the current post.
 */
function ThemingStrap_do_posted_on() {

	printf( __( '<li><span class="published-date"><span class="glyphicon glyphicon-calendar"></span> <a href="%1$s" title="%2$s"><time class="entry-date" datetime="%3$s">%4$s</time></a></span></li>', 'ThemingStrap' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
}
add_action( 'ThemingStrap_entry_header', 'ThemingStrap_do_posted_on', 6 );
endif;

if ( ! function_exists( 'ThemingStrap_do_post_author' ) ) :
function ThemingStrap_do_post_author() {

	printf( __( '<li><span class="byline"><span class="glyphicon glyphicon-user"></span> <span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span></span></li>', 'ThemingStrap' ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'ThemingStrap' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
add_action( 'ThemingStrap_entry_header', 'ThemingStrap_do_post_author', 7 );
endif;


if ( ! function_exists( 'ThemingStrap_do_post_comments_link' ) ):
function ThemingStrap_do_post_comments_link() {

	if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) { ?>
		<li><span class="comments-link">
			<span class="glyphicon glyphicon-comment"></span>
			<?php comments_popup_link( __( ' Leave a comment', 'ThemingStrap' ), __( ' 1 Comment', 'ThemingStrap' ), __( ' % Comments', 'ThemingStrap' ) ); ?>
		</span></li>
	<?php }
}
add_action( 'ThemingStrap_entry_header', 'ThemingStrap_do_post_comments_link', 8 );
endif;

/**
 * PRINT CLOSING MARKUP FOR ENTRY HEADER
 */
function ThemingStrap_entry_header_markup_close() {
	echo '</ul>';
}
add_action( 'ThemingStrap_entry_header', 'ThemingStrap_entry_header_markup_close', 9 );





if ( ! function_exists( 'ThemingStrap_do_post_categories' ) ):
/**
 * Customize the list of categories displayed on index and on a post
 * @since 0.3
 */
function ThemingStrap_do_post_categories() {

	$post_categories = get_the_category();
	if ( $post_categories ) {

		echo '<div class="templatetags"><span class="cat-post"><span class="glyphicon glyphicon-folder-open"></span> ';
		$num_categories = count( $post_categories );
		$category_count = 1;

		foreach ( $post_categories as $category ) {
			$html_before = '<a href="' . get_category_link( $category->term_id ) . '" class="cat-text">';
			$html_after = '</a>';

			if ( $category_count < $num_categories )
				$sep = ', ';
			elseif ( $category_count == $num_categories )
				$sep = '';
				echo $html_before . $category->name . $html_after . $sep;
				$category_count++;
			}
		echo '</span></div>';
	}
}
add_action( 'ThemingStrap_entry_footer', 'ThemingStrap_do_post_categories', 6 );
endif;



if ( ! function_exists( 'ThemingStrap_do_post_tags' ) ):
/**
 * Customize the list of tags displayed on index and on a post
 * @since 0.3
 */
function ThemingStrap_do_post_tags() {


	$post_tags = get_the_tags();
	if ( $post_tags ) {

		echo '<span class="tags-post"><span class="glyphicon glyphicon-tag"></span> ';
		$num_tags = count( $post_tags );
		$tag_count = 1;

		foreach( $post_tags as $tag ) {
			$html_before = '<a href="' . get_tag_link($tag->term_id) . '" rel="tag nofollow" class="tag-text">';
			$html_after = '</a>';

			if ( $tag_count < $num_tags )
				$sep = ', ';
			elseif ( $tag_count == $num_tags )
				$sep = '';

			echo $html_before . $tag->name . $html_after . $sep;
			$tag_count++;
		}
		echo '</span>';
	}
}
add_action( 'ThemingStrap_entry_footer', 'ThemingStrap_do_post_tags', 7 );
endif;
