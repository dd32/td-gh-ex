<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package bb wedding bliss
 */
?>
<footer role="contentinfo">
  <?php //Set widget areas classes based on user choice
    $bb_wedding_bliss_widget_areas = get_theme_mod('bb_wedding_bliss_footer_widget_areas', '4');
    if ($bb_wedding_bliss_widget_areas == '3') {
      $cols = 'col-lg-4 col-md-4';
    } elseif ($bb_wedding_bliss_widget_areas == '4') {
      $cols = 'col-lg-3 col-md-3';
    } elseif ($bb_wedding_bliss_widget_areas == '2') {
      $cols = 'col-lg-6 col-md-6';
    } else {
      $cols = 'col-lg-12 col-md-12';
    }
  ?>
  <div id="footer" class="copyright-wrapper">
    <div class="container">
      <div class="row">
        <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
          <div class="sidebar-column <?php echo ( $cols ); ?>">
            <?php dynamic_sidebar( 'footer-1'); ?>
          </div>
        <?php endif; ?> 
        <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
          <div class="sidebar-column <?php echo ( $cols ); ?>">
            <?php dynamic_sidebar( 'footer-2'); ?>
          </div>
        <?php endif; ?> 
        <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
          <div class="sidebar-column <?php echo ( $cols ); ?>">
            <?php dynamic_sidebar( 'footer-3'); ?>
          </div>
        <?php endif; ?> 
        <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
          <div class="sidebar-column <?php echo ( $cols ); ?>">
            <?php dynamic_sidebar( 'footer-4'); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="abovecopyright">
    <div class="container">
      <div class="row">
        <div class="copyright col-lg-6 col-md-12 col-10">
          <p><?php bb_wedding_bliss_credit(); ?> <?php echo esc_html(get_theme_mod('bb_wedding_bliss_footer_copy',__('By Themeshopy','bb-wedding-bliss'))); ?> </p>
        </div>
        <div class="social-media col-lg-6 col-md-1 col-1">
          <?php if( get_theme_mod( 'bb_wedding_bliss_youtube_url' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_wedding_bliss_youtube_url','' ) ); ?>"><i class="fab fa-youtube" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube','bb-wedding-bliss' );?></span></a>
          <?php } ?>
          <?php if( get_theme_mod( 'bb_wedding_bliss_facebook_url') != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_wedding_bliss_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','bb-wedding-bliss' );?></span></a>
          <?php } ?>
          <?php if( get_theme_mod( 'bb_wedding_bliss_twitter_url') != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_wedding_bliss_twitter_url','' ) ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','bb-wedding-bliss' );?></span></a>
          <?php } ?>
          <?php if( get_theme_mod( 'bb_wedding_bliss_rss_url') != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_wedding_bliss_rss_url','' ) ); ?>"><i class="fas fa-rss" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'RSS','bb-wedding-bliss' );?></span></a>
          <?php } ?>
          <?php if( get_theme_mod( 'bb_wedding_bliss_insta_url') != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_wedding_bliss_insta_url','' ) ); ?>"><i class="fab fa-instagram" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','bb-wedding-bliss' );?></span></a>
          <?php } ?>
          <?php if( get_theme_mod( 'bb_wedding_bliss_pint_url') != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_wedding_bliss_pint_url','' ) ); ?>"><i class="fab fa-pinterest-p" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Pinterest','bb-wedding-bliss' );?></span></a>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</footer>  
<?php if( get_theme_mod( 'bb_wedding_bliss_enable_disable_scroll',true) != '' || get_theme_mod( 'bb_wedding_bliss_responsive_scroll',true) != '') { ?>
  <?php $bb_wedding_bliss_theme_lay = get_theme_mod( 'bb_wedding_bliss_scroll_setting','Right');
  if($bb_wedding_bliss_theme_lay == 'Left'){ ?>
    <button id="scroll-top" class="left-align" title="<?php esc_attr_e('Scroll to Top','bb-wedding-bliss'); ?>"><span class="fas fa-chevron-up" aria-hidden="true"></span><span class="screen-reader-text"><?php esc_html_e('Scroll to Top', 'bb-wedding-bliss'); ?></span></button>
  <?php }else if($bb_wedding_bliss_theme_lay == 'Center'){ ?>
    <button id="scroll-top" class="center-align" title="<?php esc_attr_e('Scroll to Top','bb-wedding-bliss'); ?>"><span class="fas fa-chevron-up" aria-hidden="true"></span><span class="screen-reader-text"><?php esc_html_e('Scroll to Top', 'bb-wedding-bliss'); ?></span></button>
  <?php }else{ ?>
    <button id="scroll-top" title="<?php esc_attr_e('Scroll to Top','bb-wedding-bliss'); ?>"><span class="fas fa-chevron-up" aria-hidden="true"></span><span class="screen-reader-text"><?php esc_html_e('Scroll to Top', 'bb-wedding-bliss'); ?></span></button>
  <?php }?>
<?php }?>

<?php wp_footer(); ?>
</body>
</html>