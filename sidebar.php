<?php 
/**
 * The template for displaying sidebar
 * @package Best Classifieds
 */  
if (is_active_sidebar('sidebar-1')) { ?>
	<div class="col-md-4 col-sm-4 col-xs-12 sidebar">
	    <?php dynamic_sidebar('sidebar-1'); ?>
	</div>
<?php } ?>