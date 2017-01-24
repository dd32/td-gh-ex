<?php
/* RECENT POSTS Default Image */
/* Post Title Function */
if(!function_exists( 'abaya_post_title')): 
 function abaya_post_title()
  {
    if ( is_single() ) :
  ?>
      <?php the_title(); ?>
     <?php else: ?>
     <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
   <?php endif; 
  }
endif;
if (!function_exists('abaya_post_thumbnail')) :
/**
* Display an optional post thumbnail.
*
* Wraps the post thumbnail in an anchor element on index views, or a div
* element when on single views.
*/
function abaya_post_thumbnail() {
    if(is_singular()) :
 ?>
  <?php if (post_password_required() || is_attachment() || ! has_post_thumbnail() ) { } else {the_post_thumbnail('abaya-post-thumbnail', array('class'=>'img-responsive','alt' => get_the_title() )); ?> 
<?php } ?>
 <?php else : ?>
  <a href="<?php the_permalink(); ?>">
   <?php if (post_password_required() || is_attachment() || ! has_post_thumbnail() ) { } else {the_post_thumbnail('abaya-post-thumbnail', array('class'=>'img-responsive','alt' => get_the_title() )); ?> 
<?php } ?>
  </a>
<?php endif; // End is_singular()
}
endif;
?>