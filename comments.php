<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package Acuarela
 * @since Acuarela 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

<?php if ( have_comments() ) : ?>

	<h2 class="comments-title">
<?php
	$comments_number = get_comments_number();
	if ( '1' === $comments_number ) {
		/* translators: %s: post title */
		printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'acuarela' ), get_the_title() );
	} else {
		printf(
			/* translators: 1: number of comments, 2: post title */
			_nx(
				'%1$s thought on &ldquo;%2$s&rdquo;',
				'%1$s thoughts on &ldquo;%2$s&rdquo;',
				$comments_number,
				'comments title',
				'acuarela'
			),
			number_format_i18n( $comments_number ),
			get_the_title()
		);
	}
		?>
	</h2>

<?php
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		acuarela_comments_navigation();
	endif; // Check for comment navigation. ?>

	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 34,
				'reply_text' => '<span class="genericon genericon-reply" aria-hidden="true"></span>' . __( 'Reply', 'acuarela' ),
			) );
		?>
	</ol><!-- .comment-list -->

<?php
if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	acuarela_comments_navigation();
endif; // Check for comment navigation.
?>

<?php if ( ! comments_open() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'acuarela' ); ?></p>
<?php endif; ?>

	<?php endif; // have_comments(). ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
