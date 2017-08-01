<?php
/**
 * The sidebar
 *
 * - Called when you write 'get_sidebar' function.
 *
 * @package WordPress
 * @since Base For Original 1.0
 */

if(!is_active_sidebar('sidebar-common')){
  return;
}
?>

<aside id="secondary">
  <?php dynamic_sidebar('sidebar-common');?>
</aside><!-- #secondary -->