<?php If ( have_comments() ) : ?>

	<h2 id="comments"><?php comments_number(__('No Responses', 'theme'), __('One Response', 'theme'), __('% Responses', 'theme'));?></h2>
	
	<p><?php printf(__("You can follow any responses to this entry through the <a href='%s'>RSS 2.0</a> feed.", 'theme'), get_post_comments_feed_link()); ?></p>
  <p>
  <?php if ( comments_open() && pings_open() ) {
       // Both Comments and Pings are open
       printf(__('You can <a href="#respond">leave a response</a>, or <a href="%s" rel="trackback">trackback</a> from your own site.', 'theme'), trackback_url(false));
     } elseif ( !comments_open() && pings_open() ) {
       // Only Pings are Open
       printf(__('Responses are currently closed, but you can <a href="%s" rel="trackback">trackback</a> from your own site.', 'theme'), trackback_url(false));
     } elseif ( comments_open() && !pings_open() ) {
       // Comments are open, Pings are not
       _e('You can skip to the end and leave a response. Pinging is currently not allowed.', 'theme');
     } elseif ( !comments_open() && !pings_open() ) {
       // Neither Comments, nor Pings are open
       _e('Both comments and pings are currently closed.', 'theme');
     }
  ?>
  </p>
	
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	
  <div class="commentlist">
	  <?php wp_list_comments(Array( 'avatar_size' => 70,
                                  'style'       => 'div' )) ?>
	</div>
	
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

<?php Else : // this is displayed if there are no comments so far ?>

  <?php If ( comments_open() ) : ?>
    <!-- If comments are open, but there are no comments. -->
  <?php Else : // comments are closed ?>
    <!-- If comments are closed. -->
    <!-- <p class="nocomments"><?php _e('Comments are closed.', 'theme'); ?></p> -->
  <?php EndIf; ?>

<?php EndIf; ?>


<?php If ( comments_open() ) : ?>
  
  <div id="respond">
    <h2><?php comment_form_title( __('Leave a Reply', 'theme'), __('Leave a Reply for %s' , 'theme') ); ?></h2>
    <div id="cancel-comment-reply">
      <small><?php cancel_comment_reply_link() ?></small>
    </div>
    
    <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
      <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'theme'), wp_login_url( get_permalink() )); ?></p>
    <?php Else : ?>
    
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
    <?php If ( is_user_logged_in() ) : ?>
      <p><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.', 'theme'), get_option('siteurl').'/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'theme'); ?>"><?php _e('Log out &raquo;', 'theme'); ?></a></p>
    <?php Else : ?>
      <p>
        <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php If ($req) Echo "aria-required='true'"; ?> />
        <label for="author"><small><?php _e('Name', 'theme'); ?> <?php if ($req) _e("(required)", 'theme'); ?></small></label>
      </p>
      <p>
        <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) Echo "aria-required='true'"; ?> />
        <label for="email"><small><?php _e('Mail (will not be published)', 'theme'); ?> <?php if ($req) _e("(required)", 'theme'); ?></small></label>
      </p>
      <p>
        <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
        <label for="url"><small><?php _e('Website', 'theme'); ?></small></label>
      </p>
    <?php EndIf; ?>
    
    <p><textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea></p>
    <p>
      <input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'theme'); ?>" />
      <?php comment_id_fields() ?>
    </p>
    <?php do_action('comment_form', $post->ID); ?>
    </form>
    <?php EndIf; // If registration required and not logged in ?>
  </div>
<?php EndIf; // if you delete this the sky will fall on your head ?>
