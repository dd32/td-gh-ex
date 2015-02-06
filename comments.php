<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package star
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
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'star' ),
				number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'star' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'star' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'star' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 60,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'star' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'star' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'star' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'star' ); ?></p>
	<?php endif; ?>


 <?php 
 	$required_text = '' ;
    
    $star_comment_args = array( 'fields' => apply_filters( 'comment_form_default_fields', array(

	'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'star' ) . 
                ( $req ? ' <span class="required">(' . __( 'required', 'star' )  . ')</span>' : '' ) . 
                '</label> ' .
                '<input id="author" name="author"  aria-required="true" type="text" value="' .
                esc_attr( $commenter['comment_author'] ) . '"  />' .
                '</p>',
  
    'email'  => '<p class="comment-form-email">' .
                '<label for="email">' . __( 'Email', 'star' ) .
                ( $req ? ' <span class="required">(' . __( 'required', 'star' ) . ')</span>' : '' ) .
                '</label> ' . '<input id="email" name="email" aria-required="true" type="text" value="' . 
				esc_attr(  $commenter['comment_author_email'] ) . '" />' .
				'</p>',
 
    'url'    => '<p class="comment-form-url">' .
				'<label for="url">' . __( 'Website', 'star' ) . '</label>' .
	            ' <input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></p>' ) ),
   
    'comment_field' => '<p class="comment-form-comment">' .
                '<label for="comment id="comment-label">' . __( 'Comment', 'star' ) . ' <span class="required">(' . __( 'required', 'star' )  . ')</span>' . '</label> ' .
                '<textarea id="comment" name="comment" aria-required="true" required required aria-labelledby="comment-label, html-tags" rows="8"></textarea>' .
                '</p>',

    'comment_notes_after' => '<p class="form-allowed-tags" id="html-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'star' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',

	'comment_notes_before'=> '<p class="comment-notes">' . __( 'Your email address will not be published.', 'star' ) . ( $req ? $required_text : '' ) . '</p>',
	); 

	 comment_form($star_comment_args); 
	 ?>

</div><!-- #comments -->


