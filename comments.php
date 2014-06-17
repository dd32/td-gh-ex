<?php
/**
 * The template for displaying Comments.
 *
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
<div class="clearfix"></div>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : 	?>
    <h1 class="comments-title">
		<?php
			printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'generator' ),
				number_format_i18n( get_comments_number() ), get_the_title() );
		?>
	</h1>
    <ul>
    <?php	
	wp_list_comments( array( 'callback' => 'generator_comment') ); ?>
    </ul>
       <?php paginate_comments_links(); ?>     
	<?php endif; // have_comments() ?>
	<?php
	$generator_args = array('comment_notes_after'=>'All fields are mandatory.',
				  'comment_notes_before'=>'',
				  'title_reply' => ' <h1 class="comments-title"><Span class="color-red">LEAVE</Span> A COMMENT</h1>',
				  'label_submit'=>'Submit Comment',
				  'fields' => apply_filters( 'comment_form_default_fields', array(
						'author' =>
						  '<div class="form-group">' .						  
						  '<input id="author" class="form-control" name="author" type="text" placeholder="Your Name*" value="' . esc_attr( $commenter['comment_author'] ) .
						  '" size="30" /></div>',
					
						'email' =>
						  '<div class="form-group">'.
						  '<input id="email" name="email" class="form-control" type="text" placeholder="E-mail*" value="' . esc_attr(  $commenter['comment_author_email'] ) .
						  '" size="30" /></div>'
						  )),
						  'comment_field' => '<div class="generator-comment-box">' .
						  '<textarea id="comment" name="comment" placeholder="Message*" class="form-control" rows="3" aria-required="true"></textarea>' .
						  '</div>',						 
    'comment_notes_after' => 'All fields are mandatory.',
				  );
	?>
	<?php comment_form($generator_args); ?>
</div><!-- #comments .comments-area -->