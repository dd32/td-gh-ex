<?php
/**
 * Template for displaying the sidebar widget area
 *
 * @package Bidnis
 * @since 1.0.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-left-widget-area' ) ): ?>

  <aside id="widget-area-left-sidebar" class="widget-area">

    <?php dynamic_sidebar( 'sidebar-left-widget-area' ); ?>

  </aside>

<?php endif; ?>