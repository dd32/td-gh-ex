<?php
/**
* comments.php
*
* @author    Franchi Design
* @package   Atomy
*/

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area <?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_body','container') )?>">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title mt-5 mb-5">
			<?php
			$atomy_comment_count = get_comments_number();
			if ( '1' === $atomy_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'atomy' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $atomy_comment_count, 'comments title', 'atomy' ) ),
					number_format_i18n( $atomy_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->
		<?php the_comments_navigation(); ?>
		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol', 
				'short_ping' => true,
			) );
			?>
		</ol><!-- .comment-list -->
		<?php
		the_comments_navigation();
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments">
			 <?php esc_html_e('Comments are closed.','atomy');?>
			</p>
			<?php
		endif;
	endif; // Check for have_comments().
	$comments_args = array(
		'submit_button' => __('<button name="%1$s" type="submit" id="%2$s" class="button post-readmore at-gen-act" value="%4$s">Post Comment</button>','atomy'),
	);
	comment_form($comments_args);
	?>
</div><!-- #comments -->





