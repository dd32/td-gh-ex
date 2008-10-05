<div id="comments">
<?php if ( !empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
<p><?php _e('Enter your password to view comments.'); ?></p>
<?php return; endif; ?>

<?php if ( comments_open() ) : ?><h4><?php comments_number(__('No comment'), __('1 comment'), __('% comments')); ?></h4>
<?php endif; ?>

<?php if ( $comments ) : ?>

<ul id="commentlist">

<?php foreach ($comments as $comment) : ?>

<li<?php /* For different background colors */
					if(the_author('', false) == get_comment_author()) { ?> class="commentauthor" <?php } else { ?>class="guest" <?php } ?> id="comment-<?php comment_ID() ?>">
                    
 <div class="infospace">
 
				<p><?php echo get_avatar( $comment, 80 ); ?></p>
<p><?php comment_type(__('Comment'), __('Trackback'), __('Pingback')); ?> <?php _e('by'); ?><br /><?php comment_author_link() ?><br /> <a href="#comment-<?php comment_ID() ?>" ><?php comment_date('j M Y') ?><br /> </a> <?php edit_comment_link(__("Edit")); ?></p>

 <?php if ($comment->comment_approved == '0') : ?>
<p>      <em>Your comment is awaiting moderation.</em></p>
      <?php endif; ?>
      </div>
      <div class="textspace">
      <?php comment_text() ?>
      </div>
      <div class="clear"></div>
      </li>
      <?php endforeach; ?>
</ul>
<?php endif; ?>

<?php if ( comments_open() ) : ?>

<div id="respond">
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>
<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out') ?>">Logout</a></p>

<?php else : ?>
<p> <input type="text" name="author" id="author" value="<?php echo $comment_author; ?> " size="22" tabindex="1"  onfocus="this.value=''" /><br />
<small>Name</small>
</p>
      <p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2"  onfocus="this.value=''" /><br /><small>Email (will not pubblished)</small></p>
      <p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" onfocus="this.value=''" /><br /><small>Website/URL</small></p>
 <?php endif; ?>
   
<p><textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea></p>
     <div id="bt">
     
      <p><input type="submit" id="send" value="" /></p>
      
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</div>

<?php do_action('comment_form', $post->ID); ?>
</form>
</div>
<?php endif; // If registration required and not logged in ?>

<?php else : // Comments are closed ?>
<p><?php _e('Sorry, comments are closed.'); ?></p>
<?php endif; ?>


</div>