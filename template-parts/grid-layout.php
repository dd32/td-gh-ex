<?php
/**
 * The template part for displaying services
 *
 * @package bb wedding bliss
 * @subpackage bb_wedding_bliss
 * @since bb wedding bliss 1.0
 */
?>
<div class="col-lg-4 col-md-4">
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="page-box grid">
      <div class="box-image">
        <?php the_post_thumbnail();  ?>
      </div>
      <div class="new-text">
        <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>   
        <p><?php the_excerpt();?></p>
        <div class="content-bttn">
          <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right" title="<?php esc_attr_e( 'Read More', 'bb-wedding-bliss' ); ?>"><?php esc_html_e('Read More','bb-wedding-bliss'); ?></a>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
