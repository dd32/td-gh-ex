<?php

//////////////////////////////////////////
// Set languages
load_theme_textdomain( 'birdsite', TEMPLATEPATH . '/languages' );

//////////////////////////////////////////
// Set Widgets
function birdsite_widgets_init() {

	if ( function_exists('register_sidebar') ){
		register_sidebar( array (
			'name' => 'widget-area',
			'id' => 'widget-area',
			'description' => 'Widget Area for footer',
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );
	}
}

//////////////////////////////////////////
// SinglePage Comment callback
function birdsite_custom_comments($comment, $args) {

	$GLOBALS['comment'] = $comment;

?>

	<li id="comment-<?php comment_ID() ?>">
		<?php echo get_avatar( $comment, 40 ); ?>
		<div class="author"><?php comment_author(); ?></div>
		<div class="posted"><?php echo get_comment_time(get_option('date_format') .' H:i'); ?></div>
		<?php comment_text(); ?>
		<?php $author_url = get_comment_author_url();if(!empty($author_url)): ?>
			<p><a href="<?php echo $author_url; ?>" target="_blank"><?php echo $author_url; ?></a></p>
		<?php endif; ?>
<?php
	// no "</li>" conform WORDPRESS
}

//////////////////////////////////////////////////////
// Pagenation
function birdsite_the_pagenation() {

	global $wp_rewrite;
	global $wp_query;
	global $paged;

	$paginate_base = get_pagenum_link(1);
	if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
		$paginate_format = '';
		$paginate_base = add_query_arg('paged', '%#%');
	} else {
		$paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/') .
		user_trailingslashit('page/%#%/', 'paged');;
		$paginate_base .= '%_%';
	}
	echo paginate_links( array(
		'base' => $paginate_base,
		'format' => $paginate_format,
		'total' => $wp_query->max_num_pages,
		'mid_size' => 3,
		'current' => ($paged ? $paged : 1),
	));
}

//////////////////////////////////////////////////////
// Show thumbnail
function birdsite_the_thumbnail() {

	global $post;

	$id = (int) $post->ID;
	if ( $id == 0 ) {
		return false;
	}

	$html = '';
	$thumbnail = '';
	$attachments = get_children(array('post_parent' => $id, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order', 'showposts' => '1'));
    if (is_array($attachments) ){
		foreach($attachments as $attachment){
			$thumbnail = wp_get_attachment_thumb_url(intval($attachment->ID));
			$html .= '<img src="' .$thumbnail .'" alt="' .$post->post_title .'" />';
		}
	}

	echo $html;
}

//////////////////////////////////////////////////////
// Show thumbnail title
function birdsite_the_thumbnail_title( $title ) {

	$title = mb_strimwidth ($title, 0, 44, "...",utf8);
	echo $title;
}

//////////////////////////////////////////////////////
// Show Images for SinglePage
function birdsite_the_images() {

	global $post;

	$id = (int) $post->ID;
	if ( $id == 0 ) {
		return false;
	}

	$html = '';
	$thumbnail = '';
	$attachments = get_children(array('post_parent' => $id, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order'));
    if (is_array($attachments) ){
		foreach($attachments as $attachment){
			$image = wp_get_attachment_url(intval($attachment->ID));
			$html .= '<img src="' .$image .'" alt="' .$post->post_title .'" />';
		}
	}

	echo $html;

}

//////////////////////////////////////////////////////
// Add FeedIcon
function birdsite_setup() {
	add_theme_support( 'automatic-feed-links' );
}


add_action( 'widgets_init', 'birdsite_widgets_init' );
automatic_feed_links();

?>