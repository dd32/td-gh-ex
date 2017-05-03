<?php
/**
 * The template for displaying Comments.
 *
 *
 * @package Avvocato
 */
?>
<?php if ( ! post_password_required() ) { ?>
<div class="comments comment-form-container">
	<?php if ( ! comments_open() & is_single() )  : ?><p><?php _e( 'Comments are currently closed.', 'avvocato' ); ?></p><?php endif; ?>
	<?php if ($comments) : ?>
		<h3><?php printf( esc_html( _n( 'We deleted %d spam message.', 'We deleted %d spam messages.', $count, 'my-text-domain'  ) ), $count ); ?></h3>
		<ul class="commentlist">
		    <?php wp_list_comments(); ?>
		</ul>
	<?php endif; ?>
	<p><?php paginate_comments_links(); ?></p>
	<?php comment_form(); ?>
</div>
<?php } ?>