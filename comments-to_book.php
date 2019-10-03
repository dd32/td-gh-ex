<?php
/**
 * Comments area template file.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */


if ( post_password_required() ) {
	
	return;
}

?>
<div id="comments" class="comments-area">

    <div class="comments_bg_inner gray-background">
    
    <div class="container">

	<?php
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$comment_count = get_comments_number();
			if ( '1' === $comment_count ) {
				
				printf(
					esc_html__( 'One review', 'ba-tours-light' )
				);
				
			} else {
				
				printf(
                    /* translators: 1: number of reviews */
					esc_html( _nx( '%1$s review', '%1$s reviews', $comment_count, 'multiple_comments_title', 'ba-tours-light' ) ),
					esc_html( number_format_i18n( $comment_count ) )
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php
		the_comments_navigation( array(
			'prev_text'          => __( 'Older reviews', 'ba-tours-light' ),
			'next_text'          => __( 'Newer reviews', 'ba-tours-light' ),
			'screen_reader_text' => __( 'Continue reading', 'ba-tours-light' ),
		) );
		?>

		<ul class="comment-list">
			<?php
			wp_list_comments( array(
				'short_ping' => true,
                'callback' => 'batourslight_comment_callback',
                'avatar_size' => 96,
			) );
			?>
		</ul><!-- .comment-list -->

		<?php
		the_comments_navigation( array(
			'prev_text'          => __( 'Older reviews', 'ba-tours-light' ),
			'next_text'          => __( 'Newer reviews', 'ba-tours-light' ),
			'screen_reader_text' => __( 'Continue reading', 'ba-tours-light' ),
		) );

		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Reviews are closed.', 'ba-tours-light' ); ?></p>
			<?php
		endif;

	endif;

	comment_form(array(
  'title_reply'       => __( 'Leave a Review', 'ba-tours-light' ),
  'title_reply_to'    => __( 'Leave a Review', 'ba-tours-light' ),
  'cancel_reply_link' => __( 'Cancel Review', 'ba-tours-light' ),
  'label_submit'      => __( 'Post Review', 'ba-tours-light' ),
  'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . __( 'Review text', 'ba-tours-light' ) .
    '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
    '</textarea></p>',
  ));
	?>
    
    </div>
    
    </div>

</div><!-- #comments -->


