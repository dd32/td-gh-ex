<?php
/**
 * The template for displaying comments
 * @package Best Classifieds
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
if ( comments_open()) : ?>
<div id="comments" class="comments-area">
	<?php // You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php $best_classifieds_comments_number = get_comments_number();
				if ( '1' === $best_classifieds_comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'best-classifieds' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s Reply to &ldquo;%2$s&rdquo;',
							'%1$s Replies to &ldquo;%2$s&rdquo;',
							$best_classifieds_comments_number,
							'comments title',
							'best-classifieds'
						),
						number_format_i18n( $best_classifieds_comments_number ),
						get_the_title()
					);
				} ?>
		</h2>
			<?php wp_list_comments( array(
				'avatar_size' => 100,
				'style'       => 'div',
				'short_ping'  => true,
				'reply_text'  => esc_html__( 'Reply', 'best-classifieds' ),
			) ); ?>
		<?php the_comments_pagination( array(
			'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous', 'best-classifieds' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next', 'best-classifieds' ) . '</span>',
		) );
	endif; // Check for have_comments().
	?>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<?php 	comment_form(); ?>
	</div>
</div>
<?php endif;