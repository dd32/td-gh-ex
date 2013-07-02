<div id="comments">
<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'star' ); ?></p>
</div><!-- #comments -->

<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>
<?php if ( have_comments() ) : ?>
			<h3 class="comments-title"><?php comments_number(__('No Responses to ','star'), __('1 Response to ','star'), __('% Responses to ','star'));  echo get_the_title(); ?></h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'star' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'star' ) ); ?></div>
			</div>
<?php endif; // check for comment navigation ?>

			<ol class="commentlist">
				<?php wp_list_comments(); ?>
			</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'star' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'star' ) ); ?></div>
			</div>
<?php endif; // check for comment navigation ?>
<?php endif; // end have_comments() ?>

<?php comment_form(); ?>

</div>
