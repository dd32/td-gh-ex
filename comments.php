<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package star
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php
	if ( have_comments() ) {
	?>
		<h2 class="comments-title">
		<?php
		printf( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'star' ),
		number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
		?>
		</h2>
		<?php the_comments_navigation( array( 'prev_text' => __( 'Older Comments','star' ), 'next_text' => __( 'Newer Comments', 'star' ) ) ); ?>
		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'avatar_size' => 60,
			) );
			?>
		</ol><!-- .comment-list -->
		<?php
		the_comments_navigation( array( 'prev_text' => __( 'Older Comments','star' ), 'next_text' => __( 'Newer Comments', 'star' ) ) );
	}

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && '0' !== get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'star' ); ?></p>
	<?php
	endif;

	comment_form();
	?>
</div><!-- #comments -->
