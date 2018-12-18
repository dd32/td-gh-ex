<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 */
if ( post_password_required() ) {
	return;
} ?>
<div id="comments" class="besty-comments">
	<?php if ( have_comments() ) : ?>
    <h2 class="besty-comments-titel"><?php esc_html_e('Comments','besty'); ?></h2>
    <ul class="comment-list">
    	<?php wp_list_comments( array( 'callback' => 'besty_comment', 'style' => 'ul', 'short_ping' => true) ); ?>
    </ul>
    <?php paginate_comments_links();
	endif; // have_comments()
	comment_form(); ?>
</div> <!-- #comments -->