<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments">

<?php if ( have_comments() ) : ?>

	<h3 class="comments-title"><?php esc_html_e( 'Comments', 'arix' ); ?></h3>

	<div class="comment-list">
		<?php
		wp_kses_post( wp_list_comments( array(
			'style'       => 'div',
			'short_ping'  => true,
			'avatar_size' => 40,
		) ) );
		?>
	</div><!--.comment-list-->

	<?php the_comments_navigation(); ?>

	<?php if ( ! comments_open() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'arix' ); ?></p>
	<?php endif; ?>

<?php endif; ?>

<?php
comment_form( array(
	'title_reply' => __( 'Write a Comment', 'arix' ),
) );
?>

</div><!--#comments-->
