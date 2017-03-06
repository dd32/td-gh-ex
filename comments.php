<?php
/**
 * The template for displaying Comments.
 *
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) { return; }
if ( have_comments() ) : ?>
<div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12 admin">
     	 <?php wp_list_comments(array('avatar_size' => 110,'status' => 'approve', 'style' => 'div', 'short_ping' => true)); ?>
         <?php the_comments_navigation(); ?>
    </div>
</div>
<?php endif;
if ( comments_open()) { ?>
<div class="row">
	<div class="col-md-12 comment">
        <h5> <?php comments_number(); ?></h5>
    </div>
	<div class="col-md-12 col-sm-12 leave_form">
    	<?php comment_form(); ?>	
    </div>
</div>
<?php } ?>