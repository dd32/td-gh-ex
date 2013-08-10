	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'appointment' ); ?></p>
	<?php return;endif;?>
         <?php if ( have_comments() ) : ?>
		
         <div class="comment_mn">
	
			<?php
				  printf( _n( '<p style="color: #f22853; margin-bottom: 30px; margin-top:20px;">One thought on &ldquo;%2$s&rdquo;', '<p style="color: #f22853; margin-top:20px;">%1$s thoughts on &ldquo;%2$s&rdquo;</p>', get_comments_number(), 'appointment' ),
					number_format_i18n( get_comments_number() ),  get_the_title()  );?>
		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
		
		<nav id="comment-nav-above">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'appointment' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'appointment' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'appointment' ) ); ?></div>
		</nav>
		<?php endif;  ?>

	
			<?php
			
				wp_list_comments( array( 'callback' => 'appointment_comment' ) );
			?>
	</div><!-- comment_mn -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'appointment' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'appointment' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'appointment' ) ); ?></div>
		</nav>
		<?php endif;  ?>

	<?php
		
		elseif ( ! comments_open() /* &&  ! is_page() */  && post_type_supports( get_post_type(), 'comments' ) ) :
		   echo "comments are closed.";
	?>
		  
	<?php endif; ?>
   
<?php if ('open' == $post->comment_status) : ?>

 
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>

<?php else : ?>
 
<div class="leave_comment_mn">
	<?php 
	      
          $comments_args = array(
        // change the title of send button 
     'label_submit'=>'Submit Now',
	
        // change the title of the reply section
        'title_reply'=>'',
      
        'comment_notes_after' => '',
     
		 
        
        'comment_field' => '<p class="comment-form-comment"> <br /><textarea id="comment" name="comment" aria-required="true" placeholder="Love to Hear from you."></textarea></p>',
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( get_permalink() ) ) . '</p>',
		
);

comment_form($comments_args);
?>
					
</div><!-- leave_comment_mn -->

<?php endif; // If registration required and not logged in ?>

<?php endif;  ?>

