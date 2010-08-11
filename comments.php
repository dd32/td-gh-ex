<?php
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	
	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'birdsite'); ?></p> 
	<?php
		return;
	}
?>

<div id="comments">

	<?php $comment_num = get_comments_number();if(0 < $comment_num): ?>
		<h2><?php _e('Comments', 'birdsite'); ?>(<?php echo get_comments_number() ?>)</h2>
	<?php endif; ?>

	<?php if ( have_comments() ) : ?>

		<div class="navigation">
			<?php previous_comments_link() ?> <?php next_comments_link() ?>
		</div>

		<ol>
			<?php wp_list_comments('callback=birdsite_custom_comments');?>
		</ol>

		<div class="navigation">
			<?php previous_comments_link() ?> <?php next_comments_link() ?>
		</div>

	<?php endif; ?>

	<?php if ( comments_open() ) : ?>

	<div id="respond">

		<h2><?php comment_form_title( __('Leave a Reply', 'birdsite'), __('Leave a Reply for %s' , 'kubrick') ); ?></h2>
		<div id="cancel-comment-reply"> 
			<small><?php cancel_comment_reply_link() ?></small>
		</div> 

		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'birdsite'), wp_login_url( get_permalink() )); ?></p>
		<?php else : ?>

			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				<fieldset>

				<?php if ( is_user_logged_in() ) : ?>
					<?php printf(__('Logged in as <a href="%1$s">%2$s</a>.', 'birdsite'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'birdsite'); ?>"><?php _e('Log out &raquo;', 'birdsite'); ?></a><br />

				<?php else : ?>

					<label for="author"><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /><em><?php _e('Name', 'birdsite'); ?> <?php if ($req) _e("(required)", "birdsite"); ?></em></label>
					<label for="email"><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /><em><?php _e('Mail (will not be published)', 'birdsite'); ?><?php if ($req) _e("(required)", "birdsite"); ?></em></label>
					<label for="url"><input type="text" name="url" id="url" value="<?php echo  esc_attr($comment_author_url); ?>" size="22" tabindex="3" /><em><?php _e('Website', 'birdsite'); ?>: </em></label>

			<?php endif; ?>

				<label for="comment"><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea></label>
				<input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'birdsite'); ?>" />
			<?php comment_id_fields(); ?> 

			<?php do_action('comment_form', $post->ID); ?>
				</fieldset>
			</form>

		<?php endif; ?>
	</div>

	<?php else : ?>
		<p class="nocomments"><?php _e('Comments are closed.', 'birdsite'); ?></p>
	<?php endif; ?>

</div>
