<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage B & W
 * @since B & W 1.1
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */

// don't load it if you can't comment
if ( post_password_required() ) {
	return;
}

?>

<?php // You can start editing here. ?>

<?php if ( have_comments() ) : ?>

	<h3 id="comments-title" class="h2">
		<?php comments_number( __( '<span>No</span> Comments', 'bnwtheme' ), __( '<span>One</span> Comment', 'bnwtheme' ), _n( '<span>%</span> Comments', '<span>%</span> Comments', get_comments_number(), 'bnwtheme' ) );?>
	</h3>

	<section class="commentlist">
		<?php
		wp_list_comments( array(
			'style'             => 'div',
			'short_ping'        => true,
			'avatar_size'       => 40,
			'callback'          => 'bnw_comments',
			'type'              => 'all',
			'reply_text'        => 'Reply',
			'page'              => '',
			'per_page'          => '',
			'reverse_top_level' => null,
			'reverse_children'  => ''
			) );
		?>
	</section>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav class="navigation comment-navigation" role="navigation">
		<div class="comment-nav-prev">
			<?php previous_comments_link( __( '&larr; Previous Comments', 'bnwtheme' ) ); ?>
		</div>
		<div class="comment-nav-next">
			<?php next_comments_link( __( 'More Comments &rarr;', 'bnwtheme' ) ); ?>
		</div>
	</nav>
	<?php endif; ?>

	<?php if ( ! comments_open() ) : ?>
		<p class="no-comments">
			<?php _e( 'Comments are closed.' , 'bnwtheme' ); ?>
		</p>
	<?php endif; ?>

	<?php endif; ?>

<?php comment_form(); ?>

