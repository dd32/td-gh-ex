
			<div id="comments" class="boxes">
<?php if ( post_password_required() ) : ?>
				<div class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'richwp' ); ?></div>
			</div><!-- .comments -->
<?php
		return;
	endif;
?>


<?php if ( have_comments() ) : ?>
			<h2 id="comments-title"><?php comments_number(
				sprintf( __( 'No Responses to %s', 'richwp' ), '<em>' . get_the_title() . '</em>' ),
				sprintf( __( 'One Response to %s', 'richwp' ), '<em>' . get_the_title() . '</em>' ),
				sprintf( __( '%% Responses to %s', 'richwp' ), '<em>' . get_the_title() . '</em>' )
			); ?> </h2>

<?php if ( get_comment_pages_count() > 1 ) : ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'richwp' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'richwp' ) ); ?></div>
			</div>
<?php endif; ?>

			<ol class="commentlist">
				<?php wp_list_comments( array( 'callback' => 'richwp_comment' ) ); ?>
			</ol>

<?php if ( get_comment_pages_count() > 1 ) :  ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'richwp' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'richwp' ) ); ?></div>
			</div>
<?php endif; ?>

<?php else : ?>

<?php if ( comments_open() ) :  ?>

<?php else : ?>

		<p class="nocomments"><?php _e( 'Comments are closed.', 'richwp' ); ?></p>

<?php endif; ?>
<?php endif; ?>

<?php  comment_form(); ?>

</div><!-- #comments -->
