<?php // The template part for displaying comments on posts ?>


<?php 
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) { ?>
    
    	<div class="separator-line">
		</div>
    
        <h3 class="comments-title">
            <?php 
            echo get_comments_number().' ';
            printf( _nx( 'comment', 'comments', get_comments_number(), 'comment section title', 'bento' ) ); 
            ?>
        </h3>
    
        <?php bnt_comments_nav(); ?>
    
        <div class="comment-list">
            <?php
			// The primary comments loop
			wp_list_comments( array(
				'style' => 'div',
				'type' => 'comment',
				'avatar_size' => 40,
				'callback' => 'bnt_comment',
			) );
            ?>
        </div>
    
        <?php bnt_comments_nav(); ?>
    
    <?php } ?>
    
    <?php 
	// Output custom commment form
	$commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $fields =  array(
        'author' => '
            <div class="comment-form-field comment-form-author">
                <label for="author">'.__( 'Name', 'bento' ).'</label>
                <input 
                    id="author" 
                    name="author" 
                    type="text" 
                    placeholder="'.__( 'Name','bento' ).'" 
                    value="'.esc_attr( $commenter['comment_author'] ).'" 
                    size="30"'.$aria_req.
                ' />
            </div>
        ',
        'email' => '
            <div class="comment-form-field comment-form-email">
                <label for="email">'.__( 'Email', 'bento' ).'</label>
                <input 
                    id="email" 
                    name="email" 
                    type="text" 
                    placeholder="'.__( 'Email','bento' ).'" 
                    value="'. esc_attr( $commenter['comment_author_email'] ).'" 
                    size="30"'.$aria_req.
                ' />
            </div>
        ',
    );
    $comment_form_args = array(
        'label_submit' => __( 'Submit Comment', 'bento' ),
        'comment_notes_before' => '',
        'comment_field' => '
            <div class="comment-form-comment">
                <textarea
                    id="comment" 
                    name="comment" 
                    placeholder="'.__( 'Comment', 'bento' ).'" 
                    cols="45" rows="8" 
                    aria-required="true"
                ></textarea>
            </div>
        ',
        'fields' => apply_filters( 'comment_form_default_fields', $fields ),
    );
    comment_form($comment_form_args); 
    ?>
		
</div>