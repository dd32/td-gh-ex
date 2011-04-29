<section class="commentbox">
<?php if ( post_password_required() ) : ?>
<p><?php _e('Enter your password to view comments.'); ?></p>
</section>

<?php return; endif; ?>

<?php
	// You can start editing here -- including this comment!
?>

<?php if ( have_comments() ) : ?>


<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
			<p><?php previous_comments_link() ?>
            <?php next_comments_link() ?></p>
			<?php endif; ?>

<ol class="commentlist">
<?php
wp_list_comments( array( 'callback') );
?>
</ol>
			

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
			<p><?php previous_comments_link() ?>
            <?php next_comments_link() ?></p>
			<?php endif; ?>


<?php endif; // end have_comments() ?>

<?php comment_form(); ?>

</section>
