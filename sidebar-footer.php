<?php
/**
 * Template for displaying a widget area and additional content in the footer
 *
 * @package Bidnis
 * @since Bidnis 1.0.0
 */

if(
  !is_active_sidebar( 'footer-top-widget-area' ) &&
  !is_active_sidebar( 'footer-one-widget-area' ) &&
  !is_active_sidebar( 'footer-two-widget-area' ) &&
  !is_active_sidebar( 'footer-three-widget-area' ) &&
  !is_active_sidebar( 'footer-four-widget-area' )
){ 
  return;
} ?>

<?php if( is_active_sidebar( 'footer-top-widget-area' ) ): ?>
  <div id="footer-top-widget-area" role="complementary">
    <div id="footer-top-widget-area-inner" class="widget-area wrapper" role="complementary">
      <?php dynamic_sidebar( 'footer-top-widget-area' ); ?>
    </div><!-- .footer-top-widget-area-inner -->
  </div><!-- #footer-top-widget-area -->
<?php endif; ?>

<?php if(
  !is_active_sidebar( 'footer-one-widget-area' ) &&
  !is_active_sidebar( 'footer-two-widget-area' ) &&
  !is_active_sidebar( 'footer-three-widget-area' ) &&
  !is_active_sidebar( 'footer-four-widget-area' )
){ 
  return;
} ?>

<div id="footer-widget-areas" role="complementary">
  <div id="footer-widget-areas-inner" class="wrapper" role="complementary">

  <?php if( is_active_sidebar( 'footer-one-widget-area' ) ): ?>
    <div id="footer-one-widget-area" class="widget-area" role="complementary">
      <?php dynamic_sidebar( 'footer-one-widget-area' ); ?>
    </div><!-- .footer-one-widget-area .widget-area -->
  <?php endif; ?>

  <?php if( is_active_sidebar( 'footer-two-widget-area' ) ): ?>
    <div id="footer-two-widget-area" class="widget-area" role="complementary">
      <?php dynamic_sidebar( 'footer-two-widget-area' ); ?>
    </div><!-- .footer-two-widget-area .widget-area -->
  <?php endif; ?>

  <?php if( is_active_sidebar( 'footer-three-widget-area' ) ): ?>
    <div id="footer-three-widget-area" class="widget-area" role="complementary">
      <?php dynamic_sidebar( 'footer-three-widget-area' ); ?>
    </div><!-- .footer-three-widget-area .widget-area -->
  <?php endif; ?>

  <?php if( is_active_sidebar( 'footer-four-widget-area' ) ): ?>
    <div id="footer-four-widget-area" class="widget-area" role="complementary">
      <?php dynamic_sidebar( 'footer-four-widget-area' ); ?>
    </div><!-- .footer-four-widget-area .widget-area -->
  <?php endif; ?>

  </div><!-- #footer-widget-areas-inner -->
</div><!-- #footer-widget-areas -->