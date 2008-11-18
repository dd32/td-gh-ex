<?php if ( !empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>

<p>Speak friend, and enter!</p>

<?php return; endif; ?>



<?php if ( $comments ) : ?>

<h2 id="comments">Comments</h2>

<?php foreach ($comments as $comment) : ?>



<div class="comment">

  <div class="gravatar">
    <?php if (function_exists('get_avatar')) { echo get_avatar($comment,$size='48'); } ?>
  </div>
<p class="commenticon" id="comment-<?php comment_ID() ?>">
<strong><a href="#comment-<?php comment_ID() ?>" title="Link to this comment"><?php comment_type('Comment','Trackback','Pingback'); ?></a></strong> from <strong><?php if ('' != get_comment_author_url()) { ?><a href="<?php comment_author_url(); ?>"><?php comment_author() ?></a><?php } else { comment_author(); } ?></strong>
<br />
<strong>Time:</strong> <?php comment_date('Y-m-d - H:i') ?></p>
<?php comment_text() ?>



<?php if ($comment->comment_approved == '0') : ?>

<p><strong>Your comment stands in line for moderation.</strong></p>

<?php endif; ?>

</div>



<?php endforeach; ?>

<?php endif; ?>

<?php if ( comments_open() ) : ?>

<?php endif; ?>



<?php if ( comments_open() ) : ?>

<div id="commentsection">

<h3 id="respond">Write a comment</h3>

<form action="<?php echo get_settings('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) { ?>
				<p class="unstyled">Logged as <a href="<?php echo get_settings('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_settings('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>">Logga ut</a></p>
<?php } ?>
  
<p><label for="author">Name:</label><br />
<input type="text" name="author" id="author" class="textarea" value="<?php echo $comment_author; ?>" size="28" tabindex="1" /><input type="hidden" name="comment_post_ID" value="<?php echo $post->ID; ?>" />
<p><label for="email">E-mail:</label><br />
<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="28" tabindex="2" /></p>
<p><label for="url">Website:</label><br />
<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="28" tabindex="3" /></p>

<p><label for="comment">Comment:</label><br />

<textarea name="comment" id="comment" cols="66" rows="7" tabindex="4"></textarea></p>

<p><input name="submit" id="submit" type="submit" tabindex="5" value="Skicka" /></p>

<?php do_action('comment_form', $post->ID); ?></form>

</div>



<?php else : // Comments are closed ?>

<?php endif; ?>