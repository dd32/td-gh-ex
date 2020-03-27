<div class="comentarios">
	<?php if ( have_comments() ) : ?><!--Take the comments-->
		<!--Comments area title-->
		<h4 class="comments-title">
			<?php
				printf( _nx( '1 comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'baena' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h4>
		<!--List of comments-->
		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 56,
				) );
			?>
		</ul><!--.comment-list -->
	<?php endif; //have_comments() ?>

	<?php
		//If the comments are closed we show a message
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php __n( 'Comments are closed.' ); ?></p>
	<?php endif; ?>

	<!--THE CALL TO THE FORM MAY COME WITH AN ARRAY TO SPECIFY SOME THINGS-->
		<?php 
		$comments_args = array(
		//Change title
		'title_reply' => __('Tell us something', 'baena'), 
		//Change text button
		'label_submit' => __('Send', 'baena'),
		//Class button
		'class_submit'      => 'btn-enviar',
		//Change texarea
		'comment_field' => '<textarea id="comment" class="mensaje" name="comment" rows="8" aria-required="true" placeholder="' . __('Write your opinion...', 'baena') . '"></textarea>', //Delete paragraph and label from textarea
		//Clear the default notes from the form	
		'comment_notes_before' => '', 
		//Message later
		'comment_notes_after' => '<p class="comment-notes">' . __( 'Your email will not be shown ;)', 'baena' ) . '</p>'
		);
		comment_form($comments_args);
		?>
</div><!-- .comentarios -->

<!--COMMENTS SECOND WAY-->
<div class="comentarios">
	<?php if( have_comments() ) { ?>
	<h3>
		<?php comments_number(
		__('No comments for now', 'baena'),
		__('There is a comment posted', 'baena'),
		__('There are % comments', 'baena')
		); ?>
	</h3>
	<ol id="comments-list">
		<?php wp_list_comments();?>
	</ol>
	<?php paginate_comments_links(); ?>
	<?php } ?>
	<?php comment_form(); ?>
</div><!-- .comentarios -->