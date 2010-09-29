<?php

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

	<?php if ( have_comments() ) : ?>

		<h1 class="comment-heading">Comments</h1>

		<ol class="commentlist">
		
			<?php wp_list_comments('avatar_size=24&type=comment'); ?>
			
		</ol>
		
		<ol class="pinglist">
		
			<?php wp_list_comments('avatar_size=24&type=pings'); ?>
			
		</ol>

	 <?php else : // this is displayed if there are no comments so far ?>

		<?php if ('open' == $post->comment_status) : ?>
			<!-- If comments are open, but there are no comments. -->

		 <?php else : // comments are closed ?>
			<!-- If comments are closed. -->
			<p class="nocomments">Comments are closed.</p>

		<?php endif; ?>
		
	<?php endif; ?>

	<?php if ('open' == $post->comment_status) : ?>

	<h1 class="commentform-heading" id="respond"><?php comment_form_title( 'Add a comment', 'Add a comment to %s' ); ?></h1>

	<div class="cancel-comment-reply">

		<?php cancel_comment_reply_link(); ?>
		
	</div>

	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

		<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
		
	<?php else : ?>

		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	<?php if ( $user_ID ) : ?>

		<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &rarr;</a></p>

	<?php else : ?>
		
		<label for="author">Name <?php if ($req) echo " (required)"; ?></label>

		<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>"  <?php if ($req) echo "aria-required='true'"; ?> >
		
		<label for="email">Mail<?php if ($req) echo " (required)"; ?></label>
		
		<input type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>"  <?php if ($req) echo " aria-required='true'"; ?> >
		
		<label for="url">Website</label>
		
		<input type="url" name="url" id="url" value="<?php echo $comment_author_url; ?>" >

	<?php endif; ?>

	<label for="comment">Your comment</label>
<textarea  name="comment" id="comment" cols="45" rows="8" aria-required="true"></textarea>
	

	<input name="submit" type="submit" id="submit" value="Submit Comment" />

	<?php comment_id_fields(); ?>

	<?php do_action('comment_form', $post->ID); ?>

	<p>Follow comments to this post by subscribing to the <?php post_comments_feed_link( $link_text = 'comment feed') ?>.</p>

	</form>

	<?php endif; // If registration required and not logged in ?>

	<?php endif; // if you delete this the sky will fall on your head ?>