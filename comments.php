<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', '5years'); ?></p>

			<?php
			return;
		}
	}
?>

<?php if ($comments) : ?>
	<div id="comments" class="box">
<?php // $k = 1; ?>
	<h3 class="comments-title"><?php comments_number(__('No comments', '5years'), __('One comment', '5years'), __('% comments', '5years') );?> <?php printf(__('to &#8220;%s&#8221;', '5years'), the_title('', '', false)); ?></h3>

		<?php foreach ($comments as $comment) : ?>
			<div class="comment<?php if (1 == $comment->user_id){ echo " author"; } ?>" id="comment-<?php comment_ID() ?>">
			
				<div class="comment-avatar">
					<?php echo get_avatar( $comment, 50 ); ?>
				</div>
				
				<div class="comment-content">
					<div class="comment-info"><span class="author"><?php comment_author_link() ?></span><br /><span class="date"><a href="#comment-<?php comment_ID(); ?>"><?php comment_date(__('F jS, Y', '5years')) ?> <?php _e('at', '5years'); ?> <?php comment_time() ?></a></span> <?php edit_comment_link(__('edit', '5years'),'&nbsp;&nbsp;',''); ?></div>
					
					<?php if ($comment->comment_approved == '0') : ?>
						<em><?php _e('Your comment is awaiting moderation.', '5years'); ?></em>
					<?php endif; ?>
					<?php comment_text() ?>
				</div>
			</div>
		<?php endforeach; ?>

	</div>

<?php else : /* this is displayed if there are no comments so far */ ?>
 
	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
	<?php else : /* comments are closed */ ?>
		<!-- If comments are closed. -->
	<?php endif; ?>
	
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

	<div class="box" id="new-comment-form">
		<h3 class="comments-title"><?php _e('Leave a comment', '5years'); ?></h3>

	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p><?php _e('You must be ', '5years') ?><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in</a> to post a comment.', '5years'); ?></p>
	<?php else : ?>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<fieldset>
			<?php if ( $user_ID ) : ?>
				<p><?php _e('Logged in as', '5years'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account', '5years'); ?>"><?php _e('Log out', '5years'); ?></a></p>
			<?php else : ?>			
				<p><input type="text" name="author" id="author" class="text" value="<?php echo $comment_author; ?>" />
				<label for="author"><?php _e('Name', '5years'); ?> <?php if ($req) _e('(required)', '5years'); ?></label></p>

				<p><input type="text" name="email" id="email" class="text" value="<?php echo $comment_author_email; ?>" />
				<label for="email"><?php _e('Mail (will not be published)', '5years'); ?> <?php if ($req) _e('(required)', '5years'); ?></label></p>

				<p><input type="text" name="url" id="url" class="text" value="<?php echo $comment_author_url; ?>" />
				<label for="url"><?php _e('Website', '5years'); ?></label></p>
			<?php endif; ?>
			<p><label for="comment"><?php _e('Your comment', '5years'); ?></label><br/>
			<textarea name="comment" id="comment" cols="65" rows="8"></textarea>
<br/><small><?php printf(__('<strong>XHTML:</strong> You can use these tags:<br /> <code>%s</code>', '5years'), allowed_tags()); ?></small></p>			
			
			<?php do_action('comment_form', $post->ID); ?>
			
			<p><input name="submit" type="submit" id="submit" value="<?php _e('Submit Comment', '5years'); ?>" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
			
			
		</fieldset>
		</form>
	</div>
<?php endif; /* If registration required and not logged in */ ?>

<?php endif; /* if you delete this the sky will fall on your head */ ?>
