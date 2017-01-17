<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'corpbiz' ); ?></p>
<?php return; endif; ?>	
	
	<?php
		// code for comment
		if ( ! function_exists( 'corpbiz_comment' ) ) {
		function corpbiz_comment( $comment, $args, $depth ) 
		{
		$GLOBALS['comment'] = $comment;
		//get theme data
		global $comment_data;
		//translations
		$leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] : __('Reply','corpbiz');
	?>	
	
		<div class="media comment_box">
			<a class="pull_left_comment" href="<?php the_author_meta('user_url'); ?>">
			<?php echo get_avatar($comment,$size = '224'); ?>			
			</a>
			<div class="media-body">
				<div class="comment_detail">
					<h4 class="comment_detail_title"><?php printf(('%s'), get_comment_author_link()) ?><span class="comment_date"><?php comment_date('F j, Y');?>&nbsp;<?php _e('at','corpbiz');?>&nbsp;<?php comment_time('g:i a'); ?></span></h4>
					<?php comment_text(); ?>
				
					<div class="reply">
						<?php comment_reply_link(array_merge( $args, array('reply_text' => $leave_reply,'depth' => $depth, 'max_depth' => $args['max_depth'], 'per_page' => $args['per_page']))) ?>
						<i class="fa fa-mail-forward"></i>&nbsp;
					</div>
					
					<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'corpbiz' ); ?></em>
					<br/>
					<?php endif; ?>
				
				</div>
			</div>
		</div>
	<?php } } ?>
	
<?php if ( have_comments() ) { ?>

<div class="comment_section">
	<div class="comment_title"><h3><i class="fa fa-comments"></i> <?php comments_number('No Comments', '1 Comment','% Comments'); ?> </h3>
	</div>
	<?php wp_list_comments( array( 'callback' => 'corpbiz_comment' ) ); ?>
</div> <!---comment_section--->

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'corpbiz' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'corpbiz' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'corpbiz' ) ); ?></div>
		</nav>
		<?php } elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) 
		{
        //_e("Comments Are Closed!!!",'corpbiz');
		?>
	<?php } 
	} ?>
	<?php if ('open' == $post->comment_status) { ?>
	<?php if ( get_option('comment_registration') && !$user_ID ) { ?>
	<p><?php echo sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment','corpbiz' ), site_url( 'wp-login.php' ) . '?redirect_to=' .  urlencode(get_permalink())); ?></p>
	<?php } else { 
	//echo "fdfdf";
	?>

<div class="comment_form_section">
	<?php  
	 $fields=array(
		'author' => '<div class="form_group"><label>Your Name</label><input class="comment_input_control" name="author" id="author" value="" type="text"/></div>',
		'email' => '<div class="form_group"><label>Your Email</label><input class="comment_input_control" name="email" id="email" value=""   type="email" ></div>',
		'subject' => '<div class="form_group"><label>Subject</label><input class="comment_input_control" name="subjects" id="subject" value=""   type="text" ></div>',
		);
		function my_fields($fields) { 
			return $fields;
		}
		add_filter('comment_form_default_fields','my_fields');
			$defaults = array(
			'fields'=> apply_filters( 'comment_form_default_fields', $fields ),
			'comment_field'=> '<div class="form_group"><label>Comment</label>
			<textarea id="comments" rows="5" class="comment_textarea_control" name="comment" type="text"></textarea></div>',		
			'logged_in_as' => '<p class="logged-in-as">' . __("Logged in as",'corpbiz').'<a href="'. admin_url( 'profile.php' ).'">'.$user_identity.'</a>'. '<a href="'. wp_logout_url( get_permalink() ).'" title="Logout of this account">'.__("Logout",'corpbiz').'</a>' . '</p>',
			'id_submit'=> 'comment_btn1',
			'label_submit'=>__('Send Message','corpbiz'),
			'comment_notes_after'=> '',
			'comment_notes_before' => '',
			'title_reply'=> '<h2>'.__('Leave a Reply','corpbiz').'</h2>',
			'id_form'=> 'commentform'
			);
		comment_form($defaults);
	?>
</div>	
<?php } } ?>		