<?php
/**
 * The template part for displaying content
 * @package Automobile Car Dealer
 * @subpackage automobile_car_dealer
 * @since 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>    
  <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>  
  <div class="box-image">
    <?php 
      if(has_post_thumbnail()) { 
        the_post_thumbnail(); 
      }
    ?>
  </div>
  <div class="new-text">
    <p><?php the_excerpt();?></p>
  </div>
  <div class="postbtn">
    <a href="<?php the_permalink(); ?>"><?php esc_html_e('View More','automobile-car-dealer'); ?><span class="screen-reader-text"><?php esc_html_e( 'View More','automobile-car-dealer' );?></span></a>
  </div>
</article>