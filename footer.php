<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package bb wedding bliss
 */
?>
    <div  id="footer" class="copyright-wrapper">
      <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <?php dynamic_sidebar('footer-1');?>
            </div>
            <div class="col-md-3 col-sm-3">
                <?php dynamic_sidebar('footer-2');?>
            </div>
            <div class="col-md-3 col-sm-3">
                <?php dynamic_sidebar('footer-3');?>
            </div>
            <div class="col-md-3 col-sm-3">
                <?php dynamic_sidebar('footer-4');?>
            </div>        
        </div>
      </div>
    </div>
      <div class="abovecopyright">
          <div class="copyright text-center">
            <p><?php echo esc_html(get_theme_mod('bb_wedding_bliss_footer_copy',__('Wedding Theme By','bb-wedding-bliss'))); ?> <?php echo esc_html(bb_wedding_bliss_credit(),'bb-wedding-bliss'); ?></p>
          </div>
          <div class="clear"></div>           
      </div>
    <?php wp_footer(); ?>
  </body>
</html>