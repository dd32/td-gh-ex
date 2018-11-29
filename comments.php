<?php
/**
 * The template for displaying Comments.
 */
if ( post_password_required() )
	return;
?>
<div class="clearfix"></div>
<div id="comments" class="comments-area">
  <?php if ( have_comments() ) : 	?>
  <div class="col-md-12 no-padding clearfix"> 
  	<span class="recent-posts-title"><?php echo esc_html(get_comments_number()).esc_html__(' Comments','top-mag'); ?></span> 
  </div>
  <ul class="">
    <?php wp_list_comments( array( 'callback' => 'top_mag_comment', 'short_ping' => true, 'style' => 'ul' ) ); ?>
  </ul>
  <?php paginate_comments_links(); 
   endif; 
   comment_form(); ?>
</div>