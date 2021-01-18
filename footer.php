<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package advance-coaching
 */
?>
<footer role="contentinfo">
  <?php //Set widget areas classes based on user choice
    $advance_coaching_widget_areas = get_theme_mod('advance_coaching_footer_widget_areas', '4');
    if ($advance_coaching_widget_areas == '3') {
      $cols = 'col-lg-4 col-md-4';
    } elseif ($advance_coaching_widget_areas == '4') {
      $cols = 'col-lg-3 col-md-3';
    } elseif ($advance_coaching_widget_areas == '2') {
      $cols = 'col-lg-6 col-md-6';
    } else {
      $cols = 'col-lg-12 col-md-12';
    }
  ?>
  <div id="footer" class="copyright-wrapper py-3 px-0">
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
  <div class="copyright text-center p-3">
    <p class="mb-0"><?php advance_coaching_credit();?> <?php echo esc_html(get_theme_mod('advance_coaching_footer_copy', __('By Themeshopy', 'advance-coaching')));?></p>
  </div>
</footer>

<?php if( get_theme_mod( 'advance_coaching_enable_disable_scroll',true) != '' || get_theme_mod( 'advance_coaching_responsive_scroll',true) != '') { ?>
  <?php $advance_coaching_theme_lay = get_theme_mod( 'advance_coaching_scroll_setting','Right');
  if($advance_coaching_theme_lay == 'Left'){ ?>
    <button id="scroll-top" class="left-align" title="<?php esc_attr_e('Scroll to Top','advance-coaching'); ?>"><span class="fas fa-chevron-up" aria-hidden="true"></span><span class="screen-reader-text"><?php esc_html_e('Scroll to Top', 'advance-coaching'); ?></span></button>
  <?php }else if($advance_coaching_theme_lay == 'Center'){ ?>
    <button id="scroll-top" class="center-align" title="<?php esc_attr_e('Scroll to Top','advance-coaching'); ?>"><span class="fas fa-chevron-up" aria-hidden="true"></span><span class="screen-reader-text"><?php esc_html_e('Scroll to Top', 'advance-coaching'); ?></span></button>
  <?php }else{ ?>
    <button id="scroll-top" title="<?php esc_attr_e('Scroll to Top','advance-coaching'); ?>"><span class="fas fa-chevron-up" aria-hidden="true"></span><span class="screen-reader-text"><?php esc_html_e('Scroll to Top', 'advance-coaching'); ?></span></button>
  <?php }?>
<?php }?>

<?php wp_footer();?>
</body>
</html>