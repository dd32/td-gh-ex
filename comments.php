<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package altitude-lite
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
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
		<?php
		$altitude_lite_comment_count = get_comments_number();
		if ( '1' === $altitude_lite_comment_count ) {
			printf(
				/* translators: 1: title. */
				esc_html__( 'One Comment', 'altitude-lite' )
			);
		} else {
			printf( // WPCS: XSS OK.
				/* translators: 1: comment count number, 2: title. */
				esc_html( _nx( '%1$s Comments ', '%1$s Comments', $altitude_lite_comment_count, 'comments title', 'altitude-lite' ) ),
				number_format_i18n( $altitude_lite_comment_count ),
				'<span>' . get_the_title() . '</span>'
			);
		}
		?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
		<?php
		wp_list_comments(
			array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => '80',
				'callback'    => 'altitude_lite_custom_comment_list',
			)
		);
		?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'altitude-lite' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->
