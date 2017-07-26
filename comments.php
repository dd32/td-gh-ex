<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments">

<?php if ( have_comments() ) : ?>

	<h3 class="comments-title">
		<?php
		printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'arix' ),
			number_format_i18n( get_comments_number() ) );
		?>
	</h3>

	<div class="comment-list">
		<?php
		wp_kses_post( wp_list_comments( array(
			'style'       => 'div',
			'short_ping'  => true,
			'avatar_size' => 40,
		) ) );
		?>
	</div><!--.comment-list-->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav class="comment-navigation">
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'arix' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'arix' ) ); ?></div>
		</nav>
	<?php endif; ?>

	<?php if ( ! comments_open() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'arix' ); ?></p>
	<?php endif; ?>

<?php endif; ?>

<?php
comment_form( array(
	'title_reply' => __( 'Write a Comment', 'arix' ),
) );
?>

</div><!--#comments-->
