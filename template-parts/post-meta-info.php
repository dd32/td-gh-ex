<?php
/**
 * The template file to display the post meta info
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
$post_meta_array[] = '<span class="post-meta-item post-meta-author author">' . get_the_author_link() . '</span>';

// Get the post categories.
$post_meta_array[] = '<span class="post-meta-item post-meta-categories">' . get_the_category_list( ', ' ) . '</span>';

// Filter the post meta array.
$post_meta_array = apply_filters( 'agncy_post_meta_array', $post_meta_array, get_the_id() );

// implode and escape the array with the filtered divider.
echo wp_kses_post( implode( '', $post_meta_array ) );

?>
</div>
