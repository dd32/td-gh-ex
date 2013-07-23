
<?php 
/**
 * Comments Template
 *
 *
 * @file           comments.php
 * @package        Appointment
 * @author         Priyanshu Mittal,Shahid Mansuri and Akhilesh Nagar
 * @copyright      2013 Appointment
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/appoinment/comments.php
 */


?>
		
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'appointment' ); ?></p>
	</div><!-- #comments -->
	<?php
			return;
		endif;
	?>

 
     
	<?php if ( have_comments() ) : ?>
		
       
           <div class="comment_new">
			<?php
			printf( _n( '<h3>Comment<span>(1)</span></h3> ', '<h3> Comment <span>(%1$s)</span></h3>  ', get_comments_number(), 'appointment' ),
					number_format_i18n( get_comments_number() ), '' ); ?>
			</div>
	     
         <div class="comment_mn">
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'appointment' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'appointment' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'appointment' ) ); ?></div>
		</nav>
		<?php endif;  ?><!--check for comment navigation-->

	
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use appointment_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define appointment_comment() and that will be used instead.
				 * See appointment_comment() in appointment/functions.php for more.
				 */
				wp_list_comments( array( 'callback' => 'appointment_comment' ) );
			?>
	</div><!-- comment_mn -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'appointment' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'appointment' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'appointment' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php
		
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
		   echo "comment are close";
	?>
		  
	<?php endif; ?>
   
<div class="leave_comment_mn">
	<?php 
	      
          $comments_args = array(
        // change the title of send button 
     'label_submit'=>'Submit Now',
	
        // change the title of the reply section
        'title_reply'=>'',
      
        'comment_notes_after' => '',
     
		 
        
        'comment_field' => '<p class="comment-form-comment"> <h2><label for="comment">' . _e( 'Leave a Comment','appointment' ) . '</label></h2><br /><textarea id="comment" name="comment" aria-required="true" placeholder="Love to Hear from you."></textarea></p>',
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( get_permalink() ) ) . '</p>',
		
);

comment_form($comments_args);
?>
					
</div><!-- leave_comment_mn -->

