<?php
/*
 * The template for displaying comments.
 */
?>

<?php 
if ( post_password_required() )
	return;
?>

<div id="comments">

	<?php if ( have_comments() ) : ?>

		<h4 class="comments-title">
			<?php printf( _n( '1 response on %2$s', '%1$s responses on %2$s', get_comments_number(), 'shipyard' ), number_format_i18n( get_comments_number() ), get_the_title() ); ?>
		</h4>

		<ol class="comment-list">
			<?php wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 32,
			) ); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="comment-nav">
				<?php previous_comments_link( __( '&laquo; Older Comments', 'shipyard' ) ); ?>
				<?php next_comments_link( __( 'Newer Comments &raquo;', 'shipyard' ) ); ?>
			</div>
		<?php endif; ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<h4 class="no-comments"><?php _e( 'Comments are closed' , 'shipyard' ); ?></h4>
		<?php endif; ?>

	<?php endif; ?>

	<?php comment_form(); ?>

</div>