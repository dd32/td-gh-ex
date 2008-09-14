<div class="comments_form">
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
?>

<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>
	<?php foreach ($comments as $comment) : ?>

	<div class="one_comment">
		<div class="comment_text">
			<?php if ($comment->comment_approved == '0') : ?>
				<em>Your comment is awaiting moderation.</em>
			<?php endif; ?>
			<?php comment_text() ?>
		</div> <!-- COMMENT TEXT -->
    	<div class="comment_info">
    		<?php echo get_avatar( $comment, 73 ); ?>
	        <div class="comment_author"><?php comment_author_link() ?></div> <!-- COMMENT INFO -->
    	    <div class="comment_date"><?php comment_date('F jS, Y') ?></div> <!-- COMMENT INFO -->
	    </div> <!-- COMMENT INFO -->
    <div style="clear: both;"></div>
	</div> <!-- ONE COMMENT -->


	<?php endforeach; /* end for each comment */ ?>


 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>
	<div class="comment_form">
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>

<?php else : ?>

        <label for="name">Name</label><div class="comm_input"><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /></div><br />
        <label for="email">Email</label><div class="comm_input"><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /></div><br />
        <label for="website">Website</label><div class="comm_input"><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /></div><br />

<?php endif; ?>

        <label for="comment">Comment</label><br />
        <textarea name="comment" id="comment" cols="20" rows="5" tabindex="4"></textarea><br />
        <input name="submit" src="<?php bloginfo('template_url'); ?>/img/submit-button.jpg" type="image" id="submit" tabindex="5" value="Submit Comment" />
        <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />


<?php do_action('comment_form', $post->ID); ?>

</form>
    </div> <!-- COMMENT FORM -->
<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
</div>