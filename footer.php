<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Ecommerce Store
 */
?>

<footer role="contentinfo">
  <?php //Set widget areas classes based on user choice
    $widget_areas = get_theme_mod('bb_ecommerce_store_footer_widget_areas', '4');
    if ($widget_areas == '3') {
        $cols = 'col-lg-4 col-md-4';
    } elseif ($widget_areas == '4') {
        $cols = 'col-lg-3 col-md-3';
    } elseif ($widget_areas == '2') {
        $cols = 'col-lg-6 col-md-6';
    } else {
        $cols = 'col-lg-12 col-md-12';
    }
  ?>
  <div class="copyright-wrapper">
    <div class="container">
      <div class="row">
        <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
          <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
            <?php dynamic_sidebar( 'footer-1'); ?>
          </div>
        <?php endif; ?> 
        <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
          <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
            <?php dynamic_sidebar( 'footer-2'); ?>
          </div>
        <?php endif; ?> 
        <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
          <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
            <?php dynamic_sidebar( 'footer-3'); ?>
          </div>
        <?php endif; ?> 
        <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
          <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
            <?php dynamic_sidebar( 'footer-4'); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="inner">
    <div class="copyright">
      <p><?php echo esc_html(get_theme_mod('bb_ecommerce_store_footer_copy',__('Copyright 2017','bb-ecommerce-store'))); ?> <?php bb_ecommerce_store_credit(); ?></p>
    </div>
    <div class="clear"></div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>