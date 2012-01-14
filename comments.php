			<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'This is password protected.', 'theme-adamsrazor' ); ?></p>
			</div>
<?php		
		return;
	endif;
?>

<?php if ( have_comments() ) : ?>
			<h3 id="comments-title"><?php
			printf( _n( 'One response to %2$s', '%1$s responses to %2$s', get_comments_number(), 'theme-adamsrazor' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
			?></h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="navigation">
				<div class="nav-previous">&nbsp;&nbsp;<?php previous_comments_link( __( '<span class="meta-nav">&laquo;</span> Older Comments', 'theme-adamsrazor' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&raquo;</span>', 'theme-adamsrazor' ) ); ?>&nbsp;&nbsp;</div>
			</div>
<?php endif;  ?>

			<ol class="commentlist">
				<?php
					wp_list_comments( array( 'callback' => 'adamsrazor_comment' ) );
				?>
			</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="navigation">
				<div class="nav-previous">&nbsp;&nbsp;<?php previous_comments_link( __( '<span class="meta-nav">&laquo;</span> Older Comments', 'theme-adamsrazor' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&raquo;</span>', 'theme-adamsrazor' ) ); ?>&nbsp;&nbsp;</div>
			</div>
<?php endif;  ?>

<?php else : 	
	if ( ! comments_open() ) :
?>
	<p class="nocomments"><?php _e( 'Comments are closed.', 'theme-adamsrazor' ); ?></p>
<?php endif; ?>

<?php endif; ?>

<?php 
	$args = array('comment_notes_after' => '');
	comment_form( $args); 
	?>	
</div>
