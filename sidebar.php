<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Base WP
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>
<div id="secondary" class="widget-area col3 <?php if (!is_page_template( 'page-sidebar-left.php' )) {echo 'last';}?>" role="complementary">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
