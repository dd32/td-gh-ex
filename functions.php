<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
       /* 'before_widget' => '<li id="%1$s" class="widget %2$s">',*/
       /* 'after_widget' => '</li>',*/
        'before_title' => '<div class="widgettitle"><h2><b>',
        'after_title' => '</b></h2></div>',
    ));
?>
<?php
function widget_override_search(){
?>
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<div><input type="text" value="<?php if(is_search() ) { the_search_query(); } else { echo 'Search...'; } ?>" name="s" id="s" onfocus="if(this.value=='Search...')this.value='<?php the_search_query(); ?>'" onblur="if(this.value=='')this.value='Search...'" />
</div>
</form>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget('Search', 'widget_override_search');
?>
<?php
/**
 * comments_popup_link() - Displays the link to the comments popup window for the current post ID.
 *
 * Is not meant to be displayed on single posts and pages. Should be used on the lists of posts
 *
 * @since 0.71
 * @uses $id
 * @uses $wpcommentspopupfile
 * @uses $wpcommentsjavascript
 * @uses $post
 *
 * @param string $zero The string to display when no comments
 * @param string $one The string to display when only one comment is available
 * @param string $more The string to display when there are more than one comment
 * @param string $css_class The CSS class to use for comments
 * @param string $none The string to display when comments have been turned off
 * @return null Returns null on single posts and pages.
 */
function override_comments_popup_link( $zero = 'No Comments', $one = '1 Comment', $more = '% Comments', $css_class = '', $none = 'Comments Off' ) {
	global $id, $wpcommentspopupfile, $wpcommentsjavascript, $post;

	if ( is_single() || is_page() )
		return;

	$number = get_comments_number( $id );

	if ( 0 == $number && 'closed' == $post->comment_status && 'closed' == $post->ping_status ) {
		echo '<span' . ((!empty($css_class)) ? ' class="' . $css_class . '"' : '') . '>' . $none . '</span>';
		return;
	}

	if ( !empty($post->post_password) ) { // if there's a password
		if ( !isset($_COOKIE['wp-postpass_' . COOKIEHASH]) || $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) {  // and it doesn't match the cookie
			echo __('Enter your password to view comments');
			return;
		}
	}

if ($number > 0) $css_class = 'hascomments2';
else $css_class = 'nocomments2';

	echo '<span' . ((!empty($css_class)) ? ' class="' . $css_class . '"' : '') . '><a href="';
	if ( $wpcommentsjavascript ) {
		if ( empty( $wpcommentspopupfile ) )
			$home = get_option('home');
		else
			$home = get_option('siteurl');
		echo $home . '/' . $wpcommentspopupfile . '?comments_popup=' . $id;
		echo '" onclick="wpopen(this.href); return false"';
	} else { // if comments_popup_script() is not in the template, display simple comment link
		if ( 0 == $number )
			echo get_permalink() . '#respond';
		else
			comments_link();
		echo '"';
	}

	if ( !empty( $css_class ) ) {
		echo ' class="'.$css_class.'" ';
	}
	$title = attribute_escape( get_the_title() );

	echo apply_filters( 'comments_popup_link_attributes', '' );

	echo ' title="' . sprintf( __('Comment on %s'), $title ) . '">';
	comments_number( $zero, $one, $more, $number );
	echo '</a></span>';
}
?>
<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
       /* 'before_widget' => '<li id="%1$s" class="widget %2$s">',*/
       /* 'after_widget' => '</li>',*/
        'before_title' => '<div class="widgettitle"><h2><b>',
        'after_title' => '</b></h2></div>',
    ));
?>