<?php

	/**
	* The template for displaying comments
	*
	* This is the template that displays the area of the page that contains both the current comments
	* and the comment form.
	* @package anorya
	*/


	if ( post_password_required() ) {
		return;
	}
?>

	<div id ="comments" class="post-comments">
		<?php if ( have_comments() ) : 
			if(get_comments_number() == 1){ ?>
				<h4><?php print esc_html__('1 Comment','anorya'); ?></h4>
			<?php }
			else{ ?>
				<h4><?php printf(esc_html__('%s Comments','anorya'),esc_attr(get_comments_number()));?></h4>
			<?php }	

			//comments navigation if there are multiple comment pages
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
			<nav id="comment-nav-above" class="navigation comment-navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'anorya' ); ?></h2>
				<div class="nav-links">
					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'anorya' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'anorya' ) ); ?></div>
				</div>
			</nav>
			<?php endif; // Check for comment navigation. ?>

			<?php
				wp_list_comments( array('style'      => 'div',
										'short_ping' => true,
										'callback' => 'anorya_comments_callback',
										'avatar_size' => 75,) );	?>
		

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'anorya' ); ?></h2>
				<div class="nav-links">
					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'anorya' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'anorya' ) ); ?></div>
				</div>
			</nav>
			<?php	endif; // Check for comment navigation.

		endif; // Check for have_comments().


		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'anorya' ); ?></p>
		<?php endif; ?>
	</div><!-- #comments -->


	<div class="row comment-form">
	<?php 
		$aria_req = ( $req ? " aria-required='true'" : '' );
		
		comment_form($args = array( 'title_reply_before' => '<h6>',
									'title_reply_after' => '</h6>',
									'fields' => apply_filters( 'comment_form_default_fields', 
									array(	'author' => '<div class="col-md-4 col-sm-4">' .
														'<input id="author" name="author" class="comment-form-input" type="text" placeholder="'.esc_html__('Enter your name','anorya').
														( $req ? esc_attr__(' - (Required)','anorya') : '' ).'" value="'.esc_attr( $commenter['comment_author'] ) .'" ' . $aria_req . ' /></div>',
											'email' =>	 '<div class="col-md-4 col-sm-4">'.
														'<input id="email" name="email" type="text" class="comment-form-input" placeholder="'.esc_html__('Your e-mail address','anorya').
														( $req ? esc_attr__(' - (Required)','anorya') : '' ).'" value="' . esc_attr(  $commenter['comment_author_email'] ).'" '.$aria_req.'/></div>',
											'url' =>    '<div class="col-md-4 col-sm-4">'.
														'<input id="url" name="url" type="text" class="comment-form-input" placeholder="'.esc_html__('Your website url','anorya').
														( $req ? esc_attr__(' - (Required)','anorya') : '' ).'" value="' . esc_attr( $commenter['comment_author_url'] ).
														'"  /></div>')),
									'comment_field' =>  '<div class="col-md-12 col-sm-12">'.
														'<textarea id="comment" name="comment" placeholder="'.esc_attr__('Enter Your Comment','anorya').( $req ? esc_attr__(' - (Required)','anorya') : '' ).
														'" class="comment-form-textarea" cols="45" rows="8" aria-required="true">'.
														'</textarea></div>',
									'class_submit' => 'comment-form-submit btn-primary',
									'comment_notes_before' => '<div class="col-md-12 col-sm-12"><p>'.esc_html__('Your e-mail will not be published. All required Fields are marked','anorya').'</p></div>',
									
														));

	?>
	</div>