<?php
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

	<h3 class="comments-title">
		<?php
		printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'arix' ),
			number_format_i18n( get_comments_number() ) );
		?>
	</h3>

	<div class="comment-list">
		<?php
		wp_list_comments( array(
			'style'       => 'div',
			'short_ping'  => true,
			'avatar_size' => 40
		) );
		?>
	</div><!-- .comment-list -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h4 class="screen-reader-text"><?php _e( 'Comment navigation', 'arix' ); ?></h4>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'arix' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'arix' ) ); ?></div>
	</nav>
	<?php endif; ?>

	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'arix' ); ?></p>
	<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
