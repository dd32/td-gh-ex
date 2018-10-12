<?php
/**
 * The template file to display the comment form
 *
 * @package agncy
 */

$comment_field = '<p class="comment-form-comment">
					<label for="comment">' . __( 'Comment', 'agncy' ) . '</label>
					<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
				  </p>';

$args = array(
	'cancel_reply_before' => '<small class="color-primary">',
);
comment_form( $args );
