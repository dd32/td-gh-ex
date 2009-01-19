<?php
if ( function_exists('register_sidebars') )
 register_sidebars(2,array(
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
    ));
?>
<?php
function widget_mytheme_search() {
?>
    
<form id="searchform" method="get" action="<?php bloginfo('home'); ?>/">
<input type="text" value="To Search: type, hit enter" onfocus="if (this.value == 'To Search: type, hit enter') {this.value = '';}" onblur="if (this.value == '') {this.value = 'To Search: type, hit enter';}" size="18" maxlength="50" name="s" id="s" />
</form>
    
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_mytheme_search');
?>
<?php
add_filter( 'wp_list_pages', 'random_filter' );
function random_filter( $content ){
	if( !empty($content) )
		$lines = explode( "\n", $content );

	$findme = '<li class="';
	$findme2 = '<li class="';
	$replace = $findme . 'stripe ';
	$replace = $findme2 . 'stripe ';
	$count = 1;
	foreach( (array)$lines as $k => $l ){
		if( 0 === strpos( $l, $findme ) ){
			if( $count % 2 == 0 )
				$l = substr_replace( $l, $replace, 0, strlen( $findme ) );

			$o .= "\n" . $l;
			$count++;
		}
	}
	return $o;
}
?>
<?php
define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/images/header.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 884);
define('HEADER_IMAGE_HEIGHT', 238);
define( 'NO_HEADER_TEXT', true );

function shipsahoy_admin_header_style() {
?>
<style type="text/css">
#headimg {
	background: url(<?php header_image() ?>) no-repeat;
}
#headimg {
	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
}

#headimg h1, #headimg #desc {
	display: none;
}
</style>
<?php
}
function shipsahoy_header_style() {
?>
<style type="text/css">
#header {
	background: url(<?php header_image() ?>) no-repeat;
}
</style>
<?php
}
if ( function_exists('add_custom_image_header') ) {
	add_custom_image_header('shipsahoy_header_style', 'shipsahoy_admin_header_style');
}
?>
<?php
add_filter('comments_template', 'legacy_comments');
function legacy_comments($file) {
	if(!function_exists('wp_list_comments')) : // WP 2.7-only check
		$file = TEMPLATEPATH . '/legacy.comments.php';
	endif;
	return $file;
}
?>
<?php
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
       <div class="commentinfo">
       
       <div class="comment-author vcard">
     
         <?php echo get_avatar($comment,$size='32',$default='<path_to_url>' ); ?>
         <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
     
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

      <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
		</div><!-- end comment info class -->
      <?php comment_text() ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php
        }
?>