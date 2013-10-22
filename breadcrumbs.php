<?php
/**
 * The template for displaying breadcrumbs.
 *
 * @package	Anarcho Notepad
 * @since	2.1
 * @author	Arthur Gareginyan aka Brute9000 <arthurgareginyan@gmail.com>
 * @copyright 	Copyright (c) 2013, Arthur Gareginyan
 * @link      	http://mycyberuniverse.tk/anarcho-notepad.html
 * @license   	http://opensource.org/licenses/AGPL-3.0
 */
?>

<?php
// Breadcrumbs
function anarcho_breadcrumbs() {
 if(get_theme_mod('enable_breadcrumbs') == '1') {
	$delimiter = '&raquo;';
	$before = '<span>';
	$after = '</span>';
	echo '<nav id="breadcrumbs">';
	global $post;
	$homeLink = home_url();
	echo '<a href="' . $homeLink . '" style="font-family: FontAwesome; font-size: 20px; vertical-align: bottom;">&#xf015;</a> ' . $delimiter . ' ';
 if ( is_category() ) {
	global $wp_query;
	$cat_obj = $wp_query->get_queried_object();
	$thisCat = $cat_obj->term_id;
	$thisCat = get_category($thisCat);
	$parentCat = get_category($thisCat->parent);
 if ($thisCat->parent != 0) echo (get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ')) ;
	echo $before . __('Archive by category ', 'anarcho-notepad') . '"' . single_cat_title('', false) . '"' . $after;
 } elseif ( is_day() ) {
	echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
	echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
	echo $before . __('Archive by date ', 'anarcho-notepad') . '"' . get_the_time('d') . '"' . $after;
 } elseif ( is_month() ) {
	echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
	echo $before . __('Archive by month ', 'anarcho-notepad') . '"' . get_the_time('F') . '"' . $after;
 } elseif ( is_year() ) {
	echo $before . __('Archive by year ', 'anarcho-notepad') . '"' . get_the_time('Y') . '"' . $after;
 } elseif ( is_single() && !is_attachment() ) {
 if ( get_post_type() != 'post' ) {
	$post_type = get_post_type_object(get_post_type());
	$slug = $post_type->rewrite;
	echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>' . $delimiter . ' ';
	echo $before . get_the_title() . $after;
 } else {
	$cat = get_the_category(); $cat = $cat[0];
	echo ' ' . get_category_parents($cat, TRUE, ' ' . $delimiter . ' ') . ' ';
	echo $before . __('You&apos;re currently reading ', 'anarcho-notepad') . '"' . get_the_title() . '"' .  $after;
 }
 } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
	$post_type = get_post_type_object(get_post_type());
	echo $before . $post_type->labels->singular_name . $after;
 } elseif ( is_attachment() ) {
	$parent_id  = $post->post_parent;
	$breadcrumbs = array();
	while ($parent_id) {
	$page = get_page($parent_id);
	$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
	$parent_id    = $page->post_parent;
 }
	$breadcrumbs = array_reverse($breadcrumbs);
	foreach ($breadcrumbs as $crumb) echo ' ' . $crumb . ' ' . $delimiter . ' ';
	echo $before . 'You&apos;re currently viewing "' . get_the_title() . '"' . $after;
 } elseif ( is_page() && !$post->post_parent ) {
	echo $before . 'You&apos;re currently reading "' . get_the_title() . '"' . $after;
 } elseif ( is_page() && $post->post_parent ) {
	$parent_id  = $post->post_parent;
	$breadcrumbs = array();
	while ($parent_id) {
	$page = get_page($parent_id);
	$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
	$parent_id    = $page->post_parent;
 }
	$breadcrumbs = array_reverse($breadcrumbs);
	foreach ($breadcrumbs as $crumb) echo ' ' . $crumb . ' ' . $delimiter . ' ';
	echo $before . __('You&apos;re currently reading ', 'anarcho-notepad') . '"' . get_the_title() . '"' . $after;
 } elseif ( is_search() ) {
	echo $before . __('Search results for ', 'anarcho-notepad') . '"' . get_search_query() . '"' . $after;
 } elseif ( is_tag() ) {
	echo $before . __('Archive by tag ', 'anarcho-notepad') . '"' . single_tag_title('', false) . '"' . $after;
 } elseif ( is_author() ) {
	global $author;
	$userdata = get_userdata($author);
	echo $before . __('Articles posted by ', 'anarcho-notepad') . '"' . $userdata->display_name . '"' . $after;
 } elseif ( is_404() ) {
	echo $before . __('You got it ', 'anarcho-notepad') . '"' . 'Error 404 not Found' . '"&nbsp;' . $after;
 }
 if ( get_query_var('paged') ) {
 if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
	echo ('Page') . ' ' . get_query_var('paged');
 if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
 }
	echo '</nav>';
 }
}
// END-Breadcrumbs
?>
