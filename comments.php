<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->
<div id="comments"></div>
<?php if ($comments) : ?>
	<div class="comments-title"><?php comments_number('No comments', '1 comment', '% comments' );?> to &#8220;<?php the_title(); ?>&#8221;<a href="<?php comments_popup_link();?>#respond">
	<span class="small">Leave your Comment</span></a></div>

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
			<?php echo get_avatar( $comment, 32 ); ?>
			<cite><?php comment_author_link() ?></cite> says:
			<?php if ($comment->comment_approved == '0') : ?>
			<em>//Your comment is awaiting moderation.//</em>
			<?php endif; ?>
			<br />

			<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></a> <?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?></small>

			<?php comment_text() ?>

		</li>

	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
	?>

	<?php endforeach; /* end for each comment */ ?>

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
<div class="respond-title"><h3 id="respond">Leave a reply</h3></div>
<div id="comment-box">
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>We love to hear from you. But you must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>
<?php if ( $user_ID ) : ?>
<p>Hi <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. We would love to hear from you. Please don't say <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Good Bye/Log out &raquo;</a></p>
<?php else : ?>
<p>We love to hear your views.</p>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<label for="author">Name
        <span class="small">Add your name <?php if ($req) echo "(*)"; ?></span> 
 </label>
<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email">Email
<span class="small">Won't be published <?php if ($req) echo "(*)"; ?></span>
</label>
<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="url">Website
<span class="small">Let others get in touch</span></label>
<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" />

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
<label>Comment
        <span class="small">Add your comment</span> 
 </label>
<textarea name="comment" id="comment" cols="50%" rows="10" tabindex="4" class="txtarea"></textarea>
<input name="submit" type="submit" id="submit" class="btnComment" tabindex="5" value="Submit Comment" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
<?php do_action('comment_form', $post->ID); ?>
</form>
<div class="spacer" />
</div>
<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>
