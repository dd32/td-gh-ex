<?php
/**
 * The template part for displaying off-canvas area.
 *
 * @package Fmi
 */

?>
<div class="site-overlay"></div>
<div class="offcanvas">
  <aside class="offcanvas-sidebar">
    <div class="offcanvas-inner widget-area">
      <?php
      $locations = get_nav_menu_locations();

      // Get menu by location.
      if ( isset( $locations['primary'] ) && $locations['primary'] <> null ) {
        $location = $locations['primary'];
        the_widget( 'WP_Nav_Menu_Widget', array( 'nav_menu' => $location ), array(
          'before_widget' => '<div class="widget %s">',
          'after_widget'  => '</div>',
        ) );
      }
      ?>
    </div>
  </aside>
</div>
