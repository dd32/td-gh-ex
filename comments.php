<?php 
if ( post_password_required() ) {
	return;
};?>
<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
 <ol class="commentlist">
  <?php wp_list_comments(); ?>
 </ol>
 <div class="navigation">
  <?php paginate_comments_links(); ?> 
 </div>
<?php comment_form(); ?>