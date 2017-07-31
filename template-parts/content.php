<?php
/**
 * The template part for displaying services
 *
 * @package bb wedding bliss
 * @subpackage bb_wedding_bliss
 * @since bb wedding bliss 1.0
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
        <p><?php the_excerpt();?></p>
         <div class="content-bttn">
          <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right" title="<?php esc_attr_e( 'Read More', 'bb-wedding-bliss' ); ?>"><?php esc_html_e('Read More','bb-wedding-bliss'); ?></a>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
  