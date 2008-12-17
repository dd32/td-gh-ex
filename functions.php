<?php
// check functions
  if ( function_exists('wp_list_bookmarks') ) //used to check WP 2.1 or not
    $numposts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type='post' and post_status = 'publish'");
	else
    $numposts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish'");
  if (0 < $numposts) $numposts = number_format($numposts); 
	$numcmnts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1'");
		if (0 < $numcmnts) $numcmnts = number_format($numcmnts);
// ----------------

load_theme_textdomain('ayumi');

function j_ShowAbout() { ?>
<li class="about" id="img">
<img src="<?php header_image(); ?>" alt="You Avatar" id="avatr"  /><br />
<span><?php the_author_description(); ?> </span> 
  </li>
<?php }	function j_ShowRecentPosts() {?>
<li class="boxy last">
  <h2>Recent Post</h2>
  <ul>
    <?php wp_get_archives('type=postbypost&limit=10');?>
  </ul>
</li>
<?php }	?>
<?php

if ( function_exists('register_sidebars') )
	register_sidebars(2);


define('HEADER_IMAGE', '%s/images/you.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 438);
define('HEADER_IMAGE_HEIGHT', 199);
define('HEADER_TEXTCOLOR', 'fff');

function admin_header_style() { ?>
<style type="text/css">
#img,#headimg {
        background: #fff url(<?php header_image(); ?>) right top no-repeat;
        height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
        width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
}
#headimg h1, #headimg #desc {
	display: none;
}
</style>

<?php }

function header_style() { ?>

<style type="text/css">
#img {
}

<?php if ( 'blank' == get_header_textcolor() ) { ?>

#img h1 {
        display: none;
}

<?php }else{ ?>

#img h1 a{
        color: #<?php header_textcolor(); ?>;
}
#img .description {
        display: none;
}
<?php } ?>

</style>

<?php }

if ( function_exists('add_custom_image_header') ) {
  add_custom_image_header('header_style', 'admin_header_style');
} 

/* There you go, have a nice day */

/* WordPress 2.7 and Later on */
add_filter('comments_template', 'legacy_comments');
function legacy_comments($file) {
	if(!function_exists('wp_list_comments')) 	$file = TEMPLATEPATH . '/old.comments.php';
	return $file;
}

add_filter('get_comments_number', 'comment_count', 0);
function comment_count( $count ) {
	global $id;
	$comments_by_type = &separate_comments(get_comments('post_id=' . $id));
	return count($comments_by_type['comment']);
}

function list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
?>
        <li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?> <span><?php comment_date('d m y'); ?></span>
<?php } 

function list_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
   <div id="div-comment-<?php comment_ID() ?>" class="thechild">
      <div class="cleft">
         <?php echo get_avatar($comment, 52); ?>
	  </div>
      <div class="cright">      
      <div class="comment-author vcard by">
         <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

      <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>

      <?php comment_text() ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
    </div>
      </div>
   </li>               
<?php
        }
?>