<?php
/*	@Theme Name	:	becorp-Pro
* 	@file         :	comments.php
* 	@package      :	becorp-Pro
* 	@author       :	Asiathemes
* 	@license      :	license.txt
* 	@filesource   :	wp-content/themes/becorp/comments.php
*/
?>
<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'becorp' ); ?></p>
	<?php return; endif; ?>
         <?php if ( have_comments() ) : ?>
		<div id="comments">	
			<h2 class="comments-title">
				<?php echo comments_number(__('No Comments','becorp'), __('1 Comment','becorp'), '% Comments'); ?>
			</h2>
			<ol class="comments-list">
				<li>
					<ul>
						<li>
							<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>		
							<?php endif; ?>
							<?php wp_list_comments( array( 'callback' => 'asiathemes_comment' ) ); ?>
						</li>
					</ul>
				</li>
			</ol>
		</div>
		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'becorp' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'becorp' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'becorp' ) ); ?></div>
		</nav>
		<?php endif;  ?>
		<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : 
        //_e("Comments Are Closed!!!",'becorp');
		?>
	<?php endif; ?>
	<?php if ('open' == $post->comment_status) : ?>
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php _e("You must be",'becorp'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e("logged in",'becorp')?></a> <?php _e('to post a comment','becorp'); ?>
</p>
<?php else : ?>
	<div id="comments">
	<?php  
	 $fields=array(
		'author' =>'<div class="row"> <div class="col-md-4">
                                        	<label for="author">'.__('Name','becorp').'<span class="required">*</span></label>
                                            <input id="author" name="author" type="text" value="" size="30" aria-required="true"></div>',
		'email' => '<div class="col-md-4">
                                        	<label for="email">'.__('Email','becorp').'<span class="required">*</span></label>
                                            <input id="email" name="author" type="text" value="" size="30" aria-required="true"></div>',
		'website' => '<div class="col-md-4">
                                        	<label for="url">'.__('Website','becorp').'<span class="required">*</span></label>
                                            <input id="url" name="url" type="text" value="" size="30" aria-required="true">
                                        </div></div>', );
	function my_fields($fields) { 
		return $fields;
	}
	add_filter('comment_form_default_fields','my_fields');
		$defaults = array(
		'fields'=> apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'=> '<div class="row">
                                    	<div class="col-md-12">
                                            <label for="comment">'.__('Add Your Comment','becorp').'</label>
                                            <textarea name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                        </div>
                                    </div>',		
		
		'logged_in_as' => '<p class="logged-in-as">' . __( "Logged in as ",'becorp' ).'<a href="'. admin_url( 'profile.php' ).'">'.$user_identity.'</a>'. '<a href="'. wp_logout_url( get_permalink() ).'" title="Log out of this account">'.__(" Log out?",'becorp').'</a>' . '</p>',
		'class_submit' => 'btn btn-readmore',
		'id_submit'            => 'comment_btn',
		'label_submit'=>__( 'Submit Comment','becorp'),
		'comment_notes_after'=> '',
		'title_reply'=> '<h2>'.__( 'Leave a Reply','becorp').'</h2>',
		'id_form'=> 'action'
		);
	comment_form($defaults);?>						
	</div>
<?php endif; // If registration required and not logged in ?>
<?php endif;  ?>