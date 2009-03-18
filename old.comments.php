<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','ayumi') ?><p>
  <?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'alt';
?>
  <!-- You can start editing here. -->
  <?php 
	$ix=0;
?>
<div class="post">
  <p>
    <?php if ($post->ping_status == "open") { ?>
    <span class="trackbackr"><a href="<?php trackback_url(display); ?>"><?php _e('Trackback','ayumi') ?> <acronym title="Uniform Resource Identifier">URI</acronym></a></span> |
    <?php } ?>
    <?php if ($post-> comment_status == "open") {?>
    <span class="commentsfeedr">
    <?php comments_rss_link(__('Comments RSS','ayumi')); ?>
    </span>
    <?php }; ?>
  </p>
</div>

<div class="post2">
<?php if ($comments) : ?>
<h3 id="comments">
  <?php comments_number(__('No Responses','ayumi'), __('One Response','ayumi'), __('% Responses','ayumi') );?>
  <?php _e('to &#8220;','ayumi') ?>
  <?php the_title(); ?>
  &#8221;</h3>
<ol class="commentlist">
  <?php foreach ($comments as $comment) : ?>  
    <li class="comment <?php echo $oddcomment; ?>" id="comment-<?php comment_ID();$ix++; ?>">
  	<?php 
		if (function_exists('get_avatar')) {
		echo get_avatar( get_comment_author_email(), $size = '40', $default = '' );
		} else {
		//alternate gravatar code for < 2.5
		$size = 40;
		$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=
		 " . md5($email) . "&default=" . urlencode($default) . "&size=" . $size;
		echo "<img src='$grav_url'/>";
		}
		?>
   	<strong><a href="#comment-<?php comment_ID(); ?>">#<?= $ix; ?>
    </a>
    <?php comment_author_link() ?>
    </strong> <?php _e('Says:','ayumi') ?> 
    <?php if ($comment->comment_approved == '0') : ?>
    <em><?php _e('Your comment is awaiting moderation.','ayumi') ?></em>
    <?php endif; ?>
    <br />
    <small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title="">
    <?php comment_date('F jS, Y') ?>
    <?php _e('at','ayumi') ?>
    <?php comment_time() ?>
    </a>
    <?php edit_comment_link(__('e','ayumi'),'',''); ?>
    </small>
    <?php comment_text() ?>
  </li>
  <?php /* Changes every other comment to a different class */
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>
  <?php endforeach; /* end for each comment */ ?>
</ol>
<?php else : // this is displayed if there are no comments so far ?>
<?php if ('open' == $post->comment_status) : ?>
<!-- If comments are open, but there are no comments. -->
<?php else : // comments are closed ?>
<!-- If comments are closed. -->
<p class="nocomments"><?php _e('Comments are closed.','ayumi') ?></p>
<?php endif; ?>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>
<h3 id="respond"><?php _e('Leave a Reply','ayumi') ?></h3>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php _e('You must be','ayumi') ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e('logged in</a> to post a comment.','ayumi') ?></p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
  <?php if ( $user_ID ) : ?>
  <p><?php _e('Logged in as','ayumi') ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account','ayumi') ?>"><?php _e('Logout','ayumi') ?> &raquo;</a></p>
  <?php else : ?>
  <p>
    <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
    <label for="author"><small><?php _e('Name','ayumi') ?> 
    <?php if ($req) __('(required)','ayumi'); ?>
    </small></label>
  </p>
  <p>
    <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
    <label for="email"><small><?php _e('Mail (will not be published)','ayumi') ?>
    <?php if ($req) __('(required)','ayumi'); ?>
    </small></label>
  </p>
  <p>
    <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
    <label for="url"><small><?php _e('Website','ayumi') ?></small></label>
  </p>
  <?php endif; ?>
  <!--<p><small><strong>XHTML:</strong> <?php _e('You can use these tags:','ayumi') ?> <?php echo allowed_tags(); ?></small></p>-->
  <p>
    <textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
  </p>
  <p>
    <input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment','ayumi') ?>" />
    <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
  </p>
  <?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>
</div>