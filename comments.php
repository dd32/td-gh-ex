<?php if ( post_password_required() ) return; ?>

<?php if ( $comments ) : ?>
	<div id="comments-wrap">
		<h3><?php _e('Comments', 'asteroid'); ?></h3>
		<ul>
		<?php wp_list_comments( 'avatar_size=48' ); ?>
		</ul>
		<div class="pagination"><?php paginate_comments_links(); ?></div>
	</div>
<?php endif; ?>

<?php if ( comments_open() || pings_open() ) : ?>
	<?php comment_form( 'comment_notes_before=&comment_notes_after=' ); ?>
<?php elseif ( $comments ) : ?>
	<div id="respond"><p id="closed"><?php _e('Comments Closed', 'asteroid'); ?></p></div>
<?php endif; ?>