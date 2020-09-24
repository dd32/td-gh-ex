<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to bavotasan_comment() which is
 * located in the functions.php file.
 *
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">
	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 id="comments-title">
			<i class="fa fa-comments"></i>&nbsp;
			<?php
				printf( _n( '1 comment for &ldquo;%2$s&rdquo;', '%1$s comments for &ldquo;%2$s&rdquo;', get_comments_number(), 'arcade-basic' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<ol class="commentlist">
			<?php //wp_list_comments( array( 'callback' => 'bavotasan_comment' ) ); ?>
			<?php /* 21-sept-20 
			* update new code for comments
			*/
			wp_list_comments( array( 
				'style' => 'ul' ,
				'avatar_size' => 60,
				'max_depth' => 8
			) ); ?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<div id="comment-nav-below" role="navigation">
			<div class="sr-only section-heading"><?php _e( 'Comment navigation', 'arcade-basic' ); ?></div>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'arcade-basic' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'arcade-basic' ) ); ?></div>
		</div>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'arcade-basic' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form( array(
		'comment_notes_after' => '',
	) ); ?>
</div><!-- #comments .comments-area -->