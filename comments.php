<!-- geschachtelt in index: ab hier die comments.php -->

<div id="comments">

<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments."); ?><p>
				<?php
				return;
            }
        }
		$commentalt = '';
		$commentcount = 1;
?>

<?php if ($comments) : ?>

<h5><?php comments_number('0 comments so far. &raquo;', '1 comment so far. &raquo;', '% comments so far. &raquo;' ); ?> <br /><?php  if($post->comment_status == "open") { ?> | <a href="#commentform" class="kommentieren">Leave a Reply</a><?php } ?></h5>

<ol class="kommentarliste">

<?php foreach ($comments as $comment) : ?>



<li id="comment-<?php comment_ID() ?>"><div class="wer">

<?php echo get_avatar( $comment, 20 ); ?>

<?php comment_author_link() ?> says on <?php comment_date('F d Y') ?> at <?php comment_time() ?>:</div>
<div class="was"><?php comment_text() ?></div></li>	

     <?php if ($comment->comment_approved == '0') : ?>
		<em><?php _e('Thanks!<br />Your Reply has to be moderated.'); ?></em>
 		<?php endif; ?>

<?php endforeach;/*Ende for each comment*/?> 

</ol>

<?php endif; /*Ende if comments*/?> 


<?php if ($post->comment_status == "open") : ?>

<h5>Your Reply:</h5>
<?php if (get_option('comment_registration') && !$user_ID) : ?>
	<p>You've got to<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">login</a> to leave a Reply.</p>

<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<fieldset>

	<?php if ($user_ID) : ?>

		<p class="angemeldetals">logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>">Log out</a>.</p>

<?php else : ?>

			<p><label for="author">Name</label><br /><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" /> <?php if ($req) echo "<em>required</em>"; ?></p>
			<p><label for="email">Email</label><br /><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" /> <em><?php if ($req) echo "required, "; ?> (won't be showed)</em></p>
			<p><label for="url">Url</label><br /><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" /></p>
			
			<?php 
/****** Math Comment Spam Protection Plugin ******/
if ( function_exists('math_comment_spam_protection') ) { 
	$mcsp_info = math_comment_spam_protection();
?> 	<p><label for="mcspvalue"><strong> Spamschutz:<br />Summe aus <?php echo $mcsp_info['operand1'] . ' + ' . $mcsp_info['operand2'] . ' ?' ?></strong></label><br /><input type="text" name="mcspvalue" id="mcspvalue" value="" size="20" tabindex="4" />
	
	<input type="hidden" name="mcspinfo" value="<?php echo $mcsp_info['result']; ?>" />
</p>
<?php } /* if function_exists...*/ ?>

<?php endif; ?>

			<p><label for="comment">Comment</label><br /><textarea name="comment" id="comment" cols="45" rows="10" tabindex="4"></textarea></p>
			<p><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
			<input type="submit" name="submit" value="Submit" class="button" tabindex="5" /></p>

                         <p class="erlaubtetags"><strong>You can use these tags:</strong><br/><?php echo allowed_tags(); ?></p>

	  	</fieldset>
	<?php do_action('comment_form', $post->ID); ?>
	</form>



<?php endif; /* If registration required and not logged in */?> 

<?php endif; /* Ende if comment-status = open */?> 

<?php /*trackback und pingback*/ ?>

<?php if ($post-> comment_status == "open" && $post->ping_status == "open") { ?>
	<p class="trackback"><a href="<?php trackback_url(display); ?>">Trackback this Article</a> &nbsp;|&nbsp; <?php comments_rss_link('Subsribe to Comments'); ?></p>
<?php } elseif ($post-> comment_status == "open") {?>
	<p class="trackback"><?php comments_rss_link('Subscribe to Comments'); ?></p>
<?php } elseif ($post->ping_status == "open") {?>
	<p class="trackback"><a href="<?php trackback_url(display); ?>">Trackback this Article</a></p>
<?php } ?>

</div> <!-- /comments -->

<!-- bis hier die comments.php -->
