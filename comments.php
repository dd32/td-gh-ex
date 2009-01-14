<div id="comments_wrapper">
<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p class="nocomments">This post is password protected. Enter the password to view comments.<p>
				
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>
<!-- You can start editing here. -->
<?php $i = 0; ?>
<?php if ($comments) : ?>
	<div id="comments" class="section"><h3><?php comments_number('No Comments', 'One Comment', '% Comments' );?>, <a href="#respond" title="Leave a comment">Comment</a> or <a href="<?php trackback_url(true); ?>" rel="trackback">Ping</a></h3></div> 
	<ol class="commentslist">
	<?php foreach ($comments as $comment) : ?>
         <?php $i++; ?>
	<?php if (get_comment_type() == "comment"){ ?>
	<li class="<?php if ($comment->comment_author_email == "your@email.com") echo 'author'; else if ($comment->comment_author_email == "another@email.com") echo 'author'; else echo $oddcomment; ?> item" id="comment-<?php comment_ID() ?>">
		<div class="fix">
		<div class="author_meta">
<p class="author_meta"><span class="user"><?php comment_author_link() ?></span> <span class="comment_edit"><small><?php edit_comment_link('Edit','(',')'); ?></small></span></p>
		</div>
<span class="count">
<?php echo $i; ?>
</span>
<div class="alignright">
<?php echo get_avatar( $id_or_email, $size = '40', $default = '' ); ?>
</div>
		<div class="comment_text">
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Your comment is awaiting moderation.</em>
			<?php endif; ?>
			<?php comment_text() ?>
		
<div class="comment-date">
<span class="post-day"><?php the_time('d') ?></span>
<span class="post-month"><?php the_time('M') ?></span> 
</div>
</div>
		</div>
	</li>	
	<?php /* Changes every other comment to a different class */ if ('alt' == $oddcomment) $oddcomment = ''; else $oddcomment = 'alt'; ?>
	<?php } ?>
	<?php endforeach; /* end for each comment */ ?>
	</ol>
	<ol class="pingslist">
	<?php foreach ($comments as $comment) : ?>
	<?php if (get_comment_type() != "comment"){ ?>
		<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
		<div class="author_meta"><?php comment_author_link() ?> - <?php comment_date('M jS, Y') ?></div>
		</li>
	<?php /* Changes every other comment to a different class */ if ('alt' == $oddcomment) $oddcomment = ''; else $oddcomment = 'alt'; ?>
	<?php } ?>
	<?php endforeach; /* end for each comment */ ?>
	</ol>
 	<?php else : // this is displayed if there are no comments so far ?>
	<div id="comments" class="section"><h3><?php comments_number('No Comments', 'One Comment', '% Comments' );?>, <a href="#respond" title="Leave a comment">Comment</a> or <a href="<?php trackback_url(true); ?>" rel="trackback">Ping</a></h3></div>
  	<?php if ('open' == $post->comment_status) : ?> 
	 <?php else : // comments are closed ?>
	<div id="comments_closed">
		<p class="nocomments">Comments are closed.</p>
	</div>
	<?php endif; ?>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>
<h3 id="respond">Reply to &#8220;<?php the_title(); ?>&#8221;</h3>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>
<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out">Logout &raquo;</a></p>
<?php else : ?>
<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>
<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>Mail <?php if ($req) echo "(required)"; ?></small></label></p>
<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website</small></label></p>
<?php endif; ?>

<p><textarea name="comment" id="comment" cols="50" rows="12" tabindex="5"></textarea></p>
<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p><?php do_action('comment_form', $post->ID); ?></form>
<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>

</div>