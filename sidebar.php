<?php
/**
 * The sidebar containing the secondary widget area
 *
 * Displays on posts and pages.
 *
 * If no active widgets are in this sidebar, hide it completely.
 *
 * @package abaya
 * @since abaya 1.0
 */
?>
<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12" >
<div class="sidebar" id="secondary">
         <?php if (is_active_sidebar('sidebar-primary')){ dynamic_sidebar('sidebar-primary'); } ?>
</div><!--sidebar-->
</div><!--col-->