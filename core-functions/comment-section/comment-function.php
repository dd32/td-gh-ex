<?php
// code for comment
if ( ! function_exists( 'asiathemes_comment' ) ) :
function asiathemes_comment( $comment, $args, $depth ) 
{
	$GLOBALS['comments'] = $comment;
	//get theme data
	global $comment_data;

	//translations
	$leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] : 
	__('Reply','becorp');?>
		
		<div class="comment-box clearfix">
         <div class="avatar">
			   <?php echo get_avatar($comment,$size = '60'); ?>

		</div>
			<div class="comment-content">
			<div class="comment-meta">
				<span class="comment-by"><?php the_author();?></span>
				<span class="comment-date"><?php comment_date('F j, Y');?>&nbsp;<?php _e('at','becorp');?>&nbsp;<?php comment_time('g:i a'); ?></span>
				<span class="reply-link"><a href="#"><?php comment_reply_link(array_merge( $args, array('reply_text' => $leave_reply,'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a></span>
			</div>
			<p><?php comment_text() ;?></p>
			</div>
			</div>
<?php
}
endif;
add_filter('get_avatar','asiathemes_add_gravatar_class');
function asiathemes_add_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='uthor-image", $class);
    return $class;
}
?>