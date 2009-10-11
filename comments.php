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

<!-- Start editing here. -->
<div id="comments">
<?php if ( have_comments() ) : ?>
	<h3 id="commentstitle"><?php comments_number('0 Comments', '1 Comment', '% Comments' );?> on &#8220;<?php the_title(); ?>&#8221;</h3>

	<ol class="commentlist">
	
	<?php $kommentarnummer = 1; ?>
	<?php foreach ($comments as $comment) : ?>

		<li id="comment-<?php comment_ID() ?>">
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Your Comment is awaiting</em><br />
			<?php endif; ?>

  <div class="Comment">
	
  <span class="commenttext"><?php comment_text() ?></span>
<!-- Credit -->
<div class="commentmetadata">
	<?php comment_author_link() ?> | <?php comment_time() ?> | #<?php echo $kommentarnummer; ?> <?php echo get_avatar( $comment, 30 ); ?>
	<?php $kommentarnummer++; ?>
</div>
		
         </div>
		</li>

<br />

	<?php endforeach; /* end for each comment */ ?>

	</ol>
	</div>
<!-- Navigation was there -->
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"> No Comments approved</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<h3>
<?php comment_form_title( 'Your Comment', '' ); ?>
</h3>

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.
</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		
		<?php if ( $user_ID ) : ?>
		
		<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Diesen Benutzer abmelden.">Log out &raquo;</a></p>
		
		<?php else : ?>
		
		<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
		<label for="author"><small>Name <?php if ($req) echo ""; ?></small></label></p>
		
		<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
		<label for="email"><small>E-Mail<?php if ($req) echo ""; ?></small></label></p>
		
		<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
		<label for="url"><small>Website</small></label></p>
		
		<?php endif; ?>
		
		<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->
		
		<p><textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea></p>
		
		<p><input name="submit" type="submit" id="submit" tabindex="5" value="send" />
		<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
		</p>
		<?php do_action('comment_form', $post->ID); ?>
		
		</form>


<?php endif; // If registration required and not logged in ?>


<?php endif; // if you delete this the sky will fall on your head ?>
