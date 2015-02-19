<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area container_16 containermargin">
	<div class="grid_16">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'minimum-minimal' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>

		<?php minimum_minimal_comment_nav(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 120,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php minimum_minimal_comment_nav(); ?>

	<?php endif; // have_comments() ?>

	<?php
		
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'minimum-minimal' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>
	</div>
</div><!-- .comments-area -->

