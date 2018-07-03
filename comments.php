<?php
/**
 * The template for displaying comments
 *
 * Template to display both current comments and comment form.
 *
 * @link https://codex.wordpress.org/Comments_in_WordPress
 *
 * @package Aamla
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments"<?php aamla_attr( 'comments-area' ); ?>>

	<?php
	if ( have_comments() ) :
	?>
		<h2<?php aamla_attr( 'comments-title' ); ?>>
			<?php
			$aamla_comments_number = get_comments_number();
			if ( 1 === $aamla_comments_number ) {
				printf(
					/* translators: %s: post title */
					esc_html_x( 'One comment on &ldquo;%s&rdquo;', 'comments title', 'aamla' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: number of comments, 2: post title */
					esc_html( _nx(
						'%1$s comment on &ldquo;%2$s&rdquo;',
						'%1$s comments on &ldquo;%2$s&rdquo;',
						$aamla_comments_number,
						'comments title',
						'aamla'
					) ),
					number_format_i18n( $aamla_comments_number ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol<?php aamla_attr( 'comments-list' ); ?>>

			<?php
			wp_list_comments(
				[
					'avatar_size' => 46,
					'style'       => 'ol',
					'short_ping'  => true,
					'reply_text'  => aamla_get_icon( [ 'icon' => 'mail-reply' ] ) . esc_html__( ' Reply', 'aamla' ),
				]
			);
			?>

		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
			<p<?php aamla_attr( 'no-comments' ); ?>><?php esc_html_e( 'Comments are closed.', 'aamla' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().

	comment_form(
		[
			'title_reply_before' => '<h2 id="reply-title"' . aamla_get_attr( 'comment-reply-title' ) . '>',
			'title_reply_after'  => '</h2>',
		]
	);
	?>

</div><!-- #comments -->

<?php
