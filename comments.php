<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'bb10' ); ?></p>
<?php return;endif; ?>
<?php if ( have_comments() ) : ?>
		<h3 id="comments-title"><span><?php comments_popup_link(__( 'Leave a reply', 'bb10' ), __( '<b>1</b> Reply', 'bb10' ), __( '<b>%</b> Replies', 'bb10' ) ); ?></span></h3>
	<ol class="commentlist" id="comments">
		<?php wp_list_comments( array( 'callback' => 'hjyl_comment' ) );?>
			<p id="comments-nav">
				<?php paginate_comments_links('prev_text='.__('Previous', 'bb10').'&next_text='.__('Next', 'bb10').'');?>
			</p>
			
<?php endif; ?>

			<?php if ( $user_ID ) : ?>

				<?php echo null;?>

				<?php elseif ( '' != $comment_author ): ?>

				<p class="comment-welcomeback"><?php printf(__('Welcome <strong>%s</strong>', 'bb10'), $comment_author); ?>
				
				<a href="javascript:hjyl_toggleCommentAuthorInfo();" id="toggle-comment-author-info">
					<?php _e('(Toggle)', 'bb10'); ?>
				</a>

				<script type="text/javascript" charset="utf-8">
					var changeMsg = "<?php echo  esc_js( __('(Toggle)', 'bb10') ); ?>";
					var closeMsg = "<?php echo esc_js( __('(Close)', 'bb10') ); ?>";
					
					function hjyl_toggleCommentAuthorInfo() {
						jQuery('#comment-author-info').slideToggle('slow', function(){
							if ( jQuery('#comment-author-info').css('display') == 'none' ) {
								jQuery('#toggle-comment-author-info').text(changeMsg);
							} else {
								jQuery('#toggle-comment-author-info').text(closeMsg);
							}
						});
					}

					jQuery(document).ready(function(){
						jQuery('#comment-author-info').hide();
					});
				</script>
			<?php endif; ?>
<?php 
		$aria_req = ( $req ? " aria-required='true'" : '' );
       	$fields =  array(
            'author' => '<div id="comment-author-info"><p class="comment-form-author"><input id="author" name="author" type="text" value="'.esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /><label for="author">' . __( 'Name', 'bb10' ) . '</label> ' . ( $req ? '<span class="required">' . __( '(required)', 'bb10' ) . '</span>' : '' ).'</p>',
            'email'  => '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /><label for="email">' . __( 'Email', 'bb10' ) . '</label>'. ( $req ? '<span class="required">' . __( '(required)', 'bb10' ) . '</span>' : '' ).'</p>',
            'url'    => '<p class="comment-form-url">'.'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />'.'<label for="url">' . __( 'Website', 'bb10') . '</label></p></div>',
	);
        $comment_form_args = array(
          	'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
            'comment_field'        => '<p class="comment-form-comment"><textarea aria-required="true" rows="8" cols="70%" name="comment" id="comment" onkeydown="if(event.ctrlKey){if(event.keyCode==13){document.getElementById(\'submit\').click();return false}};"></textarea></p>',
            'must_log_in'          => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
            'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
            'comment_notes_before' => null,
            'comment_notes_after'  => null,
            'id_form'              => 'commentform',
            'id_submit'            => 'submit',
            'title_reply'          => __( 'Leave a Reply', 'bb10' ),
            'title_reply_to'       => __( 'Leave a Reply to %s', 'bb10'),
            'cancel_reply_link'    => __( 'Cancel reply', 'bb10'),
            'label_submit'         => __( 'Post Comment', 'bb10'),
    );
    comment_form($comment_form_args);
 ?>
	</ol>
<div class="clear"></div>
<?php /*output Trackbacks and Pingbacks*/ $havepings="pings"; foreach($comments as $comment){if(get_comment_type() != 'comment' && $comment->comment_approved != '0'){ $havepings = 1; break; }}if($havepings == 1) : ?>
<div id="pings">
	<h3 id="pings-title"><span><a><?php _e('Pingbacks', 'bb10'); ?></a></span></h3>
		<ul id="pinglist"><?php wp_list_comments('type=pings&per_page=0&callback=hjyl_pings'); ?></ul>
</div>

<?php endif; ?>