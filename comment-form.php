<?php /* Display the comment form */ ?>
<?php if ('open' == $post->comment_status) : ?>

<div id="respond" class="clearfix">
    <h4 class="comment-reply"><?php comment_form_title( __('Leave a reply','graphene'), __('Leave a reply to %s','graphene') ); ?></h4>
    <p id="cancel-comment-reply"><?php cancel_comment_reply_link(__('Click here to cancel reply','graphene')) ?></p>
    
    <?php /* If must be logged in to post comment */ ?>
    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
    <p><?php printf(__('You must be <a href="%1$s/wp-login.php?redirect_to=%2$s">logged in</a> to post a comment','graphene'),get_option('siteurl'),the_permalink());?>
    
    <?php else : ?>
    <?php /* The comment form */ ?>
	<div id="comment-form-wrap">
        <form class="clearfix" action="<?php bloginfo('wpurl'); ?>/wp-comments-post.php" method="post">
            <fieldset>
                <?php if ( $user_ID ) : ?>
                <p><?php _e('Logged in as','graphene'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(); ?>" title="<?php _e('Log out of this account','graphene'); ?>"><?php _e('Logout &raquo;','graphene'); ?></a></p>
        
                <?php else : ?>
                <p>
                    <label><?php _e('Your name:','graphene'); ?></label>
                    <input type="text" class="input-text" name="author" value="<?php echo $comment_author; ?>" tabindex="1" />
                </p>
                <p>
                    <label><?php _e('Your email:','graphene'); ?></label>
                    <input type="text" class="input-text" name="email" value="<?php echo $comment_author_email; ?>" tabindex="2" />
                </p>
                <p>
                    <label><?php _e('Website:','graphene'); ?></label>
                    <input type="text" class="input-text" name="url" value="<?php echo $comment_author_url; ?>" tabindex="3" />
                </p>
                <?php endif; // Ends if user is logged in ?>
                <p>
                    <label><?php _e('Message:','graphene'); ?></label>
                    <textarea name="comment" id="comment" cols="40" rows="10" tabindex="4"></textarea>
                </p>
                <?php comment_id_fields(); ?>
                <?php do_action('comment_form', $post->ID); ?>
                
                    <button type="submit" id="submit"><?php _e('Submit Comment','graphene'); ?></button> 
                    <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
                    
            </fieldset>
        </form>
    </div><!-- #comment-form-wrap -->
	<?php endif; // If registration required and not logged in ?>
</div><!-- #respond -->
<?php endif; // Ends the comment form ?>