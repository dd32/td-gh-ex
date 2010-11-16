<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!','undedicated'));

	if ( post_password_required() ) { ?>
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
<div id="comments" class="post-comments">
	<h3><?php comments_number( __('No Comments', 'undedicated'), __( '1 Comment', 'undedicated'), __('% Comments', 'undedicated') );?></h3>
	
	<?php wp_list_comments('callback=p2h_comment&style=div'); ?>
	
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>

	<div class="comment-navigation">
		<ul>
			<li><?php previous_comments_link( __('&laquo; Older Comments','undedicated') ); ?></li>
			<li><?php next_comments_link( __('Newer Comments &raquo;', 'undedicated') ) ?></li>
		</ul>
	</div>
	<?php endif; // check for comment navigation ?>
</div><!--#comments-->
 	<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( ! comments_open() && !is_page() ) : ?>
	 	<!-- If comments are closed. -->
		<p><?php _e( 'Comments are closed.', 'undedicated' ); ?></p>
	<?php endif; ?>
	
<?php endif; ?>


<?php comment_form(
array(
	'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . __( 'Comment', 'undedicated' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
	'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email will not be published or shared.' ) . ( $req ? __( ' Required fields are marked <span class="required">*</span>', 'undedicated' ) : '' ) . '</p>',
	'comment_notes_after'  => '<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'undedicated' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
	'id_form'              => 'commentform',
	'id_submit'            => 'submit',
	'title_reply'          => __( 'Leave Your Comment', 'undedicated' ),
	'cancel_reply_link'    => __( '(Cancel Reply)', 'undedicated' ),
	'label_submit'         => __( 'Submit', 'undedicated'),
)
); ?>