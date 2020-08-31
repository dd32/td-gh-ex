<!--COMMENTS SECOND WAY-->

<div class="commentary">

	<?php if( have_comments() ) { ?>

	<h3>

		<?php comments_number(

		__('No comments for now.', 'baena'),

		__('There is a comment posted.', 'baena'),

		__('There are % comments.', 'baena')

		); ?>

	</h3>

	<ol id="comments-list">

		<?php wp_list_comments();?>

	</ol>

	<?php paginate_comments_links(); ?>

	<?php } ?>

	<?php comment_form(); ?>

</div><!-- .commentary -->