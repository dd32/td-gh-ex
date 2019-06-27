
<?php
    if(!post_password_required()){
         wp_list_comments(array(
    		'avatar_size'	=> 60,
    		'style'			=> 'ul',
    		'callback'		=> 'axiohost_comments',
    		'type'			=> 'all'
    	)); 
    }
 
 ?>
<div class="comment-pagination <?php if(empty(get_comments_number())){echo 'minus-comment-spacing';}?>">
    <?php 
        paginate_comments_links(array(
            'prev_text' => __('<','axiohost'),
            'next_text' => __('>','axiohost'),
            'mid_size'  => 3
        ));
    ?>
   
</div>
   
<?php

$comments_args = array(
    // Change the title of send button 
    'label_submit' => __( 'Add Comment', 'axiohost' ),
    // Change the title of the reply section
    'title_reply' => __( 'Leave a Comment', 'axiohost' ),
    // Remove "Text or HTML to be displayed after the set of comment fields".
    'comment_notes_after' => '',
    // Redefine your own textarea (the comment body).
    'class_submit' => 'submit_class',
    'fields' => array(
        'author' => '<div class="row"> <div class="col-md-6"><input type="text" class="form-control" name="author" placeholder="'.esc_html__('Your Name*','axiohost').'" required /></div>',
        'email' => '<div class="col-md-6"><input class="form-control" placeholder="'.esc_html__('Your Email*','axiohost').'" name="email" type="email" required></div></div> ',
    ),
    'comment_field' => '<textarea placeholder="'.esc_html__('Type Comment','axiohost').'" class="form-control" id="comment" name="comment" rows="6" aria-required="true"></textarea>',
    'id_form'           => 'commentform',
    'class_form'      => 'comment-form',
    'id_submit'         => 'submit',
    'class_submit'   => 'btn-primary btn',
    'title_reply_to'    => __( 'Leave a Reply to %s', 'axiohost' ),
    'cancel_reply_link' => __( 'Cancel Reply', 'axiohost' ),
    'format'            => 'xhtml',

);
comment_form( $comments_args );
?>