<?php
if ( function_exists('register_sidebar') )
    register_sidebars(5,array(
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));

load_theme_textdomain( '5years' );

/* start of 5 Years custom categories links */
function my_projects($args) {
	extract($args);
	echo "$before_widget $before_title "._e("Projects", "5years")." $after_title<ul>";
	get_links('8', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE);
	echo "</ul> $after_widget";
}

function my_socnet($args) {
	extract($args);
	echo "$before_widget $before_title "._e("Social Networks", "5years")." $after_title <ul>";
	get_links('205', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE);
	echo "</ul> $after_widget";
}

function my_blogers($args) {
	extract($args);
	echo "$before_widget $before_title "._e("Bloggers", "5years")." $after_title<ul>";
	get_links('13', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE);
	echo "</ul> $after_widget";
}

function my_friends($args) {
	extract($args);
	echo "$before_widget $before_title "._e("Friends", "5years")." $after_title<ul>";
	get_links('14', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE);
	echo "</ul> $after_widget";
}
/* end of 5 Years custom categories links */

/* start of 5Years comment link styling */
function comment_link_out() {
	global $post;
	if ( comments_open() || $post->comment_count > 0) {
		echo '<a href="'; the_permalink(); echo '#comments" '; comment_hot($post->comment_count); echo '>'; comments_number(__('No comments', '5years'), __('1 comment', '5years'), __('% comments', '5years') ); echo '</a>';
	} else {
		echo comment_hot($post->comment_count); _e("Comments Off", "5years");
	}
}
function comment_hot() {
	global $post;
	$com_num = $post->comment_count;

	if ( $com_num > 0 && $com_num < 10 ) {
		echo 'class="mild"';
	} elseif ( $com_num >= 10 ) {
		echo 'class="hot"';
	}
	
}
/* end of 5Years comment link styling */

/* start of 5Years blog stats */
function myblog_start() {
	global $wpdb;
	$firstpost = query_posts('numberposts=1&orderby=ID&order=ASC');
	echo substr($firstpost[0]->post_date_gmt, 0, 4);	
}
function myblog_stats() {
	global $wpdb;

	// Set date and time locale to active blog language
	setlocale(LC_ALL, str_replace( "-", "_", get_bloginfo('language') ));
	$locale = localeconv();
	$thousands_sep = $locale['thousands_sep'];
	$dec_point = $locale['decimal_point'];

	// get number of posts and comments on blog
	// couresty of http://perishablepress.com/press/2006/08/28/display-total-number-of-posts/
	$numposts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish'");
	if (0 < $numposts) $numposts = number_format_i18n($numposts);
	$numcomms = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1'");
	if (0 < $numcomms) $numcomms = number_format_i18n($numcomms);

	// get GMT date timestamp of firest blog post
	$firstpost = query_posts('numberposts=1&orderby=ID&order=ASC');
	$timestamp = strtotime($firstpost[0]->post_date_gmt);

	// format stats output
	echo sprintf(__('Since %s published %s posts and received %s comments.', '5years'), gmstrftime(__('%B %d, %Y', '5years'), $timestamp), $numposts, $numcomms);
}
/* end of 5Years blog stats */

/**
 * If more than one page exists, return TRUE.
 * http://www.ericmmartin.com/conditional-pagepost-navigation-links-in-wordpress-redux/
 */
function show_posts_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}

?>
