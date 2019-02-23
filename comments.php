<?php
/*
 * Comments Template
 */
?>

<div id="comments">
	<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php _e('Protected Comments: Please enter your password to view comments.', 'northern-web-coders'); ?></p>
</div>
    <?php
    return;
    endif; 
    ?>

	<?php if ( have_comments() ) : ?>
	<h3 id="comments-title"> 
	<?php comments_number( 'Leave a comment', __( '1 Comment to', 'northern-web-coders' ), __( '% Comments to', 'northern-web-coders' ) ) ?> <?php the_title(); ?>
    </h3>

	<ol class="commentlist">
		<?php wp_list_comments(); ?>
	</ol>

	<?php if ( get_comment_pages_count() > 1 && get_option('page_comments') ) : ?>
    <div class="pagenav">
    <?php previous_comments_link( __( '&laquo; Older Comments', 'northern-web-coders' ) ); ?> -  <?php next_comments_link( __( 'Newer Comments &raquo;', 'northern-web-coders' ) ); ?>
    </div>
	<?php endif; ?>

	<?php endif; // end have_comments() ?>

	<?php comment_form(); ?>
</div>
