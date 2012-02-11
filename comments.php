<?php
/**
 * The template for displaying Comments.
 *
 * @since Akyuz 1.0
 */
?>
	<div id="comments" class="span-15 last" >
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', AKYUZ_TEXT_DOMAIN ); ?></p>
	</div><!-- #comments -->
	<?php
		return;
	endif;
	?>

	<?php if ( have_comments() ) : ?>
		<h3 id="comments-title" class="" style="">
			<?php
				printf( _n( 'One comment', '%1$s comments', get_comments_number(), AKYUZ_TEXT_DOMAIN ),
					number_format_i18n( get_comments_number() ) );
			?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', AKYUZ_TEXT_DOMAIN ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', AKYUZ_TEXT_DOMAIN ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', AKYUZ_TEXT_DOMAIN ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<ol class="commentlist">
			<?php
				wp_list_comments( array( 'callback' => 'akyuz_comment' ) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', AKYUZ_TEXT_DOMAIN ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', AKYUZ_TEXT_DOMAIN ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', AKYUZ_TEXT_DOMAIN ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', AKYUZ_TEXT_DOMAIN ); ?></p>
	<?php endif; ?>
	
	<?php comment_form(); ?>

</div><!-- #comments -->
