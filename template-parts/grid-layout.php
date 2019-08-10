<?php
/**
 * The template part for displaying services
 *
 * @package BB Mobile Application
 * @subpackage bb_mobile_application
 * @since BB Mobile Application 1.0
 */
?>
<div class="col-lg-4 col-md-4">
  <article class="page-box">
    <div class="box-image">
      <?php 
        if(has_post_thumbnail()) { 
          the_post_thumbnail(); 
        }
      ?>
    </div>
    <div class="new-text"<?php if(has_post_thumbnail()) { ?><?php } ?>>
  	  <h4><?php the_title();?></h4>
      <p><?php the_excerpt();?></p>
  	  <a href="<?php the_permalink(); ?>" alt="<?php esc_html_e( 'Read More','bb-mobile-application' );?>" class="read-more-box" title="<?php esc_attr_e('Read More','bb-mobile-application'); ?>"><?php esc_html_e('Read More','bb-mobile-application'); ?><span class="screen-reader-text"><?php esc_html_e( 'Read More','bb-mobile-application' );?></span></a> 
    </div>
    <div class="clearfix"></div>
  </article>
</div>
  