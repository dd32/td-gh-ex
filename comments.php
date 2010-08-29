<?php if ( post_password_required() ) : ?>
	<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'rcg-forest'); ?></p>
<?php
	return;
endif;
?>

<?php if ( have_comments() ) : ?>
	<h3 id="comments">
		<?php comments_number(__('No Responses', 'rcg-forest'), __('One Response', 'rcg-forest'), __('% Responses', 'rcg-forest'));?>
		<?php printf(__('to &#8220;%s&#8221;', 'rcg-forest'), the_title('', '', false)); ?>
	</h3>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<div class="navigation-comments">
			<div class="nav-prev"><?php previous_comments_link( __( '&laquo; Older Comments', 'rcg-forest' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &raquo;', 'rcg-forest' ) ); ?></div>
		</div>
	<?php endif; ?>

	<ul class="commentlist">
		<?php wp_list_comments(); ?>
	</ul>
	
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<div class="navigation-comments">
			<div class="nav-prev"><?php previous_comments_link( __( '&laquo; Older Comments', 'rcg-forest' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &raquo;', 'rcg-forest' ) ); ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>
<?php if ( ! comments_open() && ! is_page()) : ?>
	<p class="nocomments"><?php _e('Comments are closed.', 'rcg-forest'); ?></p>
<?php endif; ?>

<?php comment_form(); ?>
