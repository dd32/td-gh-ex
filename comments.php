<section class="comment-right">
<?php if ( post_password_required() ) : ?>
<p><?php _e('Enter your password to view comments.'); ?></p>
</section>

<?php return; endif; ?>

<?php
	// You can start editing here -- including this comment!
?>

<?php if ( have_comments() ) : ?>
<h2 id="comments"><?php comments_number(__('No Comments'), __('1 Comment'), __('% Comments') ); ?></h2>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
			<p><?php previous_comments_link() ?>
            <?php next_comments_link() ?></p>
			<?php endif; ?>

<ol class="commentlist">
<?php
wp_list_comments( array( 'callback' => 'nwc_comment' ) );
?>
</ol>
			

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
			<p><?php previous_comments_link() ?>
            <?php next_comments_link() ?></p>
			<?php endif; ?>


<?php else : // or, if we don't have comments:

	/* If there are no comments and comments are closed,
	 * let's leave a little note, shall we?
	 */
	if ( ! comments_open() ) :
?>

<p><?php _e( 'Comments are closed.'); ?></p>

<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php comment_form(); ?>

</section>
