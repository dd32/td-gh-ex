<?php echo get_avatar($comment, $size = '56'); ?>
<div class="media-body">
 	 <h5 class="media-heading"><?php echo get_comment_author_link(); ?></h5>
  	<time datetime="<?php echo comment_date('c'); ?>">
    	<a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID) ) ); ?>"><?php comment_date(); ?></a>
  	</time>
  	<?php edit_comment_link(__('(Edit)', 'ascend'), '', ''); ?>

  	<?php if ($comment->comment_approved == '0') : ?>
    <div class="alert">
    	<?php _e('Your comment is awaiting moderation.', 'ascend'); ?>
    </div>
  	<?php endif; ?>

  	<?php comment_text(); ?>
  
  	<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
