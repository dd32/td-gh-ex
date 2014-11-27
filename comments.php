<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to aileron_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package Aileron
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

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
	<div class="comments-area-wrapper">

		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'aileron' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'aileron' ); ?></h1>
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav"><i class="fa fa-chevron-left"></i></span> Older Comments', 'aileron' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav"><i class="fa fa-chevron-right"></i></span>', 'aileron' ) ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use aileron_comment() to format the comments.
				 * If you want to override this in a child theme, then you can
				 * define aileron_comment() and that will be used instead.
				 * See aileron_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'aileron_comment' ) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'aileron' ); ?></h1>
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav"><i class="fa fa-chevron-left"></i></span> Older Comments', 'aileron' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav"><i class="fa fa-chevron-right"></i></span>', 'aileron' ) ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

	</div><!-- .comments-area-wrapper -->
	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	<div class="no-comments-wrapper">
		<p class="no-comments"><?php _e( 'Comments are closed.', 'aileron' ); ?></p>
	</div><!-- .comments-area-wrapper -->
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
