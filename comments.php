<?php if ( $comments ) : ?>

	<div id="comments-wrap">
		<h3>Comments</h3>
		<?php wp_list_comments( 'avatar_size=48' ); ?>
		<div class="pagination"><?php paginate_comments_links(); ?></div>
	</div>
  
<?php endif; ?>


<?php if ( comments_open() || pings_open() ) : ?>

	<?php comment_form( 'comment_notes_before=&comment_notes_after=' ); ?>

<?php elseif ( $comments ) : ?>

	<div id="respond"><p id="closed">Comments Closed</p></div>
  
<?php endif; ?>