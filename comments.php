<?php
global $options;
foreach ($options as $value) 
		if (isset($value['id']))
			{ if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); } } ?>

<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?> 
<p class="nocomments">  <?php _e('Sorry, you must be logged in to post a comment.','altop'); ?></p>
<?php
return;
	}
?>

<!-- You can start editing here. -->	

<?php if ( have_comments() ) : ?>
	
	<h3 id="comments" class="comments-header"><?php comments_number(__('No Responses', 'altop'), __('One Response', 'altop'), __('% Responses', 'altop'));?> <?php printf(__('to &#8220; %1s &#8221;', 'altop'), get_the_title()); ?></h3>
		
	<?php if ( !empty($comments_by_type['comment']) ) : ?>
	<ul class="commentlist">
	<?php wp_list_comments('type=comment&callback=list_comments'); ?>
	</ul>
	
	<div id="comment-navigation">
	<div class="alignleft"><?php previous_comments_link(); ?></div>
	<div class="alignright"><?php next_comments_link(); ?></div>
	</div>
	<?php endif; //End for Comments?>

	<?php if ( !empty($comments_by_type['pings']) ) : ?>
	<h3 id="pings">Ping- & Trackbacks</h3>

	<ol class="pinglist">
	<?php wp_list_comments('type=pings&callback=list_tracks'); ?>
	</ol>
	
	<div id="ping-navigation">
	<div class="alignleft"><?php previous_comments_link(); ?></div>
	<div class="alignright"><?php next_comments_link(); ?></div>
	</div>
	<?php endif; //End for pings ?>
		
		<?php else : // this is displayed if there are no comments so far
		if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
		<p class="nocomments"><?php echo _e('No Comments (yet)', 'altop'); ?></p>
		
		<?php else : // comments are closed 
		if ( ! comments_open() ) : ?> 
		<p class="nocomments"><?php echo _e('Sorry, Comments are closed.', 'altop'); ?></p>	
	
	<?php endif; ?>
	<?php endif; ?>
	<?php endif; //Close for if have_comments ?>

	<?php if (comments_open() ) : ?>

<div id="respond">

	<h3><?php comment_form_title(); ?></h3>
	
	<div id="cancel-comment-reply">	<?php cancel_comment_reply_link() ?> </div>
	
	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p> <?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'altop'), wp_login_url( get_permalink() ) );?> </p>
	<?php else: ?>
	
	
	
	<form action="<?php echo esc_attr(get_option('siteurl')); ?>/wp-comments-post.php" method="post" id="commentform">
	<?php if ( is_user_logged_in() ) : ?>
	<p> <?php printf(__('Logged in as %s.', 'altop'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out', 'altop') ?>"><?php _e('Log out &raquo;', 'altop'); ?></a> </p>

	<?php else : ?>
			<p>
			<input class="commentinput" type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" />
			<label for="author"><small><?php _e('Name', 'altop'); ?> <?php if ($req) _e('(required)', 'altop'); ?></small></label>
			</p>

			<p>
			<input class="commentinput" type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" />
			<label for="email"><small><?php _e('Mail (will not be published', 'altop');?> <?php if ($req) _e(' but required)', 'altop'); ?></small></label>
			</p>

			<p>
			<input class="commentinput" type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" tabindex="3" />
			<label for="url"><small><?php _e('Website', 'altop'); ?></small></label>
			</p>
			<?php endif; ?>

	<?php if ($altop_xhtml_tags == "true") { ?>
	<p class="comment-tags">	<small><strong>XHTML:</strong> <?php printf(__('You can use these tags: %s', 'altop'), allowed_tags()); ?> </small> </p>
	<?php } ?>

			<div>
			<textarea class="commenttext" name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
			
			</div>

			<p>
				<input class="commentsubmit" name="submit" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e(__('Submit', 'altop')); ?>" />
				<?php comment_id_fields(); ?>
			</p>
			
			<?php do_action('comment_form', $post->ID); ?>
			</form>
			<?php endif; ?>
			</div>

<?php endif; ?>