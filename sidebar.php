<?php
/**
 * Template for displaying the sidebar widget area
 *
 * @package Bidnis
 * @since 1.0.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-right-widget-area' ) ): ?>

  <aside id="widget-area-right-sidebar" class="widget-area">

    <?php dynamic_sidebar( 'sidebar-right-widget-area' ); ?>

  </aside>

<?php endif; ?>