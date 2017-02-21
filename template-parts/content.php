<?php
/**
 * The template part for displaying services
 *
 * @package BB Mobile Application
 * @subpackage bb_mobile_application
 * @since BB Mobile Application 1.0
 */
?>
  
    <div class="page-box">
   
    <?php 
        if(has_post_thumbnail()) { ?>
    <div class="box-image col-md-6">
          <?php the_post_thumbnail();  ?>
    </div>
    <?php } ?>
    <div class="new-text <?php 
        if(has_post_thumbnail()) { ?>col-md-6"<?php } else { ?>col-md-12"<?php } ?>>
	 <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
      <?php the_excerpt();?>
    </div>
    <div class="clearfix"></div>
   </div>
  