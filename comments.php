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
	return; ?>
<div class="clearfix"></div>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
    <h2 class="comments-title">
		 <?php 
             printf( // WPCS: XSS OK.
                    /* translators: 1: comment count number */
                    esc_html( _nx( '%1$s Comment', '%1$s Comments;', get_comments_number(), 'comments title', 'redpro' ) ),
                    number_format_i18n(get_comments_number() )       );   ?>
	</h2>
    <ul class="">
    <?php	
	wp_list_comments( array( 'callback' => 'redpro_comment', 'style' => 'ul' ) ); ?>
    </ul>
       <?php paginate_comments_links();
       	endif;
	$args = array('comment_notes_after'=> __('All fields are mandatory','redpro'), 
				  'comment_notes_before'=>'',
				  'title_reply' => __('LEAVE A COMMENT','redpro'),
				  'label_submit'=> __('Submit Comment','redpro'),
				  'fields' => apply_filters( 'comment_form_default_fields', array(
						'author' =>
						  '<p class="comment-form-author">' .						  
						  '<input id="author" name="author" type="text"  value="' . esc_attr( $commenter['comment_author'] ) .
						  '" size="30" /></p>',
						'email' =>
						  '<p class="comment-form-email">'.
						  '<input id="email" name="email" type="text"  value="' . esc_attr(  $commenter['comment_author_email'] ) .
						  '" size="30" /></p>'
						  )),
						  'comment_field' => '<p>' .
						  '<textarea id="comment" name="comment"  cols="45" rows="8" aria-required="true"></textarea>' .
						  '</p>',						 
    'comment_notes_after' => __('All fields are mandatory','redpro'), );
	comment_form($args); ?>
</div><!-- #comments .comments-area -->
