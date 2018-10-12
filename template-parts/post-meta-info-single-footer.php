<?php
/**
 * The template file to display the post meta info in the single view
 *
 * @package agncy
 */

?>
<div class="post_meta_info color-secondary--a-hover">
<?php

// Initialize the array.
$post_meta_array = array();

// Generate the date and add it to the array.
$post_meta_array[] = '<span class="post-meta-item post-meta-datetime published"> <a rel="bookmark" href="' . get_permalink() . '">' . get_the_date() . '</a> </span>';

// Get the post author.
$post_meta_array[] = '<span class="vcard author"><span class="post-meta-item post-meta-author fn">' . get_the_author_link() . '</span></span>';

// Get the post categories.
$post_meta_array[] = '<span class="post-meta-item post-meta-categories">' . get_the_category_list( ', ' ) . '</span>';

// Get the post tags.
if ( has_tag() ) {
	$post_meta_array[] = '<span class="post-meta-item post-meta-tags">' . get_the_tag_list( '', ', ' ) . '</span>';
}

// Get the comments.
if ( comments_open() || get_comments_number() ) {
	$comments_number   = get_comments_number();
	$post_meta_array[] = '<span class="post-meta-item post-meta-comments">' . sprintf(
		esc_html(
			// translators: The amount of comments of this post.
			_nx(
				'%1$s comment',
				'%1$s comments',
				$comments_number,
				'comments title',
				'agncy'
			)
		),
		number_format_i18n( $comments_number )
	) . '</span>';
}

// Filter the post meta array.
$post_meta_array = apply_filters( 'agncy_post_meta_array', $post_meta_array, get_the_id() );

// implode and escape the array with the filtered divider.
echo wp_kses_post( implode( '', $post_meta_array ) );

?>
</div>
