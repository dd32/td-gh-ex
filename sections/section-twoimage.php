<?php
/**
* section-twoimage.php
* @author    Denis Franchi
* @package   Atomy
*
*/
?>

<section class="at-two-image-extra container-fluid">
  <?php 
        $atomy_post_name_twoImage = esc_attr(get_theme_mod('at_post_twoImage'));
         $atomy_args_twoImage = array(
             'post_type'      => 'post',
             'order'          => 'ASC',
             'posts_per_page' => '-1',
             'post__in' => array($atomy_post_name_twoImage));
         $atomy_query_twoImage = new WP_Query( $atomy_args_twoImage);
         // The Loop
    if  ($atomy_query_twoImage->have_posts() ) {
 while  ($atomy_query_twoImage->have_posts() ) {
         $atomy_query_twoImage->the_post();  
    } 
  } 
  ?>
   <div class="row"> 
      <!-- Image Left -->
      <div class="col-md-4 at-two-image-left">
      <img class="img-fluid" src="<?php echo esc_url( get_theme_mod('at_two_img_left' ) ); ?>"/>
      </div>
      <!-- Text -->
      <div class="col-md-4 text-center at-two-image-text">
        <h2><?php the_title_attribute(); ?></h2>
        <p><?php the_content()?></p>
      </div>
        <!-- Image Right -->
        <div class="col-md-4 at-two-image-right">
        <?php $atomy_image_attributes_twoImage =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'atomy_card_4')?>
	       <img src="<?php if ( $atomy_image_attributes_twoImage[0] ) :
             echo esc_url($atomy_image_attributes_twoImage[0]);  endif ?>"/>
      </div>
   </div>
   <?php
   wp_reset_postdata(); ?>
</section>