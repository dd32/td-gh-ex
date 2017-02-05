<section class="comment-box">

	<?php if ( post_password_required() ) { return; } ?>

	<?php if ( have_comments() ) : ?>
	<h4 id="comments">
		<?php
			$comments_number = get_comments_number();
			if ( 1 === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One comment on &ldquo;%s&rdquo;', 'comments title', 'ace' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
					'%1$s comment on &ldquo;%2$s&rdquo;',
					'%1$s comments on &ldquo;%2$s&rdquo;',
					$comments_number,
					'comments title',
					'ace'
					),
				number_format_i18n( $comments_number ),
				get_the_title()
				);
			}
		?>
	</h4>

	<?php the_comments_navigation(); ?>

	<ol class="commentlist">
		<?php wp_list_comments( array( 'style' => 'ul', 'short_ping' => true, 'avatar_size' => 42 ) ); ?>
	</ol>

	<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'ace' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</section>

